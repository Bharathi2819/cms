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
                <h1 class="font-sans text-2xl font-bold text-center  text-sky-800 uppercase">Fund Rejected</h1>
                <ul class="flex items-center justify-end">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='tRejected-Requirement.php'"  class="px-4 py-2 text-sm font-semibold  text-black bg-gradient-to-r from-white-100 via-white-200 to-white-300 hover:bg-gradient-to-br  focus:ring-white-200 dark:focus:ring-white-300 bg-white border-2 border-white-400 rounded-l-lg ">
                                    Material
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='tRejected-Fund.php'" checked class="px-6 py-2 text-sm font-semibold text-black bg-gradient-to-r from-pink-500 via-pink-500 rounded-r-md to-pink-500 hover:bg-gradient-to-br  focus:ring-pink-500 dark:focus:text-pink  dark:focus:ring-pink-500 bg-pink border-2 border-pink-500  ">
                                    Fund
                                    </button>
                                </div>
                            </ul>
                            <div class="overflow-x-auto ml-10 mr-10" >
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-white uppercase bg-sky-800">
											<th class="px-6 py-3 text-center">Req.No</th>
											<th class="px-6 py-3 text-left">Name</th>
											<th class="px-6 py-3 text-left">Register Date</th>
                                            <th class="px-6 py-3 text-left">Requirement Type</th>
											<th class="px-6 py-3 text-center">Status</th>
											<th class="px-6 py-3 text-center">Action</th>
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
                                  fund.status ='Rejected' 
                                    AND fund.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
										<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">	
										<tr>
											<td class="px-6 py-3 text-center"><?php echo htmlentities($row['fundNumber']);?></td>
											<td class="px-6 py-3 text-left"><?php echo htmlentities($row['name']);?></td>
											<td class="px-6 py-3 text-left"><?php echo htmlentities($row['regDate']);?></td>
                                            <td class="px-6 py-3 text-left"><?php echo htmlentities($row['reqType']);?></td>
                                            <td class="px-6 py-3 text-center"><button type="button" class="px-6 py-1.5 text-sm font-semibold text-red-600 bg-red-200 rounded-full">Rejected</button></td>
											<td class="px-6 py-3 text-center">
                                            <a href="tfund-details.php?cid=<?php echo htmlentities($row['fundNumber']);?>"  class="px-4 py-1.5 text-sm font-semibold text-white bg-pink-500 rounded-full">View Details

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