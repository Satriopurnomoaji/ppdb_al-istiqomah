<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Ambil path berkas untuk dihapus dari folder uploads
    $query = mysqli_query($conn, "SELECT akta, kk, ktp, ijazah FROM pendaftaran WHERE id = '$id'");
    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        
        // Hapus file fisik (file diupload dengan path relatif ke root, e.g., 'uploads/...')
        // Dari folder 'admin/', naik satu tingkat
        if (!empty($row['akta']) && file_exists("../" . $row['akta'])) {
            @unlink("../" . $row['akta']);
        }
        if (!empty($row['kk']) && file_exists("../" . $row['kk'])) {
            @unlink("../" . $row['kk']);
        }
        if (!empty($row['ktp']) && file_exists("../" . $row['ktp'])) {
            @unlink("../" . $row['ktp']);
        }
        if (!empty($row['ijazah']) && file_exists("../" . $row['ijazah'])) {
            @unlink("../" . $row['ijazah']);
        }
    }

    // Hapus baris data dari database
    mysqli_query($conn, "DELETE FROM pendaftaran WHERE id = '$id'");
}

header("Location: data_pendaftar.php");
exit;
?>
