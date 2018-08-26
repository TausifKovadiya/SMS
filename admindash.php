
<?php 	include('header.php');

session_start();

		if (isset($_SESSION['uid']))
		{
		echo "";	
		}
		else
		{
		header('location:login.php');	
		}
?>		


<div style="background-color:brown; color:white ;margin:0px 50px; height:110px;"><br><br>

<h1 align="center">Welcome To Admin Dashboard</h1>
<h3><a href="logout.php" style="float:right;"><button class="btn btn-danger btn-md">LogOut</button></a></h3>
</div>



<div class="container">
           
  <table class="table">
    <tbody>
      <tr>
       <td>1.</td><td><a href="insertstudent.php"><button class="btn btn-info btn-md">Insert Student</button></a></td>
      </tr>
          <tr>
       <td>2.</td><td><a href="updatestudent.php"><button class="btn btn-success btn-md">Update Student</button></a></td>
      </tr>
          <tr>
       <td>3.</td><td><a href="deletestudent.php"><button class="btn btn-danger btn-md">Delete Student</button></a></td>
      </tr>
    </tbody>
  </table>
 </div>
    
   
   
  



