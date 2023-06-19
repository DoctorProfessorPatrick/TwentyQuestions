<?php 
session_start();
if (!isset($_SESSION['loggedin']))
{
	header('location: PlayerOptions.php');
	exit;
}

error_reporting(0);

$msg = "";

if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;
	$uName1 = $_SESSION['username'];

	
	$db = mysqli_connect("localhost", "root", "", "20questions");

	$sql = "UPDATE members SET filename = '$filename' WHERE Username = '$uName1'";
	
	$query = mysqli_query($db, $sql);

	if ($query) {
		echo "<h3> Image uploaded successfully!</h3>";
	}
	else {
		echo "<h3> Failed to upload image! </h3>";
	}


}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>PLAYER PROFILE</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet1.css">
	<style>
		.avatar {
			display: grid;
			grid-template-columns: 75px 75px 75px 75px;
            grid-column-start: span;
            grid-template-rows: 75px 75px;
            gap: 50px;
			vertical-align: left;
			border-radius: 50%;
			margin-top: 100px;
		}	

		.button {
			border-radius: 50%;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}

		.output {
			object-fit: cover;
			opacity: 1;
			transition: opacity .2s ease-in-out;
			position: relative;
			border-radius: 50%;
		}

		.profile-pic {
			position: relative;
			height: 200px;
			width: 200px;
			border-radius: 50%;
			overflow: hidden;
		}


		.overlay {  
			position: absolute;   
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			display: flex;
			background: rgba(0, 0, 0, 0.2);   
			width: 100%;  
			opacity:0;   
			transition: opacity .2s ease-in-out;  
			font-size: 25px;  
			padding: 20px;  
		}		  

		.profile-pic:hover .overlay {
			opacity: 1.5;
		}

		.profile-pic:hover .output {
			opacity: .5;
		}

		.right_pane {
			width: 400px;
			float: right;
			margin-right: 150px;
			margin-left: 20px
		}

		.left_pane {
			width: 400px;
			float: left;
			margin-right: 20px;
			margin-left: 175px;
		}

		h2 {
			display: inline;
			margin-left: 30px;
			margin-top: 20px;
		}

		table {
			border: 8px solid #f2f2f2;
			padding: 5px;
		}
		
		tr, td {
			font-family: verdana;
			color: #9485FA;
			font-size: 20px;
			padding: 7px;
		}

		th {
			padding: 10px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		h4 {
			display: inline-block;
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
			transition: opacity .2s ease-in-out;  
			font-size: 25px;  
			padding: 20px;  
			height: 100px;
			width: 300px;
			justify-content: center;
			margin-left: 25px;
		}

		.container2 {
			position: relative;
			display: flex;
			float: right;
			justify-content: center;
			overflow: hidden;
			height: 350px;
			width: 350px;
			margin-right: 100px;

		}

		.container2:hover .overlay2 {
			opacity: 1.5;
		}

		.container2:hover .category {
			opacity: .5;
		}
	</style>
	 <script>
		function change() {
			document.getElementByID("newImage");
		}

	}
	</script> 
</head>
<body>
	<?php
		$uName1 = $_SESSION['username'];

		$db = mysqli_connect("localhost", "root", "", "20questions");

		$sql = "SELECT filename FROM members WHERE Username = '$uName1'";
		$result = mysqli_query($db, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$file = $row['filename'];

			$file_name = $file;
		
		}
	else {
		echo "<h3> No file name </h3>";
	}
	?>
	<h1>Twenty Questions</h1>
	<div class="left_pane">

	<div class="profile-pic">
	  <img class="output" id="output" src="./image/<?php echo $file_name;?> " width="200" height="200" title="Change Image"/>
	  
		  <div class="overlay">
			<form action="" method="POST" enctype="multipart/form-data">
				<input class="file" id="file" type="file" name="uploadfile" />
				<button type="submit" name="upload" onclick="change()">UPLOAD</button>
			</form>

		  </div>

	
	</div>

	<h2>Hello <?php echo $_SESSION['username']; ?>!</h2>



	
	<div class="avatar">

		<h3>Your Avatars:</h3>
		
		<!-- if score val is <> this.value => display this avatar else display lock -->
		<?php 

		$host = "localhost"; 
		$db = "20Questions";  
		$usr = "root";  
		$pw =""; 
        $conID = new mysqli($host, $usr, $pw, $db);

		$uName1 = $_SESSION['username'];
		$SQL = "SELECT score FROM members WHERE Username = '$uName1'";

		$result = $conID->query($SQL);
		$score = mysqli_fetch_array($result);
		
		if($score['score'] < 1) {
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'><br>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
		}
		else if($score['score'] > 1 && $score['score'] <= 5){
			echo "<img border='0' class='avatar' src='Panda.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'><br>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
		}

		else {
			echo "<img border='0' class='avatar' src='Panda.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='Vanilla.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'><br>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
			echo "<img border='0' class='avatar' src='lock2.png' width='100' height='100'>";
		}
	?>
		
	</div>
		</div>

	<div class="right_pane">

		<h2>Achievements</h2><br><br>

		<?php 

		$host = "localhost"; $db = "20Questions";  $usr = "root";  $pw =""; // change ???? 
        $conID = new mysqli($host, $usr, $pw, $db);

		$uName1 = $_SESSION['username'];
		$SQL = "SELECT score FROM members WHERE Username = '$uName1'";

		$result = $conID->query($SQL);
		$score = mysqli_fetch_array($result);
	
		if($score['score'] < 1) {
			echo "<img border='0' src='badge.png' width='50' height='50'><h4>Play your first game to earn badges!</h4><br />";
		}
		else{
			echo "<img border='0' src='badge.png' width='50' height='50'><h4>You played your first game, congrats!</h4><br>";
			echo "<img border='0' src='badge.png' width='50' height='50'><h4>You reached a score above 1, Nice job!</h4><br>";
		}
	?>
		<br>
		<br>
		<table>
			<th>Ranking</th>
			<th>Username</th>
			<th>Score</th>
	<?php 

	$host = "localhost"; $db = "20Questions";  $usr = "root";  $pw =""; // change ???? 
        $conID = new mysqli($host, $usr, $pw, $db);

	$SQL = "SELECT Username, score FROM members ORDER BY score DESC";

	$result = $conID->query($SQL);

	$ranking = 1;

	if(mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr><td>{$ranking}</td>
				  <td>{$row['Username']}</td>
				  <td>{$row['score']}</td></tr>";
				  $ranking++;
		}
	}
	?>
	</table>

	<div class="container2">
		
		<a href="PlayerCategory.php">
			<img border="0" class="category" src="whale.png" width="300" height="300">
		</a>

		<div class="overlay2">
		<h4>Choose a Category</h4>
		</div>
	</div>

	</div>

	
	
</body>
</html>