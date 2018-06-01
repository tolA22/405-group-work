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
	$id = $_GET['view'];


	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT * FROM PROJECT WHERE ProjectID='$id'";
$result =  $conn-> query($query);
if(!$result) die($conn->error );
$i  = 0;


	$ProjectID = $id;
$result ->data_seek($i);
	$p_abstract =$result->fetch_assoc()['p_abstract'];
$result ->data_seek($i);
	$key2 =$result->fetch_assoc()['s_matricnumber'];
$result ->data_seek($i);
	$p_literaturereview =$result->fetch_assoc()['p_literaturereview'];
$result ->data_seek($i);
	$p_methodology =$result->fetch_assoc()['p_methodology'];
$result ->data_seek($i);
	$p_analysis =$result->fetch_assoc()['p_analysis'];
$result ->data_seek($i);
	$p_conclusion =$result->fetch_assoc()['p_conclusion'];
								
$conn->close();

$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT s_firstname,s_lastname FROM STUDENT WHERE s_matricnumber='$key2'";
$result2 =  $conn-> query($query);
if(!$result2) die($conn->error );
$j  = 0;

$result2 ->data_seek($j);
	$s_firstname =$result2->fetch_assoc()['s_firstname'];
$result2 ->data_seek($j);
	$s_lastname =$result2->fetch_assoc()['s_lastname'];	

}


echo '

							<li class="breadcrumb-item active
							" >
								<a class="active" href="viewproject.php?view='.$ProjectID.'">'.$s_firstname." " .$s_lastname.'\'s Project'.'</a>
							</li>
						</ul>
					</div>
				</div>

				<div style=" margin-top:5%; background-color: ghostwhite" class="row supervisorMargin" >
					<div  class="col-12 ">
						
						<div  class="row supervisorSmallBox">
							<div style="text-align:center; " class="col-12">	
							<img style= " " src = "">
							</div>
						</div>	
							<div style="background-color: white;" class="row">
										<div style="color: black;text-align:center; " class="col-12">
											<img style= " " src = "">
											<div class="row">
												<div class="col">
													<div>
													<h4>Project Abstract</h4>
													<div>	
													<div style="width:100%; overflow-y:scroll; resize:none; min-height:60%; border:2px solid purple; text-align:left" readonly="">
													<p>'. $p_abstract.'</p>
													</div>
												</div>

											</div>
											<div style="margin-top:2%" class="row">
												<div  class="col">
													<div>
													<h4>Project Literature Review</h4>
													<div>	
													<div style="width:100%; overflow-y:scroll; resize:none; min-height:60%; border:2px solid purple; text-align:left" readonly="">
													<p>'. $p_literaturereview.'</p>
													</div>
												</div>

											</div>

											<div style="margin-top:2%" class="row">
												<div  class="col">
													<div>
													<h4>Project Methodology</h4>
													<div>	
													<div style="width:100%; overflow-y:scroll; resize:none; min-height:60%; border:2px solid purple; text-align:left" readonly="">
													<p>'. $p_methodology.'</p>
													</div>
												</div>

											</div>

											<div style="margin-top:2%" class="row">
												<div  class="col">
													<div>
													<h4>Project Analysis</h4>
													<div>	
													<div style="width:100%; overflow-y:scroll; resize:none; min-height:60%; border:2px solid purple; text-align:left" readonly="">
													<p>'. $p_analysis.'</p>
													</div>
												</div>

											</div>

											<div style="margin-top:2%" class="row">
												<div  class="col">
													<div>
													<h4>Project Conclusion</h4>
													<div>	
													<div style="width:100%; overflow-y:scroll; resize:none; min-height:60%; border:2px solid purple; text-align:left" readonly="">
													<p>'. $p_conclusion.'</p>
													</div>
												</div>

											</div>


											<div style="margin-top:2%" class="row">
												<div  class="col">
														
													<a href = "viewprojectsupervisor.php?view='.$ProjectID.'"> <button style="border-radius: 0; background-color: purple; color: 	white; width: 30%; margin-right: 2%" class="btn float-right" ><h6 style="display: inline; font-size:12px">VIEW EXAMINERS</h6> <img style="width: 10%;" src="img/edit.svg"></button></a>
												</div>

											</div>

										</div>
										
									</div>

							

							</div>
									

									
'; 



?>