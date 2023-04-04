<?php
session_start();
include("include/config.php");
if (isset($_POST['submit'])) {
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $query = "SELECT id, role,userEmail,departmentcode,department,emp_id,fullName,password FROM users WHERE userEmail='$userEmail' AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullName'] = $row['fullName'];
        $_SESSION['userEmail'] = $row['userEmail'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['departmentcode'] = $row['departmentcode'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['emp_id'] = $row['emp_id'];
        if ($row['role'] == 'user') {
            header("Location:dashboard.php");
        } else if ($row['role'] == 'admin') {
            header("Location:tdashboard.php");
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/dist/output.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<title>CMS | User Login</title>
</head>
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

<body>
  <section class="bg-white">
    <div class="grid grid-cols-1 lg:grid-cols-2">
      <div class="relative flex items-end px-4 pb-10 pt-60 sm:pb-16 md:justify-center lg:pb-24 bg-gray-50 sm:px-6 lg:px-8">
        <div class="absolute inset-0">
          <img class="object-cover w-full max-h-screen" src="https://img.freepik.com/free-vector/organic-flat-customer-support-illustration_23-2148899174.jpg?w=1380&t=st=1676956152~exp=1676956752~hmac=989f46eef8863b0c77f347bb12544a334cac3f1f0d9b9aaf2d70ec26e36b3efa" alt="" />
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>

        <div class="relative">
          <div class="w-full max-w-xl xl:w-full xl:mx-auto ">
            <h3 class="text-4xl font-bold text-white justify-start mt-5">
              Complaint Management System
            </h3>
            <ul class="grid grid-cols-1 mt-10 sm:grid-cols-2 gap-x-8 gap-y-4">
              <li class="flex items-center space-x-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-amber-500 rounded-full">
                  <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-lg font-medium text-white">
                  Add Requirement
                </span>
              </li>
              <li class="flex items-center space-x-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-amber-500 rounded-full">
                  <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-lg font-medium text-white">
                  Raise Complaint
                </span>
              </li>
              <li class="flex items-center space-x-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-amber-500 rounded-full">
                  <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-lg font-medium text-white">
                  Complaint History
                </span>
              </li>
              <li class="flex items-center space-x-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-amber-500 rounded-full">
                  <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-lg font-medium text-white">
                  Requirement History
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24 xl:h-screen">
        <div class="xl:w-full xl:h-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
          <h2 class="text-3xl font-bold leading-tight text-black sm:text-3xl 2xl:max-w-lg justify-start mt-5 " style="width: 564px;">
            Complaint Management System
          </h2>
          <p class="mt-2 text-base text-gray-600">
            Don't have an account?<a href="registration.php" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">SIGN IN</a>
          </p>
          <form action="#" name="login" method="post" class="mt-8">
            <div class="space-y-5">
              <!-- <div>
                <label for="" class="text-base font-medium text-gray-900">
                  Fast & Last name
                </label>
                <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                  </div>

                  <input type="text" name="" id="" placeholder="Enter your full name"
                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                </div>
              </div> -->

              <div>
              <span style="color:red;" ></span>
                <label for="" class="text-base font-medium text-gray-900">
                  Email address
                </label>
                <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                  </div>

                  <input type="text" id="userEmail" name="userEmail" placeholder="Enter email to get started" class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                </div>
              </div>

              <div>
                <label for="" class="text-base font-medium text-gray-900">
                  Password
                </label>
                <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                    </svg>
                  </div>

                  <input type="password" id="password" name="password" placeholder="Enter your password" class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                </div>
              </div>

              <div>
                <button type="submit" name="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80">
                  Login
                </button>
              </div>
            </div>
          </form>
          <div class="mt-3 space-y-10">
            <a href="/cms-ui/admin/index.php" class="relative inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-md hover:bg-gray-100 focus:bg-gray-100 hover:text-black focus:text-black focus:outline-none">
              <div class="absolute inset-y-0 left-0 p-4 bg-gray-400">
                <div class="">
                  <img class="w-8 h-8 " src="https://athulyaseniorcare.com/images/adminuser.svg">
                </div>

              </div>
              Login As Admin
  </a>
          </div>

          <p class="mt-5 text-sm text-gray-600">
            This site is protected by reCAPTCHA and the Google
            <a href="#" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Privacy Policy</a>
            &
            <a href="#" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Terms of Service</a>
          </p>
          <a href="contact.php" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
</body>

</html>