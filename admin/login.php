<?php
session_start();
include "../config/config.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "
        SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='admin'
    ");

    if (mysqli_num_rows($q) > 0) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Akses ditolak! Email atau password admin salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SD Islam Al Istiqomah</title>
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
<body style="background-color: var(--slate-900);">

<div class="auth-container">
    <div class="auth-card" style="grid-template-columns: 1fr; max-width: 450px; min-height: auto;">
        <!-- Form Side -->
        <div class="auth-side-form" style="padding: 40px;">
            <div class="text-center mb-4">
                <img src="../assets/images/sd.jpeg" alt="Logo SD" style="height: 60px; margin-bottom: 12px; border-radius: 8px;">
                <h4 style="color: var(--primary-dark); font-weight: 800; font-family: 'Outfit', sans-serif;">Portal Admin PPDB</h4>
                <p class="text-muted" style="font-size: 13px;">Silakan login menggunakan akun administrator Anda.</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2" role="alert" style="border-radius: 8px; font-size: 13px; padding: 10px 14px;">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?php echo $error; ?></div>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label-bold">Email Admin</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white" style="border-right: none; border-color: var(--slate-200);"><i class="fas fa-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="admin@email.com" style="border-left: none;" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white" style="border-right: none; border-color: var(--slate-200);"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" style="border-left: none;" required>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-success w-100 py-3 mb-3" style="border-radius: 8px; font-weight: 700; font-family: 'Outfit', sans-serif; background-color: var(--primary-dark); border-color: var(--primary-dark);">
                    <i class="fas fa-sign-in-alt"></i> Masuk Admin
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="../index.php" class="text-muted" style="font-size: 13px;"><i class="fas fa-chevron-left"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>