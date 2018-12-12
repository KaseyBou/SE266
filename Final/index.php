<?php 

    include './dbconnect.php';
    include './functions.php';

    $db = getDatabase();

    $stmt = $db->prepare("SELECT CountryDetailID, CountryName, CountryRegion, CountryPopulation, CountrySize FROM countrydetails ORDER BY CountryPopulation DESC LIMIT 10; ");

    $results = array();


    if ($stmt->execute() && $stmt->rowCount() > 0) {

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

?>
<?php include './header.php'; ?>
<div class="container" id="container">
    <br /><br /><br /><br /><br /><br />
     <table class="table table-striped">
          <thead>
              <tr>
                  <th>Country</th>
                  <th>Region</th>
                  <th>Population</th>
                  <th>Size</th>
              </tr>
          </thead>
          <tbody>
    </div> 
      <?php foreach ($results as $row): ?>
          <tr>
              <td><a href="update.php?id=<?php echo $row['CountryDetailID']; ?>"><?php echo $row['CountryName']; ?></a></td>
              <td><?php echo $row['CountryRegion']; ?></td>     
              <td><?php echo $row['CountryPopulation']; ?></td>   
              <td><?php echo $row['CountrySize']; ?></td>
          </tr>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
<?php include './footer.php' ?>



