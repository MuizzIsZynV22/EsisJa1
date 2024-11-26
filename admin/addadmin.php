<?php
 include('config.php');
 if (isset($_POST['submit'])){
  $email = $_POST["email"];
   $noIc = $_POST["noIc"];
   $pass = $_POST["pass"];

   $role = 'admin';

   $confirm_pass=$_POST["confirm_pass"];

   $stmt = $connect->prepare("INSERT INTO user (noIc, email, pass, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $noIc, $email, $pass, $role);

        if ($stmt->execute()) {
            echo "
            <script>
                window.alert('ANDA TELAH BERJAYA MENDAFTAR');
                window.location = '../login.php';
            </script>
            ";
        } else {
            echo "
            <script>
                window.alert('GAGAL MENDAFTAR. Sila cuba lagi.');
                window.location='signup.php';
            </script>
            ";
        }
        $stmt->close();

      }
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
    <link rel="stylesheet" href="../style.css">
    <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-image: url(pic/bg1.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 100%;
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
  background-color: #2d2faf;;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2d2faf;
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
    padding: 60px;
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
	border: 2px solid black;
	width: 30%;
	background-color: black;
  color: white;
}

.header {
  background-color: red;
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
      <b><a href="adminstats.php">ADMIN PAGE SISTEM ALUMNI</a></b>
      <div id="myLinks">
        <a href="adminstatsbekerja.php">Statistik Bekerja</a>
        <a href="adminstatssambungbelajar.php">Statistik Sambung Belajar</a>
        <a href="adminstatsusahawan.php">Statistik Usahawan</a>
        <a href="addadmin.php">Tambah Admin</a>
<button class="logoutbtn"><a href="../logout.php" style="color: white;  text-decoration: none;">LOG OUT</a></button>

      </div>
      
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
<br><br>
    <div class="tbsignup">
        <table cellspacing = "0" cellpadding="5">

            <tr>
                <td>
                    <center><img src="pic/logo.png"; class="signuplogo"></center>
                </td>
            </tr>

            <tr>
                <td>
                    <h1 class="titlesignup"><u>DAFTAR AKAUN ADMIN DI SINI</u></h1>
                </td>
            </tr>

        <form action="" method="post">

            <tr>
                <td>
                    <label for="noIc"><h2 class="font">NOMBOR KAD PENGENALAN</h2></label><input type="text" id="noIc" name="noIc" class="input" required>
                    <label for="email"><h2 class="font">EMAIL</h2></label><input type="text" id="email" name="email" class="input"required>
                    <label for="pass"><h2 class="font">PASSWORD</h2></label><input type="password" id="pass" name="pass" class="input" required>
                    <label for="pass"><h2 class="font">CONFIRM PASSWORD</h2></label><input type="password" id="pass" name="confirm_pass" class="input" required>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="submit" class="signupbtn">Sign Up</button>
                </td>
            </tr>
        </form>

      

          </table>

    
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