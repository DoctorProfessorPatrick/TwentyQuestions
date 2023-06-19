<?php
session_start();

// Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$db = "20questions";
$conn = new mysqli ($server,$username,$password,$db);

$data = json_decode(file_get_contents("php://input"), true);
$answers = $data["answers"];

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

if (!$row) {
    // If the query returns no results, display an error message
    echo "Sorry, I don't know what animal that is.<br>";
    echo "<a href='animal-results.php?correct=no'>Submit a new animal</a>";
} else {
    // If the query returns a result, display the animal name
    $animal = $row["Animal"];
    echo "Your animal is: " . $animal . "<br>";
    echo "<form method='post' action='animal-results.php'>";
    echo "<p>Is this correct?</p>";
    echo "<button type='submit' name='correct' value='yes'>Yes</button>";
    echo "<button type='submit' name='correct' value='no'>No</button>";
    echo "</form>";
}


mysqli_close($conn);


?>
