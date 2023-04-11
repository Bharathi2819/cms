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
                            if(isset($_POST['update']))
                            {
                        $fundnumber=$_GET['cid'];
                        $status=$_POST['status'];
                        $remark=$_POST['remark'];
                        $query=mysqli_query($conn,"insert into fundremark(fundNumber,status,remark) values('$fundnumber','$status','$remark')");
                        $sql=mysqli_query($conn,"update fund set status='$status' where fundNumber='$fundnumber'");
                          if($status == "closed")
                          {
                          $query1=mysqli_query($conn,"select *from fund where fundNumber='".$_GET['cid']."'");
                          while($row=mysqli_fetch_array($query1))
                          {
                        }
                        echo "<script>alert('Fund details updated successfully');</script>";
                          }
                        }
                        ?>

<body>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 " >
            <div class="h-full  ml-64  md:ml-64 md:px-20 xl:px-12 " style="padding-left: 550px;padding-right: 550px;margin-top:200px;" >
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-100  bg-white rounded-lg shadow-xl " name="updateticket" id="updatecomplaint" method="post" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-800 ">Remarks</h1>
                    <div>
                            <label class="block mt-10 my-3 font-semibold text-sky-800 text-xl" >Fund Number</label>
                            <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" value="<?php echo htmlentities($_GET['cid']) ?>" >
                        </div>
                        <div  class="block mt-8" >
                            <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="status">Status</label>
                            <select type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  required  name="status"  required >
                              <option value="">Select Status</option>
                              <option value="Approved">Approved</option>
                              <option value="Holded">Holded</option>
                              <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div  class="block mt-8" >
                            <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="status">Remark</label>
                            <textarea type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  name="remark" placeholder="Remark" required ></textarea>
                        </div>
                        <div class="grid place-items-center">
                            <div>
                                <button type="submit" name="update" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 hover:bg-pink-800 rounded-lg">Submit</button>
                            </div>
                        </div>

 </form>
</div>

</body>
</html>

     <?php } ?>