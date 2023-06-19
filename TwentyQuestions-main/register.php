<?php
session_start();
include'CreateAccountPage.html';
$server="localhost";
$username="root";
$password="";
$db="20questions";
$conn =new mysqli($server,$username,$password,$db);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);

echo"Connected successfully";
}


@$FirstName=$_POST['FirstName'];
@$LastName=$_POST['LastName'];
@$eMail=$_POST['eMail'];

@$Username=$_POST['Username'];

@$Password=$_POST['Password'];

$Password = sha1($Password);

/*Need to catch the duplicate username exception with primary key*/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
	$sql="INSERT INTO members(FirstName,LastName,eMail,Username,Password, filename) 
	VALUES('$FirstName','$LastName','$eMail','$Username', '$Password', 'avatar.png')";
	$query=mysqli_query($conn,$sql);

	if($query) {
		echo"<h1>Your information is stored Successfully</h1>";
		header("location: loginPage.html");
	}

} catch (\mysqli_sql_exception $e) {
	if($e->getCode() == 1062) {
		echo '<script type="text/javascript"> window.onload = function () { alert ("Username is taken, please try another one."); } </script>';
	}
	else {
		throw $e;
	}
}


mysqli_close($conn);
?>