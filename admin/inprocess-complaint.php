<?php
session_start();
include('include/config.php');
include('./include/header.php');
include('./include/sidebar.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
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
            <div class="h-full  mb-20 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 ">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="font-sans text-2xl font-bold text-center uppercase text-sky-800 ">In Process Complaints</h1>
                    <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-white uppercase bg-sky-800">
                                        <th class="px-6 py-3 text-start">C.No</th>
											<th class="text-start">Name</th>
                                            <th class="text-start">Department</th>
                                            <th class="text-start">Complaint Type</th>
											<th class=" text-start">Register Date</th>
											<th class=" px-10 py-3 text-start">Status</th>
											<th class=" px-6 py-3 text-start">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $st='in process';
                                        $query=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.status='$st' LIMIT $start_from, $per_page_record");
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
                                            <td  class="text-start"><button type="button" class="px-12 py-1.5 text-sm font-semibold text-yellow-600 bg-yellow-200 rounded-full">In Process</button></td>
											<td  class="text-start">
                                            <a href="tcomplaintdetails.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"  class="px-4 py-1.5 text-sm font-semibold text-gray-50 bg-pink-500 rounded-full">View Details

                                                    </a>
                                        </td>
										<?php  } ?>
</tbody>

								</table>
                            </div>
                            <div class="flex justify-center mt-10">
                                <?php
                                // Set the number of records to display per page
                                $records_per_page = 6;

                                // Get the current page number from the URL
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                                // Calculate the offset for the current page
                                $offset = ($current_page - 1) * $records_per_page;

                                // Query the database to get the total number of records
                                $total_records_query = "SELECT COUNT(*) FROM tblcomplaints where status='in process' ";
                                $total_records_result = mysqli_query($conn, $total_records_query);
                                $total_records = mysqli_fetch_array($total_records_result)[0];

                                // Calculate the total number of pages
                                $total_pages = ceil($total_records / $records_per_page);

                                // Display the pagination links
                                if ($total_pages > 1) {
                                    echo '<nav class="flex justify-center">';
                                    echo '<ul class="flex">';
                                    // Display the "Previous" button if the current page is not the first page
                                    if ($current_page > 1) {
                                        echo '<li><a href="?page=' . ($current_page - 1) . '" class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 hover:text-gray-800 font-medium rounded-lg">Previous</a></li>';
                                    }

                                    // Display the first page link if it is not already displayed
                                    if ($current_page > 3) {
                                        echo '<li><a href="?page=1" class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 hover:text-gray-800 font-medium rounded-lg">1</a></li>';
                                        if ($current_page > 4) {
                                            echo '<li><span class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 font-medium rounded-lg">...</span></li>';
                                        }
                                    }

                                    // Display the numbered page links
                                    for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $total_pages); $i++) {
                                        if ($i == $current_page) {
                                            echo '<li><span class="inline-flex items-center px-4 py-2 mr-3 text-base text-white bg-gray-600 font-medium rounded-lg">' . $i . '</span></li>';
                                        } else {
                                            echo '<li><a href="?page=' . $i . '" class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 hover:text-gray-800 font-medium rounded-lg">' . $i . '</a></li>';
                                        }
                                    }

                                    // Display the last page link if it is not already displayed
                                    if ($current_page < $total_pages - 2) {
                                        if ($current_page < $total_pages - 3) {
                                            echo '<li><span class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 font-medium rounded-lg">...</span></li>';
                                        }
                                        echo '<li><a href="?page=' . $total_pages . '" class="inline-flex items-center px-4 py-2 mr-3 text-base text-gray-600 hover:text-gray-800 font-medium rounded-lg">' . $total_pages . '</a></li>';
                                    } ?>
                                                        </div>
                        </div>
                    </div>
               </form>
            </div>
        </div>
</body>
</html>
<?php } ?>
