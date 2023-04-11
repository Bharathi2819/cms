<?php
session_start();
include('include/config.php');
include('./include/Tsidebar.php');
include('./include/header.php');
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<body>
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " >
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-2 font-sans text-2xl font-bold text-center uppercase text-sky-800 ">New Complaints</h1>
                <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-white uppercase  bg-sky-800">
                                        <th class="px-6 py-3 text-start">C.No</th>
											<th class="text-start">Name</th>
                                            <th class="text-start">Department</th>
                                            <th class="text-start">Complaint Type</th>
											<th class=" text-start">Register Date</th>
											<th class=" px-6 py-3 text-start">Status</th>
											<th class=" px-6 py-3 text-start">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $query=mysqli_query($conn,"SELECT 
                                    tblcomplaints.*, 
                                    users.fullName AS name
                                  FROM 
                                  tblcomplaints 
                                JOIN users ON users.id = tblcomplaints.userId
                                  WHERE 
                                  tblcomplaints.status IS NULL
                                    AND tblcomplaints.todepartment = \"".$_SESSION['department']."\"");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
										<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">	
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['complaintNumber']);?></td>
											<td class="text-start"><?php echo htmlentities($row['name']);?></td>
                                            <td class="text-start"><?php echo htmlentities($row['fromdepartment']);?></td>
                                            <td class="text-start"><?php echo htmlentities($row['complaintType']);?></td>
											<td class="text-start"><?php echo htmlentities($row['regDate']);?></td>
                                            <td  class="text-start"><button type="button" class="px-4 py-1.5 text-sm font-semibold text-red-600 bg-red-200 rounded-full">Not process yet</button></td>
											<td  class="text-start">
                                            <a href="tcomplaintdetails.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"  class="px-4 py-1.5 text-sm font-semibold text-gray-50 bg-pink-500 rounded-full">View Details

                                                    </a>
                                        </td>
										<?php  } ?>
</tbody>

								</table>

                            </div>
                                                    </div>
                </div>

            </div>
        </div>
</body>
</html>