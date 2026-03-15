#!/usr/bin/env python3
import os
import sys
import json
import asyncio
import subprocess
import re
import logging
import random
from datetime import datetime
from pathlib import Path
from typing import Optional, Dict, List, Any

from dotenv import load_dotenv
from google import genai

# --- Konfigurasi Environment ---
load_dotenv()
API_KEY = os.getenv("API_KEY")
if not API_KEY:
    print("❌ Error: API_KEY tidak ditemukan di .env")
    sys.exit(1)

client = genai.Client(api_key=API_KEY)

# --- Konfigurasi Proyek ---
CACHE_DIR = Path(".agent_cache")
CACHE_DIR.mkdir(exist_ok=True)
LOG_FILE = Path("orchestrator.log")

logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s [%(levelname)s] %(name)s: %(message)s",
    handlers=[logging.FileHandler(LOG_FILE), logging.StreamHandler()]
)
logger = logging.getLogger("DevTeam")

# --- Utility Functions ---

async def call_gemini(model: str, prompt: str, temperature: float = 0.2, cache_key: str = None) -> str:
    """Wrapper untuk pemanggilan API Gemini dengan caching & retry."""
    if cache_key:
        cache_path = CACHE_DIR / f"{}.json"
        if cache_path.exists():
            logger.info(f"📦 Cache Hit: {}")
            return json.loads(cache_path.read_text())["output"]

    for attempt in range(3):
        try:
            response = client.models.generate_content(
                model=model,
                contents=prompt,
                config={'temperature': temperature}
            )
            output = response.text
            if cache_key:
                cache_path.write_text(json.dumps({"output": output, "time": str(datetime.now())}))
            return output
        except Exception as e:
            wait = (attempt + 1) * 2
            logger.warning(f"⚠️ API Error (Attempt {attempt+1}): {}. Retrying in {wait}s...")
            await asyncio.sleep(wait)
    return "Error: Gagal mendapatkan respon dari AI."

async def smart_summarize(text: str) -> str:
    """Meringkas teks panjang menggunakan model Flash (hemat biaya & cepat)."""
    if len(text) < 1500: return text
    prompt = f"Ringkas poin-poin teknis penting dari teks berikut agar tetap informatif namun padat:\n\n{text}"
    return await call_gemini("gemini-1.5-flash", prompt, temperature=0.1)

def extract_files(text: str) -> Dict[str, str]:
    """Mengekstrak file dari blok kode Markdown dengan deteksi nama file."""
    files = {}
    # Mencari pola: ### NamaFile atau filename: NamaFile sebelum blok kode
    # Atau pola standar: ```extension [path/to/file]
    pattern = r'```[\w-]*\s+(?:(?:\/\/|#|--)\s*)?([\w\./\-\\]+\.\w+)\s*\n(.*?)\n```'
    matches = re.findall(pattern, text, re.DOTALL)
    
    if not matches:
        # Fallback: cari blok kode apa saja jika tidak ada nama file eksplisit
        pattern_fallback = r'```[\w-]*\s*\n(.*?)\n```'
        fallback_matches = re.findall(pattern_fallback, text, re.DOTALL)
        for i, code in enumerate(fallback_matches):
            files[f"extracted_file_{i}.txt"] = code
    else:
        for filename, code in matches:
            files[filename.strip()] = code.strip()
    return files

def ask_human(role: str, content: str) -> bool:
    print(f"\n{'='*20} REVIEW: {role} {'='*20}")
    print(content[:1000] + ("..." if len(content) > 1000 else ""))
    while True:
        choice = input(f"\n❓ [ {role} ] Apakah Anda setuju? (y/n/revisi): ").lower()
        if choice in ['y', 'yes']: return True
        if choice in ['n', 'no']: return False
        if choice == 'revisi': return "revisi"

# --- Agent Definitions ---

async def agent_pm(user_goal: str) -> str:
    prompt = f"""Anda adalah Senior PM. Buat spesifikasi MVP untuk: {}.
    Output: Executive Summary, User Stories, Core Features, Tech Constraints."""
    return await call_gemini("gemini-1.5-pro", prompt, cache_key=f"pm_{hash(user_goal)}")

async def agent_designer(pm_specs: str, feedback: str = "") -> str:
    summary = await smart_summarize(pm_specs)
    prompt = f"""Anda adalah UI/UX Designer. Berdasarkan spek: {summary}
    {f'Revisi berdasarkan feedback: {}' if feedback else ''}
    Output: Color Palette (Hex), Typography, Component Layout, Mobile vs Desktop Strategy."""
    return await call_gemini("gemini-1.5-pro", prompt, temperature=0.4)

async def agent_web_developer(design_specs: str) -> str:
    prompt = f"""Anda adalah Senior Web Dev (React, TS, Tailwind). 
    Buat kode lengkap berdasarkan desain: {design_specs}.
    WAJIB sertakan: 
    1. package.json dengan dependensi yang diperlukan.
    2. tailwind.config.js.
    3. Struktur file modular (App.tsx, components/*.tsx).
    Gunakan format: ```filename: path/to/file.ext\n[code]\n```"""
    return await call_gemini("gemini-1.5-pro", prompt, temperature=0.2)

async def agent_android_developer(design_specs: str) -> str:
    prompt = f"""Anda adalah Senior Android Dev (Kotlin, Jetpack Compose). 
    Buat kode lengkap berdasarkan desain: {design_specs}.
    WAJIB sertakan:
    1. build.gradle.kts (app level).
    2. MainActivity.kt dan UI components.
    3. ViewModel dan State management.
    Gunakan format: ```filename: path/to/file.ext\n[code]\n```"""
    return await call_gemini("gemini-1.5-pro", prompt, temperature=0.2)

async def agent_qa(web_code: str, android_code: str) -> str:
    web_sum = await smart_summarize(web_code)
    and_sum = await smart_summarize(android_code)
    prompt = f"""Review kode berikut untuk Bug, Security, dan Logic.
    WEB CODE SUMMARY: {web_sum}
    ANDROID CODE SUMMARY: {and_sum}
    Berikan laporan Pass/Fail dan saran perbaikan spesifik."""
    return await call_gemini("gemini-1.5-flash", prompt)

async def agent_devops(qa_report: str, project_name: str) -> str:
    prompt = f"""Buat infrastruktur DevOps untuk proyek {}.
    Berdasarkan QA: {qa_report}
    Output: Dockerfile (Web), GitHub Actions (.github/workflows/main.yml), README.md instruksi setup."""
    return await call_gemini("gemini-1.5-flash", prompt)

# --- Orchestrator ---

async def main():
    print("🚀 AI DevTeam Orchestrator v2")
    user_goal = input("💡 Apa yang ingin Anda bangun? ")
    project_id = "".join(e for e in user_goal if e.isalnum())[:15]
    project_path = Path(f"output_{project_id}")
    project_path.mkdir(exist_ok=True)

    # 1. PM Phase
    pm_out = await agent_pm(user_goal)
    if not ask_human("Product Manager", pm_out): return

    # 2. Design Phase (dengan loop revisi)
    feedback = ""
    while True:
        design_out = await agent_designer(pm_out, feedback)
        status = ask_human("UI/UX Designer", design_out)
        if status == True: break
        if status == False: return
        feedback = input("📝 Masukkan feedback revisi desain: ")

    # 3. Development Phase (Parallel!)
    print("\n🛠️ Menjalankan Web & Android Developer secara paralel...")
    web_task = agent_web_developer(design_out)
    android_task = agent_android_developer(design_out)
    
    web_out, android_out = await asyncio.gather(web_task, android_task)
    
    # 4. QA & DevOps Phase
    qa_out = await agent_qa(web_out, android_out)
    print(f"\n🔍 QA Report:\n{qa_out}")
    
    devops_out = await agent_devops(qa_out, project_id)

    # 5. File Writing & Git Init
    print("\n💾 Menulis file ke disk...")
    all_outputs = [
        ("web", web_out),
        ("android", android_out),
        (".", devops_out)
    ]

    for subfolder, output in all_outputs:
        target_dir = project_path / subfolder
        target_dir.mkdir(exist_ok=True, parents=True)
        files = extract_files(output)
        for filename, content in files.items():
            file_path = target_dir / filename
            file_path.parent.mkdir(exist_ok=True, parents=True)
            file_path.write_text(content)
            print(f"✅ Generated: {file_path}")

    # Finalize with Git
    try:
        subprocess.run(["git", "init"], cwd=project_path, check=True, capture_output=True)
        print(f"\n✨ Proyek berhasil dibuat di: {project_path.absolute()}")
    except:
        print("\n⚠️ Git tidak terinstall, melewati inisialisasi repo.")

if __name__ == "__main__":
    asyncio.run(main())