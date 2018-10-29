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
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $binds = array(
                ":corp" => $corp,
                ":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
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
            <h4>EX:<br /><br /> corp: Proin Sed Turpis Industries <br /> incorp_dt: 2014-09-29 07:05:22 <br />email: aliquet@actellus.com <br /> zipcode: 50194 <br />owner: Ariana Cooley phone: (637) 951-7060</h4>
            <br />
             <form method="post" action="#">            
                 corp <input type="text" class="form-control"  value="" name="corp" placeholder="corp" />
                 <br />
                 incorp_dt <input type="text" class="form-control" value="" name="incorp_dt" placeholder="incorp_dt"/>
                 <br />
                 email <input type="text" class="form-control" value="" name="email" placeholder="email"/>
                 <br />
                 zipcode <input type="text" class="form-control" value="" name="zipcode" placeholder="zipcode"/>
                 <br />
                 owner <input type="text" class="form-control" value="" name="owner" placeholder="owner"/>
                 <br />
                 phone <input type="text" class="form-control" value="" name="phone" placeholder="phone"/>
                 <br />
                 <input type="submit" class="btn btn-primary" value="Submit"/>
                 <a href="view.php"><button type="button" class="btn btn-info">back to main page</button></a>
             </form>
          </div>
      </div>
  </body>
</html>

