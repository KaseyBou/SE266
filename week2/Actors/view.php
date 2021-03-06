<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        $stmt = $db->prepare("SELECT * FROM se266_kasey.actors");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <br />
        <br />
        <br />
        <br />
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>dob</th>
                        <th>height</th>
                    </tr>
                </thead>
                <tbody>
          </div>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>     
                    <td><?php echo $row['dob']; ?></td>   
                    <td><?php echo $row['height']; ?></td>   
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>

