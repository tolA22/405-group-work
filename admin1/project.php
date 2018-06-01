<?php

echo '
	<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
 

 
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>';
include("admindashboard.php");
echo'
<li class="breadcrumb-item active
							" >
								<a class="active" href="project.php">View Projects</a>
							</li>
						</ul>
					</div>
				</div>

				<div style=" margin-top:5%; background-color: ghostwhite" class="row supervisorMargin" >
					<div  class="col-12 ">
						
						<div  class="row supervisorSmallBox">
							<div class="col-12">	
									<div style="background-color: purple;" class="row">
										<div style="color: white; " class="col-9">
											<h5>Projects</h5>
											<h6>Here is a List of submitted Projects</h6>
										</div>
										<div class="col-3">
											<button style="	margin-top: 5%; border-radius: 0;" class="btn btn-secondary float-right" onclick="location=\'grade.php\'">CREATE GRADING SCALE</button>
										</div>
									</div>
									<div  class="row">	
										<div class="col-12">	
											<table style="	margin:0; color: purple; font-weight: lighter;" class="table table-light table-striped table-hover">
												<tr>	
														<th>Project ID	</th>
														<th>Student\'s Name</th>
														<th>Available Examiners</th>
														<th>Modify</th>
												</tr>	
';												
include("database.php");

$query = "SELECT * FROM Project";
$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

for ($i=0; $i < $rows ; ++$i) { 
	$result ->data_seek($i);
	echo '<tr style="	color:black">	';
	$key=$result->fetch_assoc()['ProjectID'];
	$result ->data_seek($i);
	$key2 = $result->fetch_assoc()['s_matricnumber'];
	echo '<th>'.$key.'</th>';
	$query ="SELECT s_firstname,s_lastname FROM STUDENT WHERE STUDENT.s_matricnumber=$key2";
	$result2 = $conn->query($query);
	if(!$result2) die($conn->error );
	$j = 0;
	$result2 ->data_seek($j);
	$s_firstname = $result2->fetch_assoc()['s_firstname'];
	$result2 ->data_seek($j);
	$s_lastname = $result2->fetch_assoc()['s_lastname'];
	echo '<th style="width:30%">'.$s_firstname.' '.$s_lastname.'</th>';

	$query="SELECT * FROM EXAMINER";
	$result3 = $conn->query($query);
	if(!$result3) die($conn->error );
	$rows3  = $result3-> num_rows;
	echo '<th> <select name="'.$key.'" onblur="changeAnchor(this)"><option>Select Examiner</option>';
	for ($k=0; $k < $rows3; ++$k) { 
		# code...
		$result3 ->data_seek($k);
		$s_firstname = $result3->fetch_assoc()['s_firstname'];
		$result3 ->data_seek($k);
		$s_lastname = $result3->fetch_assoc()['s_lastname'];
		$result3 ->data_seek($k);
		$s_staffnumber = $result3->fetch_assoc()['s_staffnumber'];
		echo "<option value = '$s_staffnumber' >$s_firstname $s_lastname </option>";

	}

	echo "</select> </th>";

	echo '<th><a id="'.$key.'" href=" "> <button style="border-radius: 0; background-color: green; color: 	white; width: 45%; margin-right: 2%" class="btn float-left" ><h6 style="display: inline; font-size:12px">ADD</h6> <img style="width: 20%;" src="img/edit.svg"></button></a>';
	echo '
		<a href = "viewproject.php?view='.$key.'"> <button style="	border-radius: 0; background-color: purple; color: 	white; width: 45%;margin-right: 2%" class="btn float-left"><h6 style="display: inline;">VIEW/EDIT</h6> <img style="width: 25%" src="img/edit.svg"></button></a>

		
	</th>';

	echo '</tr>';
}
echo '</table>
 </div>
									</div>	
							</div>
							
							

						</div>
									
						</div>
					</div>
				</div>	
			
				
			
		</div>';
		// $tola = crc32(140805008);
		// echo $tola; 
		echo'

		
	</div>
';
if (isset($_GET['add'])) {
	$id = explode(" ",$_GET['add']);
	$key= $id[0];
	$s_staffnumber=$id[1];
	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "INSERT INTO RESULT (ProjectID,s_staffnumber) VALUES ('$key','$s_staffnumber')";
$result =  $conn-> query($query);
if(!$result){
	echo "<script> alert('Already assigned to the examiner') </script> ";
}else{
	echo"<script>alert('Examiner added successfully')</script>";
}
echo '<script>location="project.php"</script>';
$conn->close();
}


	  




echo '

<script>

function changeAnchor(obj){
	id=obj.name;
	
	var b = obj.options[obj.selectedIndex].value;

	document.getElementById(id).href="project.php?add="+id+" "+b;
} 	

</script>
</body>
</html>';

$result->close();
$conn->close();
  ?>