<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else


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
    <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
        <?php
        include('./include/sidebar.php');
        ?>
        <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-20 xl:px-12">
            <div class="h-2 bg-sky-400 rounded-t-md"></div>
            <form class="min-w-full p-10 pl-10  bg-white-100 rounded-lg shadow-xl xl:px-10" method="post" action="">
                <h1 class="mb-8 font-sans text-2xl font-bold text-center text-white-900">Complaint Details</h1>
                    <?php $st='closed';
                        $query=mysqli_query($conn,"select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                <div class="box-border font-sans bg-white-200 mt-10 h-100 w-full p-4 border-4 border-sky-300 rounded-lg">
                    <div class="ml-24 grid grid-cols-1 gap-2 xl:grid-cols-6">
                        <label class="block font-sans my-2 font-semibold text-black-800 text-md">Complaint Number </label>
          		        <div class="block bg-sky-200 rounded-lg w-full my-4 font-semibold text-gray-800 text-md text-center">
          		            <p><?php echo htmlentities($row['complaintNumber']);?></p>
          		        </div>
                        <label class="block my-2 font-semibold text-gray-800 text-md"><p>Complainant Name </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p> <?php echo htmlentities($row['name']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Reg Date </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['regDate']);?></p>
                        </div>
                    </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Category </p> </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['catname']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>SubCategory </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['subcategory']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Complaint Type </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['complaintType']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>State</p> </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['state']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Nature of Complaint</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['noc']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Asset Complaint </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['complainasset']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Complaint Details </p> </label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo htmlentities($row['complaintDetails']);?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>File(if any)</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php $cfile=$row['complaintFile'];
                                if($cfile=="" || $cfile=="NULL")
                                {
                                echo "File NA";
                                }
                                else{?>
                                <a href="../users/complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target="_blank"/> View File</a>
                                <?php } ?>
                            </p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Final Status</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                                <p> <?php if($row['status']=="")
                                    { echo "Not Process Yet";
                                    } else {
                                    echo htmlentities($row['status']);
                                    }?>
                                    <?php $ret=mysqli_query($conn,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
                                    while($rw=mysqli_fetch_array($ret))
                                    {
                                ?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Remark </p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo  htmlentities($rw['remark']); ?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Remark Date :</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo  htmlentities($rw['rdate']); ?></p>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Status :</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                            <p><?php echo  htmlentities($rw['sstatus']); ?></p>
                            <?php } ?>
                        </div>
                        <label class="block my-3 font-semibold text-gray-800 text-md"><p>Action</p></label>
                        <div class="block my-3 font-semibold text-gray-800 text-md">
                             <p><?php if($row['status']=="closed"){
                                } else {?>
                                <a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
                                <button type="button" class="btn btn-primary">Take Action</button></td>
                                </a><?php } ?></td>
                                <td colspan="4"> 
                                <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
                                <button type="button" class="btn btn-primary">View User Detials</button></a></td>
                                <?php  } ?>
                            </p>
                        </div>

                    </div>
        </div>
    </div>
  </body>
</html>