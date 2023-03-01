<?php
// enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/generate_form.php";
?>
<!DOCTYPE html>
<html>
<style>
   .correct {
      color: forestgreen;
   }

   .wrong {
      color: red;
   }
</style>

<body>
   <h3>Word: <?php echo $_GET["rootword"]; ?></h3>
   <?php echo prepareRootWordTable($_GET["rootword"]); ?>
   <button onclick="checkAnswer()">Check Answers</button>
   <script>
      function checkAnswer() {
         // Get all inputs in an array
         const inputs = document.getElementsByClassName("input");

         for (let input of inputs) {
            // Answer entered by user
            const userAnswer = input.value;

            // Get correct answer from data-answer attribute
            const correctAnswer = input.getAttribute("data-answer");

            // Get current cell
            const cell = document.getElementsByClassName(`${input.classList[1]}`)[0];

            // Compare user input to correct answer
            if (userAnswer == correctAnswer) {
               // Display correct answer in green if user input is correct
               cell.classList.add("correct");
               cell.innerHTML += `<br> ${correctAnswer}`;
               // console.log("Correct answer!");
            } else {
               // Display correct answer in red if user input is wrong
               cell.classList.add("wrong");
               cell.innerHTML += `<br> ${correctAnswer}`;
               // console.log("Your answer is wrong. This is the correct answer: " + correctAnswer)
            }
         }
      }
   </script>
</body>

</html>