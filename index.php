<?php
include "partials/header.php";
?>

<?php if(isset($_SESSION['nomor_pendaftaran'])): ?>
<!-- TOAST NOTIFICATION -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
  <div id="toastSuccess" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <strong><i class="fas fa-check-circle"></i> Pendaftaran Berhasil!</strong><br>
        Nomor Pendaftaran Anda: <b><?php echo $_SESSION['nomor_pendaftaran']; ?></b><br>
        Silakan login siswa untuk memantau status verifikasi berkas.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var toastEl = document.getElementById('toastSuccess');
    var toast = new bootstrap.Toast(toastEl, { delay: 10000 });
    toast.show();
  });
</script>
<?php unset($_SESSION['nomor_pendaftaran']); endif; ?>

<section class="hero">
    <div class="container">
        <a href="ppdb.php" class="ppdb-badge-link">
            <div class="ppdb-badge">
                <i class="fas fa-bullhorn"></i> Penerimaan Peserta Didik Baru 2026/2027
            </div>
        </a>

        <h2>
            Membangun Masa Depan
            <br>
            <span>Generasi Qur'ani</span>
        </h2>

        <p>
            Pendidikan dasar berbasis nilai-nilai Islam dengan integrasi
            teknologi modern untuk mencetak generasi berakhlak mulia,
            cerdas, mandiri dan berprestasi.
        </p>

        <div class="btn-group">
            <a href="ppdb.php" class="btn-main btn-gold">
                <i class="fas fa-file-signature"></i> Isi Form Pendaftaran
            </a>
            <a href="siswa/login.php" class="btn-main btn-outline">
                <i class="fas fa-sign-in-alt"></i> Login Siswa
            </a>
        </div>
    </div>
</section>

<main class="container mt-5">
    <div class="main-grid">
        <!-- Fasilitas -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-school"></i>
            </div>
            <h3>Fasilitas Sekolah</h3>
            <div class="info-item">Gedung Milik Sendiri <b>Ada</b></div>
            <div class="info-item">Ruang Kelas Nyaman  <b>Ada</b></div>
            <div class="info-item">Masjid Sekolah <b>Ada</b></div>
            <div class="info-item">Perpustakaan  <b>Ada</b></div>
        </div>

        <!-- Lokasi -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <h3>Lokasi Sekolah</h3>
            <div class="map-frame mb-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2986962539326!2d106.5576292773316!3d-6.355367077221781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e25c43e3f191%3A0x1db447686bb4c0d1!2sSD%20Al%20Istiqomah!5e0!3m2!1sid!2sid!4v1776330895278!5m2!1sid!2sid"
                    width="100%"
                    height="190"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
            <div class="info-item">Jl. Nangka Raya No. 30 Perumnas II Parung Panjang, Bogor</div>
        </div>

        <!-- Program Unggulan -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-star"></i>
            </div>
            <h3>Program Unggulan</h3>
            <div class="info-item">Tahfidz Al-Qur'an <b>Juz 30 & 29</b></div>
            <div class="info-item">Tahsin Al-Qur'an (Metode Ummi) <b>Aktif</b></div>
            <div class="info-item">Bahasa Arab & Inggris Dasar <b>Aktif</b></div>
            <div class="info-item">Ekstrakurikuler Pramuka & Silat <b>Aktif</b></div>
        </div>
    </div>
</main>

<section class="container mt-5 mb-5 timeline-section">
    <div class="text-center mb-5">
        <h2 style="color: var(--primary-dark); font-weight: 800;">Alur Pendaftaran PPDB</h2>
        <p class="text-muted">Tahun Ajaran 2026/2027</p>
    </div>

    <div class="timeline-row">
        <!-- Step 1 -->
        <div class="timeline-item">
            <div class="timeline-num">1</div>
            <h4>Isi Formulir & Buat Akun</h4>
            <p>Lengkapi formulir pendaftaran PPDB sekaligus membuat password akun siswa.</p>
        </div>

        <!-- Step 2 -->
        <div class="timeline-item">
            <div class="timeline-num">2</div>
            <h4>Upload Berkas</h4>
            <p>Unggah pindaian Akta Kelahiran, Kartu Keluarga, dan KTP Orang Tua (Maks 2MB, PDF/JPG).</p>
        </div>

        <!-- Step 3 -->
        <div class="timeline-item">
            <div class="timeline-num">3</div>
            <h4>Verifikasi</h4>
            <p>Panitia akan memverifikasi kesesuaian data diri dan berkas persyaratan Anda.</p>
        </div>

        <!-- Step 3 -->
        <div class="timeline-item">
            <div class="timeline-num">3</div>
            <h4>Upload Berkas</h4>
            <p>Unggah pindaian Akta Kelahiran, Kartu Keluarga, dan KTP Orang Tua (Maks 2MB, PDF/JPG).</p>
        </div>

        <!-- Step 4 -->
        <div class="timeline-item">
            <div class="timeline-num">4</div>
            <h4>Pengumuman</h4>
            <p>Pantau hasil verifikasi berkas pendaftaran melalui Dashboard Siswa secara berkala.</p>
        </div>
    </div>
</section>

<section class="container mb-5">
    <div class="card shadow border-0 rounded-4" style="background: linear-gradient(135deg, var(--primary-light) 0%, #ffffff 100%); border-left: 6px solid var(--primary) !important;">
        <div class="card-body text-center p-5">
            <h2 style="color: var(--primary-dark); font-weight: 800; margin-bottom: 15px;">Ayo Gabung Bersama Kami!</h2>
            <p class="text-muted mb-4" style="max-width: 600px; margin: 0 auto 25px;">
                Mari bimbing buah hati Anda menjadi generasi Qur'ani yang berakhlak mulia, cerdas, dan tangguh di era digital bersama SD Islam Al Istiqomah.
            </p>
            <a href="ppdb.php" class="btn-main btn-gold">
                <i class="fas fa-file-signature"></i> Daftar Sekarang
            </a>
        </div>
    </div>
</section>

<?php
include "partials/footer.php";
?>