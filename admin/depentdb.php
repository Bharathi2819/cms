<?php

$dbcon = mysqli_connect("localhost", "root", "", "athul9z1_cms");

if (!empty($_POST["branch_state"])) {
    $id = ($_POST['branch_state']);


    $stmt = mysqli_query($dbcon, "SELECT distinct branch_city FROM master_branches WHERE branch_state ='$id'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select Location"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['branch_city']); ?>"><?php echo htmlentities($row['branch_city']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}




?>