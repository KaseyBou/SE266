<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <div class="container">
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            /*
             * get and hold a database connection 
             * into the $db variable
             */
            $db = getDatabase();
            
            $id = filter_input(INPUT_GET, 'id'); 
            
            $stmt = $db->prepare("DELETE FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );
       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }       
        
        ?>
        
        
        <h1> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
         <?php endif; ?>
          Deleted</h1>  
          <br />
          <br />
         <a href="view.php"><button type="button" class="btn btn-info">back to main page</button></a>
        </div>         
    </body>

