<?php

session_start();

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

echo '

<li class="breadcrumb-item active
							" >
								<a class="active" href="index.php">Dashboard</a>
							</li>
						</ul>
					</div>
				</div>

					<div  class="row giveMargin2">
						<div class="col-9">
							<div class="contentBox">
								<div  class="row">
									<div class="col-5 bigBox">
										<div style="position: relative; height:150px; display: block; padding-bottom: 15px;border-bottom: 1px solid black">
											<div style="background-color: slategray; text-align: center" class="smallBox">
													<img style="width: 65%" src="	img/classroom.svg">
											</div>
											<div class="float-right">
												<span>
													<h4>Total Examiner</h4>
													<div class="value float-right" id="supervisorValue">';
													include("database.php");
													$query = "SELECT COUNT(*) AS COUNT FROM Examiner";
													$result = $conn->query($query);
													$result ->data_seek(0);
													$ans = $result->fetch_assoc()['COUNT'];
													$conn->close();
													echo $ans;
													echo'

													</div>
												</span>
											</div>
										</div>
										<div>
											<a  href="supervisor.php"><img style="width: 6%; margin-right: 4%"	 class="float-left" src="img/bteacher.svg" alt="image"><h6  style="color:purple">View Examiner</h6></a>
											
										</div>
										
									</div>
									<div class="col-5 col-offset-2 bigBox"
									>
									<div style="position: relative; height:150px; display: block; padding-bottom: 15px;border-bottom: 1px solid black">
											<div style="background-color: green; text-align: center " class="smallBox">
													<img style="width: 65%" src="	img/population.svg">
											</div>
											<div class="float-right">
												<span>
													<h4>Total Student</h4>
													<div class="value float-right" id="studentValue">';
													include("database.php");
													$query = "SELECT COUNT(*) AS COUNT FROM Student";
													$result = $conn->query($query);
													$result ->data_seek(0);
													$ans = $result->fetch_assoc()['COUNT'];
													$conn->close();
													echo $ans;
													echo'
														
													</div>
												</span>
											</div>
										</div>
										<div>
											<a  href="student.php"><img style="width: 6%; margin-right: 4%"	 class="float-left" src="img/bclassmates.svg" alt="image"><h6 style="color:purple">View Student</h6></a>
											
										</div>
									</div>
								</div>
								<div  class="row">
									<div class="col-5 bigBox">
										<div style="position: relative; height:150px; display: block; padding-bottom: 15px;border-bottom: 1px solid black">
											<div style="background-color: dodgerblue;text-align: center " class="smallBox">
													<img style="width: 65%" src="	img/file.svg">
											</div>
											<div class="float-right">
												<span>
													<h4>Total Project</h4>
													<div class="value float-right" id="projectValue">';
													include("database.php");
													$query = "SELECT COUNT(*) AS COUNT FROM Project";
													$result = $conn->query($query);
													$result ->data_seek(0);
													$ans = $result->fetch_assoc()['COUNT'];
													$conn->close();
													echo $ans;
													echo'
														
													</div>
												</span>
											</div>
										</div>
										<div>
											<a  href="project.php"><img style="width: 6%; margin-right: 4%"	 class="float-left" src="img/bbooks-stack.svg" alt="image"><h6 style="color:purple">View Project</h6></a>
											
										</div>
									</div>
									<div class="col-5 col-offset-2 bigBox">
										<div style="position: relative; height:160px; display: block; ">
											<div style="background-color: orangered ; text-align: center"  class="smallBox">
													<img style="width: 65%" src="	img/grades.svg">
											</div>
											
										</div>
										<div >
											<a  href="score.html"><img style="width: 6%; margin-right: 4%"	 class="float-left" src="img/ba-mark.svg" alt="image"><h6 style="color:purple">View Scores</h6></a>
											
										</div>
										
									</div>
								</div>
								
							</div>
						
						</div>
						<div class="col-3">
						
								<div style="width: inherit; padding-top: 15%; height: inherit;	">	
										<div style="position:relative" class="imageBox " >	
												<div style="text-align: center;margin-top: -10%; position:absolute">';
													include("database.php");
													// $query = "SELECT a_picture,a_picturename,a_picturetype AS picture FROM Admin WHERE a_mail = 'tolizu@unilag.edu.ng'";
													// $result = $conn->query($query);
													// $result ->data_seek(0);
													// $picture = $result->fetch_assoc()['a_picture'];
													// $result ->data_seek(0);
													// $picturetype = $result->fetch_assoc()['a_picturetype'];
													// $result ->data_seek(0);
													// $picturename = $result->fetch_assoc()['picturename'];
													// $conn->close();
											
													// echo $picture;

													
													echo'
												</div>
												<div  style="text-align: center;padding-top: 60%">

														<h6>';echo $_SESSION['name'].
														'</h6><br>
														<h6>';echo $_SESSION['email'].'</h6><br>
														<h6>';echo $_SESSION['number'].'</h6><br>
														<h6>';echo date("d/m/Y").'</h6><br>	
														<h6>';echo $_SESSION['lastlogin'].'</h6><br>	

												</div>

										</div>		
								</div>

						
						</div>
					</div>
			
				
			
		</div>

		
	</div>

</body>
</html>';


  ?>	