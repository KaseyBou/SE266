  
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
       <?php
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';
        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();
        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT id, corp FROM se266_kasey.corps;");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
      <div class ="container">
          <h1 class="page-header">Lab 3 Corp CRUD <small>- Kasey Bourdier</small></h1>
          <!-- here I have my table -->
          <br />
          <br />
          <div class="panel panel-primary">
            <div class="panel-heading">Description</div>
                <div class="panel-body">
                    <p>Welcome! here I will add, view, delete, and update database in this web page.</p>
                </div>
          </div>
          <br />
          <br />
          <a href="add.php"><button type="button" class="btn btn-info btn-block">add</button></a>
           <table class="table">
               <thead>
                    <tr>
                      <th>ID</th>
                      <th>corp</th>
                    </tr>
               </thead>
               <tbody>
                     <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success ">Update</button></a></td>
                    <td><a href="read.php"><button type="button" class="btn btn-default">read</button></a></td>
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>    
                </tr>
            <?php endforeach; ?>
               </tbody>
            </table>
      </div>
  </body>
</html>
