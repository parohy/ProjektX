<?php
/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 23. 2. 2016
 * Time: 19:03
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once $path.'API/Viewcounter.php';
$v=new Viewcounter;
?>
		<!-- amCharts javascript sources -->
		<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
		<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
		<script src="http://www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>

		<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "category",
					"dataDateFormat": "YYYY-MM-DD",
					"autoMarginOffset": 10,
					"marginBottom": 20,
					"zoomOutButtonColor": "#34A994",
					"sequencedAnimation": false,
					"startDuration": 0,
					"color": "#34A994",
					"theme": "patterns",
					"categoryAxis": {
						"gridPosition": "start",
						"parseDates": true
					},
					"chartCursor": {
						"enabled": true
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "graph 1",
							"type": "column",
							"valueField": "column-1"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": ""
						}
					],
					"allLabels": [],
					"balloon": {},
					"titles": [
						{
							"id": "Title-1",
							"size": 12,
							"text": "Page views"
						}
					],
					"dataProvider": [
						<?php echo $v->chartDataProvider() ?>
					]
				}
			);
		</script>

		<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
