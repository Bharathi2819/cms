<?php
session_start();
include('include/config.php');
include('include/header.php');
include('include/sidebar.php');
if(strlen($_SESSION['alogin'])==0)
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
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
                <div class="h-2 bg-sky-400 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-600 ">New Requirement</h1>
                    <ul class="flex items-center justify-end">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button type="button" value="Requirement"  onclick="document.location.href='1New-Requirements.php'" checked class="px-4 py-2 text-sm font-semibold  text-black bg-gradient-to-r from-sky-100 via-sky-200 to-sky-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-200 dark:focus:ring-sky-300 bg-white border-2 border-sky-400 rounded-l-lg ">
                                    Material
                                    </button>
                                    <button type="button" value="Fund" onclick="document.location.href='1New-Fund.php'" class="px-6 py-2 text-sm font-semibold text-black bg-gradient-to-r from-white-100 via-white-200 rounded-r-md to-white-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-white-200   dark:focus:text-white  dark:focus:ring-white-300 bg-white border-2 border-white-400 ">
                                    Fund
                                    </button>
                                </div>
                            </ul>
                <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-sky-600 uppercase bg-sky-200">
											<th class="px-6 py-3 text-start">Requirement No</th>
											<th class="px-6 py-3 text-start">Name</th>
											<th class="px-6 py-3 text-start">Reg Date</th>
											<th class="px-6 py-3 text-start">Status</th>
											<th class="px-6 py-3 text-start">Action</th>
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
                                    requirements.status IS NULL LIMIT $start_from, $per_page_record ");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                ?>
										<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">	
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['reqNumber']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['name']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['regDate']);?></td>
                                            <td><button type="button" class="px-4 py-1.5 text-sm font-semibold text-red-600 bg-red-200 rounded-full">Not process yet</button></td>
											<td>
                                            <a href="tmaterial-details.php?cid=<?php echo htmlentities($row['reqNumber']);?>"  class="px-4 py-1.5 text-sm font-semibold text-sky-600 bg-sky-200 rounded-full">View Details

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
                                $total_records_query = "SELECT COUNT(*) FROM requirements where status IS NULL ";
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

            </div>
        </div>
</body>
</html>
<?php } ?>
<?php } ?>