<?php
/*if (!isset($_SESSION['loggedin']))
{
	header ('location: loginPage.html');
	exit;
}*/

// Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$db = "20questions";
$conn = new mysqli ($server,$username,$password,$db);

// Get the user's answers from the AJAX request
$data = json_decode(file_get_contents("php://input"), true);
$answers = $data["answers"];
//this will be updated

//the splicing method will change how the answers are looked at, using switch cases
// Build the query based on the user's answers
$query = "SELECT Animal FROM animals WHERE 1=1";
if ($answers[0] == "yes") {
  $query .= " AND is_large = 1";
} else {
  $query .= " AND is_large = 0";
}
if ($answers[1] == "yes") {
  $query .= " AND lives_on_land = 1";
} else {
  $query .= " AND lives_on_land = 0";
}
if ($answers[2] == "yes") {
  $query .= " AND is_mammal = 1";
} else {
  $query .= " AND is_mammal = 0";
}
if ($answers[3] == "yes") {
  $query .= " AND is_herbivore = 1";
} else {
  $query .= " AND is_herbivore = 0";
}
//include the other questions here, which means you need to include columns in the database to fit the responses
if($answers[4] == "yes") {
  $query .= " AND has_legs = 1";
} else {
  $query .= " AND has_legs = 0";
}
if($answers[5] == "yes") {
  $query .= " AND black_and_white = 1";
} else {
  $query .= " AND black_and_white = 0";
}
if($answers[6] == "yes") {
  $query .= " AND in_arctic = 1";
} else {
  $query .= " AND in_arctic = 0";
}
if($answers[7] == "yes") {
  $query .= " AND is_predator = 1";
} else {
  $query .= " AND is_predator = 0";
}
if($answers[8] == "yes") {
  $query .= " AND long_neck = 1";
} else {
  $query .= " AND long_neck = 0";
}
if($answers[9] == "yes") {
  $query .= " AND in_africa = 1";
} else {
  $query .= " AND in_africa = 0";
}
if($answers[10] == "yes") {
  $query .= " AND is_bird = 1";
} else {
  $query .= " AND is_bird = 0";
}
if($answers[11] == "yes") {
  $query .= " AND has_pouch = 1";
} else {
  $query .= " AND has_pouch = 0";
}
if($answers[12] == "yes") {
  $query .= " AND is_fast = 1";
} else {
  $query .= " AND is_fast = 0";
}
if($answers[13] == "yes") {
  $query .= " AND prehensile_tail = 1";
} else {
  $query .= " AND prehensile_tail = 0";
}
if($answers[14] == "yes") {
  $query .= " AND is_venomous = 1";
} else {
  $query .= " AND is_venomous = 0";
}

// Execute the query and get the result
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Return the animal name as the response
$animal = $row["Animal"];
echo "Your animal is a " . $animal;

//the user submission will come after this, depending on right or wrong

//include the score updating into the database at the same time the user's submission is updated to database

// Close the database connection
mysqli_close($conn);
?>