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
               'singular' => ['value' => 'مَفْعُوْلٌ', 'is_question' => false],
               'dual' => ['value' => 'مَفْعُوْلاَنِ', 'is_question' => false],
               'plural' => ['value' => 'مَفْعُوْلُوْنَ', 'is_question' => false],
            ]
         ],
         'accusative' => [
            'label' => 'مُثَنَّى (Dual)',
            'title' => 'Accusative  (حَالَةُ النَصَبِ)',
            'types' => [
               'singular' => ['value' => 'مَفْعُوْلاً', 'is_question' => false],
               'dual' => ['value' => 'مَفْعُوْلَيْنِ', 'is_question' => false],
               'plural' => ['value' =>  'مَفْعُوْلِيْنَ', 'is_question' => false],
            ],
         ],
         'genitive' => [
            'label' => ' جَمْعٌ (Plural)',
            'title' => 'Genitive (حَالَةُ الجَرَّ)',
            'types' => [
               'singular' => ['value' => 'مَفْعُوْلٍ', 'is_question' => false],
               'dual' => ['value' => 'مَفْعُوْلَيْنِ', 'is_question' => false],
               'plural' => ['value' => 'مَفْعُوْلِيْنَ', 'is_question' => false],
            ]
         ],
      ];

      // Turning $words into a template
      foreach ($words as $case => &$value) {
         foreach ($value['types'] as &$type) {
            $type['value'] = str_replace($a, "{a}", str_replace($b, "{b}", str_replace($c, "{c}", $type['value'])));
         }
      }
      return $words;
   };
   ?>