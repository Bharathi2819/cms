<?php
session_start();
include('include/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$empid=$_POST['empid'];
$djoin=$_POST['djoin'];
$dbirth=$_POST['dbirth'];
$desig=$_POST['desig'];
$query=mysqli_query($conn,"update users set fullName='$fname',emp_id ='$empid', djoin ='$djoin', designation='$desig',dbirth='$dbirth',contactNo='$contactno',address='$address',State='$state',country='$country',pincode='$pincode' where userEmail='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- This is an example component -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Asset || Inward-Outward</title>
        <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
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
        <div>
            <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
                <?php
                include('./include/sidebar.php');

                ?>
                <div class="h-full mb-10 ml-14 mt-14 md:ml-64 md:px-20 xl:px-12">
                    <div class="h-2 bg-amber-400 rounded-t-md"></div>
                    <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" method="post" action="" >
                        <!-- <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600"></h1> -->

                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Full Name</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="Full Name" required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Employee ID</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="Employee ID"required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Description</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="Description"required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Contact</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="Contact"required />
                            </div>
                            <div>
                                <label for="department" class="block my-3 font-semibold text-gray-800 text-md">Department</label>
                                <select type="text" name="department" readonly class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" id="department" onChange="getDep(this.value);">
                                    <option value="">Select Category</option>
                                    <?php
                                        $dbcon = mysqli_connect("localhost", "root", "", "test1");
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
                                <select name="departmentcode" id="state_id" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Pincode</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="Pincode" required />
                            </div>

                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">User Email</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="desc" id="desc" placeholder="User Email" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Joining</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="invoicedate">
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Birth</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="invoicedate">
                            </div>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Address</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="qty" id="email" placeholder="Qty" required/>
                            </div>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Reg Date</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="invoicedate" placeholder="Reg Date" required >
                            </div>
                           
                            <div>
                                <label for="state" class="block my-3 font-semibold text-gray-800 text-md ">State</label>
                                <select type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" id="state" name="state" onChange="getCat(this.value);">
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
                                <select name="location" id="branch_city" onChange="getCat1(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="place" class="block my-3 font-semibold text-gray-800 text-md ">Place</label>
                                <select name="place" id="branch_name" onChange="getBrncode(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="branchcode" class="block my-3 font-semibold text-gray-800 text-md ">Branch Code</label>
                                <select name="branchcode" id="branch_code" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Branch Code</option>
                                </select>
                          
                        </div>
                                        </div>
                            <div class="grid place-items-center">
                                <div>
                                    <button type="submit" name="submit" class="px-4 py-2 mt-6 mb-3 font-sans text-lg font-semibold tracking-wide text-white bg-amber-400 rounded-lg hover:bg-sky-800">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
           </div>
        </div> 
</body>
</html>