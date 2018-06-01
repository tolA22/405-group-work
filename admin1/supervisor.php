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
								<a class="active" href="supervisor.php">View Examiner</a>
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
											<h5>Examiners</h5>
											<h6>Here is a List of registered Examiners</h6>
										</div>
										<div class="col-3">
											<button style="	margin-top: 5%; border-radius: 0;" class="btn btn-secondary float-right" onclick="location=\'addsupervisor.php\'">ADD EXAMINERS</button>
										</div>
									</div>
									<div  class="row">	
										<div class="col-12">	
											<table style="	margin:0; color: purple; font-weight: lighter;" class="table table-light table-striped table-hover">
												<tr>	
														<th>ID	</th>
														<th> Name</th>
														<th>Email</th>
														<th>Department</th>
														<th>Faculty</th>
														<th>Modify</th>
												</tr>	
';												
include("database.php");

$query = "SELECT * FROM Examiner";
$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

for ($i=0; $i < $rows ; ++$i) { 
	$result ->data_seek($i);
	echo '<tr style="	color:black">	';
	$key=$result->fetch_assoc()['s_staffnumber'];
	echo '<th>'.$key.'</th>';
	
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_firstname'];
	$result ->data_seek($i);
	echo ' '.$result->fetch_assoc()['s_lastname'].'</th>';
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_mail'];
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_department'];
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_faculty'];
	echo '<th><a href = "viewsupervisor.php?view='.$key.'"> <button style="border-radius: 0; background-color: purple; color: 	white; width: 40%; margin-right: 2%" class="btn float-left" ><h6 style="display: inline; font-size:12px">VIEW/EDIT</h6> <img style="width: 20%;" src="img/edit.svg"></button></a>';
	echo '
		<a href = "supervisor.php?del='.$key.'"> <button style="	border-radius: 0; background-color: red; color: 	white; width: 40%" class="btn float-left"><h6 style="display: inline;">DELETE</h6> <img style="width: 25%" src="img/delete.svg"></button></a>
	</th> </tr>';



}
echo '</table>
 </div>
									</div>	
							</div>
							
							

						</div>
									
						</div>
					</div>
				</div>	
			
				
			
		</div>

		
	</div>
';
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "DELETE FROM Examiner WHERE s_staffnumber='$id'";
$result =  $conn-> query($query);
if(!$result) die($conn->error );
echo '<script>location="supervisor.php"</script>';
$conn->close();
}


	  
	 


echo '
</script>;
</body>
</html>';
$result->close();
$conn->close();
  ?>