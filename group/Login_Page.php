<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>               
        <link rel="Stylesheet" href="css/LoginPage.css">  
        <title>Login Page</title>
</head>
<body> 
        <script Language="Javascript" type="text/javascript">
                 var y = "@" ; 
                        function clickMe(){
                        var email = prompt("Please enter your email address to recieve your password reset link");
                        if(email.includes(y)){
                                alert("Password Reset link sent to " + email);
                        }
                        else{
                                alert("You entered an Invalid email address");
                        }
                }
                function clickMee(){ 
                        var email = prompt("Please enter your email address to recieve your Matric Number");
                        if(email.includes(y)){
                                alert("Matric Number sent to " + email);
                        }
                        else{
                                alert("You entered an Invalid email address");
                        }
                }
        </script>
        <h1>Undergraduate Login</h1>
        <br/>
        <div id="container">   
        <!-- data-toggle lets you display modal without any JavaScript -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow">Login Here</button>
        <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
        <div class="modal-content">   
                      <!-- header -->
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Login to your Account</h3>
        <br/>
        <div class="modal-img">
             <img src="img/lock.png">  
        </div>
        </div>    
             <!-- body (form) -->
        <div class="modal-body">
        <form role="form" method="POST" action="Login_Page.php">
        <div class="form-group">
        <div id="frm">
        <label for="Username">Matric No. / Application No.</label>
        <input type="text" id="user" name="user" maxlength="9" required="" class="form-control" placeholder="Matric No. / Application No.">

        <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" id="pass" name="pass"  required="" class="form-control" placeholder="Password">
        </div>
        </div>
        <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> Remember me
        <div id="h8">
             <br/>
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow" onclick="clickMee()">Retrieve Matric No.</button>
        .     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow" onclick="clickMe()">Forgot Password</button>
        </div>
              </label>
        </div>
         <!-- button -->
        <div class="modal-footer">
        <input type="submit" name="submit" value="Submit" class="btn btn-login btn-primary btn-block">
        <br/>
        <div id="h7">
                <h7><strong>Note:</strong> Your default password is your surname in lowercase</h7>
        </div>
        </div>
        </form>
        </div>
  
       
        </div>
        </div>
        </div>    
        </div>  
</body>
</html>
<?php

if(isset($_POST['submit'])){
     include('../admin1/database.php');
    $query = 'SELECT * FROM STUDENT WHERE s_matricnumber = '.$_POST['user'].' AND s_password = "'.$_POST['pass'].'"';
    $result = $conn->query($query);
    if($result->num_rows === 0){
        echo'<script> alert("username and password mismatch")</script>';
    }else{
        session_start();
        $_SESSION['matricnumber'] = $_POST['user'];
        echo'<script>location="../project/form.php"</script>';
    }
    $conn->close();

}

?>