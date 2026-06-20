<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "
    SELECT * FROM pendaftaran
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pendaftar PPDB | SD Islam Al Istiqomah</title>
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
                <li>
                    <a href="dashboard.php"><i class="fas fa-chart-pie"></i> Ringkasan Statistik</a>
                </li>
                <li class="active">
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
                <h2>Kelola Calon Pendaftar</h2>
                <p class="text-muted mb-0">Verifikasi berkas persyaratan dan ubah status penerimaan calon siswa baru.</p>
            </div>
        </header>

        <!-- Search & Info Row -->
        <div class="row mb-4">
            <div class="col-md-6 mb-2 mb-md-0">
                <div class="input-group" style="box-shadow: var(--shadow-sm); border-radius: 8px; overflow: hidden;">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Cari berdasarkan nama, nomor, atau email..." style="padding: 10px; font-size: 14px;">
                </div>
            </div>
            <div class="col-md-6 text-md-end d-flex align-items-center justify-content-md-end">
                <span class="text-muted" style="font-size: 13.5px;">Jumlah data: <b class="text-dark" id="rowCount"><?php echo mysqli_num_rows($data); ?></b> pendaftar</span>
            </div>
        </div>

        <!-- Table Container -->
        <div class="data-table-container">
            <div class="table-responsive">
                <table class="data-table" id="pendaftarTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Info Registrasi</th>
                            <th>Data Calon Siswa</th>
                            <th>Kontak Orang Tua</th>
                            <th>Berkas (Klik Lihat)</th>
                            <th>Status</th>
                            <th class="text-center">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if(mysqli_num_rows($data) > 0):
                            while($d = mysqli_fetch_assoc($data)): 
                        ?>
                            <tr class="pendaftar-row">
                                <!-- No -->
                                <td><?php echo $no++; ?></td>
                                
                                <!-- Info Registrasi -->
                                <td>
                                    <span class="d-block fw-bold text-primary-dark" style="font-family: 'Outfit', sans-serif;"><?php echo htmlspecialchars($d['nomor_pendaftaran']); ?></span>
                                    <small class="text-muted" style="font-size: 11px;"><i class="far fa-calendar-alt"></i> <?php echo date('d-m-Y H:i', strtotime($d['created_at'])); ?></small>
                                </td>
                                
                                <!-- Data Calon Siswa -->
                                <td>
                                    <span class="d-block fw-bold text-dark" style="text-transform: capitalize;"><?php echo htmlspecialchars($d['nama']); ?></span>
                                    <span class="text-muted" style="font-size: 12px;"><?php echo htmlspecialchars($d['jenis_kelamin']); ?> • <?php echo htmlspecialchars($d['tempat_lahir']); ?>, <?php echo date('d/m/Y', strtotime($d['tanggal_lahir'])); ?></span>
                                    <?php if(!empty($d['asal_sekolah'])): ?>
                                        <small class="d-block text-muted text-truncate" style="max-width: 200px; font-size: 11px;" title="Asal Sekolah: <?php echo htmlspecialchars($d['asal_sekolah']); ?>"><i class="fas fa-school"></i> <?php echo htmlspecialchars($d['asal_sekolah']); ?></small>
                                    <?php endif; ?>
                                    <small class="d-block text-muted text-truncate" style="max-width: 200px; font-size: 11px;" title="<?php echo htmlspecialchars($d['alamat']); ?>"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($d['alamat']); ?></small>
                                </td>
                                
                                <!-- Kontak Orang Tua -->
                                <td>
                                    <span class="d-block text-dark" style="font-size: 13.5px;"><i class="far fa-user"></i> <?php echo htmlspecialchars($d['nama_ortu']); ?></span>
                                    <span class="d-block" style="font-size: 12px;"><i class="far fa-envelope"></i> <?php echo htmlspecialchars($d['email']); ?></span>
                                    <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $d['no_hp']); ?>" target="_blank" class="badge bg-success mt-1" style="font-size: 11px;"><i class="fab fa-whatsapp"></i> <?php echo htmlspecialchars($d['no_hp']); ?></a>
                                </td>
                                
                                <!-- Berkas -->
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <?php if(!empty($d['akta'])): ?>
                                            <a href="../<?php echo htmlspecialchars($d['akta']); ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 text-start" style="font-size: 11.5px;"><i class="far fa-file-pdf text-danger"></i> Akta Kelahiran</a>
                                        <?php endif; ?>
                                        <?php if(!empty($d['kk'])): ?>
                                            <a href="../<?php echo htmlspecialchars($d['kk']); ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 text-start" style="font-size: 11.5px;"><i class="far fa-file-pdf text-primary"></i> Kartu Keluarga</a>
                                        <?php endif; ?>
                                        <?php if(!empty($d['ktp'])): ?>
                                            <a href="../<?php echo htmlspecialchars($d['ktp']); ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 text-start" style="font-size: 11.5px;"><i class="far fa-image text-success"></i> KTP Orang Tua</a>
                                        <?php endif; ?>
                                        <?php if(!empty($d['ijazah'])): ?>
                                            <a href="../<?php echo htmlspecialchars($d['ijazah']); ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 text-start" style="font-size: 11.5px;"><i class="fas fa-graduation-cap text-warning"></i> Ijazah</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                
                                <!-- Status -->
                                <td>
                                    <?php
                                    if($d['status'] == "Diterima") {
                                        echo "<span class='badge-status diterima'><i class='fas fa-check-circle'></i> Diterima</span>";
                                    } elseif($d['status'] == "Ditolak") {
                                        echo "<span class='badge-status ditolak'><i class='fas fa-times-circle'></i> Ditolak</span>";
                                    } else {
                                        echo "<span class='badge-status menunggu'><i class='fas fa-clock'></i> Menunggu</span>";
                                    }
                                    ?>
                                </td>
                                
                                <!-- Aksi Verifikasi -->
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="terima.php?id=<?php echo $d['id']; ?>" class="btn-action accept" title="Terima Siswa" onclick="return confirm('Apakah Anda yakin ingin MENERIMA calon siswa ini?');">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="tolak.php?id=<?php echo $d['id']; ?>" class="btn-action reject" title="Tolak Siswa" onclick="return confirm('Apakah Anda yakin ingin MENOLAK calon siswa ini?');">
                                            <i class="fas fa-ban"></i>
                                        </a>
                                        <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn-action delete" title="Hapus Data & Berkas" onclick="return confirm('PERINGATAN! Menghapus data ini juga akan menghapus berkas fisik yang diupload. Lanjutkan?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">Belum ada calon pendaftar yang terdaftar di database.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- JavaScript Live Search -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('.pendaftar-row');
    const rowCountEl = document.getElementById('rowCount');

    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            const query = e.target.value.toLowerCase();
            let visibleCount = 0;

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (rowCountEl) {
                rowCountEl.textContent = visibleCount;
            }
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>