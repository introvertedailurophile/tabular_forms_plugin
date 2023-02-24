
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
         'singular' => [
            'label' => 'مُفْرَدْ (Singular)',
            'types' => [
               'nominative' => 'مَفْعُوْلٌ',
               'accusative' => 'مَفْعُوْلاً',
               'genitive' => 'مَفْعُوْلٍ',
            ]
         ],
         'dual' => [
            'label' => 'مُثَنَّى (Dual)',
            'types' => [
               'nominative' => 'مَفْعُوْلاَنِ',
               'accusative' => 'مَفْعُوْلَيْنِ',
               'genitive' => 'مَفْعُوْلَيْنِ',
            ]
         ],
         'plural' => [
            'label' => ' جَمْعٌ (Plural)',
            'types' => [
               'nominative' => 'مَفْعُوْلُوْنَ',
               'accusative' => 'مَفْعُوْلِيْنَ',
               'genitive' => 'مَفْعُوْلِيْنَ',
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