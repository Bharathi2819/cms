<?php
    session_start();
    error_reporting(0);
    include('include/config.php');
    include('./include/header.php');
    if ($_SESSION['role'] != 'admin')
    {
    header('location:index.php');
    }
    else{
?>
<?php
// Get file id from query parameter
$fileId = $_GET["file"];

// Fetch file from database
$sql = "SELECT reqFile, filedata FROM requirments WHERE id = '$fileId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Set headers for file download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $row['reqFile'] . '"');

// Output file data
echo $row['filedata'];
?>
<?php } ?>