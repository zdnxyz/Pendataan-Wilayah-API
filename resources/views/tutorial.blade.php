<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tutorial</title>

    <style>
      body {
          font-family: 'Poppins', sans-serif;
          overflow: hidden;
      }

      .carousel-indicators {
          display: none;
      }
      .carousel-item {
          height: 690px; 
          overflow: hidden;
      }

      .carousel-item img {
          height: 100%;
          width: 100%;
          object-fit: cover; 
          object-position: center; 
      }

      .carousel-caption {
          color: #000000; 
          text-shadow: 2px 2px 5px #ffffff; 
          background-color: rgba(255, 255, 255, 0.6); 
          padding: 10px; 
          border-radius: 5px; 
	  }


      .back-button {
          position: absolute;
          top: 10px;
          left: 10px;
          z-index: 1050; 
      }
    </style>
  </head>
  <body>

    <!-- Back Button -->
    <button onclick="window.history.back()" class="btn btn-light back-button"><i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali</button>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.ibb.co.com/qdSRwT7/Screenshot-105.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tutorial 1</h5>
              <p>Buka browser di perangkat Anda. Ketik alamat Website https://investasi.appon.id/umkm atau /investor jika anda adalah seorang investor di kolom URL, kemudian tekan Enter.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.ibb.co.com/YjnVN1q/Screenshot-106.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tutorial 2</h5>
              <p>Anda akan di arahkan ke halaman login seperti berikut. Masukkan alamat email dan kata sandi yang telah di daftarkan, jika belum memiliki akun anda dapat menghubungi admin untuk mendaftarkan anda sebagai investor atau umkm.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.ibb.co.com/x8vD66D/Screenshot-107.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tampilan dashboard umkm</h5>
              <p>Jika sudah berhasil login anda akan masuk ke halaman Dashboard berikut. Ini adalah tampilan dashboard umkm. Pada dashboard ini anda dapat melihat informasi seperti dokumen legalitas, keuntungang/kerugian, jumlah karyawan dan lainnya.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.ibb.co.com/vL5JBJ5/Screenshot-110.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tampilan dashboard investor</h5>
              <p>Ini adalah tampilan dashboard investor. Pada dashboard ini anda dapat melihat informasi peta lokasi umkm dan jadwal meeting untuk bertemu dengan pengelola umkm tersebut.</p>
            </div>
          </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <footer class="footer pt-3">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        <p>© Pendataan Web Kab. Bandung
                            <script>
                                document.write(new Date().getFullYear());
                            </script>.
                            <b>All rights reserved.</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
