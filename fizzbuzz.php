
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
  
    
    for ($i = 0;$i < 100;$i++) {
        echo $i . "<br/>";
       if ($i%2 == 0 && $i%3 ==0) {
           echo "fizz buzz" . "<br/>";
       } else if ($i%2 == 0) {
           echo "fizz" . "<br/>";
       } else if ($i%3 == 0) {
           echo "buzz" . "<br/>";
       }
    }
    
?>
</body>
</html>