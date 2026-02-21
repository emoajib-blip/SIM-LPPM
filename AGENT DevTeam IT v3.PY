#!/usr/bin/env python3
import os
import sys
import json
import asyncio
import subprocess
import re
import logging
from datetime import datetime
from pathlib import Path
from typing import Optional, Dict, List, Any

from dotenv import load_dotenv
from google import genai

# ==============================================================================
# "Efficiency is the goal, but Integrity is the foundation."
# Vetted by AI - Manual Review Required by Senior Engineer/Manager
# ==============================================================================

# --- Konfigurasi Environment ---
load_dotenv()
API_KEY = os.getenv("API_KEY")

# --- Konfigurasi Proyek (Laravel + Livewire Focus) ---
CACHE_DIR = Path(".agent_cache")
CACHE_DIR.mkdir(exist_ok=True)
LOG_FILE = Path("orchestrator_v3.log")

logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s [%(levelname)s] %(name)s: %(message)s",
    handlers=[logging.FileHandler(LOG_FILE), logging.StreamHandler()]
)
logger = logging.getLogger("DevTeam-Laravel")

# --- Initialize GenAI Client ---
client = None
if API_KEY:
    client = genai.Client(api_key=API_KEY)
else:
    print("⚠️ Warning: API_KEY tidak ditemukan di .env. Script akan gagal saat pemanggilan AI.")

# --- Utility Functions ---

async def call_gemini(model: str, prompt: str, temperature: float = 0.2, cache_key: str = None) -> str:
    """Wrapper untuk pemanggilan API Gemini dengan caching & retry."""
    if not client:
        return "Error: API_KEY belum dikonfigurasi. Silakan dapatkan API Key di https://aistudio.google.com/"

    if cache_key:
        cache_path = CACHE_DIR / f"{cache_key}.json"
        if cache_path.exists():
            logger.info(f"📦 Cache Hit: {cache_key}")
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
            logger.warning(f"⚠️ API Error (Attempt {attempt+1}): {e}. Retrying in {wait}s...")
            await asyncio.sleep(wait)
    return "Error: Gagal mendapatkan respon dari AI."

async def smart_summarize(text: str) -> str:
    """Meringkas teks panjang menggunakan model Flash."""
    if len(text) < 1500: return text
    prompt = f"Ringkas poin-poin teknis penting dari teks berikut agar tetap informatif namun padat:\n\n{text}"
    return await call_gemini("gemini-flash-latest", prompt, temperature=0.1)

def extract_files(text: str) -> Dict[str, str]:
    """Mengekstrak file dari blok kode Markdown."""
    files = {}
    pattern = r'```[\w-]*\s+(?:(?:\/\/|#|--)\s*)?([\w\./\-\\]+\.\w+)\s*\n(.*?)\n```'
    matches = re.findall(pattern, text, re.DOTALL)
    
    if not matches:
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

# --- Agent Definitions (Laravel Focused) ---

async def agent_pm(user_goal: str) -> str:
    prompt = f"""Anda adalah Senior PM untuk sistem Enterprise Laravel. 
    Buat spesifikasi fungsional untuk fitur: {user_goal}.
    Target Stack: PHP 8.4, Laravel 12, Livewire v4, Tailwind v4.
    Output: Executive Summary, User Stories, Core Logic (Actions), Security Requirements (Zero Trust)."""
    return await call_gemini("gemini-flash-latest", prompt, cache_key=f"pm_v3_{hash(user_goal)}")

async def agent_designer(pm_specs: str, feedback: str = "") -> str:
    summary = await smart_summarize(pm_specs)
    prompt = f"""Anda adalah UI/UX Designer spesialis Tabler & Tailwind v4.
    Berdasarkan spek: {summary}
    {f'Revisi berdasarkan feedback: {feedback}' if feedback else ''}
    Output: Layout mapping menggunakan komponen Tabler, Wireframe (ASCII/Desc), Mobile Responsiveness Strategy."""
    return await call_gemini("gemini-flash-latest", prompt, temperature=0.4)

