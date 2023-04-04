<?php
session_start();
include('include/config.php');
include('include/header.php');
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
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
                <div class="h-2 bg-sky-400 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-600 ">Closed Complaints</h1>
                    <!-- <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-10 py-3 text-center mr-2 mb-2 ml-6">Edit</button> -->

                         <!-- <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-10 py-3 text-center mr-2 mb-2 ml-6">Edit</button> -->
                        <!-- <div class="flex justify-end">
                            <div class=" relative mb-4 flex  flex-wrap items-stretch">
                                <input type="search" class="relative py-2 px-8 rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:text-neutral-200 dark:placeholder:text-neutral-200" placeholder="Search" aria-label="Search"aria-describedby="button-addon1" />
                                <button class="relative z-[2] flex items-center rounded-r text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 px-6 py-2.5 text-xs font-medium uppercase leading-tight  shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg active:bg-primary-800 active:shadow-lg" type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"viewBox="0 0 20 20"fill="currentColor"class="h-5 w-5"><path fill-rule="evenodd"d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div> -->
                    <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-sky-600 uppercase bg-sky-200">
											<th class="px-6 py-3 text-start">Complaint No</th>
											<th class="px-6 py-3 text-start">Complainant Name</th>
											<th class="px-6 py-3 text-start">Reg Date</th>
											<th class="px-6 py-3 text-start">Status</th>
											<th class="px-6 py-3 text-start">Action</th>
                                        </tr>
                                    </thead>
                                        <?php
                                            $st='closed';
                                            $query=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.status='$st' LIMIT $start_from, $per_page_record");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                        ?>
									<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['complaintNumber']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['name']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['regDate']);?></td>
                                            <td><button type="button" class="px-7 py-1.5 text-sm text-green-600 bg-green-200 rounded-full">Closed</button></td>
											<td>
                                                 <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"  class="px-4 py-1.5 text-sm text-purple-600 bg-purple-200 rounded-full">View Details</a>
                                            </td>
                                        </tr>
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
                                $total_records_query = "SELECT COUNT(*) FROM tblcomplaints where status='closed' ";
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
                </form>
            </div>
        </div>
</body>
</html>
<?php } ?>