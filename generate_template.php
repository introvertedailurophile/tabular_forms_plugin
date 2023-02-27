   <?php

   // Root word for $long_word
   function make_template()
   {
      $word = "فعل";

      // Separate Out the Letters
      $a = mb_substr($word, 0, 1, "utf-8");
      $b = mb_substr($word, 1, 1, "utf-8");
      $c = mb_substr($word, 2, 1, "utf-8");

      // Original table, to be turned into a template
      $words = [
         'nominative' => [
            'label' => 'مُفْرَدْ (Singular)',
            'title' => 'Nominative  (حَالَةُ الرَفَعِ)',
            'types' => [
               'singular' => 'مَفْعُوْلٌ',
               'dual' => 'مَفْعُوْلاَنِ',
               'plural' => 'مَفْعُوْلُوْنَ',
            ]
         ],
         'accusative' => [
            'label' => 'مُثَنَّى (Dual)',
            'title' => 'Accusative  (حَالَةُ النَصَبِ)',
            'types' => [
               'singular' => 'مَفْعُوْلاً',
               'dual' => 'مَفْعُوْلَيْنِ',
               'plural' => 'مَفْعُوْلِيْنَ',
            ]
         ],
         'genitive' => [
            'label' => ' جَمْعٌ (Plural)',
            'title' => 'Genitive (حَالَةُ الجَرَّ)',
            'types' => [
               'singular' => 'مَفْعُوْلٍ',
               'dual' => 'مَفْعُوْلَيْنِ',
               'plural' => 'مَفْعُوْلِيْنَ',
            ]
         ],
      ];

      // Turning $words into a template


      foreach ($words as $case => &$value) {

         foreach ($value['types'] as $type => &$type_value) {
            $type_value = str_replace($a, "{a}", str_replace($b, "{b}", str_replace($c, "{c}", $type_value)));
         }
      }
      return $words;
   };
   ?>