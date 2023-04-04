<?php
session_start();
error_reporting(0);
include('include/config.php');
include('./include/Tsidebar.php');
include('./include/header.php');
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
else{
?>
<body>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-gray-100">
            <div class="h-full mt-20 mb-20 bg-gray-100 ml-14 md:ml-64">
                <div class="overflow-x-auto">
                    <div class="flex items-center justify-center overflow-hidden font-sans bg-gray-100 ">
                        <div class="w-full lg:w-5/6">
                        <h1 class="mb-8 font-sans text-2xl font-bold text-center text-gray-600 uppercase">Complaint History</h1>
                            <div class="my-6 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max ">
                                    <thead>
                                    <tr class="text-base leading-normal text-purple-600 uppercase bg-purple-200 ">
                                            <th class="px-6 py-3 text-center">Complaint Number</th>
                                            <th class="px-6 py-3 text-left" >Reg Date</th>
                                            <th class="px-6 py-3 text-center">last Updation date</th>
                                            <th class="px-6 py-3 text-center">Status</th>
                                            <th class="px-6 py-3 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-purple-50">
                                        <?php 
                                            $query=mysqli_query($conn,"select * from tblcomplaints where userId='".$_SESSION['id']."'");
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
                                                <a href="tcomplaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
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