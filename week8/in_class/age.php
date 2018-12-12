<?php
  $age = filter_input(INPUT_POST, 'age');

  if ($age > 18) {
      echo "your an adult";
  } else {
      echo "your a child";
  }
    
?>

