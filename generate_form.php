<?php
require __DIR__ . "/generate_template.php";
function make_form($word)
{
   // Separate Out the Letters
   $a = mb_substr($word, 0, 1, "utf-8");
   $b = mb_substr($word, 1, 1, "utf-8");
   $c = mb_substr($word, 2, 1, "utf-8");

   $words = make_template(); //returns template array

   // Will display output in tabular form
   $table = "<table>";
   $table .= "<tr>";
   $table .= "<td style='padding:1rem;'></td>";
   foreach ($words as $case => &$value) {

      // Turn template array into array containing new words
      $table .= "<td style='padding:1rem;'>{$value['label']}</td>";
   }
   $table .= "</tr>";

   foreach ($words as $case => &$value) {
      $table .= "<tr>";
      $table .= "<td style='padding:1rem;'>{$value['title']}</td>";
      foreach ($value['types'] as $type => &$type_value) {
         // Turn template array into array containing new words
         $type_value = str_replace("{a}", $a,  str_replace("{b}", $b, str_replace("{c}", $c, $type_value)));
         $table .= "<td style='padding:1rem;'>{$type_value}</td>";
      }
      $table .= "</tr>";
   }
   $table .= "</table>";
   echo $table;
   // print_r($words);
}
