<?php
include "config/config.php"; // ⬅️ INI YANG KURANG
session_start();     // ⬅️ untuk kirim nomor ke beranda

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid");
}

// Generate nomor pendaftaran (format: PPDB-YYYYMMDD-XXX)
$tanggal = date('Ymd');
$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM pendaftaran");
$data = mysqli_fetch_assoc($result);
$urutan = $data['total'] + 1;
$nomor_pendaftaran = "PPDB-" . $tanggal . "-" . str_pad($urutan, 3, '0', STR_PAD_LEFT);

// Ambil & amankan data
$nama   = mysqli_real_escape_string($conn, $_POST['nama']);
$jk     = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
$tempat = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
$tgl    = $_POST['tanggal_lahir'];
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$ortu   = mysqli_real_escape_string($conn, $_POST['nama_ortu']);
$hp     = mysqli_real_escape_string($conn, $_POST['no_hp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$asal_sekolah = isset($_POST['asal_sekolah']) ? mysqli_real_escape_string($conn, $_POST['asal_sekolah']) : '';

// Jika belum login, buat akun siswa sekalian
if (!isset($_SESSION['siswa_id'])) {
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        die("Error: Password harus diisi untuk membuat akun baru.");
    }
    $password = md5($_POST['password']);
    
    // Cek apakah email sudah dipakai
    $cek_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        die("Error: Email tersebut sudah terdaftar! Silakan kembali dan login menggunakan akun Anda terlebih dahulu.");
    }
    
    // Buat akun
    $query_user = "INSERT INTO users(nama, email, password, role) VALUES('$nama', '$email', '$password', 'siswa')";
    if (!mysqli_query($conn, $query_user)) {
        die("Error membuat akun: " . mysqli_error($conn));
    }
    
    // Login otomatis
    $siswa_id = mysqli_insert_id($conn);
    $_SESSION['siswa_id'] = $siswa_id;
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 'siswa';
}

// Folder upload
$folder = "uploads/";
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

function uploadFile($file, $folder) {
    $namaFile = time() . '_' . basename($file['name']);
    $target   = $folder . $namaFile;

    $allowed = ['jpg','jpeg','png','pdf'];
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Format file tidak diizinkan!");
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        die("Ukuran file terlalu besar! Maks 2MB");
    }

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        die("Gagal upload file!");
    }

    return $target;
}

$akta = uploadFile($_FILES['akta'], $folder);
$kk   = uploadFile($_FILES['kk'], $folder);
$ktp  = uploadFile($_FILES['ktp'], $folder);

// Upload ijazah jika ada
$ijazah = "";
if (isset($_FILES['ijazah']) && $_FILES['ijazah']['error'] === UPLOAD_ERR_OK && !empty($_FILES['ijazah']['name'])) {
    $ijazah = uploadFile($_FILES['ijazah'], $folder);
}

// Simpan ke database (tambahkan nomor_pendaftaran)
$query = "INSERT INTO pendaftaran 
(nomor_pendaftaran, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, asal_sekolah, nama_ortu, no_hp, email, akta, kk, ktp, ijazah)
VALUES 
('$nomor_pendaftaran','$nama','$jk','$tempat','$tgl','$alamat','$asal_sekolah','$ortu','$hp','$email','$akta','$kk','$ktp','$ijazah')";

if (mysqli_query($conn, $query)) {

    // Set session untuk notifikasi sukses di index.php
    $_SESSION['nomor_pendaftaran'] = $nomor_pendaftaran;

    // Email (gunakan @ untuk suppress warning jika server email lokal belum dikonfigurasi)
    $to = "banajau45@gmail.com";
    $subject = "Pendaftaran PPDB Baru";

    $message = "Nomor Pendaftaran: $nomor_pendaftaran\n"
             . "Nama: $nama\n"
             . "Jenis Kelamin: $jk\n"
             . "TTL: $tempat, $tgl\n"
             . "Asal Sekolah: $asal_sekolah\n"
             . "Alamat: $alamat\n"
             . "Orang Tua: $ortu\n"
             . "No HP: $hp";

    $headers = "From: $email";

    @mail($to, $subject, $message, $headers);      // ke admin
    @mail($email, $subject, $message, $headers);   // ke user

    // Redirect ke dashboard siswa jika login, jika tidak ke halaman utama
    if (isset($_SESSION['siswa_id'])) {
        header("Location: siswa/dashboard.php");
    } else {
        header("Location: index.php");
    }
    exit;

} else {
    echo "Error: " . mysqli_error($conn);
}
?>