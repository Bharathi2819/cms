<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Requirement Details</title>
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
        <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-40 xl:px-40" style="padding-left: 248px;padding-right: 240px;">
            <div class="h-2 bg-sky-400 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Requirement Details</h1>
					<?php $st='closed';
                        $query=mysqli_query($conn,"select requirements.*,users.fullName as name,category.categoryName as catname from requirements join users on users.id=requirements.userId join category on category.id=requirements.category where requirements.reqNumber='".$_GET['cid']."'");
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
                        <div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="category">Requirement Number </label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
          		            	<p><?php echo htmlentities($row['reqNumber']);?></p>
          		        	</div>
                        </div>
                        <div>
                            <label for="subcategory" class="block my-3 font-semibold text-gray-800 text-md">User Name</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                            	<p><?php echo htmlentities($row['name']);?></p>
                        	</div>
                        </div>
                        <div>
                            <label for="complaintype" class="block my-3 font-semibold text-gray-800 text-md">Reg Date</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                            	<p><?php echo htmlentities($row['regDate']);?></p>
                        	</div>
                        </div>
						<div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="category">Category </label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
								<p><?php echo htmlentities($row['catname']);?></p>
          		        	</div>
                        </div>
                        <div>
                            <label for="subcategory" class="block my-3 font-semibold text-gray-800 text-md">SubCategory</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
							<p><?php echo htmlentities($row['subcategory']);?></p>
                        	</div>
                        </div>
                        <div>
                            <label for="complaintype" class="block my-3 font-semibold text-gray-800 text-md">Requirment Type</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
							<p><?php echo htmlentities($row['reqType']);?></p>
                        	</div>
                        </div>
                        <div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Department</label>
							<div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
							<p><?php echo htmlentities($row['department']);?></p>
                        	</div>
                        </div>
                        <div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Department Code</label>
							<div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
							<p><?php echo htmlentities($row['departmentcode']);?></p>
                        	</div>
                        </div>
                    </div>
                    <div class="box-border mt-10 h-32 w-full p-4 border-4 rounded-lg">
                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                            <div>
                                <label for="subcategory" class="block my-3 font-semibold text-gray-800 text-md">State</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <p><?php echo htmlentities($row['state']);?></p>
                                </div>
                            </div>
                            <div>
                                <label for="complaintype" class="block my-3 font-semibold text-gray-800 text-md">Location</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <p> <p><?php echo htmlentities($row['location']);?></p></p>
                                </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Place</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <p> <p><?php echo htmlentities($row['place']);?></p></p>
                                </div>
                            </div>
                            <div>
                                <label class="block my-3 font-semibold text-gray-800 text-md" for="email">Branch Code</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                    <p> <p><?php echo htmlentities($row['branchcode']);?></p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border mt-10 h-50 w-full p-4 border-4 rounded-lg">
                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-2">
                            <label for="branchcode" class="block w-8/12 my-3 font-semibold text-gray-800 ext-md">Requirment Details (max 2000 words)</label>
                            <label for="branchcode"class="block w-full my-3 font-semibold text-gray-800 text-md">Requirment Related Doc(if any)</label>
                                <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none ">
                                    <p><?php echo htmlentities($row['reqDetails']);?></p>
                                </div>
                                <div>
                                    <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                        <p><?php $cfile=$row['reqFile'];
                                            if($cfile=="" || $cfile=="NULL")
                                            {
                                            echo "File NA";
                                            }
                                            else{?>
                                            <a href="../users/reqdocs/<?php echo htmlentities($row['reqFile']);?>" target="_blank"/> View File</a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="box-border mt-10 h-20 w-full p-4 border-4 rounded-lg">
                        <div class="grid content-center box-border  bg-sky-200  h-12 w-full p-4 border-1 rounded-lg" >
                            <label class="flex font-semibold w-full text-gray-800 text-md text-center ">Final Status
                               <div class="w-40 ml-5  py-1 rounded-lg bg-zinc-100 focus:outline-none">
                                    <p> <?php if($row['status']=="")
											{ echo "Not Process Yet";
                                            } else {
										 echo htmlentities($row['status']);
										 }?>
                                         <?php $ret=mysqli_query($conn,"select reqremark.remark as remark,reqremark.status as sstatus,reqremark.remarkDate as rdate from reqremark join requirements on requirements.reqNumber=reqremark.reqNumber where reqremark.reqNumber='".$_GET['cid']."'");
                                            while($rw=mysqli_fetch_array($ret))
                                            {
                                            ?>
                                    </p>
                                </div>
                                    <?php  } ?>
                        </div>
                    </div>
                    <div class="mt-10  flex justify-center ">
                        <p><?php if($row['status']=="closed"){
                                        } else {?>
                                        <a href="updaterequirements.php?cid=<?php echo htmlentities($row['reqNumber']);?>" title="Update order">
                                <button type="button" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-center">Take Action</button></td>
                            </a><?php } ?>
                            <a href="userprofile.php?uid=<?php echo htmlentities($row['userId']);?>" title="Update order">
                                <button type="button" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-center">View User Detials</button></a></td>
                            <?php  } ?>
                        </p>
                    </div>
                        <!-- <div class="grid place-items-center">
                            <div>
                                <button type="submit" name="submit"class="px-4 py-2 mt-6 mb-3 font-sans text-lg font-semibold tracking-wide text-white rounded-lg bg-sky-400 hover:bg-sky-500">Submit</button>
                            </div>
                        </div> -->
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>
