google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var categories = document.getElementsByName("serviceVal");
  var cnt = document.getElementsByName("servicecntVal");
  var dataArray = [['Services', 'Types of Services']];
  for (var i = 0; i < categories.length; i++) {
	  dataArray.push([categories[i].value, parseFloat(cnt[i].value)]);
  }
  var data = new google.visualization.arrayToDataTable(dataArray);
  var options = {'title':'Chart', 'width':550, 'height':400};
  var chart = new google.visualization.PieChart(document.getElementById('service'));
  chart.draw(data, options);
}