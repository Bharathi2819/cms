<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/sidebar.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else
{
?>
<body>
<div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-gray-100">
            <div class="h-fixed mt-10 mb-20 bg-gray-100 ml-14 md:ml-64">
                <div class="overflow-x-auto">
                    <div class="flex items-center justify-center overflow-hidden font-sans bg-gray-100 ">
                        <div class="w-full lg:w-6/6">
                <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-gray-100">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                            <div class="col-span-12 mt-2">
                                <div class="flex items-center h-10 intro-y">
                                </div>
                                <div class="mr-20 ">
                                <ul class="flex items-center justify-end ">
                                <div class="inline-flex rounded-md shadow-sm mb-12" role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='dashboard.php'" checked class="px-4 py-2 text-sm font-semibold  text-white bg-gradient-to-r from-pink-500 via-pink-500 to-pink-500 hover:bg-gradient-to-br  focus:ring-pink-200 bg-white border-2 border-pink-400 rounded-l-lg ">
                                    Complaints
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='Fdashboard.php'" class="px-6 py-2 text-sm font-semibold text-black bg-gradient-to-r from-white-100 via-white-200 rounded-r-md to-white-300 hover:bg-gradient-to-br focus:ring-white-200   dark:focus:text-white  dark:focus:ring-white-300 bg-white border-2 border-white-400 ">
                                    Requirement
                                    </button>
                                </div>
                            </ul>
                                    </div>
                                <div class="grid grid-cols-12 gap-10 ml-12 mb-16 mt-5">
                                <a class="transform w-45 h-45 hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y border-2 border-cyan-300 bg-cyan-600 bg-gradient-to-r from-cyan-300 via-cyan-400 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-400">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-bold text-base uppercase">
                                                    <span class="flex ">Total Complaints</span>
                                                </div>
                                            </div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT * FROM tblcomplaints
                                                                ");
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-6 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                        </div>
                                    </a>
                                    <a class="transform w-45 h-45 hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-rose-800 bg-gradient-to-r from-rose-300 via-rose-400 to-rose-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-rose-400 dark:focus:ring-rose-500">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-bold text-base uppercase">
                                                    <span class="flex ">New Complaints</span>
                                                </div>
                                            </div>
                                            <?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status IS NULL");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>
                                                                <div class="mt-6 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                        </div>
                                    </a>
                                    <a class="transform w-45 h-45 hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-amber-800 bg-gradient-to-r from-amber-300 via-amber-300 to-amber-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-400">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-bold text-base uppercase">
                                                    <span class="flex ">In Process Complaints</span>
                                                </div>
                                            </div>
                                            <?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status='in process'");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>
                                                                <div class="mt-6 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                        </div>
                                    </a>
                                    <a class="transform w-45 h-45 hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-teal-800 bg-gradient-to-r from-teal-200 via-teal-300 to-teal-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-200 dark:focus:ring-teal-300">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-bold text-base uppercase">
                                                    <span class="flex ">Closed Complaints</span>
                                                </div>
                                            </div>
                                            <?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status='closed'");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>
                                                                <div class="mt-6 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 ml-10">
                                <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                                    <div class="bg-white rounded-lg border-2 border-sky-100
                                    00 shadow-lg p-4" id="chart"></div>
                                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                    <div class="text-white border-2 border-sky-200 rounded-lg bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300" id="chartpie">
                                    <div class="mt-5 flex justify-center text-black font-bold text-xl uppercase mb-10">All Complaints</div>   
                                    </div>
                                    <div class="text-white border-2 border-sky-200 rounded-lg bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300" id="chartpie1">
                                    <div class="mt-5 flex justify-center text-black font-bold text-xl uppercase mb-10">Totay Complaints</div>  
                                    </div></div>
                                </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <?php
    $today = date("Y-m-d");
    $last_week = date("Y-m-d", strtotime("-7 days"));
    $start_timestamp = strtotime($last_week." 00:00:00");
    $end_timestamp = strtotime($today . " 23:59:59");

    $days = array();
    $Hardware = array();
    $Software = array();
    $Network = array();
    $Others = array();

    for ($i = 0; $i < 7; $i++) {
        $day_timestamp = strtotime("-$i days");
        $day = date("Y-m-d", $day_timestamp);
        $days[] = $day;

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Hardware FROM tblcomplaints WHERE tblcomplaints.category='4' AND DATE(tblcomplaints.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Hardware[] = $result['Hardware'];

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Software FROM tblcomplaints WHERE tblcomplaints.category='3' AND DATE(tblcomplaints.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Software[] = $result['Software'];

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Network FROM tblcomplaints  WHERE tblcomplaints.category='5' AND DATE(tblcomplaints.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Network[] = $result['Network'];

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Others FROM tblcomplaints  WHERE tblcomplaints.category='6' AND DATE(tblcomplaints.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Others[] = $result['Others'];
    }
?>

<script>
    var options = {
        series: [{
            name: 'Hardware',
            data: <?php echo json_encode($Hardware); ?>
        }, {
            name: 'Software',
            data: <?php echo json_encode($Software); ?>
        },{
            name: 'Network',
            data: <?php echo json_encode($Network); ?>
        }, {
            name: 'Others',
            data: <?php echo json_encode($Others); ?>
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            stackType: '100%'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        xaxis: {
            categories: <?php echo json_encode($days); ?>
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'right',
            offsetX: 0,
            offsetY: 50
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Hardware FROM tblcomplaints  WHERE tblcomplaints.category='4'");
    $result = mysqli_fetch_assoc($rt);
    $Hardware = $result['Hardware'];
?>

<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Software FROM tblcomplaints  WHERE tblcomplaints.category='3' ");
    $result = mysqli_fetch_assoc($rt);
    $Software = $result['Software'];
?>

<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Network FROM tblcomplaints  WHERE tblcomplaints.category='5' ");
    $result = mysqli_fetch_assoc($rt);
    $Network = $result['Network'];
?>

<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Others FROM tblcomplaints  WHERE tblcomplaints.category='6' ");
    $result = mysqli_fetch_assoc($rt);
    $Others = $result['Others'];
?>

<script>
var options = {
  series: [<?php echo $Hardware; ?>, <?php echo $Software; ?>, <?php echo $Network; ?>, <?php echo $Others; ?>],
  chart: {
    type: 'donut',
  },
  colors: ['#FF4560', '#008FFB', '#FEB019', '#00E396'], 
  labels: [ 'Hardware','Software', 'Network', 'Others'], 
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
};

var chart = new ApexCharts(document.querySelector("#chartpie"), options);
chart.render();

</script>
<?php
    $today = date("Y-m-d");
    $start_timestamp = strtotime($today." 00:00:00");
    $end_timestamp = strtotime($today . " 23:59:59");
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Hardware FROM tblcomplaints WHERE tblcomplaints.category='4' AND UNIX_TIMESTAMP(tblcomplaints.regDate) BETWEEN '$start_timestamp' AND '$end_timestamp'");
    $result = mysqli_fetch_assoc($rt);
    $Hardware = $result['Hardware'];
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Software FROM tblcomplaints WHERE tblcomplaints.category='3' AND UNIX_TIMESTAMP(tblcomplaints.regDate) BETWEEN '$start_timestamp' AND '$end_timestamp'");
    $result = mysqli_fetch_assoc($rt);
    $Software = $result['Software'];
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Network FROM tblcomplaints  WHERE tblcomplaints.category='5' AND UNIX_TIMESTAMP(tblcomplaints.regDate) BETWEEN '$start_timestamp' AND '$end_timestamp' ");
    $result = mysqli_fetch_assoc($rt);
    $Network = $result['Network'];
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS Others FROM tblcomplaints  WHERE tblcomplaints.category='6' AND UNIX_TIMESTAMP(tblcomplaints.regDate) BETWEEN '$start_timestamp' AND '$end_timestamp' ");
    $result = mysqli_fetch_assoc($rt);
    $Others = $result['Others'];
?>

<script>
var options = {
  series: [<?php echo $Hardware; ?>, <?php echo $Software; ?>, <?php echo $Network; ?>, <?php echo $Others; ?>],
  chart: {
    type: 'donut',
  },
  colors: ['#FF4560', '#008FFB', '#FEB019', '#00E396'],
  labels: [ 'Hardware','Software', 'Network', 'Others'],
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
};

var chart = new ApexCharts(document.querySelector("#chartpie1"), options);
chart.render();

</script>
</body>
</html>
<?php } ?>