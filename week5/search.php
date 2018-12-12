<!DOCTYPE html>
 <?php
    session_start();
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
      <?php
      
        include './dbconnect.php';
        include './functions.php';
        
        $db = getDatabase();
        
        $schoolname = filter_input(INPUT_POST, 'schoolname');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        
        $binds = array();
        
        $sql = "SELECT * FROM school WHERE 0=0";
        
        $stmt = $db->prepare($sql);
        
        $results = array();
                
        if (isPostRequest()) {
            
        $schoolname = $_POST['schoolname'];
        $city = $_POST['city'];
        $state = $_POST['state'];
            
           
        if ($schoolname != "") {
            $sql .= " AND schoolname LIKE :schoolname";
            $binds['schoolname'] = '%'.$schoolname.'%';
        }
            
        if ($city != "") {
            $sql .= " AND city LIKE :city";
            $binds['city'] = '%'.$city.'%';
        }
        
            
        if ($state != "") {
            $sql .= " AND state LIKE :state";
            $binds['state'] = '%'.$state.'%';
        }
        
        $stmt = $db->prepare($sql);
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }   
       
}
      ?>
      <div class ="container">
          <h1>Welcome!</h1>
          <div class="form-group">
                <form action="search.php" method="post">
                     school name <input type="text" class="form-control"  value="<?php echo $schoolname ?>" name="schoolname" />
                         <br />
                    city <input type="text" class="form-control" value="<?php echo $city ?>" name="city" />
                         <br />
                    state <input type="text" class="form-control" value="<?php echo $state ?>" name="state" />
                    <br />
                        <input type="submit" class="btn btn-success" value="search" name="search" />
                </form>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>school name</th>
                          <th>city</th>
                          <th>state</th>
                      </tr>
                  </thead>
                 <tbody>
                        <?php foreach ($results as $row): ?>
                   <tr>
                       <td><?php echo $row['schoolname']; ?></td>
                       <td><?php echo $row['city']; ?></td>
                       <td><?php echo $row['state']; ?></td>   
                   </tr>
                   <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
  </body>
</html>
