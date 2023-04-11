
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
<div class="h-full  mb-10 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " >
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class=" font-sans text-2xl font-bold text-center uppercase text-sky-800 ">User Login Details</h1>
					<div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
                                    <thead>
                                        <tr class="text-base leading-normal text-white uppercase bg-sky-800">
                                            <th class="px-6 py-3 text-left">S.NO</th>
                                            <th class="px-6 py-3 text-start">User Email</th>
                                            <th class="px-6 py-3 text-start">User IP</th> 
                                            <th class="px-6 py-3 text-start">Login Time</th>
                                            <th class="px-6 py-3 text-start">Logout Time</th>
                                            <th class="px-6 py-3 text-start">Status</th>
                                        </tr>
                                    </thead>
									<?php $query=mysqli_query($conn,"select * from userlog LIMIT $start_from, $per_page_record");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
									?>	
									<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
                                        <tr >								
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($cnt);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['username']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['userip']);?></td>
											<td class="px-6 py-3 text-start"> <?php echo htmlentities($row['loginTime']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['logout']); ?></td>
										<td class="px-6 py-3 text-start">
											<?php $st=$row['status'];
													if($st==1)
													{
														echo "Successfull";
													}
													else
													{
														echo "Failed";
													}
														?>
										</td>
										<?php $cnt=$cnt+1; } ?>
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
                                $total_records_query = "SELECT COUNT(*) FROM userlog ";
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
                                            echo '<li><span class="inline-flex items-center px-4 py-2 mr-3 text-base text-white bg-pink-500 font-medium rounded-lg">' . $i . '</span></li>';
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
	</div>
</script>
</body>
</html>
<?php } ?>
<?php } ?>