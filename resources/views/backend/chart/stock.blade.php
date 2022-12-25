<!DOCTYPE html>
<html>
<head>
    <title> Stock </title>
</head>
    
<body>
    <h1>   Stock </h1>
    <canvas id="myCharttriddate" height="375px"  ></canvas>
</body>
<script type="text/javascript" src="Chart.js"></script>

<script type="text/javascript" src="chartjs-plugin-colorschemes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($stock['Produit']) }};
      var stock =  {{ Js::from($stock['stock']) }};
  
      const datatriddate = {
        labels: labels,
        datasets: [{
          label: 'My stock',
          backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'],
          data: stock,
        }]
      };
  
      const configtriddate = {
        type: 'pie',
        data: datatriddate,
        options: {}
      };
  
      const myCharttriddate = new Chart(
        document.getElementById('myCharttriddate'),
        configtriddate
      );
  
</script>
</html>