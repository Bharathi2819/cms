<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('./include/Tsidebar.php');
include('./include/header.php');
if ($_SESSION['role'] != 'admin')
{
header('location:index.php');
}
else{
        date_default_timezone_set('Asia/Kolkata');// change according timezone
        $currentTime = date( 'd-m-Y h:i:s A', time () );
        if(isset($_POST['submit']))
        {
        $sql=mysqli_query($conn,"SELECT password FROM  users where password='".md5($_POST['password'])."' && userEmail='".$_SESSION['userEmail']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
            {
            $con=mysqli_query($conn,"update users set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where userEmail='".$_SESSION['userEmail']."'");
            $successmsg="Password Changed Successfully !!";
            }
            else
            {
            $errormsg="Old Password not match !!";
            }
            }
            ?>

        <script >
        function valid()
        {
        if(document.chngpwd.password.value=="")
        {
        alert("Current Password Filed is Empty !!");
        document.chngpwd.password.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value=="")
        {
        alert("New Password Filed is Empty !!");
        document.chngpwd.newpassword.focus();
        return false;
        }
        else if(document.chngpwd.confirmpassword.value=="")
        {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        return true;
        }
        </script>
        <body>
            
                <div class="h-full  mb-10 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 600px;padding-right: 600px;margin-top:100px;">
                    <div class="h-2 bg-purple-400 rounded-t-md"></div>
                        <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" name="chngpwd" onSubmit="return valid();">
                            <h1 class="mb-6 font-sans text-2xl font-bold text-center uppercase text-gray-600"> Change Password</h1>
                            <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
                                <div>
                                    <label class="block mt-10 my-3 font-semibold text-gray-600 text-xl" for="basicinput">Current Password</label>
                                    <div class="py-2" x-data="{ show: true }">
                                        <div class="relative">
                                        <input type="password"  name="password" placeholder="Enter your current password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                                        bg-gray-100 border-2 border-gray-300 placeholder-gray-400 shadow-md
                                        focus:placeholder-gray-500
                                        focus:bg-white 
                                        focus:border-gray-600  
                                        focus:outline-none" required/>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                            </svg>
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                            </svg>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="block mt-8" >
                                    <label class="block mt-3 my-3 font-semibold text-gray-600 text-xl" for="basicinput">New Password</label>
                                    <div class="py-2" x-data="{ show: true }">
                                        <div class="relative">
                                        <input type="password" placeholder="Enter your new password"  name="newpassword" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                                        bg-gray-100 border-2 border-gray-300 placeholder-gray-400 shadow-md
                                        focus:placeholder-gray-500
                                        focus:bg-white 
                                        focus:border-gray-600  
                                        focus:outline-none" required/>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                            </svg>
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                            </svg>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="block mt-8" >
                                    <label class="block mt-3 my-3 font-semibold text-gray-600 text-xl" for="basicinput">Retype Password</label>
                                    <div class="py-2" x-data="{ show: true }">
                                        <div class="relative">
                                        <input type="password" placeholder="Enter your new Password again"  name="confirmpassword" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                                        bg-gray-100 border-2 border-gray-300 placeholder-gray-400 shadow-md
                                        focus:placeholder-gray-500
                                        focus:bg-white 
                                        focus:border-gray-600  
                                        focus:outline-none" required/>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                            </svg>
                                            <svg class="h-6 text-purple-500" fill="none" @click="show = !show"
                                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                            </svg>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid place-items-center">
                                    <div>
                                        <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 hover:bg-purple-800 rounded-lg">Update</button>
                                    </div>
                                </div>
                        </form>
                </div>
            </div>
        </body>
        </html>
        <?php }?>