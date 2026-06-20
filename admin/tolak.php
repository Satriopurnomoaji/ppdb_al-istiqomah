===<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    mysqli_query($conn, "
        UPDATE pendaftaran
        SET status='Ditolak'
        WHERE id='$id'
    ");
}

header("Location: data_pendaftar.php");
exit;
?>