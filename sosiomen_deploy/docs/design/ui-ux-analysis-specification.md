# UI/UX Analysis & Design Specification (Humanist Approach)

**Analyst**: Senior UI/UX Architect & PM
**Target Audience**: LPPM Staff (Low Digital Literacy) & Institutional Leaders
**Goal**: Translate complexity into intuitive, premium visualizations.

## 1. Interface Analysis (Existing State)
- **Current Pattern**: Bootstrap/Tabler standard tables and simple KPI cards.
- **Strengths**: Data is reasonably organized.
- **Weaknesses**: 
    - Text-heavy; difficult for quick cognitive processing by busy staff.
    - Lacks "Wow" factor; feels like generic back-office software.
    - No "AI Insights" layer; data is raw, not "digested".

## 2. The Humanist Design Strategy
Untuk pengguna dengan literasi digital rendah, kita menggunakan prinsip **"Recognition over Recall"**:
- **Warna sebagai Navigasi**: Hijau selalu berarti "Aman/Selesai", Kuning "Perlu Perhatian", Merah "Kritis/Terlambat".
- **Visualisasi Data (Data Storytelling)**: 
    - Gunakan **Progress Rings** daripada sekedar angka.
    - Gunakan **Heat Maps** sederhana untuk produktivitas fakultas.
    - **Smart Clustering**: Mengelompokkan riset bukan hanya berdasarkan kategori teks, tapi berdasarkan "Vibe" atau "Trending Themes" (Simulasi AI).

## 3. UI Specification: "Neon-Glass Professional"
- **Aesthetic**: Tabler-based with Glassmorphism subtle effects.
- **Typography**: Inter / Outfit (Modern, high readability).
- **Cards**: Soft shadows, subtle gradients in icons.

## 4. Visualizing AI Clusters (The Innovation)
Alih-alih menampilkan tabel Topic ID yang membosankan, kita akan memperkenalkan **"Smart Topic Cloud"** atau **"Research Focus Map"**:
- **Logic**: Menggabungkan `focus_area`, `theme`, dan `topic` menjadi ringkasan "Big Picture".
- **Visual**: Bubble chart sederhana atau Grid interaktif dengan label "Kekuatan Utama Kampus".

## 5. Implementation Roadmap
1. **Refine KPI Cards**: Tambahkan tren (naik/turun) untuk memberikan konteks pertumbuhan.
2. **Enhanced Charts**: Gunakan visualisasi yang lebih berani untuk Distribusi Skema.
3. **Staff-Friendly Guidance**: Tambahkan "Micro-copy" yang membimbing staff (e.g., "Klik PDF untuk mendownload laporan akreditasi tahunan anda secara instan").

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
*"Design for the human, build for the mission."*
