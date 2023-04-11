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
        <nav class="fixed z-50 w-full bg-sky-800 border-b border-sky-800">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 mr-2 text-sky-800 rounded cursor-pointer lg:hidden hover:text-white hover:bg-sky-800 focus:bg-sky-800 focus:ring-2 focus:ring-sky-800">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex">
                        <p class="text-xl ml-60 font-semibold text-white">
                            COMPLAINT MANAGEMENT SYSTEM
                        </p>

                    </div>

                    <div class="flex items-center space-x-5">
                        <p class="mr-3 text-xl font-semibold text-white">Hi &nbsp;Welcome, <?php echo htmlentities($row['username']);?> ! </p>
                        <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-sky-800 rounded-lg lg:hidden hover:text-white hover:bg-sky-800">

                        </button>

                        <a href="logout.php" class="hidden sm:inline-flex ml-5 text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
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
        <div class="flex pt-16 overflow-hidden bg-sky-800">
            <aside id="sidebar" class="fixed top-0 left-0 z-20  flex-col flex-shrink-0 hidden w-64 h-full pt-16 duration-75 lg:flex transition-width" aria-label="Sidebar">
                <div class="relative flex flex-col flex-1 min-h-0 pt-0 border-r border-sky-800 bg-pink-500">
                    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 space-y-1 bg-sky-800 divide-y">
                            <ul class="pb-2 space-y-2">
                                <li>
                                    <form action="#" method="GET" class="lg:hidden">
                                        <label for="mobile-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input type="text" name="email" id="mobile-search" class="bg-blue-50 border border-sky-800 text-white text-sm rounded-lg  focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                        </div>
                                    </form>
                                </li>

                                <li>
                                    <a href="dashboard.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3h8v6h-8ZM3 13V3h8v10H3Zm10 8V11h8v10h-8ZM3 21v-6h8v6H3Z"/></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li> 
                                <li>
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M19 20V3H6V1h15v19h-2ZM3 23V5h14v18l-7-3l-7 3Z"/></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Manage Complaint</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example" class="hidden py-2 space-y-2 ml-5">
                                        <li>
                                            <a href="notprocess-complaint.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Not Process Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-red-600 rounded-lg" 
                                            value="<?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status IS NULL");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>"
									                class="bg-red-200"><?php echo htmlentities($num1); ?>
											<?php } ?>
										</a></span>
                                        </li>
                                        <li>
                                            <a href="inprocess-complaint.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Inprocess Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-yellow-600 rounded-lg" 
                                            value="<?php
                                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints WHERE status='in process'");
                                                    $num1 = mysqli_num_rows($rt);
                                                    {?>"
									                class="label orange pull-right"><?php echo htmlentities($num1); ?>
											<?php } ?></a></span>
                                        </li>
                                        <li>
                                            <a href="closed-complaint.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Closed Complaint
                                            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-green-600 rounded-lg" 
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
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 32 32"><path fill="currentColor" d="M29.121 16.879A2.98 2.98 0 0 0 27.01 16H27a2.977 2.977 0 0 0-2.121.879l-4.901 4.901A2.994 2.994 0 0 0 17 19h-7a5.006 5.006 0 0 0-5 5v.667l-3 3.996l1.6 1.2l3.4-4.53V24a3.003 3.003 0 0 1 3-3h7a1 1 0 0 1 0 2h-4v2h4.929a3.972 3.972 0 0 0 2.828-1.172l5.536-5.535A.993.993 0 0 1 27 18h.003a1 1 0 0 1 .704 1.707l-7.414 7.414a2.98 2.98 0 0 1-2.122.879H11v2h7.171a4.966 4.966 0 0 0 3.536-1.465l7.414-7.414a2.999 2.999 0 0 0 0-4.242zm-7.535-8.293L18 12V2h-2v10l-3.586-3.414L11 10l6 6l6-6l-1.414-1.414z"/></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Requirements</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example3" class="hidden py-2 space-y-2 ml-5">
                                        <li>
                                            <a href="1New-Requirements.php" class="flex items-center w-full  p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">New Requirements</a>
                                        </li>
                                        <li>
                                            <a href="2Approved-Requirement.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Approved Requirement</a>
                                        </li>
                                        <li>
                                            <a href="3Hold-Requirement.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Hold Requirement</a>
                                        </li>
                                        <li>
                                            <a href="4Rejected-Requirement.php" class="flex items-center w-full p-2 text-sm font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Rejected Requirement</a>
                                        </li>
                                    </ul>
                                </div>
                                </li>
                                <li>
                                    <a href="manageusers.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 12q-1.65 0-2.825-1.175T6 8q0-1.65 1.175-2.825T10 4q1.65 0 2.825 1.175T14 8q0 1.65-1.175 2.825T10 12Zm-8 8v-2.8q0-.825.425-1.55t1.175-1.1q1.275-.65 2.875-1.1T10 13h.35q.15 0 .3.05q-.2.45-.338.938T10.1 15H10q-1.775 0-3.187.45t-2.313.9q-.225.125-.363.35T4 17.2v.8h6.3q.15.525.4 1.038t.55.962H2Zm14 1l-.3-1.5q-.3-.125-.563-.263T14.6 18.9l-1.45.45l-1-1.7l1.15-1q-.05-.35-.05-.65t.05-.65l-1.15-1l1-1.7l1.45.45q.275-.2.538-.337t.562-.263L16 11h2l.3 1.5q.3.125.563.275t.537.375l1.45-.5l1 1.75l-1.15 1q.05.3.05.625t-.05.625l1.15 1l-1 1.7l-1.45-.45q-.275.2-.537.338t-.563.262L18 21h-2Zm1-3q.825 0 1.413-.588T19 16q0-.825-.588-1.413T17 14q-.825 0-1.413.588T15 16q0 .825.588 1.413T17 18Zm-7-8q.825 0 1.413-.588T12 8q0-.825-.588-1.413T10 6q-.825 0-1.413.588T8 8q0 .825.588 1.413T10 10Zm0-2Zm.3 10Z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Manage Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="addcategory.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M14 25h14v2H14zm-6.83 1l-2.58 2.58L6 30l4-4l-4-4l-1.42 1.41L7.17 26zM14 15h14v2H14zm-6.83 1l-2.58 2.58L6 20l4-4l-4-4l-1.42 1.41L7.17 16zM14 5h14v2H14zM7.17 6L4.59 8.58L6 10l4-4l-4-4l-1.42 1.41L7.17 6z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Category</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="addsubcategory.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M20 8H4V6h16Zm-2-6H6v2h12Zm-7.688 19.1l-3.3-3.3l1.4-1.4l1.9 1.9l5.3-5.3l1.4 1.4Z"/><path fill="currentColor" d="M22 10H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V12a2 2 0 0 0-2-2Zm0 12H2V12h20Z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Sub-Category</span>
                                        
                                    </a>
                                </li>  
                                <li>
                                    <a href="adddepartment.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M15 6a3.001 3.001 0 0 1-2 2.83V11h3a3 3 0 0 1 3 3v1.17a3.001 3.001 0 1 1-2 0V14a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1.17a3.001 3.001 0 1 1-2 0V14a3 3 0 0 1 3-3h3V8.83A3.001 3.001 0 1 1 15 6Zm-3-1a1 1 0 1 0 0 2a1 1 0 0 0 0-2ZM6 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2Zm12 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2Z"/></g></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Department</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-sky-800 rounded-full">New</span> -->
                                    </a>
                                </li>
                                <li>
                                    <a href="addfacility.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M13 6.26a1 1 0 1 1-2-.001a1 1 0 0 1 2 0Zm.032-3.924a1.751 1.751 0 0 0-2.064 0L3.547 7.75c-.978.712-.473 2.258.736 2.258H4.5v5.796c-.89.455-1.5 1.38-1.5 2.448v1.5a.75.75 0 0 0 .75.749H11v-1.499H4.5v-.75c0-.69.56-1.249 1.25-1.249H11V16.5c0-.354.074-.691.207-.997H9.5v-5.496h1.75v5.402a2.507 2.507 0 0 1 1.5-1.295v-4.107h1.75v1.543c.375-.192.8-.3 1.25-.3H16v-1.243h2v1.243h1.25c.084 0 .168.004.25.011v-1.254h.217c1.21 0 1.713-1.546.736-2.258l-7.421-5.413Zm-1.18 1.211a.25.25 0 0 1 .295 0l6.803 4.96H5.05l6.803-4.96ZM6 15.503v-5.496h2v5.496H6ZM14 15h-.5a1.5 1.5 0 0 0-1.5 1.5V18h2.5v-.25a.75.75 0 0 1 1.5 0V18h3v-.25a.75.75 0 0 1 1.5 0V18H23v-1.5a1.5 1.5 0 0 0-1.5-1.5H21v-1a1.75 1.75 0 0 0-1.75-1.75h-3.5A1.75 1.75 0 0 0 14 14v1Zm1.5-1a.25.25 0 0 1 .25-.25h3.5a.25.25 0 0 1 .25.25v1h-4v-1Zm-2 9a1.5 1.5 0 0 1-1.5-1.5v-2h2.5v.75a.75.75 0 0 0 1.5 0v-.75h3v.75a.75.75 0 0 0 1.5 0v-.75H23v2a1.5 1.5 0 0 1-1.5 1.5h-8Z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Facility</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-sky-800 rounded-full">New</span> -->
                                    </a>
                                </li>

                                <!-- <li>
                                    <a href="assetinward.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-sky-800 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Asset Inward</span>
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="inward-outwardreport.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-sky-800 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Inward & Outward Report</span>
                                    </a>
                                </li> -->

                                <!-- <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                        <svg class="flex-shrink-0 w-6 h-6 text-sky-800 transition duration-75 group-hover:text-white"
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
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" viewBox="0 0 36 36"><path fill="currentColor" d="M14.68 14.81a6.76 6.76 0 1 1 6.76-6.75a6.77 6.77 0 0 1-6.76 6.75Zm0-11.51a4.76 4.76 0 1 0 4.76 4.76a4.76 4.76 0 0 0-4.76-4.76Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M16.42 31.68A2.14 2.14 0 0 1 15.8 30H4v-5.78a14.81 14.81 0 0 1 11.09-4.68h.72a2.2 2.2 0 0 1 .62-1.85l.12-.11c-.47 0-1-.06-1.46-.06A16.47 16.47 0 0 0 2.2 23.26a1 1 0 0 0-.2.6V30a2 2 0 0 0 2 2h12.7Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M26.87 16.29a.37.37 0 0 1 .15 0a.42.42 0 0 0-.15 0Z" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="m33.68 23.32l-2-.61a7.21 7.21 0 0 0-.58-1.41l1-1.86A.38.38 0 0 0 32 19l-1.45-1.45a.36.36 0 0 0-.44-.07l-1.84 1a7.15 7.15 0 0 0-1.43-.61l-.61-2a.36.36 0 0 0-.36-.24h-2.05a.36.36 0 0 0-.35.26l-.61 2a7 7 0 0 0-1.44.6l-1.82-1a.35.35 0 0 0-.43.07L17.69 19a.38.38 0 0 0-.06.44l1 1.82a6.77 6.77 0 0 0-.63 1.43l-2 .6a.36.36 0 0 0-.26.35v2.05A.35.35 0 0 0 16 26l2 .61a7 7 0 0 0 .6 1.41l-1 1.91a.36.36 0 0 0 .06.43l1.45 1.45a.38.38 0 0 0 .44.07l1.87-1a7.09 7.09 0 0 0 1.4.57l.6 2a.38.38 0 0 0 .35.26h2.05a.37.37 0 0 0 .35-.26l.61-2.05a6.92 6.92 0 0 0 1.38-.57l1.89 1a.36.36 0 0 0 .43-.07L32 30.4a.35.35 0 0 0 0-.4l-1-1.88a7 7 0 0 0 .58-1.39l2-.61a.36.36 0 0 0 .26-.35v-2.1a.36.36 0 0 0-.16-.35ZM24.85 28a3.34 3.34 0 1 1 3.33-3.33A3.34 3.34 0 0 1 24.85 28Z" class="clr-i-outline clr-i-outline-path-4"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Account Settings</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="userloginlog.php" class="ml-5 flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">User Login Log</a>
                                        </li>
                                        <li>
                                            <a href="changepassword.php" class="ml-5 flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-4 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Change Password</a>
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