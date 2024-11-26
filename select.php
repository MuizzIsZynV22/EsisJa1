<?php
include('config.php');
session_start();
$noIc = $_SESSION['noIc'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Alumni</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet"  href="style.css">
    </head>
   <style type="text/css">
a{
    font-family: sans-serif;
    display: block;
    background-color: blue;
    width: 80%;
    /* padding: 10px 30px; */
    cursor: pointer;
    /* margin: auto; */
    border: 0;
    border-radius: 25px;
    outline: none;
    text-decoration: none;

}
a:hover {
    background-color: brown;
}
*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    font-size: 40px;
}
</style>
    <body class="bgselect">
        <table class="selectb">
            <tr>
                <td>
                    <h2 style="text-align: center; font-family: Quicksand, sans-serif; font-size: 25px">SILA PILIH STATUS PEKERJAAN ANDA</h2><br>
                </td>
            </tr>
            <tr>
                <td>
                    <center><a href="select_bekerja.php"><h1 class="h1">BEKERJA</h1></a></center><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <center><a href="select_sambungbelajar.php"><h1 class="h1">BELAJAR</h1></a></center><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <center><a href="select_usahawan.php"><h1 class="h1">USAHAWAN</h1></a></center><br><br>
                </td>
            </tr>
        </table>
    </body>
</html>