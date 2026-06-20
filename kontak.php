<?php
include "partials/header.php";
?>

<section class="hero" style="padding: 60px 0 100px;">
    <div class="container">
        <h2>Hubungi <span>Kami</span></h2>
        <p>
            Punya pertanyaan mengenai pendaftaran PPDB, kurikulum, atau ingin berkunjung ke sekolah? Tim kami siap melayani Anda.
        </p>
    </div>
</section>

<main class="container" style="margin-top: -60px; position: relative; z-index: 10; margin-bottom: 50px;">
    <div class="row g-4">
        <!-- Kolom Informasi Kontak & Map -->
        <div class="col-lg-5">
            <div class="glass-card h-100" style="text-align: left;">
                <h3 style="color: var(--primary-dark); margin-bottom: 25px;"><i class="fas fa-info-circle" style="color: var(--primary);"></i> Informasi Kontak</h3>
                
                <div class="d-flex align-items-start mb-4 gap-3">
                    <div class="icon-box m-0" style="width: 45px; height: 45px; font-size: 18px; flex-shrink: 0;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h5 class="mb-1" style="font-size: 15px; font-weight: 700;">Alamat Sekolah</h5>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Jl. Nangka Raya No. 30 Perumnas II Parung Panjang, Bogor, Jawa Barat</p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 gap-3">
                    <div class="icon-box m-0" style="width: 45px; height: 45px; font-size: 18px; flex-shrink: 0;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h5 class="mb-1" style="font-size: 15px; font-weight: 700;">Nomor Telepon / WA</h5>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">0882-1289-9392</p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 gap-3">
                    <div class="icon-box m-0" style="width: 45px; height: 45px; font-size: 18px; flex-shrink: 0;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="mb-1" style="font-size: 15px; font-weight: 700;">Email Resmi</h5>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">istiqomahsdial@gmail.com</p>
                    </div>
                </div>

                <h3 style="color: var(--primary-dark); margin-top: 30px; margin-bottom: 15px;"><i class="fas fa-map-marked-alt" style="color: var(--primary);"></i> Peta Lokasi</h3>
                <div class="map-frame" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--slate-200);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2986962539326!2d106.5576292773316!3d-6.355367077221781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e25c43e3f191%3A0x1db447686bb4c0d1!2sSD%20Al%20Istiqomah!5e0!3m2!1sid!2sid!4v1776330895278!5m2!1sid!2sid" 
                        width="100%" 
                        height="200" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Kolom Form Pesan -->
        <div class="col-lg-7">
            <div class="glass-card" style="text-align: left;">
                <h3 style="color: var(--primary-dark); margin-bottom: 25px;"><i class="fas fa-paper-plane" style="color: var(--primary);"></i> Kirim Pesan</h3>
                <form action="javascript:alert('Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size: 13.5px;">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size: 13.5px;">Email Aktif</label>
                        <input type="email" class="form-control" placeholder="Masukkan alamat email Anda" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size: 13.5px;">Subjek Pesan</label>
                        <input type="text" class="form-control" placeholder="Tanya Pendaftaran / Informasi Program" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark" style="font-size: 13.5px;">Pesan Anda</label>
                        <textarea class="form-control" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required></textarea>
                    </div>

                    <button class="btn btn-success w-100" style="padding: 12px 0; border-radius: 8px; font-weight: 700; font-family: 'Outfit', sans-serif;">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include "partials/footer.php";
?>