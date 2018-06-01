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
								<a class="active" href="scores.php">View Scores</a>
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
											<h5>Scores</h5>
											<h6>Here is a List of Student\'s Scores</h6>
										</div>
										
									</div>
									<div  class="row">	
										<div class="col-12">	
											<table style="	margin:0; color: purple; font-weight: lighter;" class="table table-light table-striped table-hover">
												<tr>	
														<th>Project ID	</th>
														<th>Student\'s Matric Number</th>
														<th>Student\'s Name</th>
														
														<th>Score</th>
														<th>View Breakdown</th>
												</tr>	
';												
include("database.php");

$query = "SELECT DISTINCT RESULT.ProjectID,STUDENT.s_matricnumber,STUDENT.s_firstname,STUDENT.s_lastname,AVG(RESULT.r_total) AS total FROM((PROJECT INNER JOIN RESULT ON PROJECT.ProjectID = RESULT.ProjectID) INNER JOIN STUDENT ON PROJECT.s_matricnumber = STUDENT.s_matricnumber) GROUP BY RESULT.ProjectID ";

$result =  $conn-> query($query);
if(!$result) die($conn->error );

$rows  = $result-> num_rows;

for ($i=0; $i < $rows ; ++$i) { 

	echo'<tr style="color:black"> <th>';
	$result->data_seek($i);
	$ProjectID = $result->fetch_assoc()['ProjectID'];
	$result->data_seek($i);
	$s_matricnumber = $result->fetch_assoc()['s_matricnumber'];
	$result->data_seek($i);
	$s_firstname = $result->fetch_assoc()['s_firstname'];
	$result->data_seek($i);
	$s_lastname = $result->fetch_assoc()['s_lastname'];
	$result->data_seek($i);
	$total = $result->fetch_assoc()['total'];
	echo $ProjectID.'</th>';
	echo '<th>'.$s_matricnumber.'</th>';
	echo '<th>'.$s_firstname.' '.$s_lastname.'</th>';
	echo '<th>'.$total.'</th></tr>';

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