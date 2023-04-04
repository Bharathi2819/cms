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
    <div>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
            <div class="relative flex flex-col justify-center w-full h-full overflow-hidden antialiased text-gray-800 sm:py-12 ml-20 ">
                <section class="text-white ">
                    <div class="max-w-screen-xl px-10 mx-auto sm:py-10 sm:px-6 lg:px-8">
                        <div class="max-w-lg mx-auto text-center">
                            <h2 class="text-2xl font-bold sm:text-3xl text-amber-400 uppercase " >Complaint Numbers</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 ">
                            <a class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg> -->
                                <?php
                                    //$date = date_default_timezone_set("Asia/Kolkata");
                                    //echo "The time is " . date("h:i:sa");
                                ?>
                                <?php
                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and status is null");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                <h2 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Complaints not process yet</h2>
                            </a>
                            <a  class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                    <div class="flex items-center space-x-3"></div>
                                <?php
                                    $status="in Process";
                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                <h3 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Complaints status in process</h3>
                            </a>
                            <a class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                               </svg> -->
                                <?php
                                    $status="closed";
                                    $rt = mysqli_query($conn,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  status='$status'");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                <h2 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Complaint has been closed</h2>
                            </a>
                        </div>
                        <div class="max-w-lg mx-auto mt-8 text-center">
                            <h2 class="text-2xl font-bold sm:text-3xl text-amber-400 uppercase">Requirement Numbers</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3">
                            <a class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg> -->
                                <?php
                                    $rt = mysqli_query($conn,"SELECT * FROM requirements where userId='".$_SESSION['id']."' and status is null");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                    <h2 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Requirement not process yet</h2>
                            </a>
                            <a class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg> -->
                                <?php
                                    $status="in Process";
                                    $rt = mysqli_query($conn,"SELECT * FROM requirements where userId='".$_SESSION['id']."' and  status='$status'");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                <h2 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Requirement status in process</h2>
                            </a>
                            <a class="group block rounded-lg p-8 bg-gray-800 ring-1 ring-gary-800 shadow-lg space-y-3 hover:bg-amber-500 hover:ring-amber-800">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg> -->
                                <?php
                                    $status="closed";
                                    $rt = mysqli_query($conn,"SELECT * FROM requirements where userId='".$_SESSION['id']."' and  status='$status'");
                                    $num1 = mysqli_num_rows($rt);
                                    {?>
                                    <div class="mt-4 text-4xl font-bold text-white-900 group-hover:text-black flex justify-center">
                                        <?php echo htmlentities($num1);?>
                                    </div>
                                <?php }?>
                                <h2 class="ml-5 mt-4 text-xl font-bold text-white-900 group-hover:text-black ">Requirement has been closed</h2>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>