<?php

 include './dbconnect.php';
 include './functions.php';
 
 $db = getDatabase();
    
 $stmt = $db->prepare(" SELECT CountryRegion, SUM(CountryPopulation) AS population FROM CountryDetails GROUP BY CountryRegion; ");
 
 $regions = array();
    
if ($stmt->execute() && $stmt->rowCount() > 0) {
    $regions = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
    
$a = array();
$b = array();

foreach ($regions as $s) {
    array_push  ($a, $s['CountryRegion']);
    array_push($b, $s['population']);
}

$results = array();

$results[0] = $a;
$results[1] = $b;

echo json_encode($results);

  
?>

