<?php


echo'
<div style="background-color: purple; height:  50px" class="row">
										<div style="color: white; margin:auto 0 ; " class="col-12">
											<h5 >Add Examiner</h5>
											
										</div>
										
									</div>
									<div  class="row">	
										<div class="col-12">	
											<form  action="addsupervisor.php" method="post">
												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">First Name:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_firstname" required="" value="">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Last Name:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_lastname" required="" value="">	
												</div>
													</div>
												</div>
												
												
												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Staff Number:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="number" name="s_staffnumber" required="" value="" >	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Default Password:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_password" required="" value="">	
												</div>
													</div>
												</div>


												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Phone Number:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_phonenumber" required="" value="+234">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">E-mail:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="email" name="s_mail" required="" value="@unilag.edu.ng" pattern="[a-z]*(@unilag.edu.ng){1}">	
												</div>
													</div>
												</div>

												<div class="row"> 
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Department:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_department" required="" value="">	
												</div>
													</div>	
													<div class="col-6">
														<div class="form-group">
													<label style="display: block; color: gray">Faculty:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_faculty"  value="science">	
												</div>
													</div>
												</div>

												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label style="display: block; color: gray">Address:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 100%; border-bottom-color: purple; background-color: ghostwhite " type="text" name="s_address" value="">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label style="display: block; color: gray">Picture:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 100%; border-bottom-color: purple; background-color: ghostwhite" type="file" name="s_picture" value="">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col ">
														<input class="float-right" style="text-align:center; color: white; background-color: purple; height: 50px " type="submit" name="addSupervisorBtn" value="ADD EXAMINER" >
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
include("database.php");

if(isset($_POST["addSupervisorBtn"])){
	if(isset($_POST["s_firstname"])&&isset($_POST["s_lastname"])&&isset($_POST["s_password"])&&isset($_POST["s_staffnumber"])&& isset($_POST["s_phonenumber"])&& isset($_POST["s_mail"]) && isset($_POST["s_department"])&& isset($_POST["s_faculty"])&& isset($_POST["s_address"])&& isset($_POST["s_picture"])){

	$query = "INSERT INTO EXAMINER(s_firstname,s_lastname,s_staffnumber, s_password,s_phonenumber, s_mail,s_department,s_faculty,s_address,s_picture) VALUES('".$_POST["s_firstname"]."','".$_POST["s_lastname"]."','".$_POST["s_staffnumber"]."','".$_POST["s_password"]."','".$_POST["s_phonenumber"]."','".$_POST["s_mail"]."','".$_POST["s_department"]."','".$_POST["s_faculty"]."','".$_POST["s_address"]."','".$_POST["s_picture"]. "')";
	
	$result =  $conn->query($query);
	if(!$result) die($conn->error );

	$conn -> close();
}
echo '
	<script>
		document.getElementById("success").style.display = "block";
	</script>


	';	
}
?>