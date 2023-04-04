<?php
    session_start();
    error_reporting(0);
    include('include/config.php');
    include('./include/Tsidebar.php');
    include('./include/header.php');
    if ($_SESSION['role'] != 'admin')
    {
    header('location:index.php');
    }
    else{
    if(isset($_POST['update']))
    {
$fundnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($conn,"insert into fundremark(fundNumber,status,remark) values('$fundnumber','$status','$remark')");
$sql=mysqli_query($conn,"update fund set status='$status' where fundNumber='$fundnumber'");
  if($status == "closed")
  {
  $query1=mysqli_query($conn,"select *from fund where fundNumber='".$_GET['cid']."'");
  while($row=mysqli_fetch_array($query1))
  {
$sendername = $row['name'];
$sender = $row['eml'];
}
$toema = "itteam@healthopinion.net";
$subjct = "Requirement Status";
$strHeader = "";
		$strHeader .= "MIME-Version: 1.0\n";
		$strHeader .= "Content-type:text/html; charset=iso-8859-1\n";
		$strHeader .= "From: CMS\r\n";
$fullmessg = "Hi ".$sendername.",<br/><br/>
		 Your Requirement has been closed. Due to below Reason<br/>
		<b>Requirement Number: </b>".$complaintnumber."<br/>
                 <b>Reason : </b>".$remark."<br/>
		<br/><br/>";
mail($toema,$subjct,$fullmessg,$strHeader);
if($sender)
{
mail($sender,$subjct,$fullmessg,$strHeader);
}
}
echo "<script>alert('Requirement details updated successfully');</script>";
  }
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<body>
<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Fund Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>