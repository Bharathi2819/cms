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
?>
   <div class="h-full  mb-30 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " >
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-3 font-sans text-2xl font-bold text-center uppercase text-sky-800 ">fund History</h1>
                <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-white uppercase bg-sky-800">
                                            <th class="px-6 py-3 text-center">F.NO</th>
                                            <th class="px-6 py-3 text-left">Register Date</th>
                                            <th class="px-6 py-3 text-left">Requirement Type</th>
                                            <th class="px-6 py-3 text-left">last Updation date</th>
                                            <th class="px-6 py-3 text-center">Status</th>
                                            <th class="px-6 py-3 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                            $query=mysqli_query($conn,"select * from fund where userId='".$_SESSION['id']."'");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                        ?>
                                    <tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
                                        
                                        <tr>
                                            <td class="px-6 py-3 text-center"><?php echo htmlentities($row['fundNumber']);?></td>
                                            <td class="px-6 py-3 text-left"><?php echo htmlentities($row['regDate']);?></td>
                                            <td class="px-6 py-3 text-left"><?php echo htmlentities($row['reqType']);?></td>
                                            <td class="px-6 py-3 text-left"><?php echo  htmlentities($row['lastUpdationDate']);?></td>
                                            <td class="px-6 py-3 text-center"><?php $status=$row['status'];
                                                                                    if($status=="" or $status=="NULL")
                                                                                { ?>
                                            <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-purple-600 bg-purple-200 rounded-full">Not Process Yet</button>
                                                <?php }
                                                    if($status=="Approved"){ 
                                                ?>
                                            <button type="button" class="px-12 py-1.5 text-start text-sm font-semibold text-green-600 bg-green-200 rounded-full">Approved</button>
                                                <?php }
                                                    if($status=="Holded") {
                                                ?>
                                            <button type="button" class="px-14 py-1.5 text-start text-sm font-semibold text-yellow-600 bg-yellow-200 rounded-full">Holded</button>
                                            <?php }
                                                    if($status=="Rejected") {
                                                ?>
                                            <button type="button" class="px-14 py-1.5 text-start text-sm font-semibold text-red-600 bg-red-200 rounded-full">Rejected</button>
                                                <?php } ?>
                                            <td class="px-6 py-3 text-center">
                                                <a href="fund-details.php?cid=<?php echo htmlentities($row['fundNumber']);?>">
                                                <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-white bg-pink-500 rounded-full">View Details</button></a>
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