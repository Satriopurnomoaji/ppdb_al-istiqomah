<?php
include "partials/header.php";
?>

<section class="hero" style="padding: 60px 0 100px;">
    <div class="container">
        <h2>Profil <span>Yayasan & Sekolah</span></h2>
        <p>
            Yayasan Al-Istiqomah Parung Panjang adalah lembaga yang bergerak di bidang pendidikan dasar dengan menerapkan sistem pembelajaran yang terpadu, religius, dan ramah anak.
        </p>
    </div>
</section>

<main class="container" style="margin-top: -60px; position: relative; z-index: 10; margin-bottom: 50px;">
    <!-- Visi Misi Section -->
    <div class="vision-mision">
        <div class="glass-card" style="border-left: 5px solid var(--secondary);">
            <h3 style="color: var(--primary-dark); display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-eye" style="color: var(--primary);"></i> Visi Sekolah
            </h3>
            <p style="color: var(--slate-700); font-style: italic; font-size: 15px; margin-top: 15px; line-height: 1.8;">
                "Terwujudnya Sekolah Islam yang Unggul, Mandiri, Inovatif, Cerdas, dan Berwawasan Kebangsaan."
            </p>
        </div>
        
        <div class="glass-card" style="border-left: 5px solid var(--secondary);">
            <h3 style="color: var(--primary-dark); display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-bullseye" style="color: var(--primary);"></i> Misi Sekolah
            </h3>
            <ul style="color: var(--slate-700); font-size: 14.5px; margin-top: 15px; padding-left: 20px; line-height: 1.8;">
                <li class="mb-2">Menciptakan iklim dan budaya sekolah yang Islami dan berwawasan lingkungan.</li>
                <li class="mb-2">Meningkatkan kemampuan intelektual, spiritual, dan emosional secara berimbang.</li>
                <li class="mb-2">Membiasakan budaya tertib, disiplin, sopan santun dalam berperilaku berlandaskan iman dan taqwa.</li>
                <li class="mb-2">Membentuk siswa berkarakter religius, nasionalis, mandiri, gotong royong, dan berintegritas tinggi melalui kegiatan akademik dan non-akademik.</li>
            </ul>
        </div>
    </div>

    <!-- Deskripsi Sekolah -->
    <div class="glass-card mb-5">
        <h3 class="text-center mb-4" style="color: var(--primary-dark);">Mengenal SD Islam Al Istiqomah</h3>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p style="color: var(--slate-600); font-size: 15px; line-height: 1.8; text-align: justify;">
                    SD Islam Al Istiqomah hadir sebagai jawaban atas kebutuhan masyarakat akan pendidikan dasar berkualitas yang menyeimbangkan antara kecerdasan intelektual (IPTEK) dan kecerdasan spiritual (IMTAQ). Dengan fasilitas gedung mandiri yang aman, lingkungan yang asri, serta kurikulum holistik yang terintegrasi, kami berkomitmen untuk melahirkan calon-calon pemimpin masa depan yang berjiwa Qur'ani.
                </p>
                <p style="color: var(--slate-600); font-size: 15px; line-height: 1.8; text-align: justify; margin-bottom: 0;">
                    Kami percaya setiap anak adalah unik dan memiliki potensi terbaiknya. Melalui program pendampingan intensif Metode Ummi dalam membaca Al-Qur'an serta penekanan pada akhlakul karimah sehari-hari, anak-anak dididik untuk menjadi individu yang cerdas, ceria, mandiri, dan berakhlak mulia.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="assets/images/foto_bersama.jpg" alt="Foto Bersama Yayasan" class="img-fluid rounded-4 shadow-sm" style="max-height: 300px; width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
    
    <!-- Struktur Organisasi -->
    <h3 class="text-center mb-5" style="color: var(--primary-dark); font-weight: 800;">Struktur Organisasi Sekolah</h3>
    
    <div class="main-grid">
        <!-- Ketua Yayasan -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-landmark"></i>
            </div>
            <h3>Ketua Yayasan</h3>
            <p style="font-weight: 800; color: var(--slate-900); font-size: 16px; margin-top: 10px; text-transform: uppercase;">Yoga Apriditya, S.E.</p>
            <p style="font-size: 13px; color: var(--slate-500); font-weight: 600;">Yayasan Al-Istiqomah</p>
        </div>

        <!-- Kepala Sekolah -->
        <div class="glass-card" style="border: 2px solid var(--secondary); background: linear-gradient(135deg, #ffffff 0%, var(--secondary-light) 100%);">
            <div class="icon-box" style="background-color: var(--secondary-light); color: var(--secondary);">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3>Kepala Sekolah</h3>
            <p style="font-weight: 800; color: var(--slate-900); font-size: 16px; margin-top: 10px; text-transform: uppercase;">Priharti Triwintarti, S.Pd.I.</p>
            <p style="font-size: 13px; color: var(--slate-500); font-weight: 600;">Akademik & Pengajaran</p>
        </div>

        <!-- Tata Usaha -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-wallet"></i>
            </div>
            <h3>TU & Keuangan</h3>
            <p style="font-weight: 800; color: var(--slate-900); font-size: 16px; margin-top: 10px; text-transform: uppercase;">Juminah</p>
            <p style="font-size: 13px; color: var(--slate-500); font-weight: 600;">Administrasi & Keuangan</p>
        </div>
    </div>
</main>

<?php
include "partials/footer.php";
?>