<?php
    session_start();
    error_reporting(0);
    include('include/config.php');
    include('./include/sidebar.php');
    include('./include/header.php');
    if ($_SESSION['role'] != 'user')
    {
    header('location:index.php');
    }
    else{
        $per_page_record = 10;  // Number of entries to show in a page.   
    // Look for a GET variable page if not found default is 1.        
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
      $page=1;    
    }    
    
    $start_from = ($page-1) * $per_page_record;
        
    ?>
<body>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-gray-100">
            <div class="h-full mt-20 mb-20 bg-gray-100 ml-14 md:ml-64">
                <div class="overflow-x-auto">
                    <div class="flex items-center justify-center overflow-hidden font-sans bg-gray-100 ">
                        <div class="w-full lg:w-5/6">
                        <h1 class="mb-6 font-sans text-2xl font-bold text-center text-gray-600 uppercase">Complaint History</h1>
                            <div class="my-6 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max mt-10 ">
                                    <thead>
                                        <tr class="text-base leading-normal text-gray-600 uppercase bg-gray-300">
                                            <th class="px-6 py-3 text-center">Complaint Number</th>
                                            <th class="px-6 py-3 text-left" >Register Date</th>
                                            <th class="px-6 py-3 text-center">last Updation date</th>
                                            <th class="px-6 py-3 text-center">Status</th>
                                            <th class="px-6 py-3 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
                                        <?php 
                                            $query=mysqli_query($conn,"select * from tblcomplaints where userId='".$_SESSION['id']."' LIMIT $start_from, $per_page_record");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                        ?>
                                        <tr>
                                            <td class="px-6 py-3 text-center" ><?php echo htmlentities($row['complaintNumber']);?></td>
                                            <td class="px-6 py-3 text-left"><?php echo htmlentities($row['regDate']);?></td>
                                            <td class="px-6 py-3 text-center"><?php echo  htmlentities($row['lastUpdationDate']);?></td>
                                            <td class="px-6 py-3 text-center"><?php $status=$row['status'];
                                                                                    if($status=="" or $status=="NULL")
                                                                                { ?>
                                            <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-red-600 bg-red-200 rounded-full">Not Process Yet</button>
                                                <?php }
                                                    if($status=="in process"){ 
                                                ?>
                                            <button type="button" class="px-12 py-1.5 text-start text-sm font-semibold text-yellow-600 bg-yellow-200 rounded-full">In Process</button>
                                                <?php }
                                                    if($status=="closed") {
                                                ?>
                                            <button type="button" class="px-14 py-1.5 text-start text-sm font-semibold text-green-600 bg-green-200 rounded-full">Closed</button>
                                                <?php } ?>
                                            <td class="px-6 py-3 text-center">
                                                <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
                                                <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-purple-600 bg-purple-200 rounded-full">View Details</button></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
<?php } ?>