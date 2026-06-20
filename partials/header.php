<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Islam Al Istiqomah</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="main-header">
    <div class="container header-container">
        <div class="brand">
            <img src="assets/images/sd.jpeg" alt="Logo SD Islam Al Istiqomah" class="brand-logo">
            <div class="brand-text">
                <h1>SD ISLAM AL ISTIQOMAH</h1>
                <p>Cerdas • Religius • Berakhlak Mulia</p>
            </div>
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
            <i class="fas fa-bars"></i>
        </button>

        <nav class="nav-menu" id="navMenu">
            <ul class="menu-list">
                <li><a href="index.php" class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">Beranda</a></li>
                <li><a href="profil.php" class="<?php echo ($current_page == 'profil.php') ? 'active' : ''; ?>">Profil</a></li>
                <li><a href="akademik.php" class="<?php echo ($current_page == 'akademik.php') ? 'active' : ''; ?>">Akademik</a></li>
                <li><a href="galeri.php" class="<?php echo ($current_page == 'galeri.php') ? 'active' : ''; ?>">Galeri</a></li>
                <li><a href="kontak.php" class="<?php echo ($current_page == 'kontak.php') ? 'active' : ''; ?>">Kontak</a></li>
                <li><a href="ppdb.php" class="btn-ppdb-nav <?php echo ($current_page == 'ppdb.php') ? 'active' : ''; ?>">PPDB Online</a></li>
                
                <?php if (isset($_SESSION['siswa_id'])): ?>
                    <li><a href="siswa/dashboard.php" class="btn-login-nav"><i class="fas fa-user-circle"></i> Dashboard</a></li>
                <?php else: ?>
                    <li><a href="siswa/login.php" class="btn-login-nav"><i class="fas fa-sign-in-alt"></i> Login Siswa</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
