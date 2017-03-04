<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="#" class="current">View Reports</a>
    </div>
    <h1>BFP Application Reports <a href="<?php echo base_url(); ?>/dashboard/get_employees_accomplishment_report_info" class="btn btn-success"><i class="icon-print"></i> Print Numerical</a> <button class="btn btn-primary"><i class="icon-print"></i> Print Graphical</button></h1>
    <hr style="margin:10">
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box" style="background-color: #fff">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Issued Fire Safety Inspection Certificate by Year</h5>
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
        text: "Issued Fire Safety Inspection Certificate Year <?= date('Y') ?>"
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
