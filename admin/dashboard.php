<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Query stats
$total = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pendaftaran")
);

$diterima = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pendaftaran WHERE status='Diterima'")
);

$ditolak = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pendaftaran WHERE status='Ditolak'")
);

$pending = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM pendaftaran WHERE status='Menunggu Verifikasi'")
);

// Get latest 5 registrations
$latest_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | PPDB SD Islam Al Istiqomah</title>
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
<body style="background-color: var(--slate-50);">

<div class="panel-layout">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img src="../assets/images/sd.jpeg" alt="Logo SD">
                <h5>PANEL ADMIN<br>PPDB ONLINE</h5>
            </div>
            
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="dashboard.php"><i class="fas fa-chart-pie"></i> Ringkasan Statistik</a>
                </li>
                <li>
                    <a href="data_pendaftar.php"><i class="fas fa-users-cog"></i> Kelola Pendaftar</a>
                </li>
                <li>
                    <a href="../index.php"><i class="fas fa-globe"></i> Lihat Web Utama</a>
                </li>
            </ul>
        </div>
        
        <div class="sidebar-footer">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar Sesi</a>
        </div>
    </aside>

    <!-- Main Workspace -->
    <main class="panel-content">
        <!-- Panel Header -->
        <header class="panel-header">
            <div>
                <h2>Dashboard Admin</h2>
                <p class="text-muted mb-0">Selamat datang di Panel Kontrol PPDB SD Islam Al Istiqomah.</p>
            </div>
            <div class="text-end text-muted" style="font-size: 13.5px;">
                <i class="far fa-calendar-alt"></i> Hari ini: <b><?php echo date('d F Y'); ?></b>
            </div>
        </header>

        <!-- Stats Grid -->
        <section class="stat-grid">
            <div class="stat-card">
                <div class="stat-icon total"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <h3><?php echo $total; ?></h3>
                    <p>Total Pendaftar</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon pending"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <h3><?php echo $pending; ?></h3>
                    <p>Menunggu Verifikasi</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon diterima"><i class="fas fa-user-check"></i></div>
                <div class="stat-info">
                    <h3><?php echo $diterima; ?></h3>
                    <p>Diterima</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon ditolak"><i class="fas fa-user-times"></i></div>
                <div class="stat-info">
                    <h3><?php echo $ditolak; ?></h3>
                    <p>Ditolak</p>
                </div>
            </div>
        </section>

        <!-- Body Section -->
        <div class="row">
            <!-- Latest Pendaftar Table -->
            <div class="col-lg-8 mb-4">
                <div class="glass-card h-100" style="padding: 25px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 style="font-size: 18px; color: var(--primary-dark); font-weight: 800; margin-bottom: 0;"><i class="fas fa-user-clock"></i> Pendaftar Terbaru</h4>
                        <a href="data_pendaftar.php" class="btn btn-sm btn-outline-success" style="border-radius: 50px; font-size: 12px; font-weight: 700;">Kelola Semua</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="font-size: 13.5px;">
                            <thead>
                                <tr class="table-light">
                                    <th>Nomor</th>
                                    <th>Nama Siswa</th>
                                    <th>Orang Tua</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($latest_pendaftar) > 0): ?>
                                    <?php while($row = mysqli_fetch_assoc($latest_pendaftar)): ?>
                                        <tr>
                                            <td><b><?php echo htmlspecialchars($row['nomor_pendaftaran']); ?></b></td>
                                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                            <td><?php echo htmlspecialchars($row['nama_ortu']); ?></td>
                                            <td>
                                                <?php
                                                if($row['status']=="Diterima") {
                                                    echo "<span class='badge bg-success' style='font-size: 10px;'>Diterima</span>";
                                                } elseif($row['status']=="Ditolak") {
                                                    echo "<span class='badge bg-danger' style='font-size: 10px;'>Ditolak</span>";
                                                } else {
                                                    echo "<span class='badge bg-warning text-dark' style='font-size: 10px;'>Menunggu</span>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Belum ada data pendaftar baru.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Petunjuk Admin -->
            <div class="col-lg-4 mb-4">
                <div class="glass-card h-100" style="padding: 25px; text-align: left;">
                    <h4 style="font-size: 18px; color: var(--primary-dark); font-weight: 800; margin-bottom: 20px;"><i class="fas fa-shield-alt"></i> Panduan Cepat</h4>
                    <ul style="font-size: 13.5px; color: var(--slate-600); padding-left: 20px; line-height: 1.8;">
                        <li class="mb-3">Buka menu <b>Kelola Pendaftar</b> untuk melihat berkas pendaftaran calon siswa secara lengkap.</li>
                        <li class="mb-3">Periksa keabsahan berkas <b>Akta Kelahiran, Kartu Keluarga, dan KTP Orang Tua</b> yang diunggah.</li>
                        <li class="mb-3">Tekan tombol <span class="badge bg-success">Terima</span> untuk menyetujui, atau <span class="badge bg-warning text-dark">Tolak</span> jika berkas tidak sesuai.</li>
                        <li class="mb-3">Data siswa yang diterima/ditolak akan otomatis ter-update di dashboard portal siswa masing-masing secara instan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>