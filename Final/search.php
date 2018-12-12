<?php include './header.php' ?>
<div class="container" id="container">
    <br />
    <br />
    <br />
    <br />
<?php
    include './dbconnect.php';
    include './functions.php';
    
    $db = getDatabase();

       $CountryName = filter_input(INPUT_POST, 'CountryName');
       $CountryRegion = filter_input(INPUT_POST, 'CountryRegion');
       $CountryPopulation = filter_input(INPUT_POST, 'CountryPopulation');
       $CountrySize = filter_input(INPUT_POST, 'CountrySize');
         
       $binds = array();

       $sql = "SELECT * FROM countrydetails WHERE 0=0";

       $stmt = $db->prepare($sql);

       $results = array();

       if (isPostRequest()) {

       $CountryName = $_POST['CountryName'];
       $CountryRegion = $_POST['CountryRegion'];
          
       if ($CountryName != "") {
           $sql .= " AND CountryName LIKE :CountryName";
           $binds['CountryName'] = '%'.$CountryName.'%';
       }
       
       if ($CountryRegion != "") {
           $sql .= " AND CountryRegion LIKE :CountryRegion";
           $binds['CountryRegion'] = '%'.$CountryRegion.'%';
       }

       
       $stmt = $db->prepare($sql);
         
       if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }   
           
    }
  ?>
    <br />
    <br />
    <br />
    <br/>
<div class="form-group">
       <form action="search.php" method="post">
    country <input type="text" class="form-control"  value="<?php echo $CountryName ?>" name="CountryName" />
            <br />
    region  <input type="text" class="form-control" value ="<?php echo $CountryRegion ?>" name="CountryRegion">
            <br />
            <br />
            <input type="submit" class="btn btn-success" value="search" name="search" />
       </form>
    <br />
    <br />
     <table class="table table-bordered">
         <thead>
             <tr>
                 <th>country</th>
                 <th>region</th>
                 <th>population</th>
                 <th>size</th>
                 <th></th>
             </tr>
         </thead>
         <?php foreach ($results as $row): ?>
        <tbody>
          <tr>
              <td><?php echo $row['CountryName']; ?></td>
              <td><?php echo $row['CountryRegion']; ?></td>
              <td><?php echo $row['CountryPopulation']; ?></td>   
              <td><?php echo $row['CountrySize']; ?></td>
              <td><a href="update.php?id=<?php echo $row['CountryDetailID']; ?>"><button type="button" class="btn btn-default ">edit</button></a></td>
          </tr>
          <?php endforeach; ?>
         </tbody>
     </table>
 </div>
</div>
<?php include './footer.php' ?>
