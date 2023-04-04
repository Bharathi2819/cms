<?php
session_start();
 $dbcon = mysqli_connect("localhost", "root", "", "athul9z1_cms");

include('./include/config.php');

if (!empty($_POST["Description"])) {
    $id = ($_POST['Description']);

    $query=mysqli_query($conn,"select fullName,emp_id from users where userEmail='".$_SESSION['userEmail']."'");

    while($row=mysqli_fetch_array($query)){
    $EmpCode=$row['emp_id'];
    $stmt = mysqli_query($conn, "SELECT ExpiryDate FROM product JOIN users ON product.EmpCode=users.emp_id WHERE trim(EmpCode)='$EmpCode' AND trim(Description)='$id'");
    while($row=mysqli_fetch_assoc($stmt))
    $_SESSION['ExpiryDate']=$row['ExpiryDate'];
    {
       ?>
       <option value="<?php echo $_SESSION['ExpiryDate']; ?>"><?php echo $_SESSION['ExpiryDate']; ?></option>
       <?php
      }
   }
}
?>