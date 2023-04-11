<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CATEGORY</title>
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

<body>
            <?php
            include('./include/sidebar.php');
            ?>
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " name="updateticket" id="updateticket" method="post"action="" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-800 ">User Profile</h1>
                    <?php
                      $ret1=mysqli_query($conn,"select * FROM users where id='".$_GET['uid']."'");
                      while($row=mysqli_fetch_array($ret1))
                      {
                    ?>
                    <div class="grid grid-cols-2 gap-4 xl:grid-cols-2">
                    
                        <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="username">User Name</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['fullName']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Employee ID">Employee ID</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['emp_id']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Designation">Designation</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['designation']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Contact Number">Contact Number</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['contactNo']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label for="department" class="block my-3 font-semibold text-gray-800 text-md">Department</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['department']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label for="departmentcode" class="block my-3 font-semibold text-gray-800 text-md">Department Code</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['departmentcode']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">User Email</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['userEmail']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Password">Password</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['password']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Date Of Birth</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['dbirth']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Date Of Joining">Date Of Joining</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['djoin']); ?></p>
          		        	    </div>
                            </div>
                                <!-- <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Register Date</label> -->
                                <input type="hidden" class="w-full px-8 py-3 rounded-lg bg-zinc-100 focus:outline-none" name="regDate" id="date" value="<?php echo date("Y-m-d h:i:sa");?>" required>
                            <div >
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Address">Address</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['address']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="Pincode">Pincode</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['pincode']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label for="state" class="block my-3 font-semibold text-gray-800 text-md ">State</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['State']); ?></p>
          		        	    </div>
                            </div>
                            <div >
                                <label for="location" class="block my-3 font-semibold text-gray-800 text-md ">Location</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['location']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label for="place" class="block my-3 font-semibold text-gray-800 text-md ">Place</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['place']); ?></p>
          		        	    </div>
                            </div>
                            <div>
                                <label for="branchcode" class="block my-3 font-semibold text-gray-800 text-md ">Branch Code</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	    <p><?php echo htmlentities($row['branchcode']); ?></p>
          		        	    </div>
                        </div>
                        <div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="category">Reg Date: </label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	<p><?php echo htmlentities($row['regDate']); ?></p>
          		        	</div>
                        </div>
						<div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="category">Active</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
								<p>
                                <?php echo htmlentities($row['updationDate']); ?> 
                                <?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></p>
          		        	</div>
</div>
</div>
 </div>
    <?php } ?>
 </form>
</div>
</body>
</html>
