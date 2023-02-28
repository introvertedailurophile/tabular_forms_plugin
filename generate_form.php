<?php

require __DIR__ . "/generate_template.php";

function prepareRootWordTable(string $word, int $questions_count = 3)
{
   ### DATA PREPARATION ###

   // Separate Out the Letters
   $a = mb_substr($word, 0, 1, "utf-8");
   $b = mb_substr($word, 1, 1, "utf-8");
   $c = mb_substr($word, 2, 1, "utf-8");

   // get template array
   $words = make_template();

   // Create an answers array from which to randomise inputs
   $answers = [];

   // Turn template array into array containing new words
   foreach ($words as $case => &$word) {
      foreach ($word['types'] as &$type) {
         $type['value'] = str_replace("{a}", $a,  str_replace("{b}", $b, str_replace("{c}", $c, $type['value'])));

         //   Push answer words to array
         array_push($answers, $type);
      }
   }

   ### QUESTIONS SELECTION ###

   // Count number of 'answer' words
   $num = count($answers);

   // Random number of questions (2 TO 8 in this case)
   // There will be atleast 2 questions in the table.
   $random = rand(2, $num - 1); 

   // Select $random number of words from $answers array 
   $keys = array_rand($answers, $random);

   // Iterate through the random $keys
   foreach ($keys as $key) {
      foreach ($words as $case => &$word) {
         foreach ($word['types'] as &$type) {
            // Here, $key is always a random index that has been chosen
            // Check if $type (each word) has been randomly chosen
            if ($type == $answers[$key]) {
               $type['is_question'] = true;
            };
         }
      }
   }
   print_r($words);
   die();

   ### RENDERING ###

   // Will display output in tabular form
   $table = "<table border='1' cellpadding='15'>";

   $table .= "<tr>";
   $table .= "<th></th>";
   foreach ($words as $case => $word) {
      $table .= "<th>{$word['label']}</th>";
   }
   $table .= "</tr>";

   foreach ($words as $case => $word) {
      $table .= "<tr>";
      $table .= "<th>{$word['title']}</th>";
      foreach ($word['types'] as $type) {
         $table .= "<td>{$type['value']}</td>";
      }
      $table .= "</tr>";
   }

   $table .= "</table>";

   return $table;
}
