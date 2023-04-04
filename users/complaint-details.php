<?php
    session_start();
    //error_reporting(0);
    include('include/config.php');
    include('./include/sidebar.php');
    include('./include/header.php');
    if ($_SESSION['role'] != 'user')
    {
    header('location:index.php');
    }
    else{
        
?>
<?php $query=mysqli_query($conn,"select tblcomplaints.*,category.categoryName as catname from tblcomplaints join category on category.id=tblcomplaints.category where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
  <body>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
            <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-20 xl:px-12" style="padding-left: 400px;padding-right: 400px;">
                <div class="h-2 bg-amber-400 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-gray-200 rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-8 font-sans text-2xl font-bold text-center text-gray-600">Complaint Details</h1>
                <div class="box-border bg-slate-100 mt-10 h-100 w-full p-4 border-4 rounded-lg">
                    <div class="ml-24 grid grid-cols-1 gap-2 xl:grid-cols-2">
                        <label class="block my-2 font-semibold text-gray-800 text-md"><b>Complaint Number </b></label>
          		        <div class="block my-3 font-semibold text-gray-800 text-md">
          		            <p><?php echo htmlentities($row['complaintNumber']);?></p>
          		        </div>
                        <label class="block my-2 font-semibold text-gray-800 text-md"><b>Reg. Date </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['regDate']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Category </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['catname']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Sub Category </b> </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['subcategory']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Complaint Type </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['complaintType']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>State </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['state']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>File </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php $cfile=$row['reqFile'];
                                if($cfile=="" || $cfile=="NULL")
                                {
                                echo htmlentities("File NA");
                                }
                                else{ ?>
                                <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target='_blank'> View File</a>
                                <?php } ?>
                            </p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Complaint Details: </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['complaintDetails']);?></p>
                        </div>
                    </div> 
                    <?php $ret=mysqli_query($conn,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
                            <div class="box-border mt-10 ml-20 mr-20 h-50 p-4 border-2 border-black rounded-lg">
                                <div class="ml-10 grid grid-cols-2 gap-2 xl:grid-cols-2">
                                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Remark</b></label>
                                        <div> <?php echo  htmlentities($rw['remark']); ?></div>
                                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Remark Date</b></label>
                                        <div><?php echo  htmlentities($rw['rdate']); ?></div>
                                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Status</b></label>
                                        <div><?php echo  htmlentities($rw['sstatus']); ?></div>
                                </div>
                             </div>
                    <?php } ?>
                    <div class="ml-24 mt-10 grid grid-cols-1 gap-2 xl:grid-cols-2">
                            <label class=" block my-3 font-semibold text-gray-800 text-md"><b>Final Status </b></label>
                            <div class="block my-3 font-bold text-gray-800 text-md">
                                <p style="color:red">
                                    <?php
                                        if($row['status']=="NULL" || $row['status']=="" )
                                            {
                                            echo "Not Process yet";
                                            } else{
                                            echo htmlentities($row['status']);
                                            }
                                        ?>
                                </p>
                            </div>
                    </div>
                </div>
                </div>
  
  </body>
</html>
<?php } ?>
<?php } ?>