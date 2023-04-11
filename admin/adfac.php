
<?php
session_start();
include('include/config.php');
include('./include/sidebar.php');
include('./include/header.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

if(isset($_POST['submit']))
{
	$branch_state=$_POST['branch_state'];
	$branch_city=$_POST['branch_city'];
    $branch_name=$_POST['branch_name'];
	$branch_code=$_POST['branch_code'];
    $branch_address=$_POST['branch_address'];
$sql=mysqli_query($conn,"insert into master_branches(branch_state,branch_city,branch_name,branch_code,branch_address) values('$branch_state','$branch_city','$branch_name','$branch_code','$branch_address')");
$_SESSION['msg']="Facility Created !!";
}
if(isset($_GET['del']))
		  {
		    mysqli_query($conn,"delete from subcategory where id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Facility deleted !!";
		  }
?>
<body>
        <div class="h-full  mb-10 ml-64 mt-10 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 550px;padding-right: 550px;">
            <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-6 font-sans text-2xl font-bold text-center uppercase text-sky-800">ADD FACILITY</h1>
                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-1">
                            <div>
                                <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="description" for="category">State</label>
                                <input type="text" class="w-full px-3 py-4 rounded-lg bg-zinc-100 focus:outline-none"  name="branch_state" placeholder=" Enter Sub Category Name" required />
                            </div>
                            <div>
                                <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="description" for="category">City</label>
                                <input type="text" class="w-full px-3 py-4 rounded-lg bg-zinc-100 focus:outline-none"  name="branch_city" placeholder=" Enter Sub Category Name" required />
                            </div>
                            <div>
                                <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="description" for="category">Location</label>
                                <input type="text" class="w-full px-3 py-4 rounded-lg bg-zinc-100 focus:outline-none"  name="branch_name" placeholder=" Enter Sub Category Name" required />
                            </div>
                            <div>
                                <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="description" for="category">Branch_code</label>
                                <input type="text" class="w-full px-3 py-4 rounded-lg bg-zinc-100 focus:outline-none"  name="branch_code" placeholder=" Enter Sub Category Name" required />
                            </div>
                            <div>
                                <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl"  for="subcategory">Address</label>
                                <input type="text" class="w-full px-3 py-4 rounded-lg bg-zinc-100 focus:outline-none"  name="branch_address" placeholder=" Enter Sub Category Name" required />
                            </div>
                            <div class="grid place-items-center">
                                <div>
                                    <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 hover:bg-pink-800 rounded-lg">Create</button>
                                </div>
                            </div>
                        </div>
				</form>
			</div>
		</div>
    </div>
</body>
</html>
