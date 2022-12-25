<!DOCTYPE html>
<html>
<head>
    <title> Stock </title>
</head>
    
<body>
    <h1>   Stock </h1>
    <canvas id="myCharttriddate" height="375px"  ></canvas>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-colorschemes/0.4.0/chartjs-plugin-colorschemes.js" integrity="sha512-UNrT+Q4WOAJ5kWme4tJFJxIW4CryMNETXclTe5+JahzzwTHtlqfhwGPBGk2kaU1kaCIdaJMPC6bxpdmR7I2IBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var data =  {{ Js::from($data) }};
  
      const stock = {
        labels: labels,
        datasets: [{
          label: 'My stock',
          backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'],
          data: data,
        }]
      };
  
      const configtriddate = {
        type: 'pie',
        data: stock,
        options: {}
      };
  
      const myCharttriddate = new Chart(
        document.getElementById('myCharttriddate'),
        configtriddate
      );
  
</script>
</html>