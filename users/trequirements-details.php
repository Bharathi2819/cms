<?php
    session_start();
    //error_reporting(0);
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
  <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
            <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-20 xl:px-12" style="padding-left: 400px;padding-right: 400px;">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-8 font-sans text-2xl font-bold text-center text-sky-800">Requirement Details</h1>
                
                            <?php
                                $query=mysqli_query($conn,"select requirements.*,category.categoryName as catname from requirements join category on category.id=requirements.category where userId='".$_SESSION['id']."' and reqNumber='".$_GET['cid']."'");
                                while($row=mysqli_fetch_array($query))
                            {?>
                <div class="box-border bg-white mt-10 h-100 w-full p-4 border-4 rounded-lg">
                    <div class="ml-24 grid grid-cols-1 gap-2 xl:grid-cols-2">
                        <label class="block my-2 font-semibold text-gray-800 text-md"><b>Requirement Number </b></label>
          		        <div class="block my-3 font-semibold text-gray-800 text-md">
          		            <p><?php echo htmlentities($row['reqNumber']);?></p>
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
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Requirement Type </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['reqType']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>File </b></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php $cfile=$row['reqFile'];
                                if($cfile=="" || $cfile=="NULL")
                                {
                                echo htmlentities("File NA");
                                }
                                else{ ?>
                                <a href="reqdocs/<?php echo htmlentities($row['reqFile']);?>" target='_blank'> View File</a>
                                <?php } ?>
                            </p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><b>Requirement Details: </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['reqDetails']);?></p>
                        </div>
                    </div> 
                </div>
                    <?php 
                        $ret=mysqli_query($conn,"select reqremark.remark as remark,reqremark.status as sstatus,reqremark.remarkDate as rdate from reqremark join requirements on requirements.reqNumber=reqremark.reqNumber where reqremark.reqNumber='".$_GET['cid']."'");
                        while($rw=mysqli_fetch_array($ret))
                        {
                    ?>
                            <div class="box-border bg-white mt-10 h-100 w-full p-4 border-4 rounded-lg">
                                <div class="ml-10 grid grid-cols-2 gap-2 xl:grid-cols-2">
                                        <label class="block ml-10 my-3 font-semibold text-gray-800 text-md"><b>Remark</b></label>
                                        <div class="block my-3 font-semibold text-gray-800 text-md"> <?php echo  htmlentities($rw['remark']); ?></div>
                                        <label class="block ml-10 my-3 font-semibold text-gray-800 text-md"><b>Remark Date</b></label>
                                        <div class="block my-3 font-semibold text-gray-800 text-md"><?php echo  htmlentities($rw['rdate']); ?></div>
                                        <label class="block ml-10 my-3 font-semibold text-gray-800 text-md"><b>Status:</b></label>
                                        <div class="block my-3 font-semibold text-gray-800 text-md"><?php echo  htmlentities($rw['sstatus']); ?></div>
                                </div>
                             </div>
                    <?php } ?>
                    <div class="ml-28 mt-10 grid grid-cols-1 gap-2 xl:grid-cols-2">
                            <label class=" block my-3 font-semibold text-gray-800 text-md"><b>Final Status :</b></label>
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
  
  </body>
</html>
<?php } ?>
<script>
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
<?php } ?> 