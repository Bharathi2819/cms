<?php
    session_start();
    error_reporting(0);
    include('include/config.php');
    include('./include/Tsidebar.php');
    include('./include/header.php');
    if ($_SESSION['role'] != 'admin')
    {
    header('location:index.php');
    }
    else{
?>
<body>
    <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-40 xl:px-40" style="padding-left: 248px;padding-right: 240px;">
            <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600">Requirement Details</h1>
                    <?php
                        $st = 'closed';
                        $query = mysqli_query($conn, "SELECT requirements.*, users.fullName AS name, category.categoryName AS catname 
                        FROM requirements
                        JOIN users ON users.id = requirements.userId 
                        JOIN category ON category.id = requirements.category 
                        WHERE reqNumber = '".$_GET['cid']."'");
                        while ($row = mysqli_fetch_array($query)) {
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
                        <label class="block my-3 font-semibold text-gray-800 text-md">Category</label>
                        <div class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                            <p><?php echo htmlentities($row['catname']);?></p>
                        	</div>
                        </div>
                        <div>
                        <label class="block my-3 font-semibold text-gray-800 text-md">Sub Category</label>
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
                                            <a href="../users/reqdocs/<?php echo htmlentities($row['reqFile']);?>" target="_blank"> View File</a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="box-border mt-10 h-20 w-full p-4 border-4 rounded-lg">
                        <div class="grid content-center box-border  bg-pink-500  h-12 w-full p-4 border-1 rounded-lg" >
                            <label class="flex font-semibold w-full text-gray-800 text-md text-center ">Final Status
                               <div class="w-40 ml-5  py-1 rounded-lg bg-zinc-100 text-pink-500 focus:outline-none">
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
                                    <?php  } ?>
                                </div>
                        </div>
                    </div>
                    <div class="mt-10  flex justify-center ">
                        <p><?php if($row['status']=="closed"){
                            } else {?>
                            <a href="ttakeaction2.php?cid=<?php echo htmlentities($row['reqNumber']);?>" title="Update order">
                                <button type="button" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-center">Take Action</button></td>
                            </a><?php } ?>
                            <?php  } ?>
                        </p>
                    </div>
             </form> 
                 
            </div>
        </div>
</body>
</html>
 <script src = "https://unpkg.com/flowbite@1.5.5/dist/flowbite.js" >
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js">
                        </script>
                         <script>
                        function openPopup() {
  document.getElementById('overlay').classList.remove('hidden');
  document.getElementById('popup').classList.remove('hidden');
}

function closePopup() {
  document.getElementById('overlay').classList.add('hidden');
  document.getElementById('popup').classList.add('hidden');
}
</script>
<?php } ?>
