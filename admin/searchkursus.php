<?php
session_start();
$noIc = $_SESSION['noIc'];
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sistem Alumni</title>
</head>
<body>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    *{
      font-size: 25px;
    }
    
    body {
      font-family: 'Quicksand', sans-serif;
      background-image: url(pic/bg1.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      width: 99%;
      height: default;

    }
    
    .mobile-container {
      max-width: 480px;
      margin: auto;
      background-color: #555;
      height: 500px;
      color: white;
      border-radius: 10px;
    }
    
    .topnav {
      overflow: hidden;
      background-color: rgb(222, 29, 29);
      position: relative;
    }
    
    .topnav #myLinks {
      display: none;
    }
    
    .topnav a {
      color: white;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
      display: block;
    }
    
    .topnav a.icon {
      background: rgb(222, 29, 29);
      display: block;
      position: absolute;
      right: 0;
      top: 0;
    }
    
.dropbtn {
  font-family: Quicksand, sans-serif; 
  background : linear-gradient(to right, #99ffcc, #ffcccc);
  border-radius: 10px;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  font-weight: bold;
}

.dropbtn:hover, .dropbtn:focus {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  background : linear-gradient(to right, #ccffcc, #ccffcc);
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.content{
  margin-left: 30px;
  margin-right: 30px;
  border: none;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin: 10px 20px;

}

.content thead tr{
  background-color: #009879;
  color: #ffffff;
}

.content th,
.content td{
  padding: 15px 10px;
  border-bottom: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.tb {
    margin-left: auto;
    margin-right: auto;
    padding: 60px;
    
}

.logoutbtn {
  background-color: black;
    color: white;
    text-decoration: none;
    margin-right: 35px;
    width: 100%;
    border-radius: 3px;
}
form {
        margin-bottom: 20px;
    }

    label {
        margin-right: 10px;
    }

    input[type="text"] {
        padding: 8px;
        margin-right: 10px;
    }

    button[type="submit"] {
        padding: 8px 12px;
        background-color: #2d2faf;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #1f1f7a;
    }

    .delete-btn {
    background-color: #ff3333;
    color: white;
    padding: 8px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

    </style>


      </script>
    </head>
    <body>

   
    
    <!-- Top Navigation Menu -->
    <div class="topnav">
      <b><a href="adminstats.php">ADMIN PAGE SISTEM ALUMNI</a></b>
      <div id="myLinks">
        <a href="adminstatsbekerja.php">Statistik Bekerja</a>
        <a href="adminstatssambungbelajar.php">Statistik Sambung Belajar</a>
        <a href="adminstatsusahawan.php">Statistik Usahawan</a>
        <a href="addadmin.php">Tambah Admin</a>
        <button class="logoutbtn"><a href="../logout.php" style="color: white;  text-decoration: none; font-family: 'Quicksand', sans-serif;">LOG OUT</a></button>
      </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <b>\/</b>
      </a>
    </div>

    <!--
    <table class="tb">
        <tr>
            <td>
            <div class="dropdown">
        <button onclick="myFunction2()" class="dropbtn">Bekerja</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="adminkpd1.php">KPD</a>
          <a href="../kmk/adminkmk1.php">KMK</a>
          <a href="../bpm/adminbpm1.php">BPM</a>
          <a href="../bak/adminbak1.php">BAK</a>
          <a href="adminbpk.php">BPK</a>
          <a href="adminhsk.php">HSK</a>
          <a href="adminhbp.php">HBP</a>
          <a href="adminopp.php">OPP</a>
          <a href="">BPK</a>
          <a href="">5SS</a>
          <a href="">5A1</a>
          <a href="">5A2</a>
          <a href="">5A3</a>
          <a href="">5M1</a>
          <a href="">5M2</a>
          <a href="">5M3</a>
          <a href="">5E1</a>
          <a href="">5E2</a>
          <a href="">5E3</a>

        </div>
    </td>
    <td>
        <div class="dropdown">
        <button onclick="myFunction3()" class="dropbtn">Sambung Belajar</button>
        <div id="myDropdown2" class="dropdown-content">
        <a href="adminkpd1.php">KPD</a>
          <a href="adminkmk1.php">KMK</a>
          <a href="adminbpm1.php">BPM</a>
          <a href="adminbak1.php">BAK</a>
          <a href="adminbpk1.php">BPK</a>
          <a href="adminhsk1.php">HSK</a>
          <a href="adminhbp1.php">HBP</a>
          <a href="adminopp1.php">OPP</a>
          <a href="">BPK</a>
          <a href="">5SS</a>
          <a href="">5A1</a>
          <a href="">5A2</a>
          <a href="">5A3</a>
          <a href="">5M1</a>
          <a href="">5M2</a>
          <a href="">5M3</a>
          <a href="">5E1</a>
          <a href="">5E2</a>
          <a href="">5E3</a>
        </div>
    </td>
    <td>
        <div class="dropdown">
        <button onclick="myFunction4()" class="dropbtn">Usahawan</button>
        <div id="myDropdown3" class="dropdown-content">
        <a href="adminkpd2.php">KPD</a>
          <a href="adminkmk2.php">KMK</a>
          <a href="adminbpm2.php">BPM</a>
          <a href="adminbak2.php">BAK</a>
          <a href="adminbpk2.php">BPK</a>
          <a href="adminhsk2.php">HSK</a>
          <a href="adminhbp2.php">HBP</a>
          <a href="adminopp2.php">OPP</a>
          <a href="">BPK</a>
          <a href="">5SS</a>
          <a href="">5A1</a>
          <a href="">5A2</a>
          <a href="">5A3</a>
          <a href="">5M1</a>
          <a href="">5M2</a>
          <a href="">5M3</a>
          <a href="">5E1</a>
          <a href="">5E2</a>
          <a href="">5E3</a>
        </div></table>
  -->
    <br><br><br>
    <form method="POST" action="">
      <label for="searchTerm" style="color: white;">Cari :</label>
      <input type="text" id="searchTerm" name="nama" placeholder="Masukkan nama alumni" style="border-radius: 10px; outline: none;">
      
      <select name="jenis" style="border-radius: 10px; outline: none; padding: 8px">
        <option value="" selected>Tunjuk Semua (Bekerja, Sambung Belajar, Usahawan)</option>
        <option value="bekerja">Bekerja</option>
        <option value="sambungbelajar">Sambung Belajar</option>
        <option value="usahawan">Usahawan</option>
      </select>
  <br>
      <select name="kursus" style="border-radius: 10px; outline: none; padding: 8px">
        <option value="" selected>Tunjuk Semua Kursus</option>
        <?php 
        $sqlk = "SELECT DISTINCT kursus FROM bekerja
        UNION 
        SELECT DISTINCT kursus FROM sambungbelajar
        UNION 
        SELECT DISTINCT kursus FROM usahawan";
        $resultk = mysqli_query($connect, $sqlk);
        while($rowk = mysqli_fetch_assoc($resultk)){
          echo "<option value='".$rowk["kursus"]."'>".$rowk["kursus"]."</option>";
        }
        ?>
      </select>
      
      <button type="submit" style="border-radius: 10px;">Search</button>
    </form>

      <table>
        <tr>
            <td>
                
            <div class="col-md-12">
              <div class="card mt-4">
                  <div class="card-body">
                      <table class="content" border="0" cellpadding="5" cellspacing="0" bgcolor="#ffffff">
                          <thead>
                              <tr >
                                  <th>Nama</th>
                                  <th>No Tel</th>
                                  <th>Jantina</th>
                                  <th>Kursus</th>
                                  <th>Kohort</th>
                                  <th>Status Kerja</th>
                                  <th>Lihat Profil</th>
                                  <th>Padam</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(isset($_POST["nama"]) && isset($_POST["kursus"]) && isset($_POST["jenis"])){
                              $search_qry = "";
                              if($_POST["nama"] != "" ){
                                $search_qry .= " AND nama LIKE '%".$_POST["nama"]."%'";
                              }

                              if($_POST["kursus"] != "" ){
                                $search_qry .= " AND kursus = '".$_POST["kursus"]."'";
                              }

                              if($_POST["jenis"] == ""){

                                $query = "SELECT nama, noIc, notel, jantina, kursus, kohort, 'Bekerja' as statusTable FROM bekerja WHERE 1=1 $search_qry
                                UNION 
                                SELECT nama, noIc, notel, jantina, kursus, kohort, 'Sambung Belajar' as statusTable FROM sambungbelajar WHERE 1=1 $search_qry
                                UNION 
                                SELECT nama, noIc, notel, jantina, kursus, kohort, 'Usahawan' as statusTable FROM usahawan WHERE 1=1 $search_qry
                                ";
                                $result = mysqli_query($connect, $query);

                              }else{
                                $tableName = $_POST["jenis"];
                                if($tableName == "bekerja"){
                                  $statusTable = "Bekerja";
                                }elseif($tableName == "sambungbelajar"){
                                  $statusTable = "Sambung Belajar";
                                }else{
                                  $statusTable = "Usahawan";
                                }

                                $query = "SELECT * FROM $tableName WHERE 1=1 $search_qry";
                                $result = mysqli_query($connect, $query);
                              }
                            
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Adjust the column names based on your table structure
                                        $nama = $row['nama'];
                                        $noIc = $row['noIc'];
                                        $notel = $row['notel'];
                                        $jantina = $row['jantina'];
                                        $kursus = $row['kursus'];
                                        $kohort = $row['kohort'];
                                        if($_POST["jenis"] == ""){
                                          $statusTable = $row["statusTable"];
                                        }
                            
                                        // Output the table row
                                        echo "<tr>";
                                        echo "<td>{$nama}</td>";
                                        echo "<td>{$notel}</td>";
                                        echo "<td>{$jantina}</td>";
                                        echo "<td>{$kursus}</td>";
                                        echo "<td>{$kohort}</td>";
                                        echo "<td>{$statusTable}</td>"; 
                                        echo "<td><a href='" . getProfileLink($statusTable, $noIc) . "' class='profile-link'>Klik</a></td>";
                                        echo "<td><a href='delete.php?noIc={$row['noIc']}' \" onclick=\"return confirm('Rekod ini akan dihapuskan')\"class='delete-btn'>Delete</a></td>";                                 
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No result</td></tr>";
                                }
                              }else{
                                echo "<tr><td colspan='6'>Search to view data</td></tr>";
                              }
                                  
                                  // $courseName = 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)';
                                  ?>
                                  <?php
                                  // displayCourseData($courseName, 'bekerja', $connect);
                                  // displayCourseData($courseName, 'sambungbelajar', $connect);
                                  // displayCourseData($courseName, 'usahawan', $connect);
                                  ?>  
            </td>
        </tr>
      </table>
    

    <!-- End smartphone / tablet look -->
    </div>

    <?php
    function getProfileLink($status, $noIc) {
  switch ($status) {
    case 'Bekerja':
      return "bekerjaoutput.php?noIc={$noIc}";
  case 'Sambung Belajar':
      return "sambungbelajaroutput.php?noIc={$noIc}";
  case 'Usahawan':
      return "usahawanoutput.php?noIc={$noIc}";
  default:
      return "#";
    }
  }
    ?>
    <script>
        function myFunction() {
          var x = document.getElementById("myLinks");
          if (x.style.display === "block") {
            x.style.display = "none";
          } else {
            x.style.display = "block";
          }
        }
function myFunction2() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction3() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

function myFunction4() {
  document.getElementById("myDropdown3").classList.toggle("show");
}



// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
        </script>
</body>
</html>