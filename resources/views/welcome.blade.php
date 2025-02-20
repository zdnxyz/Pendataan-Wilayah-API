<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Pendataan UMKM Kabupaten Bandung - PUKB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {

            height: 100vh;
            background: #121212;
            color: white;
            transition: 0.3s;
        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            height: 100vh;
            background: #121212;
            color: white;
            position: fixed;
            left: -300px;
            top: 0;
            transition: 0.3s ease-in-out;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            padding-left: 30px;
            z-index: 2;
            /* Ensure the sidebar is above other content */
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: 600;
            padding: 13px 0;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        .sidebar a:before {
            font-size: 14px;
            margin-right: 1px;
            padding-bottom: 15px;
            color: #a9715a;
            width: 24px;
            /* width of the number container */
            text-align: center;
            /* center-align the numbers */
        }

        .sidebar a:nth-child(2):before {
            content: '✿';
        }

        .sidebar a:nth-child(3):before {
            content: '✿';
        }

        .sidebar a:nth-child(4):before {
            content: '✿';
        }

        .sidebar a:nth-child(5):before {
            content: '✿';
        }

        .sidebar a:hover {
            color: #a9715a;
        }


        .sidebar-footer {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 80%;
        text-align: center;
        font-size: 12px;
        color: white;
}

        .sidebar-footer p {
            margin-bottom: 8px;
            opacity: 0.8;
            font-weight: 600;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* Menyesuaikan jarak antar elemen */
        }

        .footer-links a {
            text-decoration: none;
            color: #a9715a;
            font-size: 12px;
            font-weight: 600;
        }

        .footer-links span {
            color: white;
            font-size: 12px;
            opacity: 0.8;
        }

        /* Menghapus ikon ✿ dari link di footer */
        .sidebar-footer a:before {
            content: none !important;
        }


        /* Tombol Toggle */
        .toggle-btn {
            font-size: 24px;
            background: #121212;
            color: white;
            width: 50px;
            height: 50px;
            border: none;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            border-radius: 50%;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 3;
            /* Ensure the toggle button is above the sidebar */
        }

        .toggle-btn:hover {
            background: #a9715a;
        }

        .open .toggle-btn {
            display: none;
            /* Hide toggle button when sidebar is open */
        }

        /* Tombol Tutup */
        .close-btn {
            font-size: 24px;
            background: #121212;
            color: white;
            width: 50px;
            height: 50px;

            border: none;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .close-btn:hover {
            background: #a9715a;
        }

        /* Animasi Saat Dibuka */
        .open .sidebar {
            left: 0;
        }

        .hubungi {
            margin-top: 30px;
            align-items: center;
            margin-left: 64px;
        }

        /* Welcome Section */
        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            text-align: left;
            padding: 0 90px;
            background: url('https://i.ibb.co.com/DDjH9Tmq/background.png') no-repeat center center/cover;
            width: 100%;
            background-size: cover;
            position: relative;
            z-index: 1;
        }


        .welcome .welcome-line {
            font-size: 40px;
            margin-bottom: 10px;
            font-weight: 600;
            line-height: 1.3;
            color: #ffffff;
        }

        .lihat-selengkapnya-btn {
            background-color: #a9715a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .lihat-selengkapnya-btn:hover {
            background-color: #a9715a;
        }

        .container-fluid {
            background-color: #171719 !important;
        }

        .container-fluid {
            padding-left: 50px;
            padding-right: 50px;
        }

        .footer {
    background: #a9715a;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #a9715a;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    width: 100%;
    align-items: center;
}

.footer p {
    margin: 0;
    color: #ffffff;
    font-size: 14px;
}

.footer strong {
    font-weight: bold;
}

.social-icons a {
    margin-left: 10px;
    font-size: 16px;
    color: #ffffff;
    text-decoration: none;
}

.social-icons a:hover {
    color: #171719;
}


    </style>
</head>

<body>
    <!-- Navbar -->
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">✖</button>
        <a href="#">Beranda</a>
        <a href="{{ url('/about') }}">Tentang</a>
        <a href="{{ url('/info') }}">Informasi</a>
        <a href="{{ Auth::check() ? 
        (Auth::user()->can('view_masterAdmin') ? url('/dashboard') :
        (Auth::user()->can('view_admin') ? url('/dashboard-admin') :
        (Auth::user()->can('view_umkm') ? url('/umkm') :
        (Auth::user()->can('view_investor') ? url('/investor') : url('/dashboard'))))) 
        : url('/login') }}">
        {{ Auth::check() ? 
        (Auth::user()->can('view_masterAdmin') ? 'Dasbor' :
        (Auth::user()->can('view_admin') ? 'Dasbor' :
        (Auth::user()->can('view_umkm') ? 'Dasbor' :
        (Auth::user()->can('view_investor') ? 'Dasbor' : 'Dasbor')))) 
        : 'Login' }}
    </a>
    <div class="sidebar-footer">
        <p>© 2024-2025 PUKB. All rights reserved</p>
        <div class="footer-links">
            <a href="{{ url('/') }}">Security</a>
            <span>|</span>
            <a href="{{ url('/') }}">Privacy & Cookie Policy</a>
            <span>|</span>
            <a href="{{ url('/') }}">Terms of Service</a>
        </div>
    </div>
    </div>
    <!-- Welcome Section -->
    <div class="welcome">
        <div class="welcome-line" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="400">
            Selamat Datang di Website</div>
        <div class="welcome-line" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="500">
            Pendataan UMKM Wilayah</div>
        <div class="welcome-line" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="600">
            Kabupaten Bandung</div>
        <div class="tagline2" data-aos="fade-right" data-aos-delay="800">
            Sistem pendataan UMKM dengan map interaktif
            <p>tekan untuk melihat selengkapnya</p>
        </div>
        <button class="lihat-selengkapnya-btn" onclick="window.location.href='#selengkapnya'">Lihat
            Selengkapnya</button>
    </div>
    {{-- Container1 --}}
    <div class="container-fluid text-center text-light" id="selengkapnya"
        style="height: 100vh; background-color: #171719;">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-start" style="max-width: 300px; margin: 0 auto; padding-top: 50px;">
                <h3 style="color: #a9715a; font-weight: 400; font-size: 20px; margin-bottom: 10px;">1.1</h3>
                <h4 style="font-weight: 500; margin-bottom: 20px;">Penggunaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengguna dapat melakukan pencarian dan informasi data UMKM dengan menggunakan maps interaktif,
                    pengguna internal dapat memantau perkembangan usaha anda melalui dashboard.
                </p>
            </div>
            <div class="col-lg-4 text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #a9715a; font-weight: 400; font-size: 20px; margin-bottom: 10px;">2.2</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengelolaan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Pengelolaan dilakukan dengan aman dan terstruktur, memastikan informasi legalitas dan
                    pendanaan selalu data asli.
                </p>
            </div>
            <div class="col-lg-4 text-start" style="max-width: 300px; margin: 0 auto;">
                <h3 style="color: #a9715a; font-weight: 400; font-size: 20px; margin-bottom: 10px;">3.3</h3>
                <h4 style="font-weight: 500; margin-bottom: 15px;">Pengembangan</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Kami terus mengembangkan fitur-fitur baru untuk mendukung UMKM dalam berekspansi, termasuk ke pasar
                    nasional.
                </p>
            </div>
        </div>
    </div>
    {{-- Container2 --}}
    <div class="container-fluid text-center bg-black text-light" style="height: 100vh; background-color: #171719;">
        <div class="row h-100 align-items-center">
            <div class="col-md-6 pe-5">
                <div id="carouselContainer5" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden; max-width: 90%; margin: auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>

                    <!-- Isi Carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/umkm1.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/umkm2.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/umkm3.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/umkm4.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/umkm5.png"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <p class="text-image">Gambar 1.0 Dasbor UMKM</p>
            </div>

            <div class="col-md-6 text-start pe-5">
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #a9715a;">1.0</span> Fitur Dasbor UMKM
                </h5>
                <p style="font-size: 0.9rem;">Ini adalah beberapa fitur dari web ini</p>
                <br>
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #a9715a;">2.0</span> Penjelasan Fitur Web
                </h5>
                <p style="font-size: 0.9rem; line-height: normal; text-align: left;">Pengguna dapat menginput pendataan
                    komoditi UMKM di daerah Kabupaten Bandung. Maps interaktif sebagai alat utama untuk menyajikan
                    informasi pendataan UMKM. Melalui peta ini, pihak terkait juga dilengkapi dengan informasi detail
                    mengenai jenis usaha, profil UMKM, dan lokasi UMKM</p>
            </div>
        </div>
    </div>
    {{-- Container3 --}}
    <div class="container-fluid text-center bg-black text-light"
        style="height: 100vh; background-color: #171719; background-size: cover; background-position: center;">
        <div class="row h-100 align-items-center">
            <!-- Bagian teks di kiri -->
            <div class="col-md-6 text-start ps-5">
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #a9715a;">1.0</span> Fitur Dasbor Investor
                </h5>
                <p style="font-size: 0.9rem;">Berikut adalah beberapa fitur dari web ini</p>
                <br>
                <h5 style="font-size: 1.5rem; font-weight: 500;">
                    <span style="color: #a9715a;">2.0</span> Penjelasan mengenai Fitur Web ini
                </h5>
                <p style="font-size: 0.9rem; line-height: normal;">
                    Pengguna dapat mencari informasi lokasi UMKM di wilayah Kabupaten Bandung dengan menggunakan maps
                    interaktif yang menyajikan informasi seperti profil usaha, profil UMKM, dan jenis usaha.
                </p>
            </div>

            <!-- Carousel di kanan -->
            <div class="col-md-6 pe-5">
                <div id="carouselContainer5" class="carousel slide" data-bs-ride="carousel"
                    style="border-radius: 5px; overflow: hidden; max-width: 90%; margin: auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselContainer5" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <!-- Isi Carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/slide1.jpeg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/slide2.png"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://localhost/Pendataan-Wilayah-API-master/public/welcome/slide3.png"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <!-- Kontrol Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselContainer5"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselContainer5"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
                <p class="text-image">Gambar 2.0 Dasbor Investor</p>
            </div>
        </div>
    </div>
    {{-- Container4 --}}
    <div class="container-fluid text-center text-light" id="selengkapnya"
        style="height: 100vh; background-color: #171719;">
        <div class="row align-items-center h-100">
            <div class="col-lg-8 text-start" style="max-width: 600px; margin: 0 auto; padding-top: 50px;">
                <h4 style="font-weight: 500; margin-bottom: 20px;">Hubungi Kami</h4>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    Kami siap membantu Anda mendapatkan informasi lebih lanjut mengenai layanan kami. Jangan ragu untuk
                    menghubungi kami melalui kontak di bawah ini:
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    <strong>Alamat Kantor:</strong> Jl. Raya Soreang No.123, Kabupaten Bandung, Jawa Barat, 40911
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    <strong>Telepon:</strong> (+62) 812-3456-7890 / (+62) 812-3456-7890
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    <strong>Email:</strong> info@pwkb-bandung.id
                </p>
                <p style="font-size: 14px; line-height: 1.6;">
                    <strong>Jam Operasional:</strong> Senin - Jumat | 08.00 - 17.00 WIB
                </p>
            </div>
        </div>
    </div>  
    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-content">
            <p>© 2024-2025 PUKB, <strong>All Rights Reserved</strong></p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
{{-- End Footer --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function toggleSidebar() {
            document.body.classList.toggle("open");
        }

        function scrollToContent() {
            // Scroll to the content section smoothly
            // You can replace '#content' with the id of the section you want to scroll to
            document.querySelector('.content').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function openFullscreen(imageElement) {
            if (imageElement.requestFullscreen) {
                imageElement.requestFullscreen();
            } else if (imageElement.mozRequestFullScreen) { // Firefox
                imageElement.mozRequestFullScreen();
            } else if (imageElement.webkitRequestFullscreen) { // Chrome, Safari dan Opera
                imageElement.webkitRequestFullscreen();
            } else if (imageElement.msRequestFullscreen) { // IE/Edge
                imageElement.msRequestFullscreen();
            }
        }

        function checkLoginStatus() {
            return localStorage.getItem("loggedIn") === "true";
        }

        function handleLogin() {
            if (!checkLoginStatus()) {
                // Simulasi login sukses
                localStorage.setItem("loggedIn", "true");
                window.location.href = "dashboard.html";
            } else {
                window.location.href = "dashboard.html";
            }
        }

        function updateButton() {
            const loginButton = document.getElementById("loginButton");
            if (checkLoginStatus()) {
                loginButton.textContent = "Masuk ke Dasbor";
            }
        }

        document.addEventListener("DOMContentLoaded", updateButton);

    </script>

</body>

</html>
