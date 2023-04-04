<?php
session_start();
include('include/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($conn,"insert into complaintremark(complaintNumber,status,remark) values('$complaintnumber','$status','$remark')");
$sql=mysqli_query($conn,"update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");
if($status == "closed")
{
$query1=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name,users.userEmail as eml,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query1))
{
$sendername = $row['name'];
$sender = $row['eml'];
}
$toema = "itteam@healthopinion.net";
$subjct = "Complaint Status";
$strHeader = "";
		$strHeader .= "MIME-Version: 1.0\n";
		$strHeader .= "Content-type:text/html; charset=iso-8859-1\n";
		$strHeader .= "From: CMS\r\n";
$fullmessg = "Hi ".$sendername.",<br/><br/>
		 Your Complaint has been closed. Due to below Remark<br/>
		
		<b>Complaint Number: </b>".$complaintnumber."<br/>		
                 <b>Remark : </b>".$remark."<br/>
		
		<br/><br/>";
mail($toema,$subjct,$fullmessg,$strHeader);
if($sender)
{
mail($sender,$subjct,$fullmessg,$strHeader);
}
}
echo "<script>alert('Complaint details updated successfully');</script>";
  }
 ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Department</title>
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
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 " >
            <div class="h-full  mb-50 ml-64 mt-16 md:ml-64 md:px-20 xl:px-12 " style="padding-left: 550px;padding-right: 550px;margin-top:200px;" >
                <div class="h-2 bg-sky-400 rounded-t-md"></div>
                <form class="min-w-full p-10 pl-100  bg-white rounded-lg shadow-xl " name="updateticket" id="updatecomplaint" method="post" >
                    <h1 class="mb-10 font-sans text-2xl font-bold text-center uppercase text-sky-600 ">Remarks</h1>
                    <div>
                            <label class="block mt-10 my-3 font-semibold text-sky-600 text-xl" >Complaint Number</label>
                            <input class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" value="<?php echo htmlentities($_GET['cid']) ?>" >
                        </div>
                        <div  class="block mt-8" >
                            <label class="block mt-3 my-3 font-semibold text-sky-600 text-xl" for="status">Status</label>
                            <select type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  required  name="status"  required >
                              <option value="">Select Status</option>
                              <option value="in process">In Process</option>
                              <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div  class="block mt-8" >
                            <label class="block mt-3 my-3 font-semibold text-sky-600 text-xl" for="status">Remark</label>
                            <textarea type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none"  name="remark" placeholder="Remark" required ></textarea>
                        </div>
                        <div class="grid place-items-center">
                            <div>
                                <button type="submit" name="update" class="px-10 py-3 mt-8 mb-3 font-sans text-xl font-semibold tracking-wide text-white bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 hover:bg-sky-800 rounded-lg">Submit</button>
                            </div>
                        </div>

 </form>
</div>

</body>
</html>

     <?php } ?>