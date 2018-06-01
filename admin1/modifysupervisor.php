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

<li class="breadcrumb-item " >
								<a  href="supervisor.php">View Examiner</a>
							</li>';
include("database.php");
if (isset($_GET['modify'])) {
	$id = $_GET['modify'];

$value = 0;
	# code...
	
$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);
$query = "SELECT * FROM Examiner WHERE s_staffnumber='$id'";
$result =  $conn-> query($query);
if(!$result) die($conn->error );
$i  = 0;


	$s_staffnumber = $id;
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

if(isset($_POST["modifySupervisorBtn"])){
	if(isset($_POST["s_firstname"])&&isset($_POST["s_lastname"])&&isset($_POST["s_password"])&&isset($_POST["s_staffnumber"])&& isset($_POST["s_phonenumber"])&& isset($_POST["s_mail"]) && isset($_POST["s_department"])&& isset($_POST["s_faculty"])&& isset($_POST["s_address"])){
		include("database.php");

	$query = "UPDATE Examiner SET s_firstname='".$_POST["s_firstname"]."',s_lastname='".$_POST["s_lastname"]."', s_password='".$_POST["s_password"]."',s_phonenumber='".$_POST["s_phonenumber"]."', s_mail='".$_POST["s_mail"]."',s_department='".$_POST["s_department"]."',s_faculty='".$_POST["s_faculty"]."',s_address='".$_POST["s_address"]."' WHERE s_staffnumber='".$_POST["s_staffnumber"]."'";
	
	$result =  $conn->query($query);
	if(!$result) die($conn->error );

	$conn -> close();
	$s_firstname = $_POST["s_firstname"];
$s_lastname = $_POST["s_lastname"];
$s_staffnumber = $_POST["s_staffnumber"];
$s_password = $_POST["s_password"];
$s_mail = $_POST["s_mail"];
$s_phonenumber = $_POST["s_phonenumber"];
$s_department = $_POST["s_department"];
$s_faculty = $_POST["s_faculty"];
$s_address = $_POST["s_address"];
}
$value = 1;

}



echo '

							<li class="breadcrumb-item " >
								<a  href="viewsupervisor.php?view='.$s_staffnumber.'">'.$s_firstname." " .$s_lastname.'</a>
							</li>
							<li class="breadcrumb-item active
							" >
								<a class="active" href="modifysupervisor.php?modify='.$s_staffnumber.'">Modify</a>
							</li>
						</ul>
					</div>
				</div>
				<div style=" margin-top:5%; background-color: ghostwhite" class="row supervisorMargin" >
					<div  class="col-12 ">
						
						<div  class="row supervisorSmallBox">
							<div class="col-12">	

							<div id="success" style="background-color: green; height:  30px; display:none" class="row">
										<div style="color: white; margin:auto 0 ; text-align:center" class="col-12">
											<h5 >'.$s_firstname." " .$s_lastname. ' successfully updated</h5>
											
										</div>
										
									</div>	
							<div style="background-color: purple; height:  50px" class="row">
										<div style="color: white; margin:auto 0 ; " class="col-12">
											<h5 >Update '.$s_firstname." " .$s_lastname.'\'s Profile</h5>
											
										</div>
										
									</div>

									<div  class="row">	
										<div class="col-12">	
											<form  action="modifysupervisor.php?modify='.$s_staffnumber.'" method="post">
												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">First Name:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_firstname" required="" value="'.$s_firstname.'">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Last Name:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_lastname" required="" value="'.$s_lastname.'">	
												</div>
													</div>
												</div>
												
												
												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Staff Number:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_staffnumber" required="" value="'.$s_staffnumber.' "readonly="">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Default Password:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_password" required="" value="'.$s_password.'">	
												</div>
													</div>
												</div>


												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Phone Number:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_phonenumber" required="" value="'.$s_phonenumber.'">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">E-mail:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="email" name="s_mail" required="" value="'.$s_mail.'" pattern="[a-z]*(@unilag.edu.ng){1}">	
												</div>
													</div>
												</div>

												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Department:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_department" required="" value="'.$s_department.'">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Faculty:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_faculty" readonly="" value="'.$s_faculty.'">	
												</div>
													</div>
												</div>

												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label style="display: block; color: gray">Address:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 100%; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_address" value="'.$s_address.'">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col ">
														<input class="float-right" style="text-align:center; color: white; background-color: purple; height: 50px " type="submit" name="modifySupervisorBtn" value="MODIFY '.$s_firstname.' '.$s_lastname.'" >
													</div>
												</div>
												
											</form>
										</div>
									</div>	
							</div>
							
							

						</div>
									
						</div>
					</div>
				</div>	
			
				
			
		</div>

		
	</div>

</body>
</html>
';	
if($value === 1){
	echo '
	<script>
		document.getElementById("success").style.display = "block";
	</script>


	';
}				

?>