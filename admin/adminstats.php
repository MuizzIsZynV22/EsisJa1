<?php
include('config.php');

session_start();
$noIc = $_SESSION['noIc'];

function getCourseData($courseName, $table, $connect) {
    $query = "SELECT * FROM $table WHERE kursus = '$courseName'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else {
        return array(); // Handle the error as needed
    }
}

function getCourseCount($courseName, $table, $connect) {
    $query = "SELECT COUNT(*) as count FROM $table WHERE kursus = '$courseName'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    } else {
        return 0; // Handle the error as needed
    }
}

$courseNames = array(
    'Perbankan',
    'Teknologi Komputeran(KPD)',
    'Teknologi Animasi 3D (KMK)',
    'Pemasaran (BPM)',
    'Perakaunan (BAK)',
    'Seni Kulinari (HSK)',
    'Bakeri dan Pastri (HBP)',
    'SLDN Perabot (OPP)',
    'Kejuruteraan Mekanikal',
    'Kejuruteraan Eletrikal',
    'Penyediaan Dan Pembuatan Makanan (PPM)'
);

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
    font-family: 'Quicksand', sans-serif; 
    position: relative;
    display: inline-block;
    margin: 10px;
    height: 37px;
    padding-right: 15px 30px;
    text-align: center;
    font-size: 15px;
    letter-spacing: 1px;
    text-decoration: none;
    background: linear-gradient(to right, #ccff66, #33cccc);;
    cursor: pointer;
    transition: ease-out 0.7s;
    border: 2px;
    border-radius: 10px;
    box-shadow: inset 0 0 0 0 cyan;
   
}

.dropbtn:hover {
    color: white;
    box-shadow: inset 0 -100px 0 0 cyan;
}

.dropbtn:active {
    transform: scale(0.9);
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

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.tb {
    margin-left: auto;
    margin-right: auto;
    padding: 40px;
}

.admintxt {
  text-align: center;
  color: white;
  font-size: large;
  padding: 8px;
}

.tabletxt {
  margin-left: auto;
  margin-right: auto;
}
.senarai{
  border-radius: 20px;
	border: 2px solid black;
	width: 30%;
	background-color: black;
  color: white;
  opacity: .7;
}
.header {
  border-radius: 9px;
  background-color: #6699ff;
  color: white;
}

.logoutbtn {
  background-color: black;
    color: white;
    text-decoration: none;
    margin-right: 35px;
    width: 100%;
    border-radius: 3px;
}
   
    </style>
    </head>
    <body>
    
    <!-- Top Navigation Menu -->
    <div class="topnav">
      <b><a href="#home">ADMIN PAGE SISTEM ALUMNI</a></b>
      <div id="myLinks">
        <a href="adminstatsbekerja.php">Statistik Bekerja</a>
        <a href="adminstatssambungbelajar.php">Statistik Sambung Belajar</a>
        <a href="adminstatsusahawan.php">Statistik Usahawan</a>
        <a href="addadmin.php">Tambah Admin</a>
<button class="logoutbtn"><a href="../logout.php" style="color: white;  text-decoration: none;">LOG OUT</a></button>

      </div>
      
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <b>\/</b>
      </a>
    </div>

    <table class="tb">
        <tr>
            <td>
            <button class="dropbtn"><b><a href="searchkursus.php" style="text-decoration: none; color: black">KURSUS</a></b></button>
        <!--
        <div class="dropdown">
        <button onclick="myFunction2()" class="dropbtn" style="font-weight: bold">KURSUS</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="course and status/kpd/adminkpd.php">KPD</a>
          <a href="course and status/kmk/adminkmk.php">KMK</a>
          <a href="">BPM</a>
          <a href="">BAK</a>
          <a href="">HSK</a>
          <a href="">HBP</a>
          <a href="">OPP</a>
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
        </div>
        -->
    </td>
    </tr>
      </div></table>

     <table class="tabletxt">
      <tr>
        <td class="admintxt"><b>Welcome Admin !</b></td>
      </tr>
     </table>
    
     <table width="100%" cellpadding="5" cellspacing="5">
				<tr>
					<th class="header">BEKERJA</th>
					<th class="header">SAMBUNG BELAJAR</th>
					<th class="header">USAHAWAN</th>
				</tr>
				<tr>
					<td class="senarai" style="padding-bottom: 120px;">

            <div style="padding: 8px; text-align: center;">Jumlah Alumni Berdaftar</div>

						<ol>
            <?php
                foreach ($courseNames as $course) {
                    $countBekerja = getCourseCount($course, 'bekerja', $connect);
                   

                    $dataBekerja = getCourseData($course, 'bekerja', $connect);
                ?>
                    <li>
                        <?php echo "{$course}: <span style='color: lightgreen;'>{$countBekerja}</span>"; ?>
                        <?php if (!empty($dataBekerja)) : ?>
                            <ul>
                                <?php foreach ($dataBekerja as $data) : ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php } ?>
						</ol>
					</td>
					<td class="senarai" style="padding-bottom: 120px;">
						<div style="padding: 8px; text-align: center;">Jumlah Alumni Berdaftar</div>

           
						<ol>
            <?php
                foreach ($courseNames as $course) {
                    $countSambungBelajar = getCourseCount($course, 'sambungbelajar', $connect);
                   

                    $dataSambungBelajar = getCourseData($course, 'sambungbelajar', $connect);
                ?>
                    <li>
                        <?php echo "{$course}: <span style='color: lightgreen;'>{$countSambungBelajar}</span>"; ?>
                        <?php if (!empty($dataSambungBelajar)) : ?>
                            <ul>
                                <?php foreach ($dataSambungBelajar as $data) : ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php } ?>
						</ol>
					</td>
					<td class="senarai" style="padding-bottom: 120px;">
						<div style="padding: 8px; text-align: center;">Jumlah Alumni Berdaftar</div>

           
						<ol>
            <?php
                foreach ($courseNames as $course) {
                    $countUsahawan = getCourseCount($course, 'usahawan', $connect);
                   

                    $dataUsahawan = getCourseData($course, 'usahawan', $connect);
                ?>
                    <li>
                        <?php echo "{$course}: <span style='color: lightgreen;'>{$countUsahawan}</span>"; ?>
                        <?php if (!empty($dataUsahawan)) : ?>
                            <ul>
                                <?php foreach ($dataUsahawan as $data) : ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php } ?>
						</ol>
					</td>
				</tr>
			</table>
		</td>
	</tr>
    <!-- End smartphone / tablet look -->
    </div>
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