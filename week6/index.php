<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <?php
          
         require 'functions.php';
         
         $results = '';
          $db = getDatabase();
           $projects = getProjects();
          if (isPostRequest()){
              
                
                 $project_name = filter_input(INPUT_POST, 'project_name');
                 $results = addProject ($project_name);
                
             }
       
     ?>
      <div class="container">
          <h2 class="page-header">Time Card Project</h2>
          <form class="form-group" method="post" action="index.php">
              <h3>Project Name: <input type="text" class="form-control" name="project_name"> </h3>
              <br />
              <input type="submit" class="btn btn-success btn-lg" value="add">
              <h4><?php echo $results; ?></h4>
              <br />
              <br />
          </form>
          <table class="table table-bordered">
              <thead>
                <tr>
                    <th>Project Name</th>
                    <th>time</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($projects as $row): ?>
                  <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['project_name']; ?></td>
                      <td><input type="button" class="btn btn-info" value="update">&nbsp;<input type="button" class="btn btn-danger" value="delete"></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
          <ul class="pagination">
              <li><a href="index.php">1</a></li>
              <li><a href="timecard.php">2</a></li>
          </ul>
      </div>
  </body>
</html>

