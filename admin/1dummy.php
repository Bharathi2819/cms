<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="adddepartment.php";
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>	
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/dist/output.css" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    },
                    screens: {
                        ss: "320px",
                        // => @media (min-width: 640px) { ... }

                        sm: "375px",
                        sl: "425px",

                        md: "768px",
                        // => @media (min-width: 768px) { ... }

                        lg: "1024px",
                        // => @media (min-width: 1024px) { ... }

                        xl: "1280px",
                        // => @media (min-width: 1280px) { ... }

                        desktop: "1440px",
                        // => @media (min-width: 1536px) { ... }
                    },
                },
                container: {
                    padding: {
                        DEFAULT: "1rem",
                        sm: "2rem",
                        lg: "4rem",
                        xl: "5rem",
                        "2xl": "6rem",
                    },
                },
            }
        </script>
<script type="text/javascript">
		function valid() {
			if (document.forgot.password.value != document.forgot.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.forgot.confirmpassword.focus();
				return false;
			}
			return true;
		}
</script>
</head>
<body>
<div class="relative min-h-screen flex items-center justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover "style="background-image: url(https://img.freepik.com/free-photo/cloud-computing-data-management-concept_53876-127747.jpg?w=1060&t=st=1677836094~exp=1677836694~hmac=268ed9659a3527e9353d4431f27e7a3b37b2b4acd3408dae1bd0ebd158c82737);">
	<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
		<div class=" bg-white rounded-xl shadow-lg z-10">
				<div class="flex items-center justify-center bg-white sm:px-6 lg:px-8 sm:py-8 lg:py-12 rounded-xl">
					<div class="xl:w-full xl:h-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
						<h2 class="text-2xl font-bold leading-tight text-black sm:text-2xl">Complaint Management System</h2>
						<p class="mt-2 text-base text-gray-600">Don't have an account?<a href="registration.php" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">SIGN IN</a></p>
          				<form action="#" name="login" method="post" class="mt-8">
            				<div class="space-y-5">
              					<div>
             						 <span style="color:red;" ></span><label for="" class="text-base font-medium text-gray-900">Email address</label>
                						<div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    											<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                  							</div>
                  							<input id="username" name="username" placeholder="Enter email to get started"placeholder="Enter email to get started" class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                						</div>
              					</div>
             			 	<div>
                				<label for="" class="text-base font-medium text-gray-900">Password</label>
               					 <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
									<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
										<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" /></svg>
									</div>
                  					<input type="password" id="password" name="password" placeholder="Enter your password" class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                				</div>
              				</div>
              				<div>
                				<button type="submit" name="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80"> Login</button>
              				</div>
            		</div>
				</div>
	</body>

</html>