<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="StyleSheet1.css">
  <style>
  body {
    text-align:center;
  }
  form {
    display: inline-block;
  }
  </style>
</head>
<body>

<?php
session_start();
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20questions";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the animal entered by the user
$animal = $_POST["animal"];
$user1 = $_SESSION['username'];
// Insert the animal into the database
$sql = "INSERT INTO animals (Animal) VALUES ('$animal')";
$sql = "UPDATE members SET score = score + .5 WHERE Username = '$user1'"; // assuming the ID of the member is 1
//for some reason the score updates by 2 no matter what here
if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error updating score: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql)) {
    echo "";
	echo "<h2>Would you like to play again or go back to the home menu?</h2>";
  echo "<button onclick=\"window.location.href='questions.php'\">Play Again</button><button onclick=\"window.location.href='PlayerOptions.php'\">Home</button>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
