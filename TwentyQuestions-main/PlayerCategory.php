<?php 
session_start();
if (!isset($_SESSION['loggedin']))
{
	header('location: PlayerOptions.php');
	exit;
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>PLAYER CATEGORY</title>
    <link rel="stylesheet" type="text/css" href="StyleSheet1.css">
    <style>
        .container {
			position: relative;
			display: flex;
			justify-content: center;
			overflow: hidden;
			height: 250px;
			width: 350px;
			float: left;
			margin-left: 250px;
			
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
			margin-top: 120px;
			width: 100%;  
			opacity:0;   
			transition: opacity .5s ease-in-out;  
			font-size: 25px;  
			padding: 20px;  
			height: 270px;
			width: 300px;
		}

		.container:hover .overlay1 {
			opacity: 1.5;
		}

		.container:hover .profile {
			opacity: .5;
		}

        </style>

        </head >
        <body >
        <h1>Twenty Questions</h1>
        <h2 > Choose a Category:</h2 >

        

            <?php 

		        $host = "localhost"; $db = "20Questions";  $usr = "root";  $pw =""; // change ???? 
                $conID = new mysqli($host, $usr, $pw, $db);

		        $uName1 = $_SESSION['username'];
		        $SQL = "SELECT catID FROM members WHERE Username = '$uName1'";

		        $result = $conID->query($SQL);
		        $cat = mysqli_fetch_array($result);

                if($cat['catID'] == 1 || $cat['catID'] == 0) {
                    echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='bear.png' width='200' height='175'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Animals</h4>
		                        </div>
                         </div>";
                    echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='lock2.png' width='150' height='150'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Unavailable</h4>
		                        </div>
                         </div>";
					echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='lock2.png' width='150' height='150'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Unavailable</h4>
		                        </div>
                         </div>";
					echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='lock2.png' width='150' height='150'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Unavailable</h4>
		                        </div>
                         </div>";
                }
                else if($cat['catID'] == 2) {
                    echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='bear.png' width='200' height='175'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Animals</h4>
		                        </div>
                         </div>";
                    echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='icecream.png' width='145' height='160'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Foods (NF)</h4>
		                        </div>
                         </div>";
					echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='lock2.png' width='145' height='160'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Unavailable</h4>
		                        </div>
                         </div>";
					echo"<div class='container'>
                                <a href='questions.php'>
                                <img border='0' class='profile' src='lock2.png' width='145' height='160'>
                                </a>
                                <div class='overlay1'><br />
		                        <h4>Unavailable</h4>
		                        </div>
                         </div>";
                }

            ?>
           
        </body >

        </html >
