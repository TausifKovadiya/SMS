<?php 	
error_reporting(E_ALL);
include_once('dbcon.php');
include('header.php');


		if (isset($_SESSION['uid']))
		{
		echo "";	
		}
		else
		{
			header('location:login.php');	
		}
?>		
<?php 
//echo "<br><br><br><br><br>";
//print_r($_POST);

if (isset($_POST['submit']))
{
	
	$sname = $_POST['sname'];
	$gender = $_POST['gender'];
	$std = $_POST['std'];
	$fee = $_POST['fee'];
	
	$simg = time().'.jpg';	
	$tempname = $_FILES['stu_img']['tmp_name'];
	$pcont = $_POST['pcont'];
	$add = $_POST['add'];
	$rollno = $_POST['rollno'];
	
	$check = "SELECT * FROM `student` WHERE `Standard`= '$std' AND `RollNumber`='$rollno'";
	$run1 = mysqli_query($con,$check)  or die(mysqli_error($con));
	$checkrow =  mysqli_num_rows($run1);
	
	if ($checkrow == 0) {
	move_uploaded_file($tempname,"dataimg/$simg");
	

  $qry = "INSERT INTO `student`(`StudentName`, `Gender`, `Standard`, `TuitionFee`,`StudentPhoto`, `ParentsMobileNumber`, `Address`, `RollNumber`) VALUES ('$sname','$gender','$std','$fee','$simg','$pcont','$add','$rollno')";

$run = mysqli_query($con, $qry) or die(mysqli_error($con));
    if ($run == true) {
	  ?>
	    <script>
	    alert('Data Inserted Successfully.');
	    </script>
	  <?php
    }
	}
	else { ?>
	    <script>
	    alert('Roll Number Already Exist.');
	    </script>
	  <?php
		 
		}

}
?>


<div style="background-color:brown; color:white ;margin:0px 50px; height:110px;"><br><br>

<h1 align="center">Welcome To Admin Dashboard</h1>
<h3><a href="logout.php" style="float:right;"><button class="btn btn-danger btn-md">LogOut</button></a></h3>
<h3><a href="admindash.php" style="float:left;"><button class="btn btn-primary btn-md">Back to AdminDash</button></a></h3>
</div><br>
<br>



<div class="container" style="margin:10px;">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title" align="center">Insert Student</div>
               
            </div>  
            <div class="panel-body" >
                <form method="post" action="insertstudent.php" enctype="multipart/form-data" name="student">
                  
                     
                        <div id="sname" class="form-group required">
                            <label for="sname" class="control-label col-md-4  requiredField"> Student Name</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="sname"  name="sname"  style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>
                        
                          <label for="gender"  class="control-label col-md-4  requiredField"> Gender</label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="gender" id="gender" value="Male"  style="margin-bottom: 10px;" required>Male</label>
                                 <label class="radio-inline"> <input type="radio" name="gender" id="gender" value="Female"  style="margin-bottom: 10px;"required>Female </label>
                            </div>
                        
                        
                        <div id="std" class="form-group required">
                            <label for="std" class="control-label col-md-4  requiredField">Standard </label>
                            <div class="controls col-md-8 ">
                               
                                <select name="std" class="form-control" style="margin-bottom: 10px"required>
                                 <option value="">Select Your Standard</option>
                                 <option value="7">STD-7</option>
                                 <option value="8">STD-8</option>
                                 <option value="9">STD-9</option>
                                 <option value="10">STD-10</option>
                                 <option value="11">STD-11</option>
                                 <option value="12">STD-12</option>
                                </select>
                            </div>     
                        </div>
                        <div id="fee" class="form-group required">
                            <label for="fee" class="control-label col-md-4  requiredField">Tuition Fee</label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="fee" name="fee"  style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>
                        <div id="simg" class="form-group required">
                             <label for="simg" class="control-label col-md-4  requiredField">Student Photo</label>
                             <div class="controls col-md-8 ">
                                <input class="input-md  form-control" id="stu_img" name="stu_img" style="margin-bottom: 10px" type="file" />
                            </div>
                        </div>
                        <div id="pcont" class="form-group required"> 
                            <label for="pcont" class="control-label col-md-4  requiredField">Parents Contact No.</label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="pcont" name="pcont" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>
                        <div id="add" class="form-group required">
                          
                        <div id="add" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField">Address </label>
                            <div class="controls col-md-8 "> 
                                 <textarea rows="4" cols="50" class="form-control" name="add" style="margin-bottom: 10px" required/></textarea>
                            </div>
                        </div> 
                        
                        
                        <div id="rollno" class="form-group required">
                            <label for="rollno" class="control-label col-md-4  requiredField">Roll No. </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="rollno" name="rollno" style="margin-bottom: 10px" type="text" required/>
                            </div> 
                        </div>
						
						 <div class="form-group"> 
                         <div class="col-sm-offset-4 col-sm-10">
                         <input type="submit" name="submit" class="btn btn-success" value="Add Student">
                         </div>
                         </div>
                        </div>
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
</body>
</html>