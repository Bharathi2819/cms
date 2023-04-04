<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<?php
$rt = mysqli_query($conn,"SELECT *
                        FROM 
                            requirements");
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