<style>
    .chart {
        float: right;
        height: 700px;
        width: 700px;
    }
</style>
<?php 

    include './header.php';
    include './dbconnect.php';
    include './functions.php';
    
    $db = getDatabase();

    $stmt = $db->prepare("SELECT CountryRegion, SUM(CountryPopulation) AS population FROM CountryDetails GROUP BY CountryRegion; ");

    $results = array();


    if ($stmt->execute() && $stmt->rowCount() > 0) {

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

?>
<br />
<br />
<br />
<div class="container">
    <table class="table table-striped" style="width: 300px; height:400px; float: left;">
        <thead>
            <tr>
                <th>Region</th>
                <th>Population (thousands)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['CountryRegion']; ?></td>
                <td><?php echo $row['population']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="chart">
    <canvas id="myChart"></canvas>
    <script>
        $(document).ready(function () {

            $.get ("regionpie.php", function (data) {
               regions = JSON.parse (data);


               new Chart(document.getElementById("myChart"), {
                type: 'pie',
                data: {
                  labels: regions[0],
                  datasets: [{
                    label: "Population (thousands)",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f", "#FFFF0D", "#FF0000", "#D400E8", "#0DC7FF", "#FF850C", "#E88C53", "#E8B700", "#385200"],
                    data: regions[1]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Population in thousands'
                  }
                }
            });



            });



        })
     </script>
    </div>
</div>
<?php include './footer.php' ?>
