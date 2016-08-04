
     $(document).ready(function(){
      var url="api2.php";
	  var result = [['League','Number]']];
      $.getJSON(url,function(json){   
         
		 $.each(json,function(i,dat){
		   d1 = [dat.League,parseInt(dat.Number)];
		   result.push(d1);
         });
		
         
		 
	  
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(result);

        var options = {
          title: 'Statistics By League',
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
	  });
	 });
