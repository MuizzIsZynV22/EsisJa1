<?php
include('config.php');
session_start();

if (isset($_POST['submit'])) {
    $noIc = $_POST['noIc'];
    $pass = $_POST['pass'];

    $SQL = "SELECT * FROM user WHERE noIc = ? AND pass = ?";
    $stmt = mysqli_prepare($connect, $SQL);
    mysqli_stmt_bind_param($stmt, 'ss', $noIc, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['noIc'] = $noIc;

        if ($row['role'] == 'admin') {
            header('Location: admin/adminstats.php');
            exit;
        } else {
            header('Location: select.php');
            exit;
        }
    } else {
        echo "Invalid login credentials. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sistem Alumni</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet"  href="styles.css">
        <style>
            *{
                font-size: 22px;
            }
        </style>
    </head>
    <body class="bglogin">
    <div>
             <table class="tblogin" cellspacing="0" cellpadding="5">
            <tr>
                <td><img src= "pic/logo.png"; class="loginlogo"></td>
            </tr>
           
            <tr>
                <td>
                    <img id="avatar" src="pic/dps.png"; class="avatarlogin">
                </td>
            </tr>
            
        <form action="" method="post">
            <tr>
                <td>
                    <label for="noIc"><h2 class="font">NOMBOR KAD PENGENALAN</h2></label><input type="text" id="noIc" name="noIc" class="input" required>
                    <label for="pass"><h2 class="font">PASSWORD</h2></label><input type="password" id="pass" name="pass" class="input" required>
                </td>
            </tr>

            <tr>
                <td>
                    <h3 class="font">Lupa kata laluan? Klik <a href=""> sini </a></h3>
                </td>
            </tr>
        
            
            <tr>
                <td>
                    <button id="submit" type="submit" name="submit" class="loginbtn">Log In</button>
                </td>
            </tr>
        </form>

            <tr>
                <td>
                    <h3 class="font">Alumni yang belum berdaftar? Klik <a href="signup.php"> sini.</a></h3> 
                </td>
            </tr>


        </table>
    </div> 
    </body>
</html>