<?php
//error_reporting(0);
include("include/config.php");
include('./include/sidebar.php');
include('./include/header.php');
session_start();{
if ($_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}
?>
<style>
  .front, .back {
    width: 100%;
    height: 100%;
    position: absolute;
    backface-visibility: hidden;
  }
  .front {
    z-index: 2;
  }
  .back {
    transform: rotateY(180deg);
  }
  .businesscard:hover .front {
    transform: rotateY(-180deg);
  }
  .businesscard:hover .back {
    transform: rotateY(0);
  }
  .card-container {
    perspective: 1000px;
    perspective-origin: center;
  }
</style>
<body>
<div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiasedtext-white bg-gray-100">
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
                                    <h2 class="mr-5 text-lg font-medium truncate"></h2>
                                </div>


                                <div class="card-container perspective-700">
                                    <div class="businesscard rounded-lg flex items-center justify-center w-96 h-60 transition-transform duration-500 transform-gpu hover:-rotate-y-180">

                                <div class="front flex items-center justify-center w-96 h-60 transition-transform duration-500 transform-gpu hover:-rotate-y-180">
                                    <a class=" transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-gray-800 text-white">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-white font-semibold text-base uppercase">
                                                    <span class="flex ">All Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-amber-200 via-amber-300 to-amber-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-400">
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
                                                                <div class="mt-4 text-4xl font-bold  text-black group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-8 text-base font-bold text-black">Material</div>
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
                                                                ");;
                                                                $num1 = mysqli_num_rows($rt);
                                                                {?>
                                                                <div class="mt-4 text-4xl font-bold  text-black group-hover:text-black flex ml-12">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                                <div class="mt-1 ml-10 text-base font-bold text-black">Fund</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="back flex items-center justify-center transition-transform duration-500 transform-gpu hover:-rotate-y-180">
                                    <a class=" transform  hover:scale-105 transition duration-300 shadow-xl w-96  rounded-lg intro-y justify-center bg-gray-800 text-white">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="h-6 flex justify-items-start text-white font-semibold text-base uppercase">
                                                    <span class="flex ">All complaints</span>
                                                </div>
                                            </div>
                                                <div class="box-border  mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-amber-200 via-amber-300 to-amber-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-400">
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
                                                                <div class="mt-4 text-4xl font-bold justify-center text-black group-hover:text-black flex ">
                                                                    <?php echo htmlentities($num1);?>
                                                                </div>
                                                            <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </a>
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
  <?php } ?>