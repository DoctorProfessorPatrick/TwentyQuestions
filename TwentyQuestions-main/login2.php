
<?php
session_start();
//Get the data from the client side HTML form 
$uName1 = $_POST['Username'];          // get the user name from the form field Username

$_SESSION['username']=$uName1; //this 'username' will be passed on as long as the session exists.

$pw1 = $_POST['Password'];                        // get the pw from the form field pw
$pw1 = sha1($pw1);
//GLOBAL VARIABLES
   $fName; $lName;   $conID;    $db;

//Functions	
   function openDatabase(&$conID,  &$db){   //to create a handle $conID for the database
        $host = "localhost"; $db = "20questions";  $usr = "root";  $pw =""; // change ???? 
        $conID = new mysqli($host, $usr, $pw, $db);

        if ($conID->connect_error) {
        die("Connection failed: " . $conID->connect_error);
    } 
}
   function pwOK($conID, $uName1, $pw1){
        $SQL = " SELECT * FROM members WHERE Username = '$uName1' AND Password = '$pw1'";
        $result = $conID->query($SQL);
        
        if (!$result) { 
            die( "Query Error: " .$SQL. " :" .$conID->connect_error);  // insecure output
         } else {
         $row = $result -> fetch_array();
        
         if (!$row){  // if the row is empty, user name, password pair is wrong
            return false;
         }  else {
                $fName= $row['FirstName'];
                $lName = $row['LastName'];
                $result->close();
                
                return true;
         }
         } 
        return false; 
    }
// MAIN
openDatabase($conID, $db);

if (pwOK($conID,$uName1,$pw1)) {    //replace this with the index page for html, "welcome, $uName1" in this case
   $_SESSION['loggedin']=true;
   //set the loggedin state to true, this will be used to keep the rest of the future php pages safe and more consistent
  header("location: PlayerOptions.php");
} 

else {
    echo '<script type="text/javascript"> window.onload = function () { alert("Username or Password is Incorrect"); } </script>'; 
}

$conID->close();     

?> 


<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" type="text/css" href="StyleSheet1.css">
    <script src="options.js"></script>

    <title>LOG IN</title>

</head>

<body>
    <h1>Twenty Questions</h1>
    <div class="form">
        <form action="login2.php" method="post" class="form-inline">

            <img src="">


            <h2>Log In</h2>

            <label>User Name</label>

            <input type="text" name="Username" value="" placeholder="User Name" required><br>

            <label>Password</label>

            <input type="password" name="Password" placeholder="Password" required><br>


            <button type="submit">Log In</button>

            <p>Don't have an account? <a href="CreateAccountPage.html">Register here.</a></p>

        </form>
    </div>

</body>
</html>