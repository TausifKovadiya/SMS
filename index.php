<?php  include_once('header.php'); ?>
<!--<!DOCTYPE HTML>
<html lang="en_US">
<head>
  	<meta charset="UTF-8">
    <title>Student Management System</title>
</head>
<body>-->
<br>
 <h1 align="center" style="margin-top:50px;color:red;" >Welcome to A<sub>2</sub>Z Tuition</h1><hr>
<div class="container-fluid">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      
    </ol>

    <!-- Wrapper for slides -->
 <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="login_Image/indian.jpg" alt="indian" width="1260" height="845">
      </div>
     
      <div class="item"> 
        <img src="login_Image/leaves.jpg" alt="leaves" width="1260" height="845">
      </div> 
 </div>
     
     <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
     
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      
    </a>
  </div>
</div>

     
    <div  class="container-fluid studentbg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12"> 
        
        	
            
            
        <form id="log" action="index.php" method="post">
            <center><h1>Student Info</h1></center>
        	<hr color = "green">
                <div class="form-group">
                  <lable for="std">Select Standard</lable>

                 	 <select class="form-control" id="std" >
                                <option value="7">STD-7</option>    	
                                <option value="8">STD-8</option>
								<option value="9">STD-9</option>												
								<option value="10">STD-10</option>												
								<option value="11">STD-11</option>												
								<option value="12">STD-12</option>												
				 	 </select>															
				</div>						                                
                
                   <div class="form-group">
                <lable>Roll No.</lable>
                <input type="text" name="rollno" class="form-control" placeholder="Enter Roll Number">
                </div>
                
               
                <button type="submit" class="btn btn-success btn-block" name="submit">Show Student Details</button>
                
        	</form>
       </div>
		<div style="margin-top:-800px;" class="col-md-4 col-sm-4 col-xs-12"><h3 style="margin:50px;"><a href="login.php"><button type="btn" class="btn-danger btn-block">Admin Login</button></a></h3></div>

	</div>
</div>   
<?php  include_once('footer.php')  ?>
<!--</body>
</html>-->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
             
    
      
  
   
   


