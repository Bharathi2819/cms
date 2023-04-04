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
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
                <div class="h-2 bg-purple-400 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-purple-600 ">Fund Approved</h1>
                <ul class="flex items-center justify-end">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='tApproved-Requirement.php'"  class="px-4 py-2 text-sm font-semibold  text-black bg-gradient-to-r from-white-100 via-white-200 to-white-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-white-200 dark:focus:ring-white-300 bg-white border-2 border-white-400 rounded-l-lg ">
                                    Material
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='tApproved-Fund.php'" checked class="px-6 py-2 text-sm font-semibold text-black bg-gradient-to-r from-purple-100 via-purple-200 rounded-r-md to-purple-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:text-purple  dark:focus:ring-purple-300 bg-purple border-2 border-purple-400  ">
                                    Fund
                                    </button>
                                </div>
                            </ul>
                <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-purple-600 uppercase bg-purple-200">
											<th class="px-6 py-3 text-start">Requirement No</th>
											<th class="px-6 py-3 text-start">Name</th>
											<th class="px-6 py-3 text-start">Reg Date</th>
											<th class="px-6 py-3 text-start">Status</th>
											<th class="px-6 py-3 text-start">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $query=mysqli_query($conn,"SELECT 
                                    fund.*, 
                                    users.fullName AS name
                                  FROM 
                                  fund 
                                    JOIN users ON users.id = fund.userId
                                  WHERE 
                                  fund.status = 'Approved' 
                                    AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
										<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-purple-50">	
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['fundNumber']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['name']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['regDate']);?></td>
                                            <td><button type="button" class="px-6 py-1.5 text-sm font-semibold text-green-600 bg-green-200 rounded-full">Approved</button></td>
											<td>
                                            <a href="tfund-details.php?cid=<?php echo htmlentities($row['fundNumber']);?>"  class="px-4 py-1.5 text-sm font-semibold text-purple-600 bg-purple-200 rounded-full">View Details

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