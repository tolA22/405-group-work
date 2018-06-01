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
								<a  href="student.php">View Student</a>
							</li>';

include("database.php");
if (isset($_GET['view'])) {
	$id = $_GET['view'];


	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT * FROM Student WHERE s_matricnumber='$id'";
$result =  $conn-> query($query);
if(!$result) die($conn->error );
$i  = 0;


	$s_matricnumber = $id;
$result ->data_seek($i);
	$s_firstname =$result->fetch_assoc()['s_firstname'];
$result ->data_seek($i);
	$s_lastname =$result->fetch_assoc()['s_lastname'];
$result ->data_seek($i);
	$s_password =$result->fetch_assoc()['s_password'];
$result ->data_seek($i);
	$s_phonenumber =$result->fetch_assoc()['s_phonenumber'];
$result ->data_seek($i);
	$s_mail =$result->fetch_assoc()['s_mail'];
$result ->data_seek($i);
	$s_department =$result->fetch_assoc()['s_department'];
$result ->data_seek($i);
	$s_faculty =$result->fetch_assoc()['s_faculty'];
$result ->data_seek($i);
	$s_address =$result->fetch_assoc()['s_address'];								
$conn->close();
}


echo '

							<li class="breadcrumb-item active
							" >
								<a class="active" href="viewstudent.php?view='.$s_matricnumber.'">'.$s_firstname." " .$s_lastname.'</a>
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
											<div class="row" >
												<div class="col">
													<h5 style ="color: gray;font-weight:lighter; "> STUDENT</h5>
												</div>

											</div>
											<div style="color: black;text-align:center; " class="row" >
												<div class="col">
													<h4>'.$s_firstname.' ' .$s_lastname.'</h4>
												</div>

											</div>
											<div style="color: black;text-align:center; " class="row" >
												<div style="text-align:right; "  class="col-5">
													<h4>Department: '.$s_department.'</h4>
												</div>
												<div class="col-5 col-offset-2">
													<h4> Faculty: ' .$s_faculty.'</h4>
												</div>
											</div>
											<div style="color: black;text-align:center; " class="row" >
												<div style="text-align:right; " class="col-5">
													<h4>MatricNumber: '.$s_matricnumber.'</h4>
												</div>
												<div class="col-5 col-offset-2">
													<h4> Password: <span  style= "color:gray " >' .$s_password.'</span></h4>
												</div>
											</div>
											<div style="color: black;text-align:center; " class="row" >
												<div class="col">
													<h4 >Address: <span style="text-decoration:underline; ">'.$s_address.'</span></h4>
												</div>

											</div>
											<div style="color: purple;text-align:center; margin-top:3% " class="row" >
												<div class="col-4">
													<img style= "display:block ;width:10%;margin:0 auto " src="img/close-envelope.svg"  alt="email">
													<h5>'.$s_mail.'</h5>
												</div>
												<div class="col-4 col-offset-0">
													<img style= "display:block ;width:10%;margin:0 auto " src="img/telephone.svg" alt="number">
													<h5>'.$s_phonenumber.'</h5>
												</div>
												<div class="col-4 col-offset-0">
													<img style= "display:block ;width:10%;margin:0 auto " src="img/title.svg"" alt="title">
													<h5>'.$s_mail.'</h5>
												</div>
											</div>

											<div style="margin-top:6%;text-align:center;" class="row">
												<div class="col" >
													<a href="modifystudent.php?modify='.$s_matricnumber.'"><button style="color:white; background-color:orangered; border-radius:3%; width:40%;" class="btn">
														<img style="display:inline-block; float:left; width:7%" src="img/edit.svg" alt="img ">
														<h6 style="text-align:center;">MODIFY STUDENT</h6>
													</button></a>
												</div>
											</div>


										</div>
										
									</div>

							

							</div>
									

									
'; 



?>