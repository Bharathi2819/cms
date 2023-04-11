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
error_reporting(0);
session_start();{
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

    <div>
        <nav class="fixed z-50 w-full bg-sky-800 border-b border-sky-800">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 mr-2 text-sky-800 rounded cursor-pointer lg:hidden hover:text-sky-900 hover:bg-sky-800 focus:bg-sky-800 focus:ring-2 focus:ring-sky-800">
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
                        <p class="mr-3 text-xl font-semibold text-white">Hi &nbsp;Welcome, <?php echo $_SESSION['fullName']; ?><?php echo $_SESSION['userId']; ?></p>
                        <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-sky-800 rounded-lg lg:hidden hover:text-sky-900 hover:bg-sky-800">

                        </button>

                        <a href="logout.php" class="hidden sm:inline-flex ml-5 text-white bg-pink-500 hover:bg-pink-500 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
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
                                                <svg class="w-5 h-5 text-sky-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input type="text" name="email" id="mobile-search" class="bg-sky-50 border border-sky-800 text-sky-900 text-sm rounded-lg  focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <a href="tdashboard.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 36 36"><path fill="currentColor" d="M15.85 18.69a3 3 0 1 0 4.83.85l5.92-5.81l-1.41-1.41l-5.91 5.81a3 3 0 0 0-3.43.56Z" class="clr-i-outline--badged clr-i-outline-path-1--badged"/><path fill="currentColor" d="M32.58 13a7.45 7.45 0 0 1-2.06.44a14.4 14.4 0 0 1 1.93 6.43h-3.53v2h3.53a14.43 14.43 0 0 1-3.11 7.84H6.66a14.43 14.43 0 0 1-3.11-7.84H7v-2H3.55A14.41 14.41 0 0 1 7 11.29l2.45 2.45l1.41-1.41l-2.43-2.46A14.41 14.41 0 0 1 17 6.29v3.5h2V6.3a14.41 14.41 0 0 1 3.58.7a7.52 7.52 0 0 1-.08-1a7.52 7.52 0 0 1 .09-1.09A16.49 16.49 0 0 0 5.4 31.4l.3.35h24.6l.3-.35a16.45 16.45 0 0 0 2-18.36Z" class="clr-i-outline--badged clr-i-outline-path-2--badged"/><circle cx="30" cy="6" r="5" fill="currentColor" class="clr-i-outline--badged clr-i-outline-path-3--badged clr-i-badge"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
                                    </a>
                                </li>
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><g id="galaFileCode10" fill="none" stroke="currentColor" stroke-dasharray="none" stroke-linecap="round" stroke-miterlimit="4" stroke-opacity="1"><path id="galaFileCode11" stroke-linejoin="miter" stroke-width="15.992" d="M 32,48 V 207.9236"/><path id="galaFileCode12" stroke-linejoin="round" stroke-width="15.992" d="M 224,96 V 208"/><path id="galaFileCode13" stroke-linejoin="round" stroke-width="15.992" d="m 64,16 h 80"/><path id="galaFileCode14" stroke-linejoin="miter" stroke-width="15.992" d="M 64,240 H 192"/><path id="galaFileCode15" stroke-linejoin="round" stroke-width="15.992" d="m 224,208 c 0.0874,15.98169 -16,32 -32,32"/><path id="galaFileCode16" stroke-linejoin="round" stroke-width="15.992" d="m -32,208 c -10e-7,16 -16,32 -32,32" transform="scale(-1 1)"/><path id="galaFileCode17" stroke-linejoin="round" stroke-width="15.992" d="M -32,-47.976784 C -32,-32 -48,-16.356322 -63.999997,-16.000002" transform="scale(-1)"/><path id="galaFileCode18" stroke-linejoin="round" stroke-width="15.992" d="M 223.91257,96.071779 144,16"/><path id="galaFileCode19" stroke-linejoin="round" stroke-width="15.992" d="m -144,64 c -0.0492,15.912926 -16.06452,31.999995 -32,32" transform="scale(-1 1)"/><path id="galaFileCode1a" stroke-linejoin="round" stroke-width="15.992" d="M 144,64 V 16"/><path id="galaFileCode1b" stroke-linejoin="round" stroke-width="15.992" d="m 176,96 h 48"/><path id="galaFileCode1c" stroke-linejoin="round" stroke-width="16" d="M 96,208 64,176 96,144"/><path id="galaFileCode1d" stroke-linejoin="round" stroke-width="16" d="m 128,208 32,-32 -32,-32"/></g></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>All complaints</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="tallcomplaints.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">New Complaints</a>
                                        </li>
                                       
                                        <li>
                                            <a href="tinprocesscomplaints.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">In Process Complaints</a>
                                        </li>
                                        <li>
                                            <a href="tclosedcomplaints.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Closed Complaints</a>
                                        </li>
                                    </ul>
                                </div>
                                <li>
                                    <a href="tregister-complaint.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M17 14h12m-6 14V15m-2.857 27H8a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h32a2 2 0 0 1 2 2v9.717M27 38l10.5-14.5L42 27L31 42h-4v-4Z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Complaint</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tcomplaint-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.957 9.957 0 0 1-4.708-1.175L2 22l1.176-5.29A9.966 9.966 0 0 1 2 12C2 6.477 6.477 2 12 2zm0 2a8 8 0 0 0-7.06 11.766l.35.654l-.656 2.946l2.948-.654l.653.349A7.95 7.95 0 0 0 12 20a8 8 0 0 0 0-16zm1 3v5h4v2h-6V7h2z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Complaint History</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="trequirements.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 32 32"><path fill="currentColor" d="M29.121 16.879A2.98 2.98 0 0 0 27.01 16H27a2.977 2.977 0 0 0-2.121.879l-4.901 4.901A2.994 2.994 0 0 0 17 19h-7a5.006 5.006 0 0 0-5 5v.667l-3 3.996l1.6 1.2l3.4-4.53V24a3.003 3.003 0 0 1 3-3h7a1 1 0 0 1 0 2h-4v2h4.929a3.972 3.972 0 0 0 2.828-1.172l5.536-5.535A.993.993 0 0 1 27 18h.003a1 1 0 0 1 .704 1.707l-7.414 7.414a2.98 2.98 0 0 1-2.122.879H11v2h7.171a4.966 4.966 0 0 0 3.536-1.465l7.414-7.414a2.999 2.999 0 0 0 0-4.242zm-7.535-8.293L18 12V2h-2v10l-3.586-3.414L11 10l6 6l6-6l-1.414-1.414z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Requirement</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="trequirements-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="currentColor" d="M3 10V4h2v2.35q1.275-1.6 3.113-2.475T12 3q3.75 0 6.375 2.625T21 12h-2q0-2.925-2.038-4.963T12 5q-1.725 0-3.225.8T6.25 8H9v2H3Zm.05 3H5.1q.3 2.325 1.913 3.938t3.862 1.962l1.2 2.1q-3.45 0-6.05-2.287T3.05 13Zm10.3 1.75L11 12.4V7h2v4.6l1.4 1.4l-1.05 1.75ZM17.975 24l-.3-1.5q-.3-.125-.563-.263t-.537-.337l-1.45.45l-1-1.7l1.15-1q-.05-.325-.05-.65t.05-.65l-1.15-1l1-1.7l1.45.45q.275-.2.537-.337t.563-.263l.3-1.5h2l.3 1.5q.3.125.575.288t.525.362l1.45-.5l1 1.75l-1.15 1q.05.325.05.625t-.05.625l1.15 1l-1 1.7l-1.45-.45q-.275.2-.537.338t-.563.262l-.3 1.5h-2Zm1-3q.825 0 1.413-.588T20.975 19q0-.825-.588-1.413T18.976 17q-.825 0-1.413.588T16.976 19q0 .825.588 1.413t1.412.587Z"/></svg>
                                  
                                </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Material History</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tfund-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="currentColor" d="M4 19V8v11Zm0 2q-.825 0-1.413-.588T2 19V8q0-.825.588-1.413T4 6h4V4q0-.825.588-1.413T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v4.275q-.45-.325-.95-.563T20 11.3V8H4v11h7.075q.075.525.225 1.025t.375.975H4Zm6-15h4V4h-4v2Zm8 17q-2.075 0-3.538-1.463T13 18q0-2.075 1.463-3.538T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23Zm1.65-2.65l.7-.7l-1.85-1.85V15h-1v3.2l2.15 2.15Z"/> </svg>  
                                        <span class="flex-1 ml-3 whitespace-nowrap">Fund History</span>
                                    </a>
                                </li> 
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><g id="galaFileCode10" fill="none" stroke="currentColor" stroke-dasharray="none" stroke-linecap="round" stroke-miterlimit="4" stroke-opacity="1"><path id="galaFileCode11" stroke-linejoin="miter" stroke-width="15.992" d="M 32,48 V 207.9236"/><path id="galaFileCode12" stroke-linejoin="round" stroke-width="15.992" d="M 224,96 V 208"/><path id="galaFileCode13" stroke-linejoin="round" stroke-width="15.992" d="m 64,16 h 80"/><path id="galaFileCode14" stroke-linejoin="miter" stroke-width="15.992" d="M 64,240 H 192"/><path id="galaFileCode15" stroke-linejoin="round" stroke-width="15.992" d="m 224,208 c 0.0874,15.98169 -16,32 -32,32"/><path id="galaFileCode16" stroke-linejoin="round" stroke-width="15.992" d="m -32,208 c -10e-7,16 -16,32 -32,32" transform="scale(-1 1)"/><path id="galaFileCode17" stroke-linejoin="round" stroke-width="15.992" d="M -32,-47.976784 C -32,-32 -48,-16.356322 -63.999997,-16.000002" transform="scale(-1)"/><path id="galaFileCode18" stroke-linejoin="round" stroke-width="15.992" d="M 223.91257,96.071779 144,16"/><path id="galaFileCode19" stroke-linejoin="round" stroke-width="15.992" d="m -144,64 c -0.0492,15.912926 -16.06452,31.999995 -32,32" transform="scale(-1 1)"/><path id="galaFileCode1a" stroke-linejoin="round" stroke-width="15.992" d="M 144,64 V 16"/><path id="galaFileCode1b" stroke-linejoin="round" stroke-width="15.992" d="m 176,96 h 48"/><path id="galaFileCode1c" stroke-linejoin="round" stroke-width="16" d="M 96,208 64,176 96,144"/><path id="galaFileCode1d" stroke-linejoin="round" stroke-width="16" d="m 128,208 32,-32 -32,-32"/></g></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Requirement Request</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="tNew-Requirements.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">New Requirements</a>
                                        </li>
                                        <li>
                                            <a href="tApproved-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Approved Requirement</a>
                                        </li>
                                        <li>
                                            <a href="tHolded-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Holded Requirement</a>
                                        </li>
                                        <li>
                                            <a href="tRejected-Requirement.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Rejected Requirement</a>
                                        </li>
                                    </ul>
                                </div>
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
                                        <span><a href="tprofile.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Profile</a>
                                        </li>
                                        <li>
                                            <a href="tchangepassword.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                </div>
            </aside>
            <div class="fixed inset-0 z-10 hidden bg-sky-900 opacity-50" id="sidebarBackdrop"></div>

        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>
</body>
</html>
<?php } ?>