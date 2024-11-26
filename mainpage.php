<?php
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Alumni</title>
    <style>
    *{
      font-size: 22px;
    }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bglogin">
    <div class="hero-container">
        <div class="logo-container">
            <h1>Sistem Jejak Alumni</h1>
            <p>Dengan kejayaan anda yang dikenangi, semoga memberi inspirasi kepada generasi akan datang</p>
        </div>
    </div>
    
    <div class="marquee-container">
        <marquee behavior="scroll" scrollamount="10" >Halaman ini telah dikunjungi oleh 36 orang pengunjung</marquee>
        <!-- <marquee behavior="scroll" scrollamount="10">Kolej Vokasional dan Sekolah Menengah Teknik telah melahirkan ramai generasi yang berjaya</marquee> -->
    </div>

    <table class="menu">
        <tr>
            <td onclick="window.location='./login.php'" style="cursor: pointer;">
                <div class="menu-option onleft">
                    <p>REKODKAN MAKLUMAT ALUMNI ANDA</p>
                </div>
            </td>

            <td onclick="window.location='./admin/adminstats.php'" style="cursor: pointer;">
                <div class="menu-option onright">
                    <p>LIHAT STATISTIK KEMENJADIAN ALUMNI</p>
                </div>
            </td>
        </tr>
    </table>

</body>

</html>
