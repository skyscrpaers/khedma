<div align="center">


       <?php  
 $connect = mysqli_connect("localhost", "root", "", "projet2a");  
 $query = "SELECT id_ca, count(*) as number FROM produit GROUP BY id_ca";  
 $result = mysqli_query($connect, $query);  
 ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['id_ca', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['Categorie: ".$row["id_ca"]."', ".$row["number"]."],";  
                          }  
                          ?>  
        ]);

        var options = {
          title: 'Le Nombre des Produits selon Les Catégories'
        };

        var chart = new google.visualization.BarChart(document.getElementById('bar'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="bar" style="width: 900px; height: 500px;"></div>
  </body>
</html>



             <!-- /. PAGE INNER  -->
            </div>