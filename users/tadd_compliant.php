<?php
session_start();
include('include/config.php');
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
include('Tsidebar.php');
?>