<footer class="main-footer">
    <div class="container footer-grid">
        <div class="footer-col footer-about">
            <h4>SD ISLAM AL ISTIQOMAH</h4>
            <p>Membentuk generasi Qur'ani yang cerdas, religius, berakhlak mulia, serta unggul dalam prestasi akademik dan non-akademik berbasis nilai-nilai Islam.</p>
            <div class="social-icons">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        
        <div class="footer-col footer-links">
            <h4>Tautan Pintas</h4>
            <ul>
                <li><a href="index.php"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                <li><a href="profil.php"><i class="fas fa-chevron-right"></i> Profil Sekolah</a></li>
                <li><a href="akademik.php"><i class="fas fa-chevron-right"></i> Informasi Akademik</a></li>
                <li><a href="galeri.php"><i class="fas fa-chevron-right"></i> Galeri Kegiatan</a></li>
                <li><a href="kontak.php"><i class="fas fa-chevron-right"></i> Kontak Kami</a></li>
                <li><a href="ppdb.php"><i class="fas fa-chevron-right"></i> PPDB Online</a></li>
            </ul>
        </div>
        
        <div class="footer-col footer-contact">
            <h4>Hubungi Kami</h4>
            <p><i class="fas fa-map-marker-alt"></i> Jl. Nangka Raya No. 30 Perumnas II Parung Panjang, Bogor, Jawa Barat</p>
            <p><i class="fas fa-phone-alt"></i> 0882-1289-9392</p>
            <p><i class="fas fa-envelope"></i> istiqomahsdial@gmail.com</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container footer-bottom-flex">
            <p>&copy; 2026 SD Islam Al Istiqomah. Hak Cipta Dilindungi.</p>
            <div class="footer-meta">
                <a href="admin/login.php"><i class="fas fa-lock"></i> Portal Admin</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap Bundle JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Mobile Navigation Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }
});
</script>

</body>
</html>