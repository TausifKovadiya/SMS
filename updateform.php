<?php 	
include_once('dbcon.php');
include('header.php');

$sid = $_GET['sid'];
//$_SESSION['updateid']= $sid;
$sql = "SELECT * FROM `student` WHERE `id`='$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);


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
<h3><a href="admindash.php" style="float:left;"><button class="btn btn-primary btn-md">Back to AdminDash</button></a></h3>
</div><br>
<br>


<div class="container" style="margin-top:-40px;">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title" align="center">Update Student Details</div>
               
            </div>  
            <div class="panel-body" >
                <form method="post" action="updatedata.php" enctype="multipart/form-data" name="student">
                  
                     
                        <div id="sname" class="form-group required">
                            <label for="sname" class="control-label col-md-4  requiredField"> Student Name</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="sname"  name="sname"  style="margin-bottom: 10px" type="text" value=<?php echo $data['StudentName']; ?>>
                            </div>
                        </div>
                        
                          <label for="gender"  class="control-label col-md-4  requiredField"> Gender</label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="gender" id="gender"  value="Male"<?php if( $data['Gender']=='Male') { echo "checked" ; }?>  style="margin-bottom: 10px;">Male</label>
                                 <label class="radio-inline"> <input type="radio" name="gender" id="gender"  value="Female"<?php if($data['Gender']=='Female') { echo "checked" ; }?>  style="margin-bottom: 10px;">Female </label>
                            </div>
                        
                        
                          <div id="std" class="form-group required">
                            <label for="std" class="control-label col-md-4  requiredField">Standard </label>
                            <div class="controls col-md-8 ">
                               
                                <select name="std" class="form-control" style="margin-bottom: 10px"required>
                                 <option value="">Select Your Standard</option>
                                 <option value="7"  <?php if($data['Standard']==7) { echo "selected" ; }?>>STD-7</option>
                                 <option value="8" <?php if($data['Standard']==8) { echo "selected" ; }?>>STD-8</option>
                                 <option value="9" <?php if($data['Standard']==9) { echo "selected" ; }?>>STD-9</option>
                                 <option value="10" <?php if($data['Standard']==10) { echo "selected" ; }?>>STD-10</option>
                                 <option value="11" <?php if($data['Standard']==11) { echo "selected" ; }?>>STD-11</option>
                                 <option value="12" <?php if($data['Standard']==12) { echo "selected" ; }?>>STD-12</option>
                                </select>
                            </div>     
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                      
                        <div id="fee" class="form-group required">
                            <label for="fee" class="control-label col-md-4  requiredField">Tuition Fee</label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="fee" name="fee"  style="margin-bottom: 10px" type="text" value=<?php echo $data['TuitionFee']; ?>>
                            </div>
                        </div>
                        <div id="simg" class="form-group required">
                             <label for="simg" class="control-label col-md-4  requiredField">Student Photo</label>
                             <div class="controls col-md-8 ">
                                <input class="input-md  form-control" id="stu_img" name="stu_img" style="margin-bottom: 10px" type="file" value=<?php echo $data['StudentPhoto']; ?>>
                            </div>
                        </div>
                        <div id="pcont" class="form-group required"> 
                            <label for="pcont" class="control-label col-md-4  requiredField">Parents Contact No.</label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="pcont" name="pcont" style="margin-bottom: 10px" type="text" value=<?php echo $data['ParentsMobileNumber']; ?>>
                            </div>
                        </div>
                        <div id="add" class="form-group required">
                          
                        <div id="add" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField">Address </label>
                            <div class="controls col-md-8 "> 
                            <textarea name="add" rows="4" cols="50" style="margin-bottom: 10px" class="form-control"><?php echo $data['Address']; ?></textarea>
                               
                            </div>
                        </div> 
                        
                        
                        <div id="rollno" class="form-group required">
                            <label for="rollno" class="control-label col-md-4  requiredField">Roll No. </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="rollno" name="rollno" style="margin-bottom: 10px" type="text" value=<?php echo $data['RollNumber']; ?>>
                            </div> 
                        </div>
						
						 <div class="form-group"> 
                         <div class="col-sm-offset-4 col-sm-10">
                         <input type="hidden" name="stu_id" value="<?php echo $data['id']; ?>" >
                         <input type="submit" name="update" class="btn btn-success" value="Update Student">
                         </div>
                         </div>
                        </div>
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
<?php include('footer.php'); ?>