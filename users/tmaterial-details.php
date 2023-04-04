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
            <div class="h-2 bg-purple-400 rounded-t-md"></div>
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
                        <div class="grid content-center box-border  bg-purple-200  h-12 w-full p-4 border-1 rounded-lg" >
                            <label class="flex font-semibold w-full text-gray-800 text-md text-center ">Final Status
                               <div class="w-40 ml-5  py-1 rounded-lg bg-zinc-100 text-purple-800 focus:outline-none">
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
                    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="popup">
                          <div class="flex items-center justify-center min-h-screen">
                            <div class="relative rounded-lg shadow-lg bg-gradient-to-r from-purple-100 via-purple-200 to-purple-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-300 ">
                            <!-- <img src="image.jpg" alt="" class="object-cover w-full h-full"> -->
                            <div class="p-4">
                                <h2 class="text-2xl font-medium  text-center mt-5 mb-8 text-bold">Take Action</h2>
                                <form>
                                  <?php
                            if ($_SESSION['role'] != 'admin')
                            {
                            header('location:index.php');
                            }
                            else{
                            if(isset($_POST['update']))
                            {
                        $requirementsnumber=$_GET['cid'];
                        $status=$_POST['status'];
                        $remark=$_POST['remark'];
                        $query=mysqli_query($conn,"insert into reqremark(reqNumber,status,remark) values('$requirementsnumber','$status','$remark')");
                        $sql=mysqli_query($conn,"update requirements set status='$status' where reqNumber='$requirementsnumber'");
                          if($status == "closed")
                          {
                          $query1=mysqli_query($conn,"select *from requirements where reqNumber='".$_GET['cid']."'");
                          while($row=mysqli_fetch_array($query1))
                          {
                        }
                        echo "<script>alert('requirements details updated successfully');</script>";
                          }
                        }
                        ?>
                        <script language="javascript" type="text/javascript">
                        function f2()
                        {
                        window.close();
                        }ser
                        function f3()
                        {
                        window.print(); 
                        }
                        </script>
                        <div style="margin-left:50px;">
                          <form name="updateticket" id="updatecomplaint" method="post"> 
                          <table class="w-full table-auto min-w-max text-lg ">
                                <tr>
                                  <td class="px-6 py-3 text-start">requirements Number</td>
                                  <td class="px-6 py-3 text-start"><?php echo htmlentities($_GET['cid']); ?></td>
                                </tr>
                                <tr>
                                  <td class="px-6 py-3 text-start">Status</td>
                                  <td class="px-6 py-3 text-start"><select name="status" class="px-7 py-4 w-full text-lg text-black bg-white rounded-lg border-2 border-purple-800 focus:ring-purple-500 focus:border-purple-500 " required="required">
                                        <option value="">Select Status</option>
                                        <option value="Approved">Approve</option>
                                        <option value="Hold">Hold</option>
                                        <option value="Rejected">Reject</option>
                                        </select>
                                  </td>
                                  </tr>
                                  <tr>
                                  <td class="px-6 py-3 text-start">Remark</td>
                                  <td class="px-6 py-3 text-start"><textarea name="remark" class=" mt-2 h-20 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-purple-800 focus:ring-purple-800 focus:border-purple-500 " required="required"></textarea></td>
                                  </tr>
                            </table>
                            <div class="grid place-items-center mt-7 mb-8">
                            <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-center" name="update" value="Submit">UPDATE</button>
                          </div>
                          </div>
                          </form>
                        </div>
                            <?php } ?>
                                </form>
                              </div>
                              <button class="absolute top-1 right-1 mt-2 mr-2 text-red-500 hover:text-red-700" aria-label="Close" onclick="closePopup()">
                              <svg class="w-6 h-6 text-red-500 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.414 10l4.293-4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293a1 1 0 0 0-1.414 1.414L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10z"/>
                              </svg>
                              </button>
                            </div>
                          </div>
                        </div>
                    <div class="fixed z-0 inset-0 bg-gray-800 opacity-50 hidden" id="overlay"></div>
                    <button class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-center" onclick="openPopup()">Take Action</button>
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
<?php } ?>