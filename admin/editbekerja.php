<?php
include('config.php');
session_start();
$noIc = $_SESSION['noIc'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noIc = $_POST["noIc"];
    $nama = $_POST["nama"];
    $jantina = $_POST["jantina"];
    $kursus = $_POST["kursus"];
    $kohort = $_POST["kohort"];
    $kerja = $_POST["kerja"];
    $gaji = $_POST["gaji"];
    $notel = $_POST["notel"];
    $alamatkerja = $_POST["alamatkerja"];
    $alamatrumah = $_POST["alamatrumah"];

    if (!empty($_FILES["profileImage"]["name"])) {
        $target_dir = "profile/";
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        $target_file = $target_dir . basename($profileImageName);

        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $updateQuery = "UPDATE bekerja SET
                pfp = '$profileImageName',
                nama = '$nama', 
                jantina = '$jantina',
                kursus = '$kursus',
                kohort = '$kohort',
                kerja = '$kerja',
                gaji = '$gaji',
                notel = '$notel',
                alamatkerja = '$alamatkerja',
                alamatrumah = '$alamatrumah'
                WHERE noIc = '$noIc'";
 if (mysqli_query($connect, $updateQuery)) {
    header('Location: searchkursus.php');
    exit();
} else {
    echo "Error: " . mysqli_error($connect);
}
} else {
echo "Error uploading file.";
}
    } else {
        $updateQuery = "UPDATE bekerja SET
            nama = '$nama',
            jantina = '$jantina',
            kursus = '$kursus',
            kohort = '$kohort',
            kerja = '$kerja',
            gaji = '$gaji',
            notel = '$notel',
            alamatkerja = '$alamatkerja',
            alamatrumah = '$alamatrumah'
            WHERE noIc = '$noIc'";

        if (mysqli_query($connect, $updateQuery)) {
            header('Location: searchkursus.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}

if (isset($_GET['noIc'])) {
    $noIcFromURL = $_GET['noIc'];
    // Use 'noIcFromURL' to fetch the specific profile data from the database
    $query = "SELECT * FROM bekerja WHERE noIc = '$noIcFromURL'";
    $result = mysqli_query($connect, $query);

    // Fetch the data from the result
    $fetch = mysqli_fetch_array($result);

    // Check if data is found
    if ($fetch) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistem Alumni</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        #profileDisplay {
            display: block;
            height: 180px;
            width: 50%;
            margin: 0px auto;
            border-radius: 50%;
        }

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
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td class="pfpmp">
                        <div class="form-group text-center" style="position: relative; margin-top: 30px">
                            <span class="img-div">
                                <div class="text-center img-placeholder" onClick="triggerClick()">
                                    <h4 style="text-align: center; color: white;">Tambah Gambar Profail</h4>
                                </div>
                                <img src="<?php echo isset($fetch["pfp"]) ? '../profile/'.$fetch["pfp"] : 'pic/defaultpfp.png'; ?>" onClick="triggerClick()" id="profileDisplay">
                            </span>
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                        </div>
                    </td>
                    <td class="welcomemp">
                        <h1>Selamat Datang <?php echo isset($fetch["nama"]) ? $fetch["nama"] : ''; ?> ! </h1>
                    </td>
                    <td class="logout">
                        <button class="logoutbtn"><a href="bekerjaoutput.php" style="color: black; text-decoration: none;">BACK</a></button>
                    </td>
                </tr>

                <table width="100%">
                    <tr>
                        <td class="titlemp">
                            <h1><u>Maklumat Anda</u></h1>
                        </td>
                    </tr>

                    <table width="90%">
                        <tr>
                            <td>
                                <label for="nama" class="inputtext">Nama : </label>
                            </td>
                            <td>
                                <input type="text" id="nama" name="nama" class="inputnama" value="<?php echo isset($fetch["nama"]) ? $fetch["nama"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="noIc" class="inputtext">No Kad Pengenalan : </label>
                            </td>
                            <td>
                                <input type="text" id="noIc" name="noIc" class="inputnotel" value="<?php echo isset($fetch["noIc"]) ? $fetch["noIc"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="jantina" class="inputtext">Jantina: </label>
                            </td>
                            <td>
                                <input type="radio" id="lelaki" name="jantina" value="Lelaki"<?php echo ($fetch['jantina'] == 'Lelaki') ? 'checked' : ''; ?> class="inputjantina">
                                <label for="lelaki" class="inputjantina">Lelaki</label>
                                <input type="radio" id="perempuan" name="jantina" value="Perempuan"<?php echo ($fetch['jantina'] == 'Perempuan') ? 'checked' : ''; ?> class="inputjantina">
                                <label for="perempuan" class="inputjantina">Perempuan</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="kursus" class="inputtext">Kursus : </label>
                            </td>
                            <td>
                                <select id="kursus" name="kursus" class="inputkursus" required>
                                    <option name="kpd" <?php echo ($fetch["kursus"] == 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)') ? 'selected' : ''; ?>>Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)</option>
                                    <option name="kmk" <?php echo ($fetch["kursus"] == 'Teknologi Animasi 3D (KMK)') ? 'selected' : ''; ?>>Teknologi Animasi 3D (KMK)</option>
                                    <option name="bpm" <?php echo ($fetch["kursus"] == 'Pemasaran (BPM)') ? 'selected' : ''; ?>>Pemasaran (BPM)</option>
                                    <option name="bak" <?php echo ($fetch["kursus"] == 'Perakaunan (BAK)') ? 'selected' : ''; ?>>Perakaunan (BAK)</option>
                                    <option name="bpk" <?php echo ($fetch["kursus"] == 'Perbankan') ? 'selected' : ''; ?>>Perbankan</option>
                                    <option name="hbp" <?php echo ($fetch["kursus"] == 'Bakeri dan Pastri (HBP)') ? 'selected' : ''; ?>>Bakeri dan Pastri (HBP)</option>
                                    <option name="hsk" <?php echo ($fetch["kursus"] == 'Seni Kulinari (HSK)') ? 'selected' : ''; ?>>Seni Kulinari (HSK)</option>
                                    <option name="opp" <?php echo ($fetch["kursus"] == 'SLDN Perabot (OPP)') ? 'selected' : ''; ?>>SLDN Perabot (OPP)</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="kohort" class="inputtext">Kohort (Tahun Kemasukan) : </label>
                            </td>
                            <td>
                                <input type="text" id="kohort" name="kohort" class="inputkohort" value="<?php echo isset($fetch["kohort"]) ? $fetch["kohort"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="kerja" class="inputtext">Pekerjaan Semasa (Jawatan) : </label>
                            </td>
                            <td>
                                <input type="text" id="kerja" name="kerja" class="inputkerjasemasa" value="<?php echo isset($fetch["kerja"]) ? $fetch["kerja"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="gaji" class="inputtext">Gaji : </label>
                            </td>
                            <td>
                                RM <input type="text" id="gaji" name="gaji" class="inputgaji" value="<?php echo isset($fetch["gaji"]) ? $fetch["gaji"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="notel" class="inputtext">No Telefon : </label>
                            </td>
                            <td>
                                <input type="text" id="notel" name="notel" class="inputnotel" value="<?php echo isset($fetch["notel"]) ? $fetch["notel"] : ''; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="alamatkerja" class="inputtext">Alamat Kerja : </label>
                            </td>
                            <td>
                                <textarea type="text" id="alamatkerja" name="alamatkerja" class="inputalamatkerja" value="<?php echo isset($fetch["alamatkerja"]) ? $fetch["alamatkerja"] : ''; ?>" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="alamatrumah" class="inputtext">Alamat Rumah : </label>
                            </td>
                            <td>
                                <textarea type="text" id="alamatrumah" name="alamatrumah" class="inputalamatrumah" value="<?php echo isset($fetch["alamatrumah"]) ? $fetch["alamatrumah"] : ''; ?>" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            
                            <td colspan="8">
                                <button class="buttonmp" name="submit" type="submit"><b>SAVE</b></button>
                            </td>
                            <tr></tr>
                        </tr>
                    </table>

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
                reader.onload = function (e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>

</html>
<?php
    } else {
        echo "Tiada data ditemui.";
    }
} else {
    echo "Invalid request. No 'noIc' provided.";
}
?>