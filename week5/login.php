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
    
<<<<<<< HEAD
      $_SESSION["isLoggedIn"] = false;
      
      if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("SELECT * from users where username = :username AND password = SHA1(:password)");
=======
      if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("SELECT se266_kasey.users VALUES(username, password);");
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            
            $binds = array(
                ":username" => $username,
                ":password" => $password,
            );
<<<<<<< HEAD
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $_SESSION["isLoggedIn"] = true;
            }
                
        }
=======
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
    ?> 
    <div class="container">
        <div class="page-header">
            <h1>Login <span class="glyphicon glyphicon-log-in"></span></h1>
        </div>
<<<<<<< HEAD
        <?php 
  
            function redirect() {
                header('location:upload.php');
            }
                
        ?> 
        <a href="upload.php"></a>
        <form method="post" action="#" class="form-group">
            username <input type="text" class="form-control"  value="Mickey" name="username" placeholder="username" /> <br />     
            password <input type="text" class="form-control" value="Mouse" name="password" placeholder="password"/> <br />
                     <input type="submit" class="btn btn-default btn-lg" value="log-in" />
                     <?php
                        if($_SESSION["isLoggedIn"]){  
                            redirect();
                         } 
                     ?>
        </form>
=======
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
        
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
    </div>
</body>
</html>

