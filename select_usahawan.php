<?php
include('config.php');
session_start();
$noIc = $_SESSION['noIc'];

$query2 = mysqli_query($connect, "SELECT * FROM user WHERE noIc = '$noIc'");
$fetch = mysqli_fetch_array($query2);
$queryCheck = mysqli_query($connect, "SELECT * FROM usahawan WHERE noIc = '$noIc'");
$hasData = mysqli_num_rows($queryCheck) > 0;

if ($hasData) {
    header('Location: output_usahawan.php'); //edit file
    exit(); 
}

if (isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $noIc = $_POST["noIc"]; 
    $jantina = $_POST["jantina"];
    $kursus = $_POST["kursus"];
    $kohort = $_POST["kohort"];
    $gaji = $_POST["gaji"];
    $notel = $_POST["notel"];
    $alamatkerja = $_POST["alamatkerja"];
    $alamatrumah = $_POST["alamatrumah"];

    $target_dir = "profile/";
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    $target_file = $target_dir . basename($profileImageName);

    if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

        $sql = "INSERT INTO usahawan (pfp, nama, noIc, jantina, kursus, kohort,  gaji, notel, alamatkerja, alamatrumah) 
                VALUES ('$profileImageName', '$nama', '$noIc', '$jantina','$kursus', '$kohort', '$gaji', '$notel', '$alamatkerja', '$alamatrumah')";

        if (mysqli_query($connect, $sql)) {
            header('Location: usahawanoutput.php');
        } else {
            echo "ERROR: " . mysqli_error($connect);
        }

    }else{
        echo "Error!";
    }
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
        }
        .img-placeholder h4 {
            margin-top: 40%;
            color: white;
        }
        .img-div:hover .img-placeholder {
            display: block;
            cursor: pointer;
        }
        .buttonmp {
    font-family: Quicksand, sans-serif; 
    background : lightgreen;
    color: black;
    border: none;
    border-radius: 10px;
    padding: 10px 10px;
    text-align: center;
    margin-right: 85%;
    width: 8%;

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
                            <div class="text-center img-placeholder"  onClick="triggerClick()">
                                <h4 class="font" style="text-align: center; color: white;">Tambah Gambar Profile</h4>
                            </div>
                            <img src="pic/defaultpfp.png" onClick="triggerClick()" id="profileDisplay">
                            </span>
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required>
                        </div>
                    </td>
                    <td class="welcomemp">
                        <h1>Selamat Datang Alumni ! </h1>
                    </td>
                    <td class=logout>
                    <button class="logoutbtn"><b><a href="logout.php" style="color: black;  text-decoration: none;">LOG OUT</a></b></button>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td class="titlempwan">
                        <h1><u>Maklumat Anda</u></h1>
                    </td>
                </tr>
            </table>

            <table width = "100%">

                <tr>
                    <td>
                      <b><label for ="nama" class="inputtext">Nama : </label></b>
                    </td>
                    <td>
                        <input type="text" id="nama" name="nama" class="inputnama" required>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="noIc" class="inputtext">Nombor Kad Pengenalan : </label></b>
                    </td>
                    <td class="text">
                    <?php echo $fetch["noIc"]; ?>
                  <input type="hidden" name="noIc" value="<?php echo $fetch["noIc"]; ?>">
                    </td>
                </tr>



                <tr>
                    <td>
                      <b><label for ="jantina" class="inputtext">Jantina: </label></b>
                    </td>
                    <td>
                        <input class="radio" type="radio" id="lelaki" name="jantina" value="Lelaki" class="inputjantina">
                        <label for="lelaki" class="font">Lelaki</label>
                        <input type="radio" id="perempuan" name="jantina" value="Perempuan" class="inputjantina">
                        <label for="perempuan" class="font">Perempuan</label>
                        
                    </td>
                </tr>


                <tr>
                    <td>
                      <b><label for ="kursus"  class="inputtext" >Kursus : </label></b>
                    </td>
                    <td>
                    <select id ="kursus" name = "kursus" class="inputkursus"> 

                        <option selected disabled>Sila pilih kursus anda.</option>
                        <option disabled > - Kolej Vokasional Kuala Selangor -</option>
                        <option name="kpd">Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)</option>
                        <option name="kmk">Teknologi Animasi 3D (KMK)</option>
                        <option name="bpm">Pemasaran (BPM)</option>
                        <option name="bak">Perakaunan (BAK)</option>
                        <option name="bpk">Perbankan</option>
                        <option name="hbp">Bakeri dan Pastri (HBP)</option>
                        <option name="hsk">Seni Kulinari (HSK)</option>
                        <option name="opp">SLDN Perabot (OPP)</option>
                        <option disabled > - Sekolah Menengah Teknik Kuala Selangor -</option>
                        <option name="5ss">5 Super Skor</option>
                        <option name="5a1">5 Awam 1</option>
                        <option name="5a2">5 Awam 2</option>
                        <option name="5a3">5 Awam 3</option>
                        <option name="5e1">5 Eletrikal 1</option>
                        <option name="5e2">5 Eletrikal 2</option>
                        <option name="5e3">5 Eletrikal 3</option>
                        <option name="5m1">5 Mekanikal 1</option>
                        <option name="5m2">5 Mekanikal 2</option>
                        <option name="5m3">5 Mekanikal 3</option>
                        <option name="ppm">Penyediaan Dan Pembuatan Makanan</option><!-- tambah option kursus -->

                    </select>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kohort" class="inputtext">Kohort (Tahun Kemasukan) : </label></b>
                    </td>
                    <td>
                        <input type="int" id="kohort" name="kohort" class="inputkohort" required>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="kerja" class="inputtext">Gaji : </label></b>
                    </td>
                    <td>
                       RM <input type="int" id="gaji" name="gaji" class="inputgaji" required>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="notel" class="inputtext">No Telefon : </label></b>
                    </td>
                    <td>
                        <input type="text" id="notel" name="notel" class="inputnotel" required>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatkerja" class="inputtext" >Alamat Kerja :  </label></b>
                    </td>
                    <td>
                        <textarea type="text" id="alamatkerja" name="alamatkerja" class="inputalamatkerja" required>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                      <b><label for ="alamatrumah" class="inputtext">Alamat Rumah :  </label></b>
                    </td>
                    <td>
                        <textarea type="text" id="alamatrumah" name="alamatrumah"  class="inputalamatrumah" required>
                        </textarea>
                    </td>
                </tr>
                <table style="width: 100%;">
                <tr>
                <td colspan="8" style="text-align: center;">
        <button class="buttonusave" name="submit" type="submit" style="color: black;"><b>SAVE</b></button>
    </td>
                     
                </tr>
    </table>
            </table>
           </form>
    </div>

    <script type="text/javascript">
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>

</body>
</html>