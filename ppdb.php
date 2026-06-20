<?php
include "partials/header.php";
include "config/config.php";

// Prefill data if student is logged in
$prefill_nama = "";
$prefill_email = "";
if (isset($_SESSION['siswa_id'])) {
    $siswa_id = $_SESSION['siswa_id'];
    $q_prefill = mysqli_query($conn, "SELECT nama, email FROM users WHERE id = '$siswa_id'");
    if ($q_prefill && mysqli_num_rows($q_prefill) > 0) {
        $row_prefill = mysqli_fetch_assoc($q_prefill);
        $prefill_nama = $row_prefill['nama'];
        $prefill_email = $row_prefill['email'];
    }
}
?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php" class="btn btn-outline-secondary" style="border-radius: 50px; font-weight: 600; padding: 8px 20px;">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
        <?php if (isset($_SESSION['siswa_id'])): ?>
            <a href="siswa/dashboard.php" class="btn btn-success" style="border-radius: 50px; font-weight: 600; padding: 8px 20px;">
                <i class="fas fa-columns"></i> Ke Dashboard Siswa
            </a>
        <?php endif; ?>
    </div>

    <div class="form-card max-width-800 mx-auto">
        <div class="form-header">
            <h3><i class="fas fa-file-signature"></i> Formulir Pendaftaran PPDB</h3>
            <p>SD ISLAM AL ISTIQOMAH • TAHUN AJARAN 2026/2027</p>
        </div>

        <div class="form-body">
        <?php if (!isset($_SESSION['siswa_id'])): ?>
            <div class="alert alert-info text-center mb-4" role="alert" style="border-radius: 8px;">
                <i class="fas fa-info-circle"></i> Sudah memiliki akun siswa? <a href="siswa/login.php" class="alert-link text-decoration-none">Login di sini</a> untuk melanjutkan tanpa perlu mendaftar akun baru.
            </div>
        <?php endif; ?>

            <form action="proses_ppdb.php" method="POST" enctype="multipart/form-data">
                
                <!-- GROUP 1: DATA CALON SISWA -->
                <div class="form-group-title">
                    <i class="fas fa-user-graduate"></i> Data Calon Siswa
                </div>

                <div class="mb-3">
                    <label class="form-label-bold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap calon siswa" value="<?php echo htmlspecialchars($prefill_nama); ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota lahir anak" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="1" placeholder="RT/RW, Kelurahan, Kecamatan, Kota" required></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-bold">Asal Sekolah (TK/RA/PAUD)</label>
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama sekolah asal anak (kosongkan jika belum pernah bersekolah)">
                </div>

                <!-- GROUP 2: DATA ORANG TUA / WALI -->
                <div class="form-group-title">
                    <i class="fas fa-users"></i> Data Orang Tua / Wali
                </div>

                <div class="mb-3">
                    <label class="form-label-bold">Nama Lengkap Orang Tua / Wali</label>
                    <input type="text" name="nama_ortu" class="form-control" placeholder="Nama ayah / ibu / wali" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Nomor HP (WhatsApp Aktif)</label>
                        <input type="tel" name="no_hp" class="form-control" placeholder="Contoh: 0882xxxxxxxx" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label-bold">Email Orang Tua</label>
                        <input type="email" name="email" class="form-control" placeholder="Email untuk notifikasi status" value="<?php echo htmlspecialchars($prefill_email); ?>" required>
                    </div>
                </div>

                <?php if (!isset($_SESSION['siswa_id'])): ?>
                <!-- GROUP: AKUN PENDAFTARAN -->
                <div class="form-group-title">
                    <i class="fas fa-key"></i> Buat Akun Pendaftaran
                </div>
                <p class="text-muted mb-4" style="font-size: 13px;">Buat password untuk login ke dashboard guna memantau status verifikasi dan mencetak bukti pendaftaran.</p>
                <div class="mb-4">
                    <label class="form-label-bold">Password Akun</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                </div>
                <?php endif; ?>

                <!-- GROUP 3: PERSYARATAN DOKUMEN -->
                <div class="form-group-title">
                    <i class="fas fa-file-upload"></i> Unggah Berkas Persyaratan
                </div>
                <p class="text-muted mb-4" style="font-size: 13px;">Format yang didukung: <b>JPG, PNG, PDF</b>. Ukuran maksimal per file: <b>2 MB</b>.</p>

                <div class="mb-4">
                    <div class="upload-box mb-3">
                        <label class="form-label-bold d-block text-start mb-2"><i class="fas fa-baby"></i> Fotokopi Akta Kelahiran</label>
                        <input type="file" name="akta" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>

                    <div class="upload-box mb-3">
                        <label class="form-label-bold d-block text-start mb-2"><i class="fas fa-address-card"></i> Fotokopi Kartu Keluarga</label>
                        <input type="file" name="kk" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>

                    <div class="upload-box mb-3">
                        <label class="form-label-bold d-block text-start mb-2"><i class="fas fa-id-card"></i> Fotokopi KTP Orang Tua (Ayah/Ibu)</label>
                        <input type="file" name="ktp" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>
                    
                    <div class="upload-box mb-3">
                        <label class="form-label-bold d-block text-start mb-2"><i class="fas fa-graduation-cap"></i> Fotokopi Ijazah / Surat Keterangan Lulus (Jika Ada)</label>
                        <input type="file" name="ijazah" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 py-3" style="border-radius: 8px; font-weight: 700; font-family: 'Outfit', sans-serif; font-size: 16px;">
                    <i class="fas fa-check-circle"></i> Kirim Form Pendaftaran PPDB
                </button>

            </form>
        </div>
    </div>
</div>

<?php
include "partials/footer.php";
?>