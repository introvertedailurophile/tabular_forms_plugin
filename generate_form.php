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
   $answer_ids = [];

   // Turn template array into array containing new words
   foreach ($words as $case => &$word) {
      foreach ($word['types'] as &$type) {
         $type['value'] = str_replace("{a}", $a,  str_replace("{b}", $b, str_replace("{c}", $c, $type['value'])));

         //   Push answer words to array
         array_push($answer_ids, $type['id']);
      }
   }

   ### QUESTIONS SELECTION ###

   // Count number of 'answer' words
   $num = count($answer_ids);

   // Random number of questions (2 TO 8 in this case)
   // There will be atleast 2 questions in the table.
   $random = rand(2, $num-1);

   // Select $random number of words from $answer_ids array 
   $selected_answers = array_rand($answer_ids, $random);

   // Iterate through the random $selected_answers
   foreach ($selected_answers as $answer_id) {
      foreach ($words as $case => &$word) {
         foreach ($word['types'] as &$type) {
            if ($type['id'] == $answer_id) {
               $type['is_question'] = true;
            };
         }
      }
   }

   ### RENDERING ###

   // Will display output in tabular form
   $table = "<table border='1' cellpadding='15'>";

   $table .= "<tr>";
   $table .= "<th></th>";
   // print_r($words); //No Problem up till here, data passed as expected
   // die();
   foreach ($words as $case => &$word) {
      // print_r($word); // Last entry is duplicated //Solved by adding '&' in lines 62 and 70.
      $table .= "<th>{$word['label']}</th>";
   }
   // die();
   $table .= "</tr>";
   // print_r($words);
   // die();
   foreach ($words as $case => &$word) {
      $table .= "<tr>";
      $table .= "<th>{$word['title']}</th>";
      foreach ($word['types'] as &$type) {

         // Checks the 'is_question' value, displays text input if true
         if ($type['is_question']) {
            $table .= "<td class='{$type['id']}'><input class='input {$type['id']}' type='text' data-answer='{$type['value']}' /></td>";
         } else {
            $table .= "<td>{$type['value']}</td>";
         }
      }

      $table .= "</tr>";
   }

   // die();
   $table .= "</table>";
   // echo $table;
   // die();
   return $table;
}
