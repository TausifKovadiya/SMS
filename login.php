<?php
ob_start();
include('dbcon.php');
if(isset($_SESSION['uid'])) 
{
	header('location:admindash.php');
	//exit();
}



if (isset($_POST['login'])) 
{
	 $adminname = mysqli_real_escape_string($con,$_POST['aname']);
	 $password  = md5($_POST['pswd']);
	 
	 $qry="SELECT * FROM `admin` WHERE username='$adminname' AND password='$password' limit 1";
	 
	 $run=mysqli_query($con,$qry);
	 $row =mysqli_num_rows($run);
	
   if($row < 1)
    {
		?> 
		<script>
		 alert("Admin name or Password didn't match !!");
		 window.open('login.php','_self');
		   </script>
        <?php
    }
    else
	{
		$dt=  date('Y-m-d h:i:s');
		mysqli_query($con,"update admin set last_login='$dt' where username='$adminname'");
		$data = mysqli_fetch_assoc($run);
		$id = $data['id'];
		
		
		$_SESSION['uid'] = $id;
		header('location:admindash.php');
		//exit();
		
	}


}

include('header.php');

?>


<!--<!DOCTYPE HTML>
<html lang="en_US">
<head>
  	<meta charset="UTF-8">
    <title>Admin Login</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>-->
<br>
<br>
<div class= "container-fluid">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
        	<form  id="log" action="login.php" method="post">
            <h1 class="login_h1">Login Form</h1>
        	<img class="img img-responsive" src="login_Image/login.gif" style="width:150px;
	margin:auto;">
                <div class="form-group">
                <lable class="loginlabel">Admin Name</lable>
                <input type="text" name="aname" class="form-control" placeholder="Enter Name">
                </div>
                
                <div class="form-group">
                <lable class="loginlabel">Password</lable>
                <input type="password" name="pswd" class="form-control" placeholder="Enter Password">
                </div>
                
                <div class="checkbox" style="margin-left:20px;">
                	<lable><input type="checkbox">Remember Me</lable>
                </div>
                
                <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                
        	</form>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12"></div>

	</div>
</div>
<!--</body>
</html>-->

       
<?php
include_once('footer.php');
ob_flush();
?>   
