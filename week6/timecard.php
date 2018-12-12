<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
  </head>
  <body>
      <?php
        include './functions.php';
      ?>
      <div class="container">
          <h2 class="page-header">Time Card</h2>
            <h4>Select Project</h4>
            <select>
              <option value="SE266">SE266</option>
              <option value="SE256.06">SE256.06</option>
            </select>
            <a href="clockout.php"><input type="button" class="btn btn-default btn-lg" value="clock in" id="start"></a>
          <br />
          <br />
          <br />
          <ul class="pagination">
            <li><a href="index.php">1</a></li>
            <li><a href="timecard.php">2</a></li>
          </ul>
      </div>
  </body>
  <script  src="script.js">
  </script>
</html>
