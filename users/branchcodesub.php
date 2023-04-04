<?php

// $dbcon = mysqli_connect("localhost", "root", "", "athul9zl_cms");

include('./include/config.php');

if (!empty($_POST["branch_name"])) {
    $id = ($_POST['branch_name']);

    echo $id;

    $stmt = mysqli_query($conn, "SELECT branch_code FROM master_branches WHERE branch_name ='$id'");

    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['branch_code']); ?>"><?php echo htmlentities($row['branch_code']); ?></option>
<?php
    }
}




?>