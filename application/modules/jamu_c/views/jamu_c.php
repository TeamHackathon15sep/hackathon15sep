<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Line Chart</title>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script src="<?php echo base_url('assets/admin/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
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
	                text: 'Capaian Penjualan',
	                x: -20 //center
	            },
	            subtitle: {
	                text: 'dan Target',
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
	        	options.series[1] = json[2];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
		<script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container_penjulan',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
					    text: 'Penjualan'
					},
					subtitle: {
					    text: 'per Kota'
					},
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.y+ ' Penjualan dan Target Penjualan';
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
		        	options.series[0] = json[3];
			        chart1 = new Highcharts.Chart(options);
		        });

		        $('#change_chart_title_pertanyaan').click(function(){
				    options.subtitle.text = $('#chart_title_pertanyaan').val();
				    var chart1 = new Highcharts.Chart(options);
				});
            });
        </script>
	    <script src="<?php echo base_url('assets/admin/plugins/highcharts/highcharts.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin/plugins/highcharts/modules/exporting.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin/plugins/highcharts/modules/drilldown.js') ?>"></script>
	    <!--<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
		<script src="http://code.highcharts.com/modules/drilldown.js"></script>-->
	</head>
	<body>
		<!-- <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div> -->

		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        Grafik Penjualan Jamu C
		        <small>Preview</small>
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">Grafik Penjualan Jamu C</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		      <!-- Small boxes (Stat box) -->
		      <div class="row">
				<div class="col-md-12">

					<div id="container" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
					<div style="height: 5px; margin: 0 auto"></div>
					<div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Pilihan</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive pad">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="btn-group">
                      <?php echo anchor('survey/importSurvey/', 'Import', array("class"=>"btn btn-info")) ?>
                     <!--  <button type="button" class="btn btn-info">Edit</button>
                      <button type="button" class="btn btn-info">Hapus</button> -->
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th>Keterangan</th>
                  <th>Tgl Survey</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1; 
                  foreach ($record as $r) {
                    
                    echo "<tr>
                            <td>$no</td>
                            <td>$r->desk_pertanyaan</td>
                            <td>$r->desk_jwb</td>
                            <td>$r->ket_jwb</td>
                            <td>$r->tgl_survey</td>
                        </tr>";
                        $no++;

                  }
                 ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
					<div style="height: 5px; margin: 0 auto"></div>
					<div id="container_penjulan" style="min-width: 400px; height: 500px; margin: 0 auto"></div>
					
				</div>
		      	<!-- /.row -->
		    </section>
		    <!-- /.content -->

	</body>
</html>