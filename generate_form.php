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

   // Turn template array into array containing new words
   foreach ($words as $case => &$word) {
      foreach ($word['types'] as &$type) {
         $type['value'] = str_replace("{a}", $a,  str_replace("{b}", $b, str_replace("{c}", $c, $type['value'])));
      }
   }

   ### QUESTIONS SELECTION ###


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
