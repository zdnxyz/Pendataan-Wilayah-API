<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Informasi Pendaftaran</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            background-color: #a9715a;
            color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Agar tombol dapat diposisikan relatif terhadap body */
        }
        .container {
            width: 60%;
            line-height: 1.8;
        }
        .section {
            text-align: left;  /* Mengatur teks agar dimulai dari kiri */
            margin-bottom: 50px;
        }
        .section p:first-child {
            font-weight: 500;
            margin-bottom: 20px;
        }
        .section p {
            margin: 0;
            font-size: 16px;
        }
        .section:last-child {
            margin-top: 80px;
        }

        /* Tombol Kembali */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #000000;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Hilangkan garis bawah pada link */
        }

        /* Tombol Hover */
        .back-button:hover {
            background-color: #000000;
        }

        .All {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="{{ url('/') }}" class="back-button"><i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali</a>

    <div class="container">
        <div class="section">
            <p>Informasi pendaftaran untuk pengelola UMKM :</p>
            <p>Kami dapat membantu pendaftaran anda sebagai pengelola UMKM,</p>
            <p>untuk mendaftar sebagai pengusaha umkm anda bisa menyiapkan beberapa data seperti :</p>
            <p>Nomor Induk Perusahaan (NIB), Dokumen akta Pendirian, Surat Keterangan Domisili Perusahaan (SKDP),
             Dokumen Pajak (NPWP Usaha), Surat Izin Usaha Perdagangan (SIUP), Tanda Daftar Perusahaan (TDP).</p>
            <br>
            <p>Nantinya data - data tersebut akan di periksa oleh admin kami untuk memastikan data tersebut benar milik anda,
                 setelah disetujui, anda akan dibuatkan akun untuk masuk ke halaman dasbor umkm, disana anda bisa memasukkan kembali data legalitas usaha tersebut untuk melengkapi profil
                dan mengelola dasbor umkm anda.</p>
        </div>
        <div class="section">
            <p>Anda bisa menghubungi nomor dibawah ini untuk informasi mengenai pendaftaran lebih lanjut :</p>
            <p style="font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                <strong>Telepon:</strong> (+62) 812-3456-7890
                <br> 
                <strong>WhatsApp:</strong> (+62) 812-3456-7890
                <br>
                <strong>Telegram</strong> 
            </p>
        </div>
      <footer class="footer pt-3">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        <p>© Pendataan Umkm Kab. Bandung
                            <script>
                                document.write(new Date().getFullYear());
                            </script>.
                            <b class="All">All rights reserved.</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>
