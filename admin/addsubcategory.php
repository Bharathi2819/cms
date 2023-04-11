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
if(isset($_GET['del']))
		  {
		    mysqli_query($conn,"delete from subcategory where id = '".$_GET['id']."'");
            $_SESSION['delmsg']="SubCategory deleted !!";
		  }

?>
<body>
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 ">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-800 ">SUB-CATEGORY</h1>
                    <!-- <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-10 py-3 text-center mr-2 mb-2 ml-6">Edit</button> -->
                    <div class="grid grid-cols-2 gap-4 xl:grid-cols-2">
                        <div>
                            <a href="asadd.php" type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-base px-10 py-3 text-center mr-2 mb-2">Add</a>
                        </div>
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
                    </div>
                    <div class="overflow-x-auto">
                        <div class="w-full lg:w-6/6">
                            <div class="my-10 bg-white rounded shadow-md">
                                <table class="w-full table-auto min-w-max">
								    <thead>
										<tr class="text-base leading-normal text-white uppercase bg-sky-800">
											<th class="px-6 py-3 text-start">SNO</th>
											<th class="px-6 py-3 text-start">Category</th>
											<th class="px-6 py-3 text-start">Description</th>
											<th class="px-6 py-3 text-start">Creation date</th>
											<th class="px-6 py-3 text-start">Last Updated</th>
											<th class="px-6 py-3 text-start">Action</th>
										</tr>
									</thead>
                                        <?php $query=mysqli_query($conn,"select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid LIMIT $start_from, $per_page_record" );
                                              $cnt=1;
                                              while($row=mysqli_fetch_array($query))
                                              {
                                        ?>	
                                    <tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">
                                        <tr >
											<td class="px-6 py-3 text-center"><?php echo htmlentities($cnt);?></td>
											<td class="px-6 py-3 text-start" ><?php echo htmlentities($row['categoryName']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['subcategory']);?></td>
											<td class="px-6 py-3 text-start"> <?php echo htmlentities($row['creationDate']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['updationDate']);?></td>
                                            <td class="px-6 py-3 text-center">
                                                <div class="flex justify-start item-center">
                                                    <a href="asedit.php?id=<?php echo $row['id']?>" class="w-5 mr-2 transform text-green-500 hover:text-green-800 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                    <a href="addsubcategory.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="w-5 mr-2 transform text-red-500 hover:text-red-800 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
									    </tr>
										  <?php $cnt=$cnt+1; } ?>
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
                                $total_records_query = "SELECT COUNT(*) FROM subcategory ";
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
</body>
</html>
<?php } ?>
<?php } ?>