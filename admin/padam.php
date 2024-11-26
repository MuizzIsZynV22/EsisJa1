<?PHP include ('config.php');
$noIc=$_GET['noIc']; 
$result=mysqli_query($connect,"DELETE FROM user WHERE noIc='$noIc'");
header("location:searchkursus.php");
?>