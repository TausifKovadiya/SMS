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
<script>
	function delete_me()
	{
		if (confirm("Realy Wanna Delete?"))
		{
			return true;	
		}
		return false;
	}
</script>
<div style="background-color:brown; color:white ;margin:0px 50px; height:110px;"><br><br>

<h1 align="center">Welcome To Admin Dashboard</h1>
<h3><a href="logout.php" style="float:right;"><button class="btn btn-danger btn-md">LogOut</button></a></h3>
<h3><a href="admindash.php" style="float:left;"><button class="btn btn-primary btn-md">Back to AdminDash</button></a></h3>
</div><br>
<br>

<table align="center" >
<form method="post" action="updatestudent.php">

<tr>
	<th>Student Standard : </th>
	<td><input type="text" name="s_std" ></td>

	<th>Student Name : </th>
    <td><input type="text" name="sname" ></td>
    
    <th>Gender : </th>
    <td>Male<input type="radio" name="gender"  value="Male">

   Female <input type="radio" name="gender"  value="Female">
    </td>



 	<td colspan="2"><input type="submit" name="submit" value="Search"></td>
</tr>

</form>
</table>

<table border="2" align="center" width="80%" style="margin-top:20px;" >
<tr style="color:red; background-color:#F8FF88">
	<th>No.</th>
    <th>Student Name</th>
    <th>Gender</th>
    <th>Standard</th>
    <th>Tuition Fee</th>
    <th>Student Photo</th>
    <th>Parents Mobile No.</th>
    <th>Address</th>
    <th>Roll No.</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php 

if (isset($_POST['submit']) || true)
{
	$extra ='';
	if(isset($_POST['s_std']) && $_POST['s_std']!='')
	{
		$std = $_POST['s_std'];
		$extra .= " and `Standard` = '$std'";
	}
	if(isset($_POST['sname']) && $_POST['sname']!='')
	{
		$name = $_POST['sname'];
		$extra .= " and `StudentName` LIKE '%$name%'";
	}
	if(isset($_POST['gender']) && $_POST['gender']!='')
	{
		$gender = $_POST['gender'];
		$extra .= " and `Gender` = '$gender'";
	}
	
	
    $sql = "SELECT * FROM `student` WHERE 1=1 $extra ";
    $run = mysqli_query($con, $sql);
	$cnt = mysqli_num_rows($run);
	
	if($cnt<1)
	{
		echo "<tr><td colspan='11' align='center'>No Record Found</td></tr>";	
	}
	else
	{       $count = 0;
			while($data = mysqli_fetch_assoc($run))	
		{
			$count++;
		?>
        <tr>
        	    <td><?php echo $count; ?></td>
                <td><?php echo $data['StudentName'];?></td>
                <td><?php echo $data['Gender'];?></td>
                <td><?php echo $data['Standard'];?></td>
                <td><?php echo $data['TuitionFee'];?></td>
                <td><img src="dataimg/<?php echo $data['StudentPhoto'];?>" style="max-width:100px;"></td>
                <td><?php echo $data['ParentsMobileNumber']?></td>
                <td><?php echo $data['Address'];?></td>
                <td><?php echo $data['RollNumber']?></td>
                <td><a href="updateform.php?sid=<?php echo $data['id']?>">Edit</a></td>
                <td><a onClick="return delete_me();" href="updatedata.php?id=<?php echo $data['id']?>&action=delete&imgname=<?php echo $data['StudentPhoto']?>">Delete</a></td>
                
        </tr> 
        
        <?php
		}
		
		
	}
	echo "<tr>
		<td colspan='11' align='center'>Total Result Found : $cnt</td>
		</tr>";
}
?>

</table>



