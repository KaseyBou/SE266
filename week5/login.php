<!DOCTYPE html>
 <?php
    session_start();
 ?>
<html lang="en">
<head>
    <title>login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <?php
    include './dbconnect.php';
    include './functions.php';
    
      if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("SELECT se266_kasey.users VALUES(username, password);");
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            
            $binds = array(
                ":username" => $username,
                ":password" => $password,
            );
    ?> 
    <div class="container">
        <div class="page-header">
            <h1>Login <span class="glyphicon glyphicon-log-in"></span></h1>
        </div>
           <?php /*
                // Set session variables
                $_SESSION["sessionVar"] = "phpRocks";
                
                if($SESSION["phpRocks"] != NULL && $SESSION["phpRocks"] == TRUE ){
                    
                } else {
                    header('Location: search.php');   
                }
                */
                
            ?> 
             username: <input type="text" class="form-control"  value="" name="username" placeholder="username" />
                 <br />
             password <input type="text" class="form-control" value="" name="password" placeholder="password"/>
                 <br />
                      <input type="submit" class="btn btn-default btn-lg" value="log-in" />  
        
    </div>
</body>
</html>

