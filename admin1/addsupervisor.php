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
								<a  href="supervisor.php">View Examiner</a>
							</li>
							<li class="breadcrumb-item active
							" >
								<a class="active" href="addsupervisor.php">Add Examiner</a>
							</li>
						</ul>
					</div>
				</div>

				<div style=" margin-top:5%; background-color: ghostwhite" class="row supervisorMargin" >
					<div  class="col-12 ">
						
						<div  class="row supervisorSmallBox">
							<div class="col-12">	
								<div id="success" style="background-color: green; height:  30px; display:none" class="row">
										<div  style="color: white; margin:auto 0 ; text-align:center;" class="col-12">
											<h5 >Examiner successfully added</h5>
											
										</div>
										
									</div>
									
';

include("addsupervisorfooter.php");

?>