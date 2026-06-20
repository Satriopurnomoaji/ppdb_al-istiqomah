<?php
include "partials/header.php";
?>

<section class="hero" style="padding: 60px 0 100px;">
    <div class="container">
        <h2>Informasi <span>Akademik</span></h2>
        <p>
            Kurikulum terintegrasi, jadwal belajar yang seimbang, serta program ekstrakurikuler komprehensif untuk mendukung minat bakat siswa.
        </p>
    </div>
</section>

<main class="container" style="margin-top: -60px; position: relative; z-index: 10; margin-bottom: 50px;">
    <div class="main-grid">
        <!-- Kurikulum -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-book-open"></i>
            </div>
            <h3>Kurikulum Merdeka</h3>
            <p style="color: var(--slate-600); font-size: 14px; text-align: justify; line-height: 1.7; margin-bottom: 15px;">
                Kami menerapkan Kurikulum Merdeka secara nasional yang dikombinasikan dengan Muatan Lokal Keislaman (Tahfidz, Tahsin Metode Ummi, Bahasa Arab, dan Fiqih Praktis).
            </p>
            <div class="info-item">Penguatan Karakter Pancasila <b>Aktif</b></div>
            <div class="info-item">Pembelajaran Berbasis Proyek <b>Aktif</b></div>
            <div class="info-item">Pengembangan IPTEK Terpadu <b>Aktif</b></div>
        </div>

        <!-- Jadwal Pelajaran -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3>Jadwal Pelajaran</h3>
            <p style="color: var(--slate-600); font-size: 14px; text-align: justify; line-height: 1.7; margin-bottom: 15px;">
                Proses pembelajaran didesain agar tetap fokus namun kondusif dan menyenangkan untuk perkembangan motorik serta kognitif siswa.
            </p>
            <div class="info-item">Hari Belajar <b>Senin - Jumat</b></div>
            <div class="info-item">Jam Belajar Utama <b>07.00 - 12.00</b></div>
            <div class="info-item">Kegiatan Ekstrakurikuler <b>13.00 - 15.00</b></div>
        </div>

        <!-- Ekstrakurikuler -->
        <div class="glass-card">
            <div class="icon-box">
                <i class="fas fa-award"></i>
            </div>
            <h3>Ekstrakurikuler</h3>
            <p style="color: var(--slate-600); font-size: 14px; text-align: justify; line-height: 1.7; margin-bottom: 15px;">
                Membantu siswa menyalurkan hobi, melatih kedisiplinan, keberanian, kerja sama tim, dan kepemimpinan sejak dini.
            </p>
            <div class="info-item">Gerakan Pramuka <b>Wajib</b></div>
            <div class="info-item">Seni Bela Diri Silat <b>Pilihan</b></div>
            <div class="info-item">Seni Kaligrafi & Hadroh <b>Pilihan</b></div>
        </div>
    </div>

    <!-- Kalender Akademik Singkat -->
    <div class="glass-card mt-5">
        <h3 class="text-center mb-4" style="color: var(--primary-dark);"><i class="far fa-calendar-check"></i> Agenda Kegiatan Utama Akademik</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" style="font-size: 14.5px;">
                <thead class="table-success text-dark">
                    <tr>
                        <th width="80">No</th>
                        <th>Kegiatan</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><b>Awal Masuk Sekolah (Tahun Ajaran Baru)</b></td>
                        <td>Juli 2026</td>
                        <td>Masa Pengenalan Lingkungan Sekolah (MPLS)</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><b>Penilaian Tengah Semester (PTS) Ganjil</b></td>
                        <td>September 2026</td>
                        <td>Evaluasi paruh semester pertama</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><b>Penilaian Akhir Semester (PAS) Ganjil</b></td>
                        <td>Desember 2026</td>
                        <td>Evaluasi akhir semester & pembagian rapor</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><b>Ujian Praktik Keagamaan (Kelas VI)</b></td>
                        <td>April 2027</td>
                        <td>Ujian Tahfidz, Fiqih Salat, dan Tahsin Al-Qur'an</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include "partials/footer.php";
?>