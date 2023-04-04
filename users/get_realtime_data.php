<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<?php
$rt = mysqli_query($conn,"SELECT 
                            requirements.*, 
                            users.fullName AS name
                        FROM 
                            requirements 
                            JOIN users ON users.id = requirements.userId
                        WHERE 
                            equirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");
$num1 = mysqli_num_rows($rt);
echo $num1;
?>
<script>
    $.ajax({
    url: 'get_realtime_data.php',
    success: function(data) {
        seriesData = JSON.parse(data);
        chart.updateSeries(seriesData);
    }
});
</script>