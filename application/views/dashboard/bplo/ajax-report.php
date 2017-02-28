<div id="chartContainer" style="height: 400px; width: 100%;"></div>

<script type="text/javascript">
	$(document).ready(function(){
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Issued Business Permits Year <?= $year ?>"
			},
			animationEnabled: true,
			data: [{
				type: "stackedColumn",
				legendText: "New",
				showInLegend: "true",
				dataPoints: [
				{ y: <?= $n_january ?>, label: "January" },
				{ y: <?= $n_february ?>, label: "February" },
				{ y: <?= $n_march ?>, label: "March" },
				{ y: <?= $n_april ?>, label: "April" },
				{ y: <?= $n_may ?>, label: "May" },
				{ y: <?= $n_june ?>, label: "June" },
				{ y: <?= $n_july ?>, label: "July" },
				{ y: <?= $n_august ?>, label: "August" },
				{ y: <?= $n_september ?>, label: "September" },
				{ y: <?= $n_october ?>, label: "October" },
				{ y: <?= $n_november ?>, label: "November" },
				{ y: <?= $n_december ?>, label: "December" },
				]
			}, {
				type: "stackedColumn",
				legendText: "Renewal",
				showInLegend: "true",
				indexLabel: "#total",
				indexLabelPlacement: "outside",
				dataPoints: [
				{ y: <?= $r_january ?>, label: "January" },
				{ y: <?= $r_february ?>, label: "February" },
				{ y: <?= $r_march ?>, label: "March" },
				{ y: <?= $r_april ?>, label: "April" },
				{ y: <?= $r_may ?>, label: "May" },
				{ y: <?= $r_june ?>, label: "June" },
				{ y: <?= $r_july ?>, label: "July" },
				{ y: <?= $r_august ?>, label: "August" },
				{ y: <?= $r_september ?>, label: "September" },
				{ y: <?= $r_october ?>, label: "October" },
				{ y: <?= $r_november ?>, label: "November" },
				{ y: <?= $r_december ?>, label: "December" },
				]
			}
			]
		});
		chart.render();
	});
</script>
