<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>dashboard/reports" class="current">View Reports</a>
    </div>
    <h1>BPLO Master List <button class="btn btn-success"><i class="icon-print"></i> Print</button> </h1>
    <hr style="margin:10">
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <div class="widget-box widget-plain">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Data table</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Business Name</th>
                    <th>Owner's Name</th>
                    <th>Main Business</th>
                    <th>Status</th>
                    <th>Initial Capital</th>
                    <th>Gross Receipts</th>
                    <th>Date Operated</th>
                    <th>Contact Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($applications as $key => $application): ?>
                    <tr>
                      <td><?= $application->get_BusinessName() ?></td>
                      <td><?= $application->get_firstName()." ".$application->get_lastName() ?></td>
                      <td><?= $application->get_lineOfBusiness() ?></td>
                      <td><?= $application->get_status() ?></td>
                      <td><?= $application->get_capital() ?></td>
                      <td>
                        <?php if ($application->get_applicationType() == "Renew"): ?>
                          <?php 
                          $total = 0;
                          foreach ($application->get_businessActivities() as $key => $activity) {
                            $total += $activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials;
                          }
                          echo $total;
                          ?>
                        <?php else: ?>
                          NA
                        <?php endif ?>
                      </td>
                      <td><?= $application->get_dateOfOperation() ?></td>
                      <td><?= $application->get_ownerContactNum() ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>
<?php if ($this->session->flashdata('message')): ?>
  <script>
    alert('<?= $this->session->flashdata('message') ?>');
  </script>
<?php endif ?>
