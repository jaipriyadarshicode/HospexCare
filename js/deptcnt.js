google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var categories = document.getElementsByName("catVal");
  var cnt = document.getElementsByName("cntVal");
  var dataArray = [['Departments', 'Number of Doctors in each Department']];
  for (var i = 0; i < categories.length; i++) {
	  dataArray.push([categories[i].value, parseFloat(cnt[i].value)]);
  }
  var data = new google.visualization.arrayToDataTable(dataArray);
  var options = {'title':'Chart', 'width':550, 'height':400};
  var chart = new google.visualization.PieChart(document.getElementById('noofdocs'));
  chart.draw(data, options);
}