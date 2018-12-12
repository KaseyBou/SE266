<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';
            
            $db = getDatabase();
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
 
                $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":incorp_dt" => $incorp_dt,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone 
                    
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record updated';
                }
            } else {
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
             
               
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $zipcode = $results['zipcode'];
                $email = $results['email']; 
                $owner = $results['owner'];
                $phone = $results['phone'];
            }
        
        ?>
        <div class="container">
        <h1><?php echo $result; ?></h1>
        <div class="form-group" id="form">
        <form method="post" action="#">      
            
            <strong>corp</strong> <input type="text" class="form-control"  value="<?php echo $corp; ?>" name="corp" />
            <br />
            <strong>incorp_dt</strong> <input type="text" class="form-control"  value="<?php echo $incorp_dt; ?>" name="incorp_dt" />
            <br />
            <strong>email</strong> <input type="text" class="form-control"  value="<?php echo $zipcode; ?>" name="email" />
            <br />
            <strong>zipcode</strong> <input type="text" class="form-control"  value="<?php echo $email; ?>" name="zipcode" />
            <br />
            <strong>owner</strong> <input type="text" class="form-control"  value="<?php echo $owner; ?>" name="owner" />
            <br /> 
            <strong>phone</strong> <input type="text" class="form-control" value="<?php echo $phone; ?>" name="phone" />
            <br />
            <strong>ID</strong><br /><input type="text" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" class="btn btn-success" value="Update" /><span id="fn-error"> </span>
        </form>
        </div>
        <a href="view.php"><button type="button" class="btn btn-info" id="btn">back to main page</button></a>
        </div>
    </body>
</html>
