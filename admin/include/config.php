<?php
define('DB_SERVER','localhost');
// define('DB_USER','athul9z1_cmsuser');
// define('DB_PASS' ,'Health@123');
define('DB_USER','root');
define('DB_PASS' ,'');

define('DB_NAME', 'athul9z1_cms');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>