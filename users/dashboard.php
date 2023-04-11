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
<body>
<div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiasedtext-white bg-gray-100">
            <div class="h-fixed  bg-gray-100 ml-14 md:ml-64">
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
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-blue-800 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 "
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
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-green-500 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.75 1.75h4.5v3.5h-4.5zm4 11.05l1.5 1.5l3-2.5m-9-9h-2.5v11.5h4.5m6-5V2.8h-2.5"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">Approved Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
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
                                                                fund.status='Approved'
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
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-amber-300 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M16 12c2.76 0 5-2.24 5-5s-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5m5.45 5.6c-.39-.4-.88-.6-1.45-.6h-7l-2.08-.73l.33-.94L13 16h2.8c.35 0 .63-.14.86-.37s.34-.51.34-.82c0-.54-.26-.91-.78-1.12L8.95 11H7v9l7 2l8.03-3c.01-.53-.19-1-.58-1.4M5 11H.984v11H5V11Z"/></svg>
                                                <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">Hold Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300"">
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
                                                                fund.status='Hold'
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
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-red-500 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M22.11 21.46L2.39 1.73L1.11 3l2.45 2.45C3.21 5.87 3 6.41 3 7v9c0 4.42 3.58 8 8 8c2.94 0 5.62-1.55 7.12-4l2.72 2.73l1.27-1.27M11 22c-3.31 0-6-2.69-6-6V6.91l1 .98V12h2V9.89l1 1V12h1.11l6.54 6.54A6.353 6.353 0 0 1 11 22M8 4.8L6.21 3c.38-.88 1.26-1.5 2.29-1.5c.23 0 .46.03.67.09C9.54.66 10.44 0 11.5 0c1.23 0 2.25.89 2.46 2.06c.17-.06.35-.06.54-.06A2.5 2.5 0 0 1 17 4.5v5.89c.34-.31.76-.54 1.22-.66L19 9.5c.82-.21 1.69.11 2.18.85c.38.57.4 1.31.15 1.95l-1.66 4.17l-1.54-1.54l1.37-3.48l-.5.14c-.5.12-.85.46-1 .91l-.66 1.64L15 11.8V4.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v6.3l-2-2V2.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v5.3l-2-2V4c0-.28-.22-.5-.5-.5S8 3.72 8 4v.8Z"/></svg>    <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">Rejected Requirements</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-6 ">
                                                <div class="box-border mt-5 h-25 w-40 p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300"">
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
                                                                fund.status='Rejected'
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
                            </div>
                            <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-blue-800 text-white" href="#">
                                <div class="p-5">
                                    <div class="flex gap-6 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M22.11 21.46L2.39 1.73L1.11 3l2.45 2.45C3.21 5.87 3 6.41 3 7v9c0 4.42 3.58 8 8 8c2.94 0 5.62-1.55 7.12-4l2.72 2.73l1.27-1.27M11 22c-3.31 0-6-2.69-6-6V6.91l1 .98V12h2V9.89l1 1V12h1.11l6.54 6.54A6.353 6.353 0 0 1 11 22M8 4.8L6.21 3c.38-.88 1.26-1.5 2.29-1.5c.23 0 .46.03.67.09C9.54.66 10.44 0 11.5 0c1.23 0 2.25.89 2.46 2.06c.17-.06.35-.06.54-.06A2.5 2.5 0 0 1 17 4.5v5.89c.34-.31.76-.54 1.22-.66L19 9.5c.82-.21 1.69.11 2.18.85c.38.57.4 1.31.15 1.95l-1.66 4.17l-1.54-1.54l1.37-3.48l-.5.14c-.5.12-.85.46-1 .91l-.66 1.64L15 11.8V4.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v6.3l-2-2V2.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v5.3l-2-2V4c0-.28-.22-.5-.5-.5S8 3.72 8 4v.8Z"/></svg>    
                                        <div class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                            <span class="flex ">All Complaints</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-center ml-14 mr-14 mt-5  p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
                                            <?php
                                                $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."'");
                                                $num1 = mysqli_num_rows($rt);
                                            ?>
                                            <div class="mt-4 text-4xl font-bold text-black group-hover:text-black">
                                                <?php echo htmlentities($num1);?>
                                            </div>
                                    </div>
                                </div>
                            </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-red-500 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M22.11 21.46L2.39 1.73L1.11 3l2.45 2.45C3.21 5.87 3 6.41 3 7v9c0 4.42 3.58 8 8 8c2.94 0 5.62-1.55 7.12-4l2.72 2.73l1.27-1.27M11 22c-3.31 0-6-2.69-6-6V6.91l1 .98V12h2V9.89l1 1V12h1.11l6.54 6.54A6.353 6.353 0 0 1 11 22M8 4.8L6.21 3c.38-.88 1.26-1.5 2.29-1.5c.23 0 .46.03.67.09C9.54.66 10.44 0 11.5 0c1.23 0 2.25.89 2.46 2.06c.17-.06.35-.06.54-.06A2.5 2.5 0 0 1 17 4.5v5.89c.34-.31.76-.54 1.22-.66L19 9.5c.82-.21 1.69.11 2.18.85c.38.57.4 1.31.15 1.95l-1.66 4.17l-1.54-1.54l1.37-3.48l-.5.14c-.5.12-.85.46-1 .91l-.66 1.64L15 11.8V4.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v6.3l-2-2V2.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v5.3l-2-2V4c0-.28-.22-.5-.5-.5S8 3.72 8 4v.8Z"/></svg>    <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">Not Process Complaints</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-center items-center ml-14 mr-14 mt-5  p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
                                            <?php
                                                 $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
                                                 $num1 = mysqli_num_rows($rt);
                                            ?>
                                            <div class="mt-4 text-4xl font-bold text-black group-hover:text-black">
                                                <?php echo htmlentities($num1);?>
                                            </div>
                                    </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-amber-300 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M22.11 21.46L2.39 1.73L1.11 3l2.45 2.45C3.21 5.87 3 6.41 3 7v9c0 4.42 3.58 8 8 8c2.94 0 5.62-1.55 7.12-4l2.72 2.73l1.27-1.27M11 22c-3.31 0-6-2.69-6-6V6.91l1 .98V12h2V9.89l1 1V12h1.11l6.54 6.54A6.353 6.353 0 0 1 11 22M8 4.8L6.21 3c.38-.88 1.26-1.5 2.29-1.5c.23 0 .46.03.67.09C9.54.66 10.44 0 11.5 0c1.23 0 2.25.89 2.46 2.06c.17-.06.35-.06.54-.06A2.5 2.5 0 0 1 17 4.5v5.89c.34-.31.76-.54 1.22-.66L19 9.5c.82-.21 1.69.11 2.18.85c.38.57.4 1.31.15 1.95l-1.66 4.17l-1.54-1.54l1.37-3.48l-.5.14c-.5.12-.85.46-1 .91l-.66 1.64L15 11.8V4.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v6.3l-2-2V2.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v5.3l-2-2V4c0-.28-.22-.5-.5-.5S8 3.72 8 4v.8Z"/></svg>    <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">In Process Complaints</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-center items-center ml-14 mr-14 mt-5  p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
                                            <?php
                                                $status="in process";
                                                 $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status='$status'");
                                                 $num1 = mysqli_num_rows($rt);
                                            ?>
                                            <div class="mt-4 text-4xl font-bold text-black group-hover:text-black">
                                                <?php echo htmlentities($num1);?>
                                            </div>
                                    </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-green-500 text-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex gap-6 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="amber" d="M22.11 21.46L2.39 1.73L1.11 3l2.45 2.45C3.21 5.87 3 6.41 3 7v9c0 4.42 3.58 8 8 8c2.94 0 5.62-1.55 7.12-4l2.72 2.73l1.27-1.27M11 22c-3.31 0-6-2.69-6-6V6.91l1 .98V12h2V9.89l1 1V12h1.11l6.54 6.54A6.353 6.353 0 0 1 11 22M8 4.8L6.21 3c.38-.88 1.26-1.5 2.29-1.5c.23 0 .46.03.67.09C9.54.66 10.44 0 11.5 0c1.23 0 2.25.89 2.46 2.06c.17-.06.35-.06.54-.06A2.5 2.5 0 0 1 17 4.5v5.89c.34-.31.76-.54 1.22-.66L19 9.5c.82-.21 1.69.11 2.18.85c.38.57.4 1.31.15 1.95l-1.66 4.17l-1.54-1.54l1.37-3.48l-.5.14c-.5.12-.85.46-1 .91l-.66 1.64L15 11.8V4.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v6.3l-2-2V2.5c0-.28-.22-.5-.5-.5s-.5.22-.5.5v5.3l-2-2V4c0-.28-.22-.5-.5-.5S8 3.72 8 4v.8Z"/></svg>    <div
                                                    class="h-6 flex justify-items-starttext-white font-semibold text-base uppercase">
                                                    <span class="flex ">Closed Complaints</span>
                                                </div>
                                            </div>
                                                <div class="flex justify-center items-center ml-14 mr-14 mt-5  p-4 border-1 rounded-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-300">
                                                        <div>
                                                            <?php
                                                                    $status="closed";
                                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                                                                    $num1 = mysqli_num_rows($rt);
                                                                    {?>
                                                                    <div class="mt-4 text-4xl font-bold text-black group-hover:text-black">
                                                                        <?php echo htmlentities($num1);?>
                                                                    </div>
                                                                <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                            <div class="col-span-12 mt-5">
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                    <div class= "border--200 rounded-lg bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-300  shadow-lg p-4" id="chartline"></div>
                                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                    <div class="text-white border-2 font-bold border-pink-500 rounded-lg bg-gradient-to-r from-pink-500 via-pink-200 to-pink-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-500" id="chartpie">
                                    <div class="mt-7 flex justify-center text-sky-800 font-bold text-xl uppercase mb-8">Material</div>   
                                    </div>
                                    <div class="text-white border-2 font-bold border-sky-500 rounded-lg bg-gradient-to-r from-sky-500 via-sky-200 to-sky-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-500" id="chartpie1">
                                    <div class="mt-7 flex justify-center text-pink-500 font-bold text-xl uppercase mb-8">Fund</div>  
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
    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_new FROM tblcomplaints where userId='".$_SESSION['id']."'");
    $result = mysqli_fetch_assoc($rt);
    $num_new = $result['num_new'];

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM tblcomplaints where userId='".$_SESSION['id']."' and tblcomplaints.status IS NULL ");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM tblcomplaints where userId='".$_SESSION['id']."' and tblcomplaints.status='in process' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM tblcomplaints where userId='".$_SESSION['id']."' and tblcomplaints.status='closed' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>

<script>
    var options = {
    series: [{
        name:'Total',
        colors: ['#007bff', '#00E396', '#FFA500', '#EF4444'],
        data: [<?php echo $num_new ?>, <?php echo $num_Approve ?>, <?php echo $num_Hold ?>, <?php echo $num_Rejected ?>]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            borderRadius: 4,
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: ['All', 'Not yet process', 'In process', 'closed'],
    },
    yaxis: {
        max: 100,
    },
    tooltip: {
        enabled: true,
        y: {
            formatter: function (val) { return number(val); }
        }
    }
};
var chart = new ApexCharts(document.querySelector("#chartline"), options);
chart.render();
function number(val) {
    return val + " complaints";
}
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
    var num_new = <?php echo $num_new; ?>;
    var num_Approve = <?php echo $num_Approve; ?>;
    var num_Hold = <?php echo $num_Hold; ?>;
    var num_Rejected = <?php echo $num_Rejected; ?>;

    var options = {
        series: [num_new, num_Approve, num_Hold, num_Rejected],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['New', 'Approve', 'Hold', 'Rejected'],
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

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Approve FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Approved' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Approve = $result['num_Approve'];

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Hold FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Hold' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Hold = $result['num_Hold'];

    $rt = mysqli_query($conn, "SELECT COUNT(*) AS num_Rejected FROM requirements JOIN users ON users.id = requirements.userId WHERE requirements.status='Rejected' ");
    $result = mysqli_fetch_assoc($rt);
    $num_Rejected = $result['num_Rejected'];
?>
<script>
    var num_new = <?php echo $num_new; ?>;
    var num_Approve = <?php echo $num_Approve; ?>;
    var num_Hold = <?php echo $num_Hold; ?>;
    var num_Rejected = <?php echo $num_Rejected; ?>;

    var options = {
        series: [num_new, num_Approve, num_Hold, num_Rejected],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['New', 'Approve', 'Hold', 'Rejected'],
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