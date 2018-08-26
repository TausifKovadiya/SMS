<?php 
include_once('dbcon.php');
//$sid = $_SESSION['updateid'];

//echo "<pre>";
//print_r($_POST);
//die();
if(isset($_POST['update']))
{
	$extra='';
	$sid = $_POST['stu_id'];
	$sname = $_POST['sname'];
	$gender = $_POST['gender'];
	$std = $_POST['std'];
	$fee = $_POST['fee'];	
	
	$pcont = $_POST['pcont'];
	$add = $_POST['add'];
	$rollno = $_POST['rollno'];
	
	$check = "SELECT * FROM `student` WHERE `Standard`= '$std' AND `RollNumber`='$rollno' and id!='$sid' ";
	$run1 = mysqli_query($con,$check)  or die(mysqli_error($con));
	$checkrow =  mysqli_num_rows($run1);
	
	if ($checkrow == 0) {
	
	if(is_uploaded_file($_FILES['stu_img']['tmp_name']))
	{
		$tempname = $_FILES['stu_img']['tmp_name'];
		$simg = time().'.jpg';	
		move_uploaded_file($tempname,"dataimg/$simg");
		$extra = " `StudentPhoto`='$simg',";
	}
	

   $qry = "UPDATE `student` SET `StudentName`='$sname',`Gender`='$gender',`Standard`='$std',`TuitionFee`='$fee',$extra`ParentsMobileNumber`='$pcont',`Address`='$add',`RollNumber`='$rollno' WHERE `id` ='$sid' "; 
 
 $run = mysqli_query($con, $qry) or die(mysqli_error($con));
    if ($run == true) {
		
	  ?>
	    <script>
	    alert('Data Updated Successfully.');
		window.location.href = 'updatestudent.php'; 
		
	    </script>
	  <?php
	
    }
	}
	else
	{
		?>
	    <script>
	    alert('Roll Number Already Exist.');
		window.location.href = 'updatestudent.php'; 
	    </script>
	  <?php
	}
}


if(isset($_GET['id']) && $_GET['action'])
{
	$img = $_GET['imgname'];
	 $sid = $_GET['id'];
	
	@unlink("dataimg/$img");

  $qry = "DELETE FROM `student` WHERE `id`='$sid'"; 
 
 $run = mysqli_query($con, $qry) or die(mysqli_error($con));
    if ($run == true) {
		
	  ?>
	    <script>
	    alert('Data Deleted Successfully.');
		window.location.href = 'updatestudent.php'; 
		
	    </script>
	  <?php
	
    }
}
	
?>