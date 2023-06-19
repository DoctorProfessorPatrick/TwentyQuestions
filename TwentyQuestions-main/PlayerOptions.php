﻿<?php 
session_start();
if (!isset($_SESSION['loggedin']))
{
	header ('location: loginPage.html');
	exit;
}
?>
<!DOCTYPE html>

<html>

<head>
    <title>PLAYER_OPTIONS</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet1.css">
	<style>
		
		.container {
			position: relative;
			display: flex;
			justify-content: center;
			overflow: hidden;
			height: 350px;
			width: 350px;
			float: left;
			margin-left: 250px;
			
		}

		h4 {
			color: BLACK;
		}

		h3 {
			color: BLACK;
			display:flex;
		}

		.overlay1 {
			position: absolute;   
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			display: flex;
			justify-content: center;
			margin-left: 8px;
			margin-top: 185px;
			width: 100%;  
			opacity:0;   
			transition: opacity .5s ease-in-out;  
			font-size: 25px;  
			padding: 20px;  
			height: 270px;
			width: 300px;
		}

		.overlay2 {
			position: absolute;   
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			display: flex;
			width: 100%;  
			opacity:0;   
			transition: opacity .5s ease-in-out;  
			font-size: 25px;  
			padding: 20px;  
			height: 100px;
			width: 300px;
			justify-content: center;
			margin-left: 55px;
		}

		.container2 {
			position: relative;
			display: flex;
			float: right;
			justify-content: center;
			overflow: hidden;
			height: 350px;
			width: 350px;
			margin-right: 250px;

		}

		.container:hover .overlay1 {
			opacity: 1.5;
		}

		.container:hover .profile {
			opacity: .5;
		}

		.container2:hover .overlay2 {
			opacity: 1.5;
		}

		.container2:hover .category {
			opacity: .5;
		}
	</style>
	
</head>

<body>

	<h1>Twenty Questions</h1>
	<h2>Welcome <?php echo $_SESSION['username']; ?>! </h2>

	
	<div class="container">
		<a href="PlayerProfile.php">
		<img border="0" class="profile" src="icon.png" width="250" height="250">
		</a>
		<div class="overlay1"><br />
		<h4>View Player Profile</h4>
		</div>
	</div>

	<div class="container2">
		
		<a href="PlayerCategory.php">
			<img border="0" class="category" src="whale.png" width="300" height="300">
		</a>

		<div class="overlay2">
		<h4>Choose a Category</h4>
		</div>
	</div>
</body>
</html>