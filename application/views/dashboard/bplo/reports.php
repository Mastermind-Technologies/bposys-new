<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>reports/general_reports" class="current">View Reports</a>
    </div>
    <h1>BPLO Application Reports <a href="<?php echo base_url(); ?>/dashboard/get_employees_accomplishment_report_info" class="btn btn-success"><i class="icon-print"></i> Print Numerical</a> <button class="btn btn-primary"><i class="icon-print"></i> Print Graphical</button></h1>
    <hr style="margin:10">
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="50" height="24"></canvas>
            </span><!-- +10% --></div>
            <div class="right"> <strong class='count'><?= $businesses ?></strong> Unique Businesses </div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="50" height="24"></canvas>
            </span><!-- 10% --></div>
            <div class="right"> <strong class='count'><?= $issued ?></strong> Issued Permits </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="50" height="24"></canvas>
            </span><!-- -40% --></div>
            <div class="right"> <strong class='count'><?= $expired ?></strong> Expired</div>
          </li>
          <li>
            <div class="left peity_line_bad"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="50" height="24"></canvas>
            </span><!-- +60% --></div>
            <div class="right"> <strong class='count'><?= $cancelled ?></strong> Cancelled </div>
          </li>
          <li>
            <div class="left peity_bar_neutral"><span>12,6,9,23,14,10,13</span><!-- +30% --></div>
            <div class="right"> <strong class='count'><?= $closed ?></strong> Closed</div>
          </li>
        </ul>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box" style="background-color: #fff">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Issued Business Permits by Year</h5>
          </div>
          <div class="widget-content no-padding">
            <div class="control-group">
              <label class='control-label' for="year">Year:</label>
              <div class="controls">
                <select class='span3' name="report-year" id="report-year">
                  <option selected disabled value="<?= date('Y') ?>">Select Year</option>
                  <?php for ($i=date('Y'); $i >= 2012; $i--) {
                    echo "<option value=$i>$i</option>";
                  } ?>
                </select>
              </div>

            </div>
            <div class="row-fluid">
              <div class='span12' id='report-container'>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                <div style="background-color: #fff; height: 25px; width: 100px; position: absolute; bottom: 15px"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--     <div class="block center-block">
      <label for="">Test Noty</label>
      <button class="btn btn-primary" id="btn-test-noty">Noty</button>
    </div> -->
  </div>
  <?php if ($this->session->flashdata('message')): ?>
    <script>
      alert('<?= $this->session->flashdata('message') ?>');
    </script>
  <?php endif ?>
  <script type="text/javascript">
    $(document).ready(function(){

     var chart = new CanvasJS.Chart("chartContainer", {
      title: {
        text: "Issued Business Permits Year <?= date('Y') ?>"
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
     $('.canvasjs-chart-credit').hide();

   });
 </script>


 <!--Footer-part-->

<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<!--end-Footer-part-->
