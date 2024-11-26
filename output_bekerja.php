<?php
include('config.php');
session_start();
$noIc = $_SESSION['noIc'];

$query = mysqli_query($connect, "SELECT bekerja.*, user.* FROM bekerja
                                  JOIN user ON bekerja.noIc = user.noIc
                                  WHERE bekerja.noIc = '$noIc'");

$fetch = mysqli_fetch_array($query);

if ($fetch) {
} else {
    echo "Tiada data ditemui.";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Alumni</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet"  href="style.css">
        <style type="text/css">
        #profileDisplay { display: block; height: 180px; width: 50%; margin: 0px auto; border-radius: 50%; }
        .img-placeholder {
            width: 50%;
            color: white;
            height: 100%;
            background: black;
            opacity: .7;
            height: 180px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: none;
            border: 1px solid black;
        }
        </style>

    </head>
    
    <body class="bgmp">

        <div class="tbmp">
        <form method="post" enctype="multipart/form-data">
            <table cellspacing = "0" cellpadding="5">

                <tr>
                    <td class="pfpmp">
                    <div class="form-group text-center" style="position: relative; margin-top: 30px" >
                            <span class="img-div">
                            <div class="text-center img-placeholder">
                            </div>
                            <img src="<?php echo isset($fetch["pfp"]) ? 'profile/'.$fetch["pfp"] : 'pic/defaultpfp.png'; ?>" id="profileDisplay">
                            </span>
                        </div>
                        
                    </td>
                    <td class="welcomemp">
                        <h1>Selamat Datang <?php echo isset($fetch["nama"]) ? $fetch["nama"] : ''; ?> ! </h1>
                    </td>
                    <td class=logout>
                        <button class="logoutbtn"><b><a href="logout.php" style="color: black;  text-decoration: none;">LOG OUT</a></b></button>
                    </td>
                </tr>

            <table width="100%">
                <tr>
                    <td class="titlemp">
                        <h1 style="margin-left: 25px"><u>Maklumat Anda</u></h1>
                    </td>
                </tr>

            <table width = "100%">
            <form method="post" >

                <tr>
                    <td>
                      <b><label for ="nama" class="inputtext">Nama : </label></b>
                    </td>
                    <td class="text">
                    <?php echo isset($fetch["nama"]) ? $fetch["nama"] :''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="noIc" class="inputtext">No Kad Pengenalan : </label></b>
                    </td>
                    <td class="text">
                    <?php echo isset($fetch["noIc"]) ? $fetch["noIc"] : ''; ?>
                    </td>
                </tr>


                <tr>
                    <td>
                      <b><label for ="jantina" class="inputtext">Jantina: </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["jantina"]) ? $fetch["jantina"] : ''; ?>
                        
                    </td>
                </tr>


                <tr>
                    <td>
                      <b><label for ="kursus"  class="inputtext" >Kursus : </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["kursus"]) ? $fetch["kursus"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kohort" class="inputtext">Kohort (Tahun Kemasukan) : </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["kohort"]) ? $fetch["kohort"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kerja" class="inputtext">Pekerjaan Semasa (Jawatan) : </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["kerja"]) ? $fetch["kerja"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kerja" class="inputtext">Gaji : </label></b>
                    </td>
                    <td class = "text">
                    RM <?php echo isset($fetch["gaji"]) ? $fetch["gaji"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="notel" class="inputtext">No Telefon : </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["notel"]) ? $fetch["notel"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatkerja" class="inputtext" >Alamat Kerja :  </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["alamatkerja"]) ? $fetch["alamatkerja"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatrumah" class="inputtext">Alamat Rumah :  </label></b>
                    </td>
                    <td class = "text">
                    <?php echo isset($fetch["alamatrumah"]) ? $fetch["alamatrumah"] : ''; ?>
                        
                    </td>
                </tr>

                <table style="width: 100%;">
                <tr>
                <td colspan="8" style="text-align: center; width: 80%">
        <button class="buttonmp"><b><a style="text-decoration: none; color: black;" href="editbekerja.php">EDIT</a></b></button>
    
    <button class="print-btn" onclick="printPage()" style="color: black;"><b>PRINT</b></button>
    </td>
                     
                </tr>
    </table>
            
            </form>
            </table>
           </table> </table>
    </div>
    <script type="text/javascript">
    // ... Your existing JavaScript code ...

    function printPage() {
        window.print();
    }
</script></body>

</html>