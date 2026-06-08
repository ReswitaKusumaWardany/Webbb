
<?php
session_start();
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPAT Yenie Damayanti S.H., M.Kn</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            PPAT Yenie Damayanti S.H., M.Kn
        </div>

        <ul class="menu">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#pengembang">Pengembang</a></li>
            <li><a href="pilih_login.php">Login</a></li>
        </ul>
    </nav>

    <!-- Hero -->
    <section class="hero" id="beranda">

        <div class="hero-content">

            <img src="img/lambangls.png" class="logo-lampung" alt="Logo">

            <h1>Sistem Informasi Pengajuan Akta PPAT</h1>

            <p>
                Memudahkan masyarakat dalam mengajukan dokumen,
                memantau proses pengajuan, dan memperoleh layanan
                akta tanah secara cepat, aman, dan transparan.
            </p>

            <a href="pilih_login.php" class="btn">
                Mulai Pengajuan
            </a>

        </div>

    </section>

    <!-- Statistik -->
    <section class="section">

    <h2>Keunggulan Sistem</h2>

    <div class="keunggulan">

        <div class="unggul-box">
            <h3>🔒 Aman</h3>
            <p>Data dokumen tersimpan dengan aman dalam sistem.</p>
        </div>

        <div class="unggul-box">
            <h3>⚡ Cepat</h3>
            <p>Proses pengajuan dapat dilakukan tanpa datang ke kantor.</p>
        </div>

        <div class="unggul-box">
            <h3>📱 Mudah Diakses</h3>
            <p>Dapat diakses kapan saja melalui perangkat yang terhubung internet.</p>
        </div>

    </div>

</section>

    </section>

    <!-- Tentang -->
    <section id="tentang" class="section">

        <h2>Tentang Kami</h2>

        <p>
            Kantor PPAT Yenie Damayanti, S.H., M.Kn merupakan
            penyedia layanan pembuatan dan pengurusan akta tanah
            yang profesional, terpercaya, dan berorientasi pada
            kemudahan pelayanan masyarakat melalui sistem digital.
        </p>

    </section>

    <!-- Layanan -->
    <section id="layanan" class="section layanan">

        <h2>Layanan Kami</h2>

        <div class="card-container">

            <div class="card">
                <div class="icon">📄</div>
                <h3>Upload Dokumen</h3>
                <p>
                    Upload KTP, KK, dan Sertifikat Tanah secara online.
                </p>
            </div>

            <div class="card">
                <div class="icon">🏠</div>
                <h3>Pengajuan Akta</h3>
                <p>
                    Mengajukan pembuatan akta tanah dengan mudah dan cepat.
                </p>
            </div>

            <div class="card">
                <div class="icon">📊</div>
                <h3>Monitoring Status</h3>
                <p>
                    Pantau perkembangan pengajuan secara real-time.
                </p>
            </div>

        </div>

    </section>

    <!-- Pengembang -->
    <section id="pengembang" class="section">

        <h2>Tim Pengembang</h2>

        <img src="img/fotobersama.jpeg" class="foto-dev" alt="Tim Pengembang">

        <h3>Arsita Ayu Irmayanti</h3>
        <h3>Kurnia Usman</h3>
        <h3>Reswita Kusuma Wardany</h3>

        <p>
            Mahasiswa Program Studi Sistem Informasi
            UIN Raden Intan Lampung
        </p>

    </section>

    <!-- Footer -->
    <footer>
        <p>
            © 2026 Sistem Informasi Pengajuan Akta PPAT |
            PPAT Yenie Damayanti S.H., M.Kn
        </p>
    </footer>

</body>
</html>