async def agent_laravel_dev(design_specs: str) -> str:
    prompt = f"""Anda adalah Senior Laravel Developer.
    Buat kode Backend & Core Logic berdasarkan: {design_specs}.
    WAJIB mengikuti standar AGENTS.md:
    1. Migration files.
    2. Models dengan casts() method & HasUuids trait.
    3. Action classes di app/Actions/ atau app/Livewire/Actions/.
    4. Enum classes (ProposalStatus, ReviewStatus).
    Gunakan format: ```php path/to/file.php\n[code]\n```"""
    return await call_gemini("gemini-flash-latest", prompt, temperature=0.2)

async def agent_livewire_dev(laravel_code: str) -> str:
    summary = await smart_summarize(laravel_code)
    prompt = f"""Anda adalah Livewire v4 Specialist.
    Buat komponen UI berdasarkan spesifikasi: {summary}.
    WAJIB mengikuti standar AGENTS.md:
    1. Controller-less component (app/Livewire/...).
    2. Form Objects di app/Livewire/Forms/.
    3. Blade views dengan komponen <x-tabler.*> dan <x-slot:title>.
    4. Navigasi wire:navigate.hover.
    Gunakan format: ```php path/to/file.php atau ```html path/to/file.blade.php\n[code]\n```"""
    return await call_gemini("gemini-flash-latest", prompt, temperature=0.2)

async def agent_qa(laravel_code: str, livewire_code: str) -> str:
    l_sum = await smart_summarize(laravel_code)
    lw_sum = await smart_summarize(livewire_code)
    prompt = f"""Review kode Laravel & Livewire v4 berikut.
    Fokus pada: N+1 prevention, Atomic Transactions (DB::transaction), Security (Zero Trust), dan Validasi.
    LARAVEL CODE: {l_sum}
    LIVEWIRE CODE: {lw_sum}
    Berikan laporan Pass/Fail dan "Risk Assessment" wajib."""
    return await call_gemini("gemini-flash-latest", prompt)

# --- Orchestrator ---

async def main():
    print("🚀 AI DevTeam Orchestrator v3 (Laravel & Livewire Specialized)")
    print("---")
    print("Misi: Menyelesaikan fitur 'External Reviewer Management'")
    
    user_goal = "Implementasi manajemen reviewer eksternal: login akses terbatas, pengelolaan institusi asal (pilih existing atau manual input), dan validasi kondisional di form edit user."
    
    project_id = "external_reviewer"
    project_path = Path(f"output_{project_id}")
    project_path.mkdir(exist_ok=True)

    # 1. PM Phase
    print("\n📋 PM sedang merancang spesifikasi...")
    pm_out = await agent_pm(user_goal)
    if not ask_human("Product Manager", pm_out): return

    # 2. Design Phase
    feedback = ""
    while True:
        print("\n🎨 Designer sedang merancang UI...")
        design_out = await agent_designer(pm_out, feedback)
        status = ask_human("UI/UX Designer", design_out)
        if status == True: break
        if status == False: return
        feedback = input("📝 Masukkan feedback revisi desain: ")

    # 3. Development Phase (Sequential for context)
    print("\n🐘 Laravel Developer sedang membangun Core Logic...")
    laravel_out = await agent_laravel_dev(design_out)
    
    print("\n⚡ Livewire Specialist sedang membangun UI Components...")
    livewire_out = await agent_livewire_dev(laravel_out)
    
    # 4. QA Phase
    print("\n🔍 QA sedang melakukan audit keamanan...")
    qa_out = await agent_qa(laravel_out, livewire_out)
    print(f"\n🔍 QA Report:\n{qa_out}")
    
    # 5. File Writing
    print("\n💾 Menulis file ke disk...")
    all_outputs = [
        ("laravel", laravel_out),
        ("livewire", livewire_out)
    ]

    for category, output in all_outputs:
        target_dir = project_path / category
        target_dir.mkdir(exist_ok=True, parents=True)
        files = extract_files(output)
        for filename, content in files.items():
            # Sanitize filename (remove prefix path if any)
            clean_name = Path(filename).name
            file_path = target_dir / clean_name
            file_path.write_text(content)
            print(f"✅ Generated: {file_path}")

    print(f"\n✨ Workflow selesai. Hasil tersimpan di: {project_path.absolute()}")
    print("⚠️  PASTIKAN MELAKUKAN MANUAL REVIEW SEBELUM MERGE.")

if __name__ == "__main__":
    asyncio.run(main())
