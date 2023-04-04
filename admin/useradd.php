<?php
session_start();
include('include/config.php');
include('include/sidebar.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $emp_id = $_POST['emp_id'];
    $userEmail = $_POST['userEmail'];
    $dbirth = $_POST['dbirth'];
    $djoin = $_POST['djoin'];
    $designation = $_POST['designation'];
    $password = md5($_POST['password']);
    $contactNo = $_POST['contactNo'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $State = $_POST['State'];
    $location = $_POST['location'];
    $place = $_POST['place'];
    $branchcode = $_POST['branchcode'];
    $department = $_POST['department'];
    $departmentcode = $_POST['departmentcode'];
    $regDate = $_POST['regDate'];
    $status = 1;

    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `userEmail` = '$userEmail'");
    if (mysqli_num_rows($query) > 0) {
        $msg = '<script type="text/javascript">alert("Email already exists, please use a different one.");</script>';
        echo $msg;
    } else {
        $query = mysqli_query($conn, "INSERT INTO `users` (`emp_id`, `fullName`, `userEmail`, `dbirth`, `djoin`, `designation`, `password`, `contactNo`, `address`, `State`, `pincode`, `regDate`, `status`, `department`, `departmentcode`, `location`, `place`, `branchcode`) VALUES ('$emp_id','$fullName','$userEmail','$dbirth','$djoin','$designation','$password','$contactNo','$address','$State','$pincode','$regDate','$status','$department','$departmentcode','$location','$place','$branchcode')");

        if ($query) {
            $msg = '<script type="text/javascript">alert("Registration successful. Now you can login!");</script>';
            echo $msg;
        } else {
            $msg = '<script type="text/javascript">alert("Oops! Something went wrong. Please try again.");</script>';
            echo $msg;
        }
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
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
        <script>
            function getCat(val) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb.php",
                    data: 'branch_state=' + val,
                    success: function(data) {
                        console.log(data);
                        $("#branch_city").html(data);

                    }
                });
            }

            function getCat1(val1) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb1.php",
                    data: 'branch_city=' + val1,
                    success: function(data1) {
                        $("#branch_name").html(data1);
                        console.log("data");
                    }
                });

            }
        </script>
        <script>
            function getDep(val) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "productsub.php",
                    data: 'stateName=' + val,
                    success: function(data) {
                        console.log(data);
                        $("#state_id").html(data);

                    }
                });
            }
        </script>
        <script>
            function getBrncode(val2) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "branchcodesub.php",
                    data: 'branch_name=' + val2,
                    success: function(data2) {
                        console.log(data2);
                        $("#branch_code").html(data2);

                    }
                });
            }
        </script>

        <!-- To Location  Script -->

        <script>
            function getLoc(valdata) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdbc1.php",
                    data: 'tbranch_state=' + valdata,
                    success: function(datab) {
                        console.log(datab);
                        $("#tbranch_city").html(datab);
                        console.log("datab");

                    }
                });
            }


            function getBrncc(valdata1) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "depentdb12.php",
                    data: 'tbranch_city=' + valdata1,
                    success: function(datacc) {
                        $("#tbranch_name").html(datacc);
                        console.log("data12");
                    }
                });

            }

            function getBrnff(valff) {
                // alert('val');

                $.ajax({
                    type: "POST",
                    url: "branchcodesub1.php",
                    data: 'tbranch_name=' + valff,
                    success: function(dataff) {
                        console.log(dataff);
                        $("#tbranch_code").html(dataff);

                    }
                });
            }
        </script>
</head>
    <body>
    <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
		<div class=" bg-white rounded-xl shadow-lg z-10">
                    <div class="h-2  bg-sky-400 rounded-t-md"></div>
                    <form class="min-w-full p-10 bg-white rounded-xl shadow-xl xl:px-20" method="post" action="" >
                     <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600 ">Registration </h1>

                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-2 ">
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">User Name</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="fullName" id="fullName" placeholder="Full Name" required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Employee ID">Employee ID</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="emp_id" id="emp_id" placeholder="Employee ID" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Designation">Designation</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="designation" id="designation" placeholder="Designation"required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Contact Number">Contact Number</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="contactNo" id="contactNo" placeholder="Contact Number"required />
                            </div>
                            <div>
                                <label for="department" class="block my-3 font-semibold text-gray-800 text-md">Department</label>
                                <select type="text" name="department" readonly class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" id="department" onChange="getDep(this.value);" required>
                                    <option value="">Select Category</option>
                                    <?php
                                        $dbcon = mysqli_connect("localhost", "root", "", "athul9z1_cms");
                                        $sql = mysqli_query($dbcon, "select stateName,state_id from state");
                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?php echo htmlentities($rw['stateName']); ?>">
                                                <?php echo htmlentities($rw['stateName']); ?></option>
                                        <?php
                                        }
                                        ?>
                                </select>
                            </div>
                            <div>
                                <label for="departmentcode" class="block my-3 font-semibold text-gray-800 text-md">Department Code</label>
                                <select name="departmentcode" id="state_id" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">User Email</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="userEmail" id="desc" placeholder="User Email" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Password">Password</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="password" id="desc" placeholder="Password" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Birth</label>
                                <input type="date" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" name="dbirth"  placeholder="Date Of Birth" required>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Date Of Joining">Date Of Joining</label>
                                <input type="date" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" name="djoin" placeholder="Date Of Joining" required>
                            </div>
                                <!-- <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Register Date</label> -->
                                <input type="hidden" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" name="regDate" id="date" value="<?php echo date("Y-m-d h:i:sa");?>" required>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Address">Address</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="address" id="address" placeholder="Address" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Pincode">Pincode</label>
                                <input class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="pincode" id="pincode" placeholder="Pincode" required />
                            </div>
                            <div>
                                <label for="state" class="block my-3 font-semibold text-gray-800 text-md ">State</label>
                                <select type="text" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" id="state" name="State" onChange="getCat(this.value);" required>
                                    <option value="">Select Category</option>
                                    <?php

                                                  $dbcon = mysqli_connect("localhost", "root", "", "athul9z1_cms");
                                                  $sql = mysqli_query($dbcon, "select distinct branch_state from master_branches");
                                                         while ($rw = mysqli_fetch_assoc($sql)) {
                                       ?>
                                            <option value="<?php echo htmlentities($rw['branch_state']); ?>">
                                                <?php echo htmlentities($rw['branch_state']); ?></option>
                                            <?php
                                          }
                                        ?>
                                </select>
                            </div>
                            <div >
                                <label for="location" class="block my-3 font-semibold text-gray-800 text-md ">Location</label>
                                <select name="location" id="branch_city" onChange="getCat1(this.value);" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="place" class="block my-3 font-semibold text-gray-800 text-md ">Place</label>
                                <select name="place" id="branch_name" onChange="getBrncode(this.value);" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="branchcode" class="block my-3 font-semibold text-gray-800 text-md ">Branch Code</label>
                                <select name="branchcode" id="branch_code" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" required>
                                    <option value="">Branch Code</option>
                                </select>
                        </div>
                                        </div>
                            <div class="grid place-items-center">
                                <div>
                                    <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 hover:bg-sky-800 rounded-lg">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
           </div>
        </div>
</body>
</html>