<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['siswa_id'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

$data = mysqli_query($conn, "
    SELECT * FROM pendaftaran
    WHERE email='$email'
");

$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa | SD Islam Al Istiqomah</title>
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
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printArea, #printArea * {
                visibility: visible;
            }
            #printArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none !important;
                box-shadow: none !important;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body style="background-color: var(--slate-50);">

<div class="panel-layout">
    <!-- Sidebar -->
    <aside class="sidebar no-print">
        <div>
            <div class="sidebar-brand">
                <img src="../assets/images/sd.jpeg" alt="Logo SD">
                <h5>SD ISLAM<br>AL ISTIQOMAH</h5>
            </div>
            
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="dashboard.php"><i class="fas fa-home"></i> Beranda Dashboard</a>
                </li>
                <?php if (!$row): ?>
                    <li>
                        <a href="../ppdb.php"><i class="fas fa-edit"></i> Isi Form PPDB</a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="../index.php"><i class="fas fa-globe"></i> Kunjungi Web Utama</a>
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
        <header class="panel-header no-print">
            <div>
                <h2>Dashboard Siswa</h2>
                <p class="text-muted mb-0">Selamat datang, <b><?php echo htmlspecialchars($_SESSION['nama']); ?></b></p>
            </div>
            <div class="d-flex gap-2">
                <a href="../index.php" class="btn btn-outline-secondary" style="border-radius: 50px; font-size: 13.5px; font-weight: 600;">
                    <i class="fas fa-arrow-left"></i> Keluar
                </a>
            </div>
        </header>

        <!-- Main Body -->
        <div class="row">
            <div class="col-12">
                
                <?php if ($row) { ?>
                    <!-- Welcome Status Bar -->
                    <div class="alert alert-info no-print d-flex align-items-center gap-3 p-4 mb-4 border-0 shadow-sm" style="border-radius: 12px; background-color: var(--primary-light); color: var(--primary-dark);">
                        <i class="fas fa-info-circle fa-2x" style="color: var(--primary);"></i>
                        <div>
                            <h5 class="alert-heading mb-1" style="font-weight: 700; font-size: 16px;">Terima Kasih Telah Mengisi Formulir PPDB</h5>
                            <p class="mb-0" style="font-size: 13.5px; opacity: 0.9;">Berkas Anda saat ini sedang diperiksa dan diverifikasi oleh Panitia PPDB. Status verifikasi dapat dilihat langsung pada kartu di bawah ini.</p>
                        </div>
                    </div>

                    <!-- Digital Certificate Card -->
                    <div class="student-card-glow text-center mb-5" id="printArea">
                        <div class="student-card-header">
                            <img src="../assets/images/sd.jpeg" alt="Logo SD">
                            <h4>SD ISLAM AL ISTIQOMAH</h4>
                            <p>BUKTI PENDAFTARAN PESERTA DIDIK BARU 2026/2027</p>
                        </div>
                        
                        <div class="border-top border-bottom py-3 mb-4">
                            <span class="text-muted d-block mb-1" style="font-size: 11px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Nomor Pendaftaran</span>
                            <span class="h4" style="color: var(--primary-dark); font-family: 'Outfit', sans-serif; font-weight: 800;"><?php echo htmlspecialchars($row['nomor_pendaftaran']); ?></span>
                        </div>
                        
                        <div class="row text-start mb-4" style="font-size: 14px;">
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Nama Lengkap:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['nama']); ?></div>
                            
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Jenis Kelamin:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['jenis_kelamin']); ?></div>
                            
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Tempat, Tgl Lahir:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['tempat_lahir'] . ', ' . date('d F Y', strtotime($row['tanggal_lahir']))); ?></div>
                            
                            <?php if(!empty($row['asal_sekolah'])): ?>
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Asal Sekolah:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['asal_sekolah']); ?></div>
                            <?php endif; ?>
                            
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Email Wali:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['email']); ?></div>
                            
                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Nama Orang Tua:</div>
                            <div class="col-sm-7 fw-bold mb-3 mb-sm-2"><?php echo htmlspecialchars($row['nama_ortu']); ?></div>

                            <div class="col-sm-5 text-muted mb-2 mb-sm-0">Status Verifikasi:</div>
                            <div class="col-sm-7 mb-2">
                                <?php
                                if ($row['status'] == "Diterima") {
                                    echo "<span class='badge-status diterima'><i class='fas fa-check-circle'></i> DITERIMA</span>";
                                } elseif ($row['status'] == "Ditolak") {
                                    echo "<span class='badge-status ditolak'><i class='fas fa-times-circle'></i> DITOLAK</span>";
                                } else {
                                    echo "<span class='badge-status menunggu'><i class='fas fa-clock'></i> MENUNGGU VERIFIKASI</span>";
                                }
                                ?>
                            </div>
                        </div>

                        <?php if ($row['status'] == "Diterima"): ?>
                            <div class="alert alert-success p-3 text-start mb-4 border-0" style="border-radius: 8px; font-size: 13.5px;">
                                <b><i class="fas fa-bullhorn"></i> Selamat!</b> Calon siswa dinyatakan <b>DITERIMA</b> di SD Islam Al Istiqomah. Silakan hubungi panitia melalui WA ke 0882-1289-9392 untuk proses daftar ulang.
                            </div>
                        <?php elseif ($row['status'] == "Ditolak"): ?>
                            <div class="alert alert-danger p-3 text-start mb-4 border-0" style="border-radius: 8px; font-size: 13.5px;">
                                <b><i class="fas fa-exclamation-triangle"></i> Mohon Maaf,</b> berkas pendaftaran Anda tidak lolos verifikasi panitia. Hubungi panitia untuk info selengkapnya.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning p-3 text-start mb-4 border-0" style="border-radius: 8px; font-size: 13.5px;">
                                <b><i class="fas fa-info-circle"></i> Catatan:</b> Panitia sedang memeriksa kesesuaian berkas (Akta, KK, KTP). Pastikan HP orang tua aktif agar mudah dihubungi.
                            </div>
                        <?php endif; ?>

                        <div class="no-print">
                            <button onclick="window.print();" class="btn btn-primary" style="border-radius: 50px; font-weight: 700; padding: 10px 24px; font-size: 13.5px;">
                                <i class="fas fa-print"></i> Cetak Kartu Bukti
                            </button>
                        </div>
                    </div>

                <?php } else { ?>
                    <!-- Fill form banner -->
                    <div class="card border-0 shadow-sm rounded-4 text-center p-5 mb-5" style="background-color: var(--white);">
                        <div class="icon-box" style="width: 70px; height: 70px; font-size: 32px; background: rgba(245, 158, 11, 0.1); color: var(--warning);">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h4 class="mt-3" style="color: var(--primary-dark); font-weight: 800;">Formulir PPDB Belum Diisi</h4>
                        <p class="text-muted mx-auto mb-4" style="max-width: 500px;">
                            Anda sudah terdaftar di sistem kami, namun belum melengkapi data pendaftaran siswa. Silakan klik tombol di bawah untuk melengkapi berkas calon siswa sekarang.
                        </p>
                        <a href="../ppdb.php" class="btn btn-success py-3 px-5" style="border-radius: 50px; font-weight: 700; display: inline-block; font-family: 'Outfit', sans-serif;">
                            <i class="fas fa-file-signature"></i> Isi Formulir PPDB Sekarang
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>