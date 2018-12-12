<!DOCTYPE html>
 <?php
    session_start();
 ?>
<html lang="en">
<head>
    <title>upload page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="jumbotron">Upload Page</h1>
        </div>
    <?php
    include './dbconnect.php';

        $db = getDatabase();

        $stmt = $db->prepare("DELETE FROM school;");

        $isDeleted = false;

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }     
            
         if (isset($_FILES['file1'])) {
          
             $temp = $_FILES['file1']['tmp_name'];
             $path = getcwd() . DIRECTORY_SEPARATOR . 'upload';  
             $newVar = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];
             move_uploaded_file($newVar, $temp);
             $db = getDatabase();
             $newTemp = fopen('schools.csv', 'rb');
             
     
             $stmt = $db->prepare("INSERT INTO school SET schoolname = :schoolname, city = :city, state = :state");
             
              while (!feof($newTemp)) {
                 $school = fgetcsv($newTemp);
                  
                 $binds = array(
                    ":schoolname" => $school[0],
                    ":city" => $school[1],
                    ":state" => $school[2],
                  );
                 $stmt->execute($binds);
         }
          
         header('location:search.php');
         }
        #For comma-delimited files or CSVs (Comma Separated Values) use fopen in combination with fgetcsv.
  
    ?>
    <div class="form-group">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file1" class="btn btn-default btn-lg">
            <br />
            <br />
            <input type="submit" value="Upload" class="btn btn-info btn-lg">
        </form>
    </div>
    </div>
</body>
</html>