<?php
session_start();
$noIc = $_SESSION['noIc'];
include('config.php');



if (isset($_GET['noIc'])) {
    $noIcFromURL = $_GET['noIc'];

   
    

    // Use 'noIcFromURL' to fetch the specific profile data from the database
    $query = "SELECT sambungbelajar.*, user.*
              FROM sambungbelajar
              JOIN user ON sambungbelajar.noIc = user.noIc
              WHERE sambungbelajar.noIc = '$noIcFromURL'";
   

    $result = mysqli_query($connect, $query);

    // Fetch the data from the result
    $fetch = mysqli_fetch_array($result);

    // Check if data is found
    if ($fetch) {
        // Your existing code to display the detailed profile information
        // ... (the rest of your existing code)
    } else {
        echo "Error fetching data: " . mysqli_error($connect);
    }
} else {
    echo "Invalid request. No 'noIc' provided.";
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
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
        body {
            background-image: url(pic/bg3.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100%;
        }
        .out{
  font-family: 'Quicksand', sans-serif;
  font-size: 130%;
  width: 55%;
  padding: 5px;
}
.buttonbelajar {
    font-family: Quicksand, sans-serif; 
    background : linear-gradient(to right, #ccff66, #33cccc);
    border: none;
    border-radius: 10px;
    padding: 10px 10px;
    text-align: center;
    margin-left: 1030px;
    width: 8%;

}
        </style>

    </head>
    
    <body>

        <div class="tbmp">
        <form method="post" enctype="multipart/form-data">
            <table cellspacing = "0" cellpadding="5">

                <tr>
                    <td class="pfpmp">
                    <div class="form-group text-center" style="position: relative; margin-top: 30px" >
                            <span class="img-div">
                            <div class="text-center img-placeholder">
                            </div>
                            <img src="<?php echo isset($fetch["pfp"]) ? '../profile/'.$fetch["pfp"] : 'pic/defaultpfp.png'; ?>" id="profileDisplay">
                            </span>
                        </div>
                        
                    </td>
                    <td class="welcomemp">
                        <h1>Selamat Datang <a href="bekerjaoutput.php"><?php echo isset($fetch["nama"]) ? $fetch["nama"] : ''; ?></a> ! </h1>
                    </td>
                    <td class=logout>
                    <button class="logoutbtn"><b><a href="searchkursus.php" style="color: black;  text-decoration: none;">BACK</a></b></button>
                    </td>
                </tr>

            <table width="100%">
                <tr>
                    <td class="titlemp">
                        <h1 style="margin-left: 140px"><u>Maklumat Anda</u></h1>
                    </td>
                </tr>

            <table width = "100%">
            <form method="post" >

                <tr>
                    <td>
                      <b><label for ="nama" class="inputtext">Nama : </label>
                    </td>
                    <td class="out">
                    <?php echo isset($fetch["nama"]) ? $fetch["nama"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="noIc" class="inputtext">No Kad Pengenalan : </label>
                    </td>
                    <td class="out">
                    <?php echo isset($fetch["noIc"]) ? $fetch["noIc"] : ''; ?>
                    </td>
                </tr>


                <tr>
                    <td>
                      <b><label for ="jantina" class="inputtext">Jantina: </label>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["jantina"]) ? $fetch["jantina"] : ''; ?>
                        
                    </td>
                </tr>


                <tr>
                    <td>
                      <b><label for ="kursus"  class="inputtext" >Kursus : </label>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["kursus"]) ? $fetch["kursus"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kohort" class="inputtext">Kohort (Tahun Kemasukan) : </label></b>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["kohort"]) ? $fetch["kohort"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kursussemasa" class="inputtext">Kursus Universiti / Kolej : </label></b>
                    </td>
                    <td class="out">
                    <?php echo isset($fetch["kursussemasa"]) ? $fetch["kursussemasa"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="tahunmasuk" class="inputtext">Tahun Kemasukkan Universiti / Kolej : </label></b>
                    </td>
                    <td class="out">
                    <?php echo isset($fetch["tahunmasuk"]) ? $fetch["tahunmasuk"] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <b><label for ="tahuntamat" class="inputtext">Tahun Tamat Universiti / Kolej : </label></b>
                    </td>
                    <td class="out">
                    <?php echo isset($fetch["tahuntamat"]) ? $fetch["tahuntamat"] : ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="notel" class="inputtext">No Telefon : </label></b>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["notel"]) ? $fetch["notel"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatkerja" class="inputtext" >Alamat Kerja :  </label></b>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["alamatkerja"]) ? $fetch["alamatkerja"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatrumah" class="inputtext">Alamat Rumah :  </label></b>
                    </td>
                    <td class = "out">
                    <?php echo isset($fetch["alamatrumah"]) ? $fetch["alamatrumah"] : ''; ?>
                        
                    </td>
                </tr>

                <tr>
                    
                    <td colspan="8">
                    <button class="buttonbelajar"><b><a style="text-decoration: none; color: black;" href="editsambungbelajar.php?noIc=<?php echo $fetch['noIc']; ?>">EDIT</a></b></button>
                     </td>
                </tr>
                <tr>
                    <tr></tr>
                </tr>

            
            </form>
            </table>
           </table> </table>
    </div></body>

</html>