<?php
session_start();
include('include/config.php');
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<body>
    <div>
    <?php
         include('./include/Tsidebar.php');
         include('./include/header.php');
    ?>
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">
            <div class="h-full ml-14 mt-20 mb-10 md:ml-64">
                <!-- Client Table -->
                <div class="mt-4 mx-4">
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50 ">
                                        <th class="px-4 py-3">Requirement Number </th>
                                        <th class="px-4 py-3">User Name</th>
                                        <th class="px-4 py-3">Reg Date</th>
                                        <th class="px-4 py-3">Category</th>
                                        <th class="px-4 py-3">SubCategory</th>
                                        <th class="px-4 py-3">Requirment Type</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">Requirement Details</th>
                                        <th class="px-4 py-3">Requirement File</th>
                                        <th class="px-4 py-3">Requirement For</th>
                                        <th class="px-4 py-3">Final Status</th>
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
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        <?php echo htmlentities($row['reqNumber']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['name']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['regDate']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['catname']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['subcategory']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['reqType']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['reqfor']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php echo htmlentities($row['reqDetails']);?>
                                        </td>
                                        <td class="py-4 px-6">
                                        <?php $cfile=$row['reqFile'];
                                            if($cfile=="" || $cfile=="NULL")
                                            {
                                            echo "File NA";
                                            }
                                            else{?>
                                            <a href="../users/reqdocs/<?php echo htmlentities($row['reqFile']);?>" target="_blank"/> View File</a>
                                            <?php } ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php echo htmlentities($row['vendor']); ?>
                                        </td>


                                        <td class="py-4">
                                            <form method="post" action="">
                                                <input type="hidden" name="row_id" value="<?= $row['reqNumber']; ?>" />
                                                <button type="submit" name="approved"
                                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-green-600 border border-green-500 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Approve
                                                </button>


                                            </form>
                                            <form method="post" action="">


                                                <input type="hidden" name="row_id" value="<?= $row['reqNumber']; ?>" />
                                                <button
                                                    class="inline-flex items-center justify-center px-6 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-500 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                                                    type="submit" name="rejected">Reject</button>
                                            </form>
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
