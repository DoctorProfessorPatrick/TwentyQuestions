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

$correct = isset($_GET["correct"]) ? $_GET["correct"] : (isset($_POST["correct"]) ? $_POST["correct"] : null);

if ($correct == "yes") {
  echo "<h2>Great! Let's play again.</h2>";
  echo "<button onclick=\"window.location.href='questions.php'\">Play Again</button>";
} else {
  echo "<form method='post' action='submitAnimal.php'>";
  echo "<p>Oops! Please tell us the correct animal:</p>";
  echo "<input type='text' name='animal'>";
  echo "<br>";
  echo "<input type='submit' name='submit' value='Submit'>";
  echo "</form>";
}
?>
</body>
</html>
