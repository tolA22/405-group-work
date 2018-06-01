<?php


echo'
<div style="background-color: purple; height:  50px" class="row">
										<div style="color: white; margin:auto 0 ; " class="col-12">
											<h5 >Grading Scale</h5>
											
										</div>
										
									</div>
									<div  class="row">	
										<div class="col-12">	
											<form  action="grade.php" method="post">
												<div class="row"> 
													<div class="col-12">
														
													<label style="display: block; color: gray">PROJECT ABSTRACT SCORE:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="p_abstractscore" required="" value="">	
													</div>
													
												</div>
												
												
												<div class="row"> 
													<div class="col-12">
														
													<label style="display: block; color: gray">PROJECT LITERATURE REVIEW SCORE:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="p_literaturereviewscore" required="" value="">	
													</div>
													
												</div>
												


												<div class="row"> 
													<div class="col-12">
														
													<label style="display: block; color: gray">PROJECT METHODOLOGY SCORE:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="p_methodologyscore" required="" value="">	
													</div>
													
												</div>
												

												<div class="row"> 
													<div class="col-12">
														
													<label style="display: block; color: gray">PROJECT ANALYSIS SCORE:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="p_analysisscore" required="" value="">	
													</div>
													
												</div>
												
												

												<div class="row"> 
													<div class="col-12">
														
													<label style="display: block; color: gray">PROJECT CONCLUSION SCORE:</label>
													<input style="border-top: 0; border-left: 0; border-right: 0; height: 35px; width: 300px; border-bottom-color: purple; background-color: ghostwhite " type="text" name="p_conclusionscore" required="" value="">	
													</div>
													
												</div>

												<div class="row">
													<div class="col ">
														<input class="float-right" style="text-align:center; color: white; background-color: purple; height: 50px " type="submit" name="submitGradeBtn" value="SUBMIT GRADING SCALE" >
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
if(isset($_POST['submitGradeBtn'])){
	if(isset($_POST['p_abstractscore']) && isset($_POST['p_literaturereviewscore']) && isset($_POST['p_methodologyscore']) && isset($_POST['p_analysisscore']) && isset($_POST['p_conclusionscore'])){

		$p_abstractscore=$_POST['p_abstractscore'];
		$p_literaturereviewscore = $_POST['p_literaturereviewscore'];
		$p_methodologyscore = $_POST['p_methodologyscore'];
		$p_analysisscore = $_POST['p_analysisscore'];
		$p_conclusionscore = $_POST['p_conclusionscore'];


		$query = "INSERT INTO GRADE (NO,ABSTRACTSCORE,LITERATUREREVIEWSCORE,METHODOLOGYSCORE,ANALYSISSCORE,CONCLUSIONSCORE) VALUES (1,$p_abstractscore,$p_literaturereviewscore,$p_methodologyscore,$p_analysisscore,$p_conclusionscore)";
		$result = $conn->query($query);
		if(!$result){
			
			$query = "UPDATE GRADE SET ABSTRACTSCORE = ".$p_abstractscore.", LITERATUREREVIEWSCORE =". $p_literaturereviewscore." ,METHODOLOGYSCORE =". $p_methodologyscore." , ANALYSISSCORE =". $p_analysisscore .", CONCLUSIONSCORE =". $p_conclusionscore." WHERE NO = 1" ;
		$result = $conn->query($query);
		}
		$conn->close();

	}
	echo '
	<script>
		document.getElementById("success").style.display = "block";
	</script>


	';

}

?>