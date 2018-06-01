<?php





echo '
<body>
	
	<div class="container-fluid">
		<div class="row " >
			<div class="col-2   makeWhite"> 
			<div style="position : fixed;padding-top: 1.4%; max-width: inherit "  class="row " >
			<div 	 class="col-12 " >
				
					<h4  style="padding-bottom: 5%; border-bottom: solid 2px black"> ADMIN DASHBOARD </h4>

				<div class="dashList">
					<ul>
						<li>
							<span><img style="width: 9%; margin-right: 2%"	 class="float-left" src="img/dashboard.svg" alt="image">
								<a style="color:black" href="index.php">
								<h5>Dashboard</h5>		
								</a>
							</span>
						</li>
						<li>
							<span><img style="width: 9%; margin-right: 2%"	 class="float-left" src="img/teacher.svg" alt="image">
								<a style="color:black" href="supervisor.php">
								<h5>View Examiners</h5>		
								</a>	
							</span>
						</li>
						<li>
							<span><img style="width: 9%; margin-right: 2%"	 class="float-left" src="img/classmates.svg" alt="image">
								<a style="color:black" href="student.php">
								<h5>View Students</h5>		
								</a>	
							</span>
						</li>
						<li>
							<span><img style="width: 9%; margin-right: 2%"	 class="float-left" src="img/books-stack.svg" alt="image">
								<a style="color:black" href="project.php">
								<h5>Manage Projects</h5>		
								</a>	
							</span>
						</li>
						<li>
							<span><img style="width: 9%; margin-right: 2%"	 class="float-left" src="img/a-mark.svg" alt="image">
								<a style="color:black" href="scores.php">
								<h5>View Scores</h5>		
								</a>	
							</span>
						</li>
					</ul>
				</div>
				
			

			</div>
			</div>
			</div>
			<div class="col-10 makeGray ">
				<div style="padding-bottom: 2%" class="row paddingTop giveMargin2">
					<div class="col-3">
						<h4>Admin Dashboard</h4>
					</div>
					<div class="col-9">
						
						<a  href="../group/AdminLogin.php"><img style="width: 3%; padding:2px padding-left:10px" class="float-right" src="img/user.svg" alt="msgimage"></a>
						<a  href="admindashboard.php"><img style="width: 3% ; padding: 2px; margin:0" class="float-right" src="img/bdashboard.svg" alt="iconimage"></a>

					</div>
				</div>
				<div  class="row  giveMargin2 makeWhite">
					<div class="col " >
						<ul class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="index.php">Admin</a>
							</li>';
  ?>