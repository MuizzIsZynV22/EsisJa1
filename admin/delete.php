<?php
include('config.php');

if (isset($_GET['noIc'])) {
    $noIc = $_GET['noIc'];

    // Use prepared statements to prevent SQL injection
    $stmtBekerja = $connect->prepare("DELETE FROM bekerja WHERE noIc = ?");
    $stmtBekerja->bind_param("s", $noIc);

    $stmtSambungBelajar = $connect->prepare("DELETE FROM sambungbelajar WHERE noIc = ?");
    $stmtSambungBelajar->bind_param("s", $noIc);

    $stmtUsahawan = $connect->prepare("DELETE FROM usahawan WHERE noIc = ?");
    $stmtUsahawan->bind_param("s", $noIc);

    // Execute the DELETE statements
    $stmtBekerja->execute();
    $stmtSambungBelajar->execute();
    $stmtUsahawan->execute();

    // Check if any of the statements failed
    if ($stmtBekerja->errno || $stmtSambungBelajar->errno || $stmtUsahawan->errno) {
        // Handle errors
        echo "Error: " . $stmtBekerja->error . " | " . $stmtSambungBelajar->error . " | " . $stmtUsahawan->error;
    } else {
        // Records deleted successfully, redirect to the page where the delete request originated
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Close the statements
    $stmtBekerja->close();
    $stmtSambungBelajar->close();
    $stmtUsahawan->close();
} else {
    // Handle the case where 'noIc' is not set in the query string
    echo "No record specified for deletion.";
}
?>