<?php
  include('config.php');
  if (isset($_POST['submit'])){
    $noIc = $_POST["noIc"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $confirm_pass=$_POST["confirm_pass"];

    if ($pass == $confirm_pass){
        $add=mysqli_query($connect, "INSERT INTO user (`noIc`, `email`, `pass`) VALUES ('$noIc','$email','$pass')");
        
        echo"
        <script>
        window.alert('ANDA TELAH BERJAYA MENDAFTAR');
        window.location = 'login.php';
        </script>
        ";
    }else{
        echo"
        <script>
        window.alert('KATA KUNCI ANDA TIDAK SAMA');
        window.location='signup.php';
        </script>
        ";
    }
  }
?>

<!DOCTYPE html>
<html>
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
     <link rel="stylesheet"  href="style.css">
    </head>
    <body class="bgsignup">

        <div class="tbsignup">
        <table cellspacing = "0" cellpadding="5">

            <tr>
                <td>
                    <center><img src="pic/logo.png"; class="signuplogo"></center>
                </td>
            </tr>

            <tr>
                <td>
                    <h1 class="titlesignup"><u>DAFTAR AKAUN DI SINI</u></h1>
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
                    <center><button type="submit" name="submit" class="signupbtn">Sign Up</button></center>
                </td>
            </tr>
        </form>

      

          </table></div>
    </body>
</html>