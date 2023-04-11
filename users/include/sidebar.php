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
if ($_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}
?>

    <div>
        <nav class="fixed z-50 w-full bg-sky-800 border-b border-sky-800">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 mr-2 text-sky-800 rounded cursor-pointer lg:hidden hover:text-sky-800 hover:bg-sky-800 focus:bg-sky-800 focus:ring-2 focus:ring-sky-800">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- <div>
                            <img class="bg-white rounded-lg " src="https://res.cloudinary.com/drywqd3hf/image/upload/v1675425966/care_1_vroxw3.png" alt="logo" />
                        </div> -->
                    </div>

                    <div class="flex ">
                        <p class="text-xl font-semibold text-white ml-60 ">
                            COMPLAINT MANAGEMENT SYSTEM
                        </p>

                    </div>

                    <div class="flex items-center space-x-5">
                        <p class="mr-3 text-xl font-semibold text-white">Hi &nbsp;Welcome, <?php echo $_SESSION['fullName']; ?> <?php echo $_SESSION['emp_id']; ?></p>
                        <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-sky-800 rounded-lg lg:hidden hover:text-sky-800 hover:bg-sky-800">

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
                                            <input type="text" name="email" id="mobile-search" class="bg-sky-50 border border-sky-800 text-sky-800 text-sm rounded-lg  focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                                        </div>
                                    </form>
                                </li>

                                <!-- <li>
                                    <a href="branchmaster.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group">
                                        <svg class="w-6 h-6 text-sky-800 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                        </svg>
                                        <span class="ml-3">Branch Master</span>
                                    </a>
                                </li> -->

                                <li>
                                    <a href="dashboard.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 36 36"><path fill="currentColor" d="M15.85 18.69a3 3 0 1 0 4.83.85l5.92-5.81l-1.41-1.41l-5.91 5.81a3 3 0 0 0-3.43.56Z" class="clr-i-outline--badged clr-i-outline-path-1--badged"/><path fill="currentColor" d="M32.58 13a7.45 7.45 0 0 1-2.06.44a14.4 14.4 0 0 1 1.93 6.43h-3.53v2h3.53a14.43 14.43 0 0 1-3.11 7.84H6.66a14.43 14.43 0 0 1-3.11-7.84H7v-2H3.55A14.41 14.41 0 0 1 7 11.29l2.45 2.45l1.41-1.41l-2.43-2.46A14.41 14.41 0 0 1 17 6.29v3.5h2V6.3a14.41 14.41 0 0 1 3.58.7a7.52 7.52 0 0 1-.08-1a7.52 7.52 0 0 1 .09-1.09A16.49 16.49 0 0 0 5.4 31.4l.3.35h24.6l.3-.35a16.45 16.45 0 0 0 2-18.36Z" class="clr-i-outline--badged clr-i-outline-path-2--badged"/><circle cx="30" cy="6" r="5" fill="currentColor" class="clr-i-outline--badged clr-i-outline-path-3--badged clr-i-badge"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="register-complaint.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="currentColor" d="M22 9V7h-2v2h-2v2h2v2h2v-2h2V9zM8 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 1c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm4.51-8.95C13.43 5.11 14 6.49 14 8s-.57 2.89-1.49 3.95C14.47 11.7 16 10.04 16 8s-1.53-3.7-3.49-3.95zm4.02 9.78C17.42 14.66 18 15.7 18 17v3h2v-3c0-1.45-1.59-2.51-3.47-3.17z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Complaint</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="complaint-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 256 256"><g id="galaFileCode10" fill="none" stroke="currentColor" stroke-dasharray="none" stroke-linecap="round" stroke-miterlimit="4" stroke-opacity="1"><path id="galaFileCode11" stroke-linejoin="miter" stroke-width="15.992" d="M 32,48 V 207.9236"/><path id="galaFileCode12" stroke-linejoin="round" stroke-width="15.992" d="M 224,96 V 208"/><path id="galaFileCode13" stroke-linejoin="round" stroke-width="15.992" d="m 64,16 h 80"/><path id="galaFileCode14" stroke-linejoin="miter" stroke-width="15.992" d="M 64,240 H 192"/><path id="galaFileCode15" stroke-linejoin="round" stroke-width="15.992" d="m 224,208 c 0.0874,15.98169 -16,32 -32,32"/><path id="galaFileCode16" stroke-linejoin="round" stroke-width="15.992" d="m -32,208 c -10e-7,16 -16,32 -32,32" transform="scale(-1 1)"/><path id="galaFileCode17" stroke-linejoin="round" stroke-width="15.992" d="M -32,-47.976784 C -32,-32 -48,-16.356322 -63.999997,-16.000002" transform="scale(-1)"/><path id="galaFileCode18" stroke-linejoin="round" stroke-width="15.992" d="M 223.91257,96.071779 144,16"/><path id="galaFileCode19" stroke-linejoin="round" stroke-width="15.992" d="m -144,64 c -0.0492,15.912926 -16.06452,31.999995 -32,32" transform="scale(-1 1)"/><path id="galaFileCode1a" stroke-linejoin="round" stroke-width="15.992" d="M 144,64 V 16"/><path id="galaFileCode1b" stroke-linejoin="round" stroke-width="15.992" d="m 176,96 h 48"/><path id="galaFileCode1c" stroke-linejoin="round" stroke-width="16" d="M 96,208 64,176 96,144"/><path id="galaFileCode1d" stroke-linejoin="round" stroke-width="16" d="m 128,208 32,-32 -32,-32"/></g></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Complaint History</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="requirements.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 100 100"><path id="gisLayerAddO0" fill="currentColor" fill-opacity="1" fill-rule="nonzero" stroke="none" stroke-dasharray="none" stroke-dashoffset="0" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="4" stroke-opacity="1" stroke-width="7" d="M80.5 0c-7.145 0-13.252 4.246-15.977 10.357H28.135a3.5 3.5 0 0 0-2.668 1.235L.832 40.607c-1.93 2.275-.313 5.767 2.67 5.766l93-.064c2.981-.003 4.595-3.493 2.666-5.766l-7.87-9.272A17.428 17.428 0 0 0 98 17.5C98 7.805 90.195 0 80.5 0zM77 5h7v9h9v7h-9v9h-7v-9h-9v-7h9V5zM29.754 17.357h33.254c0 .048-.008.095-.008.143C63 27.195 70.805 35 80.5 35c1.492 0 2.93-.205 4.31-.553l4.131 4.867l-77.873.053l18.686-22.01zM89.91 51.313l-9.178.007l8.211 9.67l-77.875.053l8.22-9.682l-9.188.008L.832 62.283c-1.93 2.275-.313 5.767 2.67 5.766l93-.065c2.981-.002 4.595-3.492 2.666-5.765L89.91 51.312zm0 21.593l-9.178.008l8.211 9.67l-77.875.053l8.22-9.682l-9.188.008L.832 83.877c-1.93 2.274-.313 5.767 2.67 5.766l93-.065c2.981-.002 4.595-3.493 2.666-5.766L89.91 72.906z" color="currentColor" color-interpolation="sRGB" color-rendering="auto" display="inline" opacity="1" vector-effect="none" visibility="visible"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Add Requirement</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="requirements-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 16 16"><path fill="currentColor" d="M12 7V5l-1.2-.4c-.1-.3-.2-.7-.4-1l.6-1.2l-1.5-1.3l-1.1.5c-.3-.2-.6-.3-1-.4L7 0H5l-.4 1.2c-.3.1-.7.2-1 .4l-1.1-.5l-1.4 1.4l.6 1.2c-.2.3-.3.6-.4 1L0 5v2l1.2.4c.1.3.2.7.4 1l-.5 1.1l1.4 1.4l1.2-.6c.3.2.6.3 1 .4L5 12h2l.4-1.2c.3-.1.7-.2 1-.4l1.2.6L11 9.6l-.6-1.2c.2-.3.3-.6.4-1L12 7zM3 6c0-1.7 1.3-3 3-3s3 1.3 3 3s-1.3 3-3 3s-3-1.3-3-3z"/><path fill="currentColor" d="M7.5 6a1.5 1.5 0 1 1-3.001-.001A1.5 1.5 0 0 1 7.5 6zM16 3V2h-.6c0-.2-.1-.4-.2-.5l.4-.4l-.7-.7l-.4.4c-.2-.1-.3-.2-.5-.2V0h-1v.6c-.2 0-.4.1-.5.2l-.4-.4l-.7.7l.4.4c-.1.2-.2.3-.2.5H11v1h.6c0 .2.1.4.2.5l-.4.4l.7.7l.4-.4c.2.1.3.2.5.2V5h1v-.6c.2 0 .4-.1.5-.2l.4.4l.7-.7l-.4-.4c.1-.2.2-.3.2-.5h.6zm-2.5.5c-.6 0-1-.4-1-1s.4-1 1-1s1 .4 1 1s-.4 1-1 1zm1.9 8.3c-.1-.3-.2-.6-.4-.9l.3-.6l-.7-.7l-.5.4c-.3-.2-.6-.3-.9-.4L13 9h-1l-.2.6c-.3.1-.6.2-.9.4l-.6-.3l-.7.7l.3.6c-.2.3-.3.6-.4.9L9 12v1l.6.2c.1.3.2.6.4.9l-.3.6l.7.7l.6-.3c.3.2.6.3.9.4l.1.5h1l.2-.6c.3-.1.6-.2.9-.4l.6.3l.7-.7l-.4-.5c.2-.3.3-.6.4-.9l.6-.2v-1l-.6-.2zM12.5 14c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5s1.5.7 1.5 1.5s-.7 1.5-1.5 1.5z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Material History</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-sky-800 rounded-full">New</span> -->
                                    </a>
                                </li>
                                <li>
                                    <a href="fund-history.php" class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-pink-500 group ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 16 16"><path fill="currentColor" d="M10.5 0C7.46 0 5 .88 5 2v2c-3 .1-5 .94-5 2v6c0 1.09 2.46 2 5.5 2h.067c.732 0 1.45-.055 2.153-.16c.698 1.305 2.094 2.158 3.69 2.158a4.382 4.382 0 0 0 4.224-3.217c.209-.199.344-.442.367-.717V2c0-1.12-2.46-2-5.5-2zm-5 5C8 5 10 5.45 10 6S8 7 5.5 7S1 6.55 1 6s2-1 4.5-1zm0 8c-2.71 0-4.25-.71-4.5-1v-.8a10.405 10.405 0 0 0 4.522.799c.508-.001 1.03-.03 1.544-.085c-.043.371.022.712.123 1.037c-.452.021-.967.051-1.488.051L5.49 13zm1.57-2.09c-.467.057-1.008.09-1.556.09H5.5c-2.709 0-4.249-.71-4.499-1v-.84a10.41 10.41 0 0 0 4.518.84a14.496 14.496 0 0 0 1.897-.128c-.197.306-.291.654-.342 1.015zM5.5 9C2.79 9 1.25 8.29 1 8v-.9a10.41 10.41 0 0 0 4.518.84a10.548 10.548 0 0 0 4.551-.866l-.068.366a4.397 4.397 0 0 0-1.935 1.304C7.314 8.909 6.455 9 5.575 9h-.077zm5.91 6a3.41 3.41 0 1 1 0-6.82a3.41 3.41 0 0 1 0 6.82zM15 8c-.175.167-.385.3-.617.386c-.288-.244-.6-.46-.938-.634a7.615 7.615 0 0 0 1.593-.61L15 8zm0-2c-.24.31-1.61.94-4 1V6h.011a9.963 9.963 0 0 0 4.053-.855L15 6zm0-2c-.25.33-1.79 1-4.5 1h-.23a9.073 9.073 0 0 0-4.169-1H6v-.9a10.41 10.41 0 0 0 4.518.84a10.548 10.548 0 0 0 4.551-.866L15.001 4zm-4.5-1C8 3 6 2.55 6 2s2-1 4.5-1s4.5.45 4.5 1s-2 1-4.5 1z"/><path fill="currentColor" d="M10.5 11h.5v3h1V9h-.5l-1 2z"/></svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Fund History</span>
                                        <!-- <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-sky-800 bg-sky-800 rounded-full">New</span> -->
                                    </a>
                                </li>

                                </ul>
                            <div class="pt-2 space-y-2">
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="currentColor" d="M10.67 13.02c-.22-.01-.44-.02-.67-.02c-2.42 0-4.68.67-6.61 1.82c-.88.52-1.39 1.5-1.39 2.53V19c0 .55.45 1 1 1h8.26a6.963 6.963 0 0 1-.59-6.98z"/><circle cx="10" cy="8" r="4" fill="currentColor"/><path fill="currentColor" d="M20.75 16c0-.22-.03-.42-.06-.63l.84-.73c.18-.16.22-.42.1-.63l-.59-1.02a.488.488 0 0 0-.59-.22l-1.06.36c-.32-.27-.68-.48-1.08-.63l-.22-1.09a.503.503 0 0 0-.49-.4h-1.18c-.24 0-.44.17-.49.4l-.22 1.09c-.4.15-.76.36-1.08.63l-1.06-.36a.496.496 0 0 0-.59.22l-.59 1.02c-.12.21-.08.47.1.63l.84.73c-.03.21-.06.41-.06.63s.03.42.06.63l-.84.73c-.18.16-.22.42-.1.63l.59 1.02c.12.21.37.3.59.22l1.06-.36c.32.27.68.48 1.08.63l.22 1.09c.05.23.25.4.49.4h1.18c.24 0 .44-.17.49-.4l.22-1.09c.4-.15.76-.36 1.08-.63l1.06.36c.23.08.47-.02.59-.22l.59-1.02c.12-.21.08-.47-.1-.63l-.84-.73c.03-.21.06-.41.06-.63zM17 18c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2z"/></svg>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Account Settings</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                                        <li>
                                            <a href="profile.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Profile</a>
                                        </li>
                                        <li>
                                            <a href="changepassword.php" class="flex items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg pl-11 group hover:bg-pink-500 dark:text-white dark:hover:bg-pink-500">Change Password</a>
                                        </li>
                                    </ul>
                            <!-- <div class="pt-2 space-y-2">
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" class="flex flex-row items-center w-full p-2 px-4 py-2 mt-2 text-base font-normal text-left text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-sky-800 dark-mode:hover:bg-sky-800 md:block hover:bg-pink-500focus:outline-none focus:shadow-outline">
                                        <span>Account Setting</span>
                                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-sky-800">
                                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-sky-800 dark-mode:focus:bg-sky-800 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-sky-800 md:mt-0 hover:text-sky-800 focus:text-sky-800 hover:bg-sky-800 focus:bg-sky-800 focus:outline-none focus:shadow-outline" href="profile.php">Profile</a>
                                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-sky-800 dark-mode:focus:bg-sky-800 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-sky-800 md:mt-0 hover:text-sky-800 focus:text-sky-800 hover:bg-sky-800 focus:bg-sky-800 focus:outline-none focus:shadow-outline" href="changepassword.php">Change Password</a>

                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </aside>
            <div class="fixed inset-0 z-10 hidden bg-sky-800 opacity-50" id="sidebarBackdrop"></div>

        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>




</body>

</html>
<?php } ?>