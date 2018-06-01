


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>               
        <link rel="Stylesheet" href="css/LoginPage.css">  
        <title>Admin Login Page</title>
</head>
<body> 
        <script Language="Javascript" type="text/javascript">
                var y = "@"; 
                function clickMee(){ 
                        var email = prompt("Please enter your email address to recieve your Admin Login Info.");
                        if(email.includes(y)){
                                alert("Username sent to " + email);
                        }
                        else{
                                alert("You entered an Invalid email address");
                        }
                }
        </script>
        <h1>Admin Login</h1>
        <br/>
        <div id="container">   
        <!-- data-toggle lets you display modal without any JavaScript -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow">Click here to Login</button>
        <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
        <div class="modal-content">   
                      <!-- header -->
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Admin Access</h3>
        <div class="modal-img">
             <img src="img/administrator.png">  
        </div>
        </div>    
             <!-- body (form) -->
        <div class="modal-body">
        <form role="form" method="POST" action="AdminLogin.php">
        <div class="form-group">
        <div id="frm">
        <label for="Username">Email</label>
        <input type="text" name="mail" required="" class="form-control" placeholder="Username@unilag.edu.ng">

        <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" name="pass"  required="" class="form-control" placeholder="Enter Password">
        </div>
        <!-- <input type="submit" name="submit" value="Submit" class="btn btn-login"> -->
        </div>
        <div class="form-check">
        <label class="form-check-label">
        <!-- <input class="form-check-input" type="checkbox"> Remember me -->
        <div id="h8">
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow" onclick="clickMee()">Retrieve Admin Info.</button>
        </div>
        </label>
        </div>
         <!-- button -->
        <div class="modal-footer">
        <!-- <button class="btn btn-primary btn-block" >Submit</button> -->
        <input type="submit" name="submit" value="Submit" class="btn btn-login btn-primary btn-block" >
        <br/>
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
    $query = 'SELECT * FROM ADMIN WHERE a_mail = "'.$_POST['mail'].'" AND a_password = "'.$_POST['pass'].'"';
    $result = $conn->query($query);
    if($result->num_rows === 0){
        echo'<script> alert("username and password mismatch")</script>';
    }else{
        session_start();
        $_SESSION['email'] = $_POST['mail'];
        $result->data_seek(0);
        $_SESSION['name'] = $result->fetch_assoc()['a_name'];
        $result->data_seek(0);
        $_SESSION['username'] = $result->fetch_assoc()['a_username'];
        $result->data_seek(0);
        $_SESSION['number'] = $result->fetch_assoc()['a_number'];
        $result->data_seek(0);
        $_SESSION['lastlogin'] = $result->fetch_assoc()['a_lastlogin'];

        echo'<script>location="../Admin1/index.php"</script>';
    }
    $conn->close();

}


?>