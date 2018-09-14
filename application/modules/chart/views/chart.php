<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Line Chart</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'line',
	                marginRight: 130,
	                marginBottom: 75 //25
	            },
	            title: {
	                text: 'Responden',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Jumlah'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            
	            series: []
	        }
	        
	        $.getJSON("data", function(json) {
				options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
		<script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container_pertanyaan',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
					    text: 'Pertanyaan'
					},
					subtitle: {
					    text: 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini ?'
					},
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.y+ ' Responden';
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                formatter: function() {
                                    return '<b>' + this.point.name + '</b>: ' + this.y;
                                }
                            },
                            showInLegend: true
                        }
                    },
                    series: []
                };

                /*$.getJSON("data2", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });*/
                $.getJSON("data", function(json) {
		        	options.series[0] = json[2];
			        chart1 = new Highcharts.Chart(options);
		        });

		        $('#change_chart_title_pertanyaan').click(function(){
				    options.subtitle.text = $('#chart_title_pertanyaan').val();
				    var chart1 = new Highcharts.Chart(options);
				});
            });
        </script>
	    <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
		<script src="http://code.highcharts.com/modules/drilldown.js"></script>
	</head>
	<body>
		<!-- <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div> -->

		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        Dashboard
		        <small>Control panel</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Dashboard</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <!-- Small boxes (Stat box) -->
		      <div class="row">
		        <div class="col-md-6">

					<div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
					<br>
			        Periode : 
			        <input type="text" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="chart_title_periode_start" id="chart_title_periode_start">
			        s/d
			        <input type="text" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="chart_title_periode_end" id="chart_title_periode_end">
			        <input type="button" id="change_chart_title_periode" value="Change"> 
				</div>
				<div class="col-md-6">

					<div id="container_pertanyaan" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
					<br>
			        Pertanyaan : 
			        <input type="text" id="chart_title_pertanyaan" name="chart_title_pertanyaan" value="">
			        <input type="submit" id="change_chart_title_pertanyaan" value="Change"> 
				</div>
		      	<!-- /.row -->
		    </section>
		    <!-- /.content -->

	</body>
</html>