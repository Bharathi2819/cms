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
    <div>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-gray-100">
            <div class="h-full mt-20 mb-20 bg-gray-100 ml-14 md:ml-64">
                <div class="overflow-x-auto">
                    <div class="flex items-center justify-center overflow-hidden font-sans bg-gray-100 ">
                        <div class="w-full lg:w-5/6">
                         <h1 class="mb-8 font-sans text-2xl font-bold text-center text-gray-600 uppercase">Requirement History</h1>
                            <div class="my-6 bg-white rounded shadow-md">
                            <table class="w-full table-auto min-w-max ">
                                <thead class="text-base  text-black bg-purple-200">
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50 ">
                                        <th class="px-4 py-3 text-center">Requirement Number </th>
                                        <th class="px-4 py-3 text-center">User Name</th>
                                        <th class="px-4 py-3 text-center">Reg Date</th>
                                        <th class="px-6 py-3 text-center">Status</th>
                                        <th class="px-4 py-3 text-center">View Details</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $query=mysqli_query($conn,"SELECT 
                                    requirements.*, 
                                    users.fullName AS name 
                                  FROM 
                                    requirements 
                                    JOIN users ON users.id = requirements.userId 
                                  WHERE 
                                    requirements.status IS NULL 
                                    AND requirements.departmentcode = \"".$_SESSION['departmentcode']."\" AND users.role!='admin'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
                                <tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <td class="py-4 px-6 text-center font-medium text-gray-900 whitespace-nowrap ">
                                        <?php echo htmlentities($row['reqNumber']);?>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                        <?php echo htmlentities($row['name']);?>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                        <?php echo htmlentities($row['regDate']);?>
                                        </td>
                                        <td class="px-6 py-3 text-center"><?php $status=$row['status'];
                                                                                    if($status=="" or $status=="NULL")
                                                                                { ?>
                                            <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-red-600 bg-red-200 rounded-full">Not Process Yet</button>
                                                <?php }
                                                    if($status=="approve"){ 
                                                ?>
                                            <button type="button" class="px-12 py-1.5 text-start text-sm font-semibold text-yellow-600 bg-yellow-200 rounded-full">Approve</button>
                                                <?php }
                                                    if($status=="hold") {
                                                ?>
                                            <button type="button" class="px-14 py-1.5 text-start text-sm font-semibold text-green-600 bg-green-200 rounded-full">Hold</button>
                                            <?php }
                                                    if($status=="reject") {
                                                ?>
                                            <button type="button" class="px-14 py-1.5 text-start text-sm font-semibold text-green-600 bg-green-200 rounded-full">Reject</button>
                                                <?php } ?></td>
                                        <td class="px-6 py-3 text-center">
                                                <a href="request1details.php?cid=<?php echo htmlentities($row['reqNumber']);?>">
                                                <button type="button" class="px-7 py-1.5 text-start text-sm font-semibold text-purple-600 bg-purple-200 rounded-full">View Details</button></a>
                                            </td>
                                    </tr>
                                </tbody>
                                <?php }?>
                            </table>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>
