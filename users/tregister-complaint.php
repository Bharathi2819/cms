<?php
//error_reporting(0);
include("include/config.php");
include('./include/Tsidebar.php');
include('./include/header.php');
session_start();{
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
 else {
  if (isset($_POST['submit'])) {
    $uid = $_SESSION['id'];
    $category = $_POST['category'];
    $subcat = $_POST['subcategory'];
    $complaintype = $_POST['complaintype'];
    $fromdepartment=$_POST['fromdepartment'];
    $todepartment=$_POST['todepartment'];
    $departmentcode=$_POST['state_id'];
    $state=$_POST['state'];
    $location=$_POST['location'];
    $place=$_POST['place'];
    $branchcode=$_POST['branchcode'];
    $state = $_POST['state'];
    $complainasset = $_POST['complainasset'];
    $Description = $_POST['Description'];
    $compfile = $_FILES["compfile"]["name"];
    $compfile_size = $_FILES["compfile"]["size"];
    $compfile_type = $_FILES["compfile"]["type"];
    $complaintdetials = $_POST['complaindetails'];
    $compfile = $_FILES["compfile"]["name"];
    move_uploaded_file($_FILES["compfile"]["tmp_name"], "complaintdocs/" . $_FILES["compfile"]["name"]);
    $query = mysqli_query($conn, "INSERT INTO tblcomplaints(userId, category, subcategory, complaintType, complainasset, ExpiryDate, complaintDetails, fromdepartment, todepartment, departmentcode, state, location, place, branchcode, complaintFile) VALUES ('$uid', '$category', '$subcat', '$complaintype', '$complainasset', '$Description', '$complaintdetials', '$fromdepartment', '$todepartment', '$departmentcode', '$state', '$location', '$place', '$branchcode', '$compfile')");
    if ($query) {
      $sender = $_SESSION['userEmail'];
      $query1 = mysqli_query($conn, "select fullName from users where userEmail='" . $sender . "'");
      while ($row = mysqli_fetch_array($query1)) {
        $sendername = $row['fullName'];
      }
      $toema = "itteam@healthopinion.net";
      $subjct = "Complaint Form";
      $strHeader = "";
      $strHeader .= "MIME-Version: 1.0\n";
      $strHeader .= "Content-type:text/html; charset=iso-8859-1\n";
      $strHeader .= "From: CMS\r\n";
      $fullmessg = "Hi Team,<br/><br/>
		The following details are received from  <b>CMS</b><br/>
		<br/><b>Name: </b>" . $sendername . "<br/>
		<b>Email ID: </b>" . $sender . "<br/>	
		<b>Department : </b>" . $state . "<br/>	
        <b>Complaint asset : </b>" . $complainasset . "<br/>
		<b>Complaint Type : </b>" . $complaintype . "<br/>
        <b>Complaint Details : </b>" . $complaintdetials . "<br/>
		<br/>Thanks and Regards,<br/>" . ucwords($fname) . "<br/>
		<br/><br/>";


      mail($toema, $subjct, $fullmessg, $strHeader);

      if ($sender) {

        mail($sender, $subjct, $fullmessg, $strHeader);
      }
    } else {
      echo '<script> alert("Oops! Something went wrong try again !")</script>';
    }

    // code for show complaint number
    $sql = mysqli_query($conn, "select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
    while ($row = mysqli_fetch_array($sql)) {
      $cmpn = $row['complaintNumber'];
    }
    $complainno = $cmpn;
    echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"' . $complainno . '")</script>';
  }
}
?>
<body>
        <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100 ">
            <div class="h-full  mb-10 ml-64 mt-14 md:ml-64 md:px-20 xl:px-12">
                <div class="h-2 bg-pink-500 rounded-t-md"></div>
                <?php if ($successmsg) { ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Well done!</b> <?php echo htmlentities($successmsg); ?>
                  </div>
                <?php } ?>

                <?php if ($errormsg) { ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?>
                  </div>
                <?php } ?>
                <form class="min-w-full p-10 pl-10  bg-white rounded-lg shadow-xl xl:px-10" method="post" action="" enctype="multipart/form-data">
                    <h1 class="mb-6 font-sans text-2xl font-bold text-center text-sky-800 uppercase">Register Complaint</h1>
                    <div class="box-border mt-10 h-32 w-full p-4 border-4 rounded-lg">
                            <div class="grid grid-cols-1 gap-4 xl:grid-cols-4">
                                <div>
                                    <label for="state" class="block my-3 font-semibold text-gray-800 text-md ">State</label>
                                    <select type="text" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" id="state" name="state" onChange="getCat(this.value);">
                                        <option value="">Select Category</option>
                                        <?php
                                                    $sql = mysqli_query($conn, "select distinct branch_state from master_branches");
                                                            while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>
                                                <option value="<?php echo htmlentities($rw['branch_state']); ?>">
                                                    <?php echo htmlentities($rw['branch_state']); ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div >
                                    <label for="location" class="block my-3 font-semibold text-gray-800 text-md ">Location</label>
                                    <select name="location" id="branch_city" onChange="getCat1(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="place" class="block my-3 font-semibold text-gray-800 text-md ">Place</label>
                                    <select name="place" id="branch_name" onChange="getBrncode(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="branchcode" class="block my-3 font-semibold text-gray-800 text-md ">Branch Code</label>
                                    <select name="branchcode" id="branch_code" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                                        <option value="">Branch Code</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-3 mt-5">
                        <div>
                            <label for="complaintype" class="block my-3 font-semibold text-gray-800 text-md">Complaint Type</label>
                            <select name="complaintype"  class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none" required="">
                                <option value="Emergency">Emergency</option>
                                <option value="Non-Emergency">Non-Emergency</option>
                            </select>
                        </div>
                        <div>
                        <label class="block my-3 font-semibold text-gray-800 text-md" for="department1">From Department</label>
                        <select type="text" name="fromdepartment" id="department1" onchange="getDep(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                        <option value="<?php echo $_SESSION['department']?>"><?php echo $_SESSION['department']?></option>
                        </select>
                    </div>
                        <div>
                            <label class="block my-3 font-semibold text-gray-800 text-md" for="email">To Department</label>
                            <select type="text" name="todepartment" id="department1" onChange="getDep(this.value);" class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none">
                        <option value="">Select Department</option>
                            <?php
                                $sql = mysqli_query($conn, "select stateName,state_id from state");
                                while ($rw = mysqli_fetch_assoc($sql)) {
                            ?>
                        <option value="<?php echo htmlentities($rw['stateName']); ?>">
                            <?php echo htmlentities($rw['stateName']); ?></option>
                            <?php } ?>
                    </select>
                        </div>
                    </div>
                        
                        
                        <div class='grid grid-cols-1 xl:grid-cols-1 mt-5'>
                            <label for="branchcode" class="block w-8/12 my-3 font-semibold text-gray-800 ext-md">Complaint Details (max 2000 words)</label>
                            <textarea id="complaindetails" name="complaindetails" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "placeholder="Your message..."></textarea>
                        </div>
                        <div class="grid grid-cols-3 place-content-center mt-5">
                            <div>
                                <label for="branchcode"class="block w-full my-3 font-semibold text-gray-800 text-md">Complaint Related Doc(if any)</label>
                                <span class="sr-only">Choose File</span>
                                <input  type="file" name="compfile" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-500 file:text-pink-50 " value=""/>
                            </div>
                        </div>
                        <div class="grid place-items-center">
                            <div>
                                <button type="submit" name="submit"class="px-4 py-2 mt-6 mb-3 font-sans text-lg font-semibold tracking-wide text-white rounded-lg bg-pink-500 hover:bg-pink-500">Submit</button>
                            </div>
                        </div> 
                  </div>
                </form>
            </div>
        </div>
</body>
</html>
<script>
      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });
    </script>
    
<?php } ?>