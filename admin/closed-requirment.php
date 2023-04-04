<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}



?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Department</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/dist/output.css" rel="stylesheet">
        <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    },
                    screens: {
                        ss: "320px",
                        // => @media (min-width: 640px) { ... }

                        sm: "375px",
                        sl: "425px",

                        md: "768px",
                        // => @media (min-width: 768px) { ... }

                        lg: "1024px",
                        // => @media (min-width: 1024px) { ... }

                        xl: "1280px",
                        // => @media (min-width: 1280px) { ... }

                        desktop: "1440px",
                        // => @media (min-width: 1536px) { ... }
                    },
                },
                container: {
                    padding: {
                        DEFAULT: "1rem",
                        sm: "2rem",
                        lg: "4rem",
                        xl: "5rem",
                        "2xl": "6rem",
                    },
                },
            }
        </script>
<body>

            <?php
            include('./include/sidebar.php');
            ?>
            <div class="h-full  mb-50 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 150px;padding-right: 150px;">
                <div class="h-2 bg-sky-400 rounded-t-md"></div>
                <form class="min-w-full p-20 pl-100  bg-white rounded-lg shadow-xl " method="post" action="" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-600 ">Closed Complaints</h1>
                    <!-- <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-10 py-3 text-center mr-2 mb-2 ml-6">Edit</button> -->
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
											<th class="px-6 py-3 text-start">Requirment No</th>
											<th class="px-6 py-3 text-start">Requirement Name</th>
											<th class="px-6 py-3 text-start">Reg Date</th>
											<th class="px-6 py-3 text-start">Status</th>
											<th class="px-6 py-3 text-start">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
$st='closed';
$query=mysqli_query($conn,"select requirements.*,users.fullName as name from requirements join users on users.id=requirements.userId where requirements.status='$st'");
while($row=mysqli_fetch_array($query))
{
?>		
										<tbody class="text-base  text-black font-semibold  even:bg-white-100 odd:bg-sky-50">	
										<tr>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['reqNumber']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['name']);?></td>
											<td class="px-6 py-3 text-start"><?php echo htmlentities($row['regDate']);?></td>
                                            <td><button type="button" class="px-7 py-1.5 text-sm font-semibold text-green-600 bg-green-200 rounded-full">Closed</button></td>
											<td>

                                            <a href="requirements-details.php?cid=<?php echo htmlentities($row['reqNumber']);?>"  class="px-7 py-1.5 text-sm font-semibold text-purple-600 bg-purple-200 rounded-full">View Details
                                                        
                                                    </a>
                                        </td>

											
										<?php  } ?>
</tbody>
										
								</table>
                                                    
                                                
                            </div>
                            <!-- <div class="flex justify-center">
                                <a href="#" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-center">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>Previous</a>
                                <a href="#" class="inline-flex items-center px-4 py-2 mr-3 text-base  text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg text-center">Next
                                    <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                            </div> -->
                                                    </div>
                </div>

            </div>
        </div>
</body>
</html>
