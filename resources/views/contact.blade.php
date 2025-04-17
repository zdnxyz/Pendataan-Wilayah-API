<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Hubungi Kami</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background-color: #ffffff;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: left;
            position: relative;
        }
        .contact-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        .contact-container h4 {
            font-weight: 500;
            margin-bottom: 20px;
        }
        .contact-container p {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
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
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #333333;
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="{{ url('/') }}" class="back-button"><i class="fa fa-arrow-left"></i> Kembali</a>

    <div class="contact-container">
        <h4>Hubungi Kami</h4>
        <p>Kami siap membantu Anda mendapatkan informasi lebih lanjut mengenai layanan kami. Jangan ragu untuk
            menghubungi kami melalui kontak di bawah ini:</p>
        <p><strong>Alamat Kantor:</strong> Jl. Raya Soreang No.123, Kabupaten Bandung, Jawa Barat, 40911</p>
        <p><strong>Telepon:</strong> (+62) 812-3456-7890 / (+62) 812-3456-7890</p>
        <p><strong>Email:</strong> info@pwkb-bandung.id</p>
        <p><strong>Jam Operasional:</strong> Senin - Jumat | 08.00 - 17.00 WIB</p>
    </div>
</body>
</html>