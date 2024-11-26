<?php
session_start();
include('config.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete operation based on the unique identifier (e.g., $noIc)
    $query = "DELETE FROM user WHERE noIc = '$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
} else {
    echo "Invalid request.";
}
?>