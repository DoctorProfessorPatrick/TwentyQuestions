<?php
include 'question.php';
// Get the animal name, new trait, score, and counter from the submitted form
$animalName = $_POST['animalName'];
$newTrait = $_POST['newTrait'];
$score = $_POST['score'];
$counter = $_POST['counter'];
$username = $_POST['username'];

// Establish connection to the SQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct the SQL query to add the new column to the table
$sql = "ALTER TABLE animals ADD COLUMN " . $newTrait . " BOOLEAN DEFAULT 0";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    // Construct the SQL query to add the new animal to the table
    $sql = "INSERT INTO animals (name, " . $newTrait . ") VALUES ('" . $animalName . "', 1)";
    
    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Animal added successfully!";
        
        // Construct the SQL query to update the score and counter in the members table
        $sql = "UPDATE members SET score = " . $score . ", counter = " . $counter . " WHERE username = '" . $username . "'";
        
        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Score and counter updated successfully!";
        } else {
            echo "Error updating score and counter: " . $conn->error;
        }
    } else {
        echo "Error adding animal: " . $conn->error;
    }
} else {
    echo "Error adding trait: " . $conn->error;
}

// Close the database connection
$conn->close();
?>


<!-- Play again button -->
<button onclick="window.location.reload()">Play Again</button>