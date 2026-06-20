<?php
session_start();
include "../config/config.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "
        SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='siswa'
    ");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        $_SESSION['siswa_id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa | SD Islam Al Istiqomah</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body style="background-color: var(--slate-100);">

<div class="auth-container">
    <div class="auth-card">
        <!-- Banner Side -->
        <div class="auth-side-banner">
            <div class="banner-logo">
                <img src="../assets/images/sd.jpeg" alt="Logo SD">
                <span>SD ISLAM AL ISTIQOMAH</span>
            </div>
            
            <div class="banner-info">
                <h2>Portal Penerimaan <span>Siswa Baru</span></h2>
                <p>Silakan masuk ke akun Anda untuk mengisi formulir pendaftaran PPDB dan memantau status kelulusan berkas secara real-time.</p>
            </div>
            
            <div class="banner-footer" style="font-size: 12px; opacity: 0.8;">
                &copy; 2026 SD Islam Al Istiqomah
            </div>
        </div>

        <!-- Form Side -->
        <div class="auth-side-form">
            <h3>Login Siswa</h3>
            <p class="subtitle">Selamat datang kembali! Silakan masukkan email dan password Anda.</p>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2" role="alert" style="border-radius: 8px; font-size: 13.5px; padding: 12px 16px;">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?php echo $error; ?></div>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label-bold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white" style="border-right: none; border-color: var(--slate-200);"><i class="fas fa-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" style="border-left: none;" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white" style="border-right: none; border-color: var(--slate-200);"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" style="border-left: none;" required>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-success w-100 py-3 mb-3" style="border-radius: 8px; font-weight: 700; font-family: 'Outfit', sans-serif;">
                    <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
                </button>
            </form>

            <div class="text-center mt-3" style="font-size: 14px;">
                <span class="text-muted">Belum mendaftar PPDB?</span> 
                <a href="../ppdb.php" style="font-weight: 700;">Isi Form Pendaftaran</a>
            </div>

            <div class="text-center mt-4">
                <a href="../index.php" class="text-muted" style="font-size: 13px;"><i class="fas fa-chevron-left"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>