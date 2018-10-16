<!DOCTYPE html>
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
        
        $results = '';
        
        if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");
            $firstName = filter_input(INPUT_POST, 'firstname');
            $lastName = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');
            $binds = array(
                ":firstname" => $firstName,
                ":lastname" => $lastName,
                ":dob" => $dob,
                ":height" => $height
            );
            
            /*
             * empty()
             * isset()
             */
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>
      <div class ="container">
          <br />
          <br />
          <br />
          <br />
          <div class="form-group">
            <h1><?php echo $results; ?></h1>

             <form method="post" action="#">            
                 first name <input type="text" class="form-control"  value="" name="firstname" placeholder="firstname" />
                 <br />
                 last name <input type="text" class="form-control" value="" name="lastname" placeholder="lastname"/>
                 <br />
                 dob <input type="text" class="form-control" value="" name="dob" placeholder="dob"/>
                 <br />
                 height <input type="text" class="form-control" value="" name="height" placeholder="height"/>
                 <br />
                 <input type="submit" class="btn btn-primary" value="Submit"/>
             </form>
          </div>
      </div>
  </body>
</html>

