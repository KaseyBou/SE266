<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <title>Kasey Bourdier main course page</title>
    </head>
    <body>
        <style>
            body {background-color: #F3FFFE;}
<<<<<<< HEAD
=======
     
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
        </style>
        <!-- page header -->
        <div class="container">
            <h1 class="jumbotron"><span class="glyphicon glyphicon-pencil"></span> SE266 <small>PHP and mySQL - Kasey Bourdier</small></h1> 
              <!-- info about course page -->
                <div class="panel panel-info">
                     <div class="panel-heading">Welcome to Kasey Bourdiers course page</div>
                     <div class="panel-body">Here you can find many of my projects and code, as well as some links to informational sites!</div>
                 </div>
            <!-- Assignment Overview -->
            <div class="float-none">
                 <div class="panel panel-primary">
                     <div class="panel-heading">Assignment overview</div>
                     <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                 <tr>
                                     <th>Assignment Name</th>
                                     <th>Zipped Solution</th>
                                 </tr>
                            </thead>
                             <tbody>
                                <tr>
                                     <td><a href="week1/creditcard.php">Solution week 1</a></td>
                                     <td><a href="week1/week1.zip" target="blank_">zip file week 1</a></td>
                                </tr>
                                 <tr>
                                     <td><a href="week2/Actors/pageheader.php">Solution week 2</a></td>
                                     <td><a href="week2/week2.zip">zip file week 2</a></td>
                                </tr>
                                 <tr>
                                     <td><a href="week3/view.php">Solution week 3</a></td>
                                     <td><a href="week3/week3.zip">zip file week 3</a></td>
                                </tr>
                                 <tr>
                                     <td>Solution Week 4</td>
                                     <td><a href="#">zip file week 4</a></td>
                                </tr>
                                 <tr>
<<<<<<< HEAD
                                     <td><a href="week5/login.php">Solution Week 5</a></td>
                                     <td><a href="week5/week5.zip">zip file week 5</a></td>
                                </tr>
                                 <tr>
                                     <td><a href=week6/index.php>Solution Week 6</a></td>
                                     <td><a href="week6/week6.zip">zip file week 6</a></td>
=======
                                     <td>Solution Week 5</td>
                                     <td><a href="#">zip file week 5</a></td>
                                </tr>
                                 <tr>
                                     <td>Solution Week 6</td>
                                     <td><a href="#">zip file week 6</a></td>
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
                                </tr>
                                 <tr>
                                     <td>Solution Week 7</td>
                                     <td><a href="#">zip file week 7</a></td>
                                </tr>
                                 <tr>
<<<<<<< HEAD
                                     <td><a href=week8/index.php></a>Solution Week 8</td>
                                     <td><a href="week8/week8.zip">zip file week 8</a></td>
=======
                                     <td>Solution Week 8</td>
                                     <td><a href="#">zip file week 8</a></td>
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
                                </tr>
                                 <tr>
                                     <td>Solution Week 9</td>
                                     <td><a href="#">zip file week 9</a></td>
                                </tr>
                                 <tr>
<<<<<<< HEAD
                                     <td><a href=Final/index.php>Solution Week 10</a></td>
                                     <td><a href="Final/Final.zip">zip file week 10</a></td>
=======
                                     <td>Solution Week 10</td>
                                     <td><a href="#">zip file week 10</a></td>
>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
                                </tr> 
                             </tbody>
                            </table>
                     </div>
                     </div>
            </div>
            <!-- code link -->
            <div class="float-left">
                 <div class="panel panel-success">
                     <div class="panel-heading">Code</div>
                     <div class="panel-body">
                        <li><a href="https://github.com/KaseyBou/SE266">My Git Hub Repo</a></li>
                     </div>
                 </div>
            </div>
            <!-- Useful php resources -->
            <div class="float-right">
             <div class="panel panel-success">
                     <div class="panel-heading">Useful PHP sources</div>
                     <div class="panel-body">
                         <li><a href="https://www.sitepoint.com/re-introducing-vagrant-right-way-start-php/">set up PHP environment</a></li>
                         <li><a href="http://www.php.net/">latest php updates</a></li>
                         <li><a href="https://www.w3schools.com/php/">basic PHP</a></li>
                     </div>
             </div>
            </div>
            <!-- last time modified -->
            <br /><br /><br /><br /><br /><br /><br /><br />
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-time">&nbsp;&nbsp;</span>
                <?php
                    $file = "index.php";
                    $mod_date=date("F d Y h:i:s A", filemtime($file));

                    echo "Last modified $mod_date";
<<<<<<< HEAD
=======

>>>>>>> f114e43eb1c627b9eaf479b57925abecda921f59
                ?>
                </div>
            </div>
        </div> 
    </body>
</html>