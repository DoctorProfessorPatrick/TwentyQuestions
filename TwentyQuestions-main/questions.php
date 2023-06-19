<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="StyleSheet1.css">
  <title>Animal Category</title>
  <script>
    let questions = [
      "Is your animal large?",
      "Does your animal live on land?",
      "Is your animal a mammal?",
      "Is your animal an herbivore?",
      "Does your animal have legs?",
      "Is your animal primarily black and white?",
      "Is your animal found in the Arctic?",
      "Is your animal a predator?",
      "Does your animal have a long neck?",
      "Is your animal native to Africa?",
      "Is your animal a bird?",
      "Does your animal have a pouch?",
      "Is your animal known for its speed?",
      "Does your animal have a prehensile tail?",
      "Is your animal venomous?"
    ];
    let currentQuestion = 0;
    let answers = [];
    let score = 0;

    function showQuestion() {
      let questionDiv = document.getElementById("question");
      questionDiv.textContent = questions[currentQuestion];
    }

    function answerQuestion(answer) {
      answers.push(answer);
      currentQuestion++;
      if (currentQuestion < questions.length) {
        showQuestion();
      } else {
        sendAnswers();
      }
    }

    function sendAnswers() {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "guess.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          showResults(xhr.responseText);
        }
      };
      let data = {
        answers: answers
      };
      xhr.send(JSON.stringify(data));
    }

    function showResults(responseText) {
      let resultDiv = document.getElementById("result");
      resultDiv.innerHTML = responseText;
    }

  /*function submitAnimal() {
  let animalName = prompt("Enter the name of the animal you want to submit:");
  if (animalName !== null && animalName !== "") {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "submit-animal.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert(xhr.responseText);
        let playAgain = confirm("Do you want to play again?");
        if (playAgain) {
          currentQuestion = 0;
          answers = [];
          showQuestion();
          let resultDiv = document.getElementById("result");
          resultDiv.innerHTML = "";
        }
      }
    };
    let data = {
      animalName: animalName,
      counter: <?php echo $_SESSION['counter']; ?>,
      score: score
    };
    xhr.send(JSON.stringify(data));
  }
}*/


    /*function addQuestion() {
      let newQuestion = prompt("Enter a new question:");
      let answer = prompt("What is the answer to the new question (yes or no)?");
      if (newQuestion !== null && newQuestion !== "" && answer !== null && (answer === "yes" || answer === "no")) {
        questions.splice(currentQuestion, 0, newQuestion);
        currentQuestion++;
        if (answer === "yes") {
          answers.splice(currentQuestion - 1, 0, "yes");
        } else {
          answers.splice(currentQuestion - 1, 0, "no");
        }
        score++;
        showQuestion();
      }
    }*/

    showQuestion();
  </script>
</head>
<body style="text-align:center">
  <h1>Animal Guessing Game</h1>
  <div id="question"></div>
  <button onclick="answerQuestion('yes')">Yes</button>
  <button onclick="answerQuestion('no')">No</button>
  <button onclick="submitAnimal()">Submit Animal</button>
  <div id="result"></div>
  <script>
    showQuestion();
  </script>
  <?php
    // Start a session and increment the session counter
 session_start();
    if (!isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 1;
    } else {
      $_SESSION['counter']++;
    }
  ?>
</body>
</html>