<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
<?php
 $query=mysqli_query($conn,"select username from admin where username='".$_SESSION['alogin']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>

    <div>
        <nav class="fixed z-50 w-full bg-gray-800 border-b border-gray-200">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-white hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex ">
                        <p class="text-xl font-semibold text-white ml-60 ">
                            COMPLAINT MANAGEMENT SYSTEM
                        </p>

                    </div>

                    <div class="flex items-center space-x-5">
                        <p class="mr-3 text-xl font-semibold text-white">Hi &nbsp;Welcome, <?php echo htmlentities($row['username']);?> ! </p>
                        <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-white hover:bg-gray-100">

                        </button>

                        <a href="logout.php" class="hidden sm:inline-flex ml-5 text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
                            <svg class="w-8 h-8 mr-2 -ml-1 text-white svg-inline--fa fa-gem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Log Out
                        </a>
                    </div>
                </div>
            </div>


        </nav>
        <div class="flex pt-16 overflow-hidden bg-gray-800">
            <aside id="sidebar" class="fixed top-0 left-0 z-20  flex-col flex-shrink-0 hidden w-64 h-full pt-16 duration-75 lg:flex transition-width" aria-label="Sidebar">
                <div class="relative flex flex-col flex-1 min-h-0 pt-0 border-r border-gray-200 bg-sky-500">
                    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 space-y-1 bg-gray-800 divide-y">
                            <ul class="pb-2 space-y-2">
                                <li>
                                    <form action="#" method="GET" class="lg:hidden">
                                        <label for="mobile-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-sky-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg  focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                        </div>
                                    </form>
                                </li>

                                < <li>
                                    <a href="dashboard.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                        </svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li> 
                                <li>
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Manage Complaint</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="notprocess-complaint.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Not Process Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full" 
                                            value="<?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status IS NULL");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>"
									                class="label orange pull-right"><?php echo htmlentities($num1); ?>
											<?php } ?>
										</a></span>
                                        </li>
                                        <li>
                                            <a href="inprocess-complaint.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Inprocess Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full" 
                                            value="<?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status='in process'");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>"
									                class="label orange pull-right"><?php echo htmlentities($num1); ?>
											<?php } ?></a></span>
                                        </li>
                                        <li>
                                            <a href="closed-complaint.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Closed Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full" 
                                            value="<?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status='closed'");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>"
									                class="label orange pull-right"><?php echo htmlentities($num1); ?>
											<?php } ?></a></span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Requirements</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="1New-Requirements.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">New Requirements</a>
                                        </li>
                                        <li>
                                            <a href="2Approved-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Approved Requirement</a>
                                        </li>
                                        <li>
                                            <a href="3Hold-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Hold Requirement</a>
                                        </li>
                                        <li>
                                            <a href="4Rejected-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Rejected Requirement</a>
                                        </li>
                                    </ul>
                                </div>
                                </li>
                                <li>
                                    <a href="manageusers.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Manage Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="addcategory.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Category</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="addsubcategory.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                            </path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Sub-Category</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full">New</span> -->
                                    </a>
                                </li>
                                <li>
                                    <a href="adddepartment.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                            </path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Department</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full">New</span> -->
                                    </a>
                                </li>

                                <!-- <li>
                                    <a href="assetinward.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Asset Inward</span>
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="inward-outwardreport.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Inward & Outward Report</span>
                                    </a>
                                </li> -->

                                <!-- <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-sky-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                                    </a>
                                </li> -->
                                
                            </ul>
                            <div class="pt-2 space-y-2">
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Account Settings</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="userloginlog.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">User Login Log</a>
                                        </li>
                                        <li>
                                            <a href="changepassword.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-sky-500 dark:text-white dark:hover:bg-sky-500">Change Password</a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="fixed inset-0 z-10 hidden bg-white opacity-50" id="sidebarBackdrop"></div>

        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>




</body>

</html>
<?php } ?>