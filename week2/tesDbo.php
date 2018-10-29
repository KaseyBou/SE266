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
  
   /**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */  
function getDatabase() {
    
        /* PHP script runs local or remote. Database server remote */
        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;',
            'DB_USER' => 'se266_kasey',
            'DB_PASSWORD' => '8001137'
        );
        
        
         /* PHP script runs local. Database Server local */
       /*
        $config = array(
            'DB_DNS' => 'mysql:host=192.168.10.10;port=3306;',
            'DB_USER' => 'homestead',
            'DB_PASSWORD' => 'secret'
        );
        */
        /* Create a Database connection and save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}
$db = getDatabase();
print_r ($db);

    
?>
</body>
</html>

