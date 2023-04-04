<?php
session_start();
//error_reporting(0);
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
                            <div class="col-span-12 mt-8">
                                <div class="flex items-center h-10 intro-y">
                                    <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>
                                </div>
                                <div class="mr-20">
                                <ul class="flex items-center justify-end">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='dashboard.php'" checked class="px-4 py-2 text-sm font-semibold  text-black bg-gradient-to-r from-white-100 via-white-200 to-white-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-white-200 dark:focus:ring-white-300 bg-white border-2 border-white-400 rounded-l-lg ">
                                     Complaints
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='Fdashboard.php'" class="px-6 py-2 text-sm font-semibold text-black bg-gradient-to-r from-sky-100 via-sky-200 rounded-r-md to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200   dark:focus:text-sky  dark:focus:ring-sky-300 bg-sky border-2 border-sky-400 ">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">New Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-300">
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
                                                                AND requirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                                                AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-1 15l-3-3 1.4-1.4L11 14.2l5.6-5.6L18 8l-8 8z"/>
                                            </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Approved Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-green-100 via-green-200 to-green-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-300">
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
                                                                requirements.status='Approved' 
                                                                AND requirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                                                fund.status='Approved'
                                                                AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Hold Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:focus:ring-yellow-300">
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
                                                                requirements.status ='Hold'
                                                                AND requirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                                                fund.status='Hold'
                                                                AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-black font-semibold text-base uppercase">
                                                    <span class="flex ">Rejected Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-red-100 via-red-200 to-red-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-300">
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
                                                                AND requirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                                                AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");;
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
                                    <div class="mt-7 flex justify-center text-black font-semibold text-base uppercase">Material</div>   
                                    </div>
                                    <div class="text-white border-2 border-sky-200 rounded-lg bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300" id="chartpie1">
                                    <div class="mt-7 flex justify-center text-black font-semibold text-base uppercase">Fund</div>  
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
    <script>
    <?php
       $today = date("Y-m-d");
       $last_week = date("Y-m-d", strtotime("-7 days"));
       
       $rt_fund = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM fund JOIN users ON users.id = fund.userId WHERE fund.status IS NULL AND fund.departmentcode = '" . $_SESSION['departmentcode'] . "' AND  users.role != 'admin' AND fund.regDate BETWEEN '" . $last_week . "' AND '" . $today . "'");
       $result_fund = mysqli_fetch_assoc($rt_fund);
       $num_new_fund = $result_fund['num_new'];
       
       $rt_material = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status IS NULL AND requirements.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin' AND requirements.regDate BETWEEN '" . $last_week . "' AND '" . $today . "'");
       $result_material = mysqli_fetch_assoc($rt_material);
       $num_new_material = $result_material['num_new'];
       
    ?>

    var chart = document.querySelector('#chartline')
    var options = {
        series: [{
            name: 'Material',
            type: 'area',
            data: [44, 55, 31, 47, 31,<?php echo $num_new_material ?>, <?php echo $num_new_material ?>]
        }, {
            name: 'Fund',
            type: 'line',
            data: [<?php echo $num_new_fund ?>, <?php echo $num_new_fund ?>, <?php echo $num_new_fund ?>,<?php echo $num_new_fund ?>, <?php echo $num_new_fund ?>, <?php echo $num_new_fund ?>, <?php echo $num_new_fund ?>]
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
        yaxis: [{
            title: {
                text: '',
            },
        },
        {
            opposite: true,
            title: {
                text: '',
            },
        },
        ],
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;
                }
            }
        }
    };
    var chart = new ApexCharts(chart, options);
    chart.render();
</script>
<script>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM fund JOIN users ON users.id = fund.userId WHERE fund.status IS NULL AND fund.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_new = $result['num_new'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Approved' AND fund.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Hold' AND fund.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM fund JOIN users ON users.id = fund.userId WHERE fund.status='Rejected' AND fund.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>
var chart = document.querySelector('#chartpie')
var num_new = <?php echo $num_new; ?>;
var num_Approve = <?php echo $num_Approve; ?>;
var num_Hold = <?php echo $num_Hold; ?>;
var num_Rejected = <?php echo $num_Rejected; ?>;
var options = {
    series: [num_new, num_Approve, num_Hold, num_Rejected],
    chart: {
        height: 350,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'TOTAL',
                    formatter: function(w) {
                        var value = 0;
                        $.ajax({
                            url: 'get_realtime_value.php',
                            async: false,
                            success: function(data) {
                                value = parseInt(data);
                            }
                        });
                        return value;
                    }
                }
            }
        }
    },
    labels: ['New', 'Approved', 'Hold', 'Rejected'],
};
var chart = new ApexCharts(chart, options);
chart.render();
</script>
<script>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status IS NULL AND requirements.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_new = $result['num_new'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Approved' AND requirements.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Hold' AND requirements.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];
?>
<?php
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Rejected' AND requirements.departmentcode = '" . $_SESSION['departmentcode'] . "' AND users.role != 'admin'");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>
var chart = document.querySelector('#chartpie1')
var num_new = <?php echo $num_new; ?>;
var num_Approve = <?php echo $num_Approve; ?>;
var num_Hold = <?php echo $num_Hold; ?>;
var num_Rejected = <?php echo $num_Rejected; ?>;
var options = {
    series: [num_new, num_Approve, num_Hold, num_Rejected],
    chart: {
        height: 350,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'TOTAL',
                    formatter: function(w) {
                        var value = 0;
                        $.ajax({
                            url: 'get_realtime_value.php',
                            async: false,
                            success: function(data) {
                                value = parseInt(data);
                            }
                        });
                        return value;
                    }
                }
            }
        }
    },
    labels: ['New', 'Approved', 'Hold', 'Rejected'],
};
var chart = new ApexCharts(chart, options);
chart.render();
</script>
</body>

</html>

</html>
<?php } ?>