<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
$sql=mysqli_query($conn,"insert into category(categoryName,categoryDescription) values('$category','$description')");



if($sql) {
     print_r("Registration successfull. Now You can login !");
   }
   else {
   printf("%s %s",$category,$description);
    print_r("Oops! Something went wrong try again ! \n ");

   }
   
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($conn,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
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
        <div class="h-full  mb-10 ml-64 mt-20 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 550px;padding-right: 550px;margin-top:200px;">
            <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                    <h1 class="mb-6 font-sans text-2xl font-bold text-center uppercase text-sky-800">New Department</h1>
                        <div>
                            <label class="block mt-10 my-3 font-semibold text-sky-800 text-xl" for="category">Category Name</label>
                            <input type="text" placeholder="Enter Category Name"  name="category" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  required />
                        </div>
                        <div  class="block mt-8" >
                            <label class="block mt-3 my-3 font-semibold text-sky-800 text-xl" for="description">Description</label>
                            <textarea class="w-full px-4 py-3 rounded-lg bg-zinc-100 focus:outline-none"  name="description" placeholder="Description" required ></textarea>
                        </div>
                        <div class="grid place-items-center">
                            <div>
                                <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 hover:bg-pink-800 rounded-lg">Create</button>
                            </div>
                        </div>
				</form>
		</div>
	</div>
</body>
</html>
