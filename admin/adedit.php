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
	$state=$_POST['state'];
	$description=$_POST['description'];
	$id=intval($_GET['id']);
$sql=mysqli_query($conn,"update state set stateName='$state',stateDescription='$description',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="State info Updated !!";

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
                <div class="h-2 bg-sky-400 rounded-t-md"></div>
                    <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" name="Category" method="post" action="">
                        <?php
                            $id=intval($_GET['id']);
                            $query=mysqli_query($conn,"select * from state where id='$id'");
                            while($row=mysqli_fetch_array($query))
                            {
                        ?>
                        <h1 class="mb-6 font-sans text-2xl font-bold text-center uppercase text-sky-600">Edit Department</h1>
                    <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" name="Category" method="post" action="" >
                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-1">
                            <div>
                                <label class="block  my-3 font-semibold text-sky-600 text-xl" for="state">Department Name</label>
                                <input type="text" placeholder="Enter Department Name"  name="state" value="<?php echo  htmlentities($row['stateName']);?>" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  required />
                            </div>
                            <div>
                                <label class="block mt-5 my-3 font-semibold text-sky-600 text-xl" for="description">Description</label>
                                <textarea class="w-full px-4 py-7 rounded-lg bg-zinc-100 focus:outline-none" name="description" required ><?php echo  htmlentities($row['stateDescription']);?></textarea></div>
										</div>
                            <?php } ?>
                            <div class="grid place-items-center">
                                <div>
                                    <button type="submit" name="submit" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 hover:bg-sky-800 rounded-lg">Update</button>
                                </div>
                            </div>
                        </div>
					</form>
			</div>
		</div>
</body>
</html>
