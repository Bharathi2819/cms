<?php
session_start();
include('include/config.php');
include('./include/Tsidebar.php');
include('./include/header.php');
//error_reporting(0);
if ($_SESSION['role'] != 'admin')
  {
header('location:index.php');
}
else
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$fname=$_POST['fullName'];
$empid=$_POST['emp_id'];
$role=$_POST['role'];
$desig=$_POST['designation'];
$Description=$_POST['Description'];
$userEmail=$_POST['userEmail'];
$contactno=$_POST['contactNo'];
$address=$_POST['address'];
$department=$_POST['department'];
$departmentcode=$_POST['departmentcode'];
$djoin=$_POST['djoin'];
$dbirth=$_POST['dbirth'];
$regDate=$_POST['regDate'];
$state=$_POST['state'];
$location=$_POST['location'];
$place=$_POST['place'];
$branchcode=$_POST['branchcode'];
$query=mysqli_query($conn,"update users set fullName='$fname',emp_id ='$empid',Description='$Description', designation='$desig',userEmail='$userEmail',contactNo='$contactno',address='$address',department='$department',departmentcode='$departmentcode',djoin ='$djoin',dbirth='$dbirth',regDate='$regDate',State='$state',location='$location',place='$place',branchcode='$branchcode' where id='".$_SESSION['id']."'");
if($query)
{
$successmsg="Profile updated Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>
 <?php $query=mysqli_query($conn,"select * from users where id='".$_SESSION['id']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
<script>
$(document).ready(function () {

    $('.datepicker').datepicker({  
changeMonth: true,
 changeYear: true,   
        dateFormat: 'yy-mm-dd'
    });
});
  </script>
<body>
        <div>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
            <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-20 xl:px-12">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                    <form class=" h-100 p-14 bg-white rounded-lg " method="post" action="" >
                         <h1 class="mb-6 font-sans text-2xl font-bold text-center text-sky-800 uppercase">profile Information</h1><h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                        <div class="grid  grid-cols-1 gap-8 xl:grid-cols-4">
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Full Name</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="fullName"  text-gray-600 value="<?php echo htmlentities($row['fullName']);?>" placeholder="User Name" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Employee ID</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="emp_id"  text-gray-600 value="<?php echo htmlentities($row['emp_id']);?>" placeholder="Employee ID"  required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Designation</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="role"  text-gray-600 value="<?php echo htmlentities($row['designation']);?>" placeholder="Designation"required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Description</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="Description"  text-gray-600 value="<?php echo htmlentities($row['Description']);?>" placeholder="Description"required />
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">User Email</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="userEmail"  text-gray-600 value="<?php echo htmlentities($row['userEmail']);?>" placeholder="User Email" required/>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">Contact</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="contactNo"  text-gray-600 value="<?php echo htmlentities($row['contactNo']);?>" placeholder="Contact"required />
                            </div>
                            <div>
                                <label for="department" class="block my-3 font-semibold text-gray-800 text-md">Department</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="department"  text-gray-600 value="<?php echo htmlentities($row['department']);?>" placeholder="Department" />
                                <select type="text" name="department" class="w-full mt-2  px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" id="department" onChange="getDep(this.value);" required>
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
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="departmentcode"  text-gray-600 value="<?php echo htmlentities($row['departmentcode']);?>" placeholder="Contact" />
                                <select name="departmentcode" id="state_id" class="w-full mt-2  px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Joining</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="djoin"  text-gray-600 value="<?php echo htmlentities($row['djoin']);?>" required>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Birth</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="dbirth"  text-gray-600 value="<?php echo htmlentities($row['dbirth']);?>" required>
                            </div>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Address</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="address"  text-gray-600 value="<?php echo htmlentities($row['address']);?>" placeholder="Address" required/>
                            </div>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Reg Date</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" name="regDate"  value="<?php echo htmlentities($row['regDate']);?>" placeholder="Reg Date" required >
                            </div>
                                    </div>
                            <div class="box-border mt-8 h-42 w-full p-4 border-4 rounded-lg mb-10">
                            <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                            <div>
                                <label for="state" class="block my-3 font-semibold text-gray-800 text-md ">State</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="state"  text-gray-600 value="<?php echo htmlentities($row['State']);?>" placeholder="Contact" />
                                <select type="text" class="w-full mt-2 px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" id="state" name="state" onChange="getCat(this.value);">
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
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="location"  text-gray-600 value="<?php echo htmlentities($row['location']);?>" placeholder="Contact" />
                                <select name="location" id="branch_city" onChange="getCat1(this.value);" class="w-full mt-2 px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="place" class="block my-3 font-semibold text-gray-800 text-md ">Place</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="place"  text-gray-600 value="<?php echo htmlentities($row['place']);?>" placeholder="Contact" />
                                <select name="place" id="branch_name" onChange="getBrncode(this.value);" class="w-full mt-2 px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            <div>
                                <label for="branchcode" class="block my-3 font-semibold text-gray-800 text-md ">Branch Code</label>
                                <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" type="text" name="branchcode"  text-gray-600 value="<?php echo htmlentities($row['branchcode']);?>" placeholder="Contact" />
                                <select name="branchcode" id="branch_code" class="w-full mt-2 px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <option value="">Branch Code</option>
                                </select>
                            </div>
                                        </div>
                            
                                        </div>
                                        <div class="grid place-items-center justify-center">
                                <div>
                                    <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-pink-500 via-pink-500 to-pink-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-500 dark:focus:ring-pink-500 hover:bg-pink-500 rounded-lg ">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
           </div>
        </div> 
</body>
</html>
<?php } ?>