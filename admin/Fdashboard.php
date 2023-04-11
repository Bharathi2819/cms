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
           <main class="">
                <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-gray-100">

                    <div class="grid grid-cols-12 gap-6">
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                            <div class="col-span-12 mt-6">
                                <div class="mr-20">
                                <ul class="flex items-center justify-end">
                                <div class="inline-flex rounded-md shadow-sm mb-10"  role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='dashboard.php'" checked class="px-4 py-2 text-sm font-semibold  text-black bg-gradient-to-r from-white-100 via-white-200 to-white-300 hover:bg-gradient-to-br  focus:ring-white-200 dark:focus:ring-white-300 bg-white border-2 border-white-400 rounded-l-lg ">
                                     Complaints
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='Fdashboard.php'" class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-pink-500 via-pink-500 rounded-r-md to-pink-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-200 bg-sky border-2 border-pink-400 ">
                                    Requirements
                                    </button>
                                </div>
                            </ul>
                                    </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16"><path fill="skyblue" d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16ZM4 5v5a1 1 0 0 0 1 1h1v1.5a.5.5 0 0 0 .854.354L8.707 11H11a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1Z"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">New Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-cyan-300 bg-cyan-600 bg-gradient-to-r from-cyan-300 via-cyan-400 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT 
                                                                requirements.*, 
                                                                users.fullName AS name
                                                            FROM 
                                                                requirements 
                                                                JOIN users ON users.id = requirements.userId
                                                            WHERE 
                                                                requirements.status IS NULL 
                                                                ");;
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-10">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-7 text-base text-black">Material</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-cyan-300 bg-cyan-600 bg-gradient-to-r from-cyan-300 via-cyan-400 to-cyan-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT 
                                                                fund.*, 
                                                                users.fullName AS name
                                                            FROM 
                                                                fund 
                                                                JOIN users ON users.id = fund.userId
                                                            WHERE 
                                                                fund.status IS NULL 
                                                                ");;
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-10">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-10 text-base text-black">Fund</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.67 7.066l-1.08-1.34a1.5 1.5 0 0 1-.309-.77l-.19-1.698a1.51 1.51 0 0 0-1.329-1.33l-1.699-.19c-.3-.03-.56-.159-.78-.329L8.945.33a1.504 1.504 0 0 0-1.878 0l-1.34 1.08a1.5 1.5 0 0 1-.77.31l-1.698.19c-.7.08-1.25.63-1.33 1.329l-.19 1.699c-.03.3-.159.56-.329.78L.33 7.055a1.504 1.504 0 0 0 0 1.878l1.08 1.34c.17.22.28.48.31.77l.19 1.698c.08.7.63 1.25 1.329 1.33l1.699.19c.3.03.56.159.78.329l1.339 1.08c.55.439 1.329.439 1.878 0l1.34-1.08c.22-.17.48-.28.77-.31l1.698-.19c.7-.08 1.25-.63 1.33-1.329l.19-1.699c.03-.3.159-.56.329-.78l1.08-1.339a1.504 1.504 0 0 0 0-1.878zM6.5 12.01L3 8.51l1.5-1.5l2 2l5-5L13 5.56l-6.5 6.45z" fill="green"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Approved Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-green-300 bg-green-600 bg-gradient-to-r from-green-300 via-green-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT *FROM requirements WHERE requirements.status='Approved'");
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-8 text-base text-black">Material</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-green-300 bg-green-600 bg-gradient-to-r from-green-300 via-green-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                               $rt =mysqli_query($conn,"SELECT *FROM fund WHERE fund.status='Approved'");
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-10 text-base text-black">Fund</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16"><path fill=""class=" bg-yellow-600" d="M4.47.22A.749.749 0 0 1 5 0h6c.199 0 .389.079.53.22l4.25 4.25c.141.14.22.331.22.53v6a.749.749 0 0 1-.22.53l-4.25 4.25A.749.749 0 0 1 11 16H5a.749.749 0 0 1-.53-.22L.22 11.53A.749.749 0 0 1 0 11V5c0-.199.079-.389.22-.53Zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5ZM8 4a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 1 0-2a1 1 0 0 1 0 2Z"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Hold Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-yellow-300 bg-yellow-600 bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT *FROM requirements WHERE requirements.status='Hold'");
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-8 text-base text-black">Material</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-yellow-300 bg-yellow-600 bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                               $rt =mysqli_query($conn,"SELECT *FROM fund WHERE fund.status='Hold'");
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-10 text-base text-black">Fund</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 12 12"><path fill="red" d="M1.757 10.243a6.001 6.001 0 1 1 8.488-8.486a6.001 6.001 0 0 1-8.488 8.486ZM6 4.763l-2-2L2.763 4l2 2l-2 2L4 9.237l2-2l2 2L9.237 8l-2-2l2-2L8 2.763Z"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Rejected Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-red-300 bg-red-600 bg-gradient-to-r from-red-300 via-red-400 to-red-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT 
                                                                requirements.*, 
                                                                users.fullName AS name
                                                            FROM 
                                                                requirements 
                                                                JOIN users ON users.id = requirements.userId
                                                            WHERE 
                                                                requirements.status ='Rejected'
                                                                ");;
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-8 text-base text-black">Material</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-2 rounded-lg border-red-300 bg-red-600 bg-gradient-to-r from-red-300 via-red-400 to-red-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-400">
                                                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                                        <div>
                                                            <div>
                                                            <?php
                                                                $rt =mysqli_query($conn,"SELECT 
                                                                fund.*, 
                                                                users.fullName AS name
                                                            FROM 
                                                                fund 
                                                                JOIN users ON users.id = fund.userId
                                                            WHERE 
                                                                fund.status='Rejected'
                                                                ");;
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-10 text-base text-black">Fund</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-span-12 mt-5">
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                    <div class="bg-white rounded-lg border-2 border-gray-2
                                    00 shadow-lg p-4" id="chartline"></div>
                                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                    <div class="text-white border-2 border-sky-200 rounded-lg bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300" id="chartpie">
                                    <div class="mt-7 flex justify-center text-black font-bold text-base uppercase mb-10">Fund</div>   
                                    </div>
                                    <div class="text-white border-2 border-sky-200 rounded-lg bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300" id="chartpie1">
                                    <div class="mt-7 flex justify-center text-black font-bold text-base uppercase mb-10">Material</div>  
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
    $Material = array();
    $Fund = array();
    

    for ($i = 0; $i < 7; $i++) {
        $day_timestamp = strtotime("-$i days");
        $day = date("Y-m-d", $day_timestamp);
        $days[] = $day;

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Material FROM requirements WHERE DATE(requirements.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Material[] = $result['Material'];

        $rt = mysqli_query($conn, "SELECT COUNT(*) AS Fund FROM fund WHERE DATE(fund.regDate) = '$day'");
        $result = mysqli_fetch_assoc($rt);
        $Fund[] = $result['Fund'];

    }
?>
<script>
    var chart = document.querySelector('#chartline')
    var options = {
        series: [{
            name: 'Material',
            type: 'area',
            data: <?php echo json_encode($Material); ?>
        }, {
            name: 'Fund',
            type: 'line',
            data: <?php echo json_encode($Fund); ?>
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            type: 'solid',
            opacity: [0.35, 1],
        },
        labels: ['Day1', 'Day2', 'Day3', 'Day4', 'Day5', 'Day6', 'Day7'],
        markers: {
            size: 0
        },
        xaxis: {
            categories: <?php echo json_encode($days); ?>
        },
        yaxis:{
            min:0,
            max:100
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + "";
                    }
                    return y;
                }
            }
        }
    };
    var chart = new ApexCharts(chart, options);
    chart.render();
</script> 

<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM fund JOIN users ON users.id = fund.userId WHERE fund.status IS NULL ");
    $result = mysqli_fetch_assoc($rt);
    $num_new = $result['num_new'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Approved' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Hold' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Rejected' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>
<script>
var options = {
  series: [<?php echo $num_new; ?>, <?php echo $num_Approve; ?>, <?php echo $num_Hold; ?>, <?php echo $num_Rejected; ?>],
  chart: {
    type: 'donut',
  },
  colors: [ '#008FFB','#00E396','#FEB019','#FF4560' ], 
  labels: [ 'New','Approved', 'Holded', 'Rejected'], 
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
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status IS NULL ");
    $result = mysqli_fetch_assoc($rt);
    $num_new = $result['num_new'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Approved' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Hold' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Rejected' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>
<script>
var options = {
  series: [<?php echo $num_new; ?>, <?php echo $num_Approve; ?>, <?php echo $num_Hold; ?>, <?php echo $num_Rejected; ?>],
  chart: {
    type: 'donut',
  },
  colors: [ '#008FFB','#00E396','#FEB019','#FF4560' ], 
  labels: [ 'New','Approved', 'Holded', 'Rejected'], 
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

</html>
<?php } ?>