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

<li class="breadcrumb-item 
							" >
								<a  href="project.php">View Projects</a>
							</li>';

include("database.php");
if (isset($_GET['view'])) {
	$ProjectID = $_GET['view'];
	$query = "SELECT * FROM Project WHERE ProjectID = ".$ProjectID;
$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

$i = 0;
	$result ->data_seek($i);
	
	$key=$result->fetch_assoc()['s_matricnumber'];


	# code...


	


$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT s_firstname,s_lastname FROM STUDENT WHERE s_matricnumber='$key'";
$result2 =  $conn-> query($query);
if(!$result2) die($conn->error );
$j  = 0;

$result2 ->data_seek($j);
	$s_firstname =$result2->fetch_assoc()['s_firstname'];
$result2 ->data_seek($j);
	$s_lastname =$result2->fetch_assoc()['s_lastname'];	
$conn->close();
}else{
	$ProjectID = explode(" ",$_GET['del'])[0];;


	# code...

	$query = "SELECT * FROM Project WHERE ProjectID = ".$ProjectID;
$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

$i = 0;
	$result ->data_seek($i);
	
	$key=$result->fetch_assoc()['s_matricnumber'];
	


$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT s_firstname,s_lastname FROM STUDENT WHERE s_matricnumber='$key'";
$result2 =  $conn-> query($query);
if(!$result2) die($conn->error );
$j  = 0;

$result2 ->data_seek($j);
	$s_firstname =$result2->fetch_assoc()['s_firstname'];
$result2 ->data_seek($j);
	$s_lastname =$result2->fetch_assoc()['s_lastname'];	
$conn->close();
}


echo '

							<li class="breadcrumb-item active
							" >
								<a href="viewproject.php?view='.$ProjectID.'">'.$s_firstname." " .$s_lastname.'\'s Project'.'</a>
							</li>
							<li class="breadcrumb-item active
							" >
								<a class="active" href="viewprojectsupervisor.php?view='.$ProjectID.'">'.$s_firstname." " .$s_lastname.'\'s Project Examiners'.'</a>
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
											<h5>Project Examiners</h5>
											<h6>Here is a List of Project Examiners for '.$s_lastname.' \'s Project</h6>
										</div>
										<div class="col-3">
											<button style="	margin-top: 5%; border-radius: 0;" class="btn btn-secondary float-right" onclick="location=\'addstudent.php\'">CHECK SCORE</button>
										</div>
									</div>
									<div  class="row">	
										<div class="col-12">	
											<table style="	margin:0; color: purple; font-weight: lighter;" class="table table-light table-striped table-hover">
												<tr>	
														<th>Project ID	</th>
														<th style="width:15%">Examiners ID</th>
														<th style="width:30%">Examiners Name</th>
														<th>Department</th>
														<th>Faculty</th>
														<th style="width:30%">Modify</th>
												</tr>	
';												
include("database.php");

$query = "SELECT RESULT.ProjectID,RESULT.s_staffnumber,EXAMINER.s_firstname,EXAMINER.s_lastname,EXAMINER.s_department,EXAMINER.s_faculty FROM ((RESULT INNER JOIN EXAMINER ON RESULT.s_staffnumber=EXAMINER.s_staffnumber)) WHERE RESULT.ProjectID = '$ProjectID'";
$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

for ($i=0; $i < $rows ; ++$i) { 

	
	echo '<tr style="	color:black">	';
	$key=$ProjectID;
	echo '<th>'.$key.'</th>';
	$result ->data_seek($i);
	$s_staffnumber = $result->fetch_assoc()['s_staffnumber'];
	echo '<th>'.$s_staffnumber.'</th>';

	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_firstname'];
	$result ->data_seek($i);
	echo ' '.$result->fetch_assoc()['s_lastname'].'</th>';
	
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_department'].'</th>';
	$result ->data_seek($i);
	echo '<th>'.$result->fetch_assoc()['s_faculty'].'</th>';
	
	echo '
	<th>
		<a href = "viewprojectsupervisor.php?del='.$key.' '.$s_staffnumber.'"> <button style="	border-radius: 0; background-color: red; color: 	white; width: 45%" class="btn "><h6 style="display: inline;">DELETE</h6> <img style="width: 25%" src="img/delete.svg"></button></a>
	</th> </tr>';



}
$result->close();
$conn->close();
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
	$id = explode(" ",$_GET['del']);

	$ProjectID = $id[0];
	$s_staffnumber=$id[1];
	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "DELETE FROM RESULT WHERE s_staffnumber='$s_staffnumber' AND ProjectID='$ProjectID'";
$result2 =  $conn-> query($query);
if(!$result2) die($conn->error );

echo "<script>location='viewprojectsupervisor.php?view=$ProjectID'</script>";
$conn->close();
	  
}	 


echo '
</script>;
</body>
</html>';




  ?>