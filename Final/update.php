<?php

include './dbconnect.php';
include './functions.php';

     $db = getDatabase();

     $result = '';

     if (isPostRequest()) {

        $CountryDetailID = filter_input(INPUT_POST, 'CountryDetailID');
        $CountryName = filter_input(INPUT_POST, 'CountryName');
        $CountryRegion = filter_input(INPUT_POST, 'CountryRegion');
        $CountryPopulation = filter_input(INPUT_POST, 'CountryPopulation');
        $CountrySize = filter_input(INPUT_POST, 'CountrySize');


        $stmt = $db->prepare("UPDATE countrydetails set CountryName = :CountryName, CountryRegion = :CountryRegion, CountryPopulation = :CountryPopulation, CountrySize = :CountrySize where CountryDetailID = :CountryDetailID");

        $binds = array(
            ":CountryDetailID" => $CountryDetailID,
            ":CountryName" => $CountryName,
            ":CountryRegion" => $CountryRegion,
            ":CountryPopulation" => $CountryPopulation,
            ":CountrySize" => $CountrySize
         );
        
     
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Record updated';
         }

    } else {

      
        
        $CountryDetailID = filter_input(INPUT_GET, 'CountryDetailID');
 
         $stmt = $db->prepare("SELECT * FROM countrydetails where CountryDetailID = :CountryDetailID");

         $binds = array(
             ":CountryDetailID" => $CountryDetailID
         );
          

         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);   
         }

         
        $CountryName = $results['CountryName'];
        $CountryRegion = $results['CountryRegion'];
        $CountryPopulation = $results['CountryPopulation'];
        $CountrySize = $results['CountrySize']; 
    }
?>
<?php include './header.php' ?>
<div class="container" id="container">
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
       <h1><?php echo $result; ?></h1>
      <div class="form-group" id="form">
      <form method="post" action="#">      
             <strong>ID</strong><br /><input type="text"class="form-control" value="<?php echo $CountryDetailID; ?>" name="CountryDetailID" /> 
             <strong>Country</strong> <input type="text" class="form-control"  value="<?php echo $CountryName; ?>" name="CountryName" />
             <strong>Region</strong> <input type="text" class="form-control"  value="<?php echo $CountryRegion; ?>" name="CountryRegion" />   
             <strong>Population</strong> <input type="text" class="form-control"  value="<?php echo $CountryPopulation; ?>" name="CountryPopulation" />
             <strong>Size</strong> <input type="text" class="form-control"  value="<?php echo $CountrySize; ?>" name="CountrySize" />
             <input type="submit" class="btn btn-default" value="Update" /><span id="fn-error"> </span>
      </form>
      </div>
</div>
<?php include './footer.php' ?>

