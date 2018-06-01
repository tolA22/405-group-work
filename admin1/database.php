<?php 
 $hostname='localhost';
$db= 'PROJECTSUPERVISION';
$userName = 'root';
$password = '';	



$conn  = new mysqli($hostname,$userName,$password,$db);
if($conn-> connect_error )die($conn-> connect_error);

 ?>