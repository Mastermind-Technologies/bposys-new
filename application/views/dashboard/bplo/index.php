<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="#" class="current">Home</a>
    </div>
    <!--End-breadcrumbs-->
  </div>



  <div class="container-fluid">
    <h1><?= $user->get_lastName() . ", " . $user->get_firstName() . "(".$user->get_middleName().") "?></h1>
    <hr>
    <h3>Department: <?= $this->encryption->decrypt($this->session->userdata['userdata']['role']) ?></h3>
    <!--Action boxes-->
    <div class="quick-actions_homepage">
      <ul class="quick-actions">

        <li class="bg_db"> <a href="<?php echo base_url(); ?>dashboard/incoming_applications"> <i class="fa fa-share fa-2x" aria-hidden="true"></i>
          <span class="label label-warning badge-incoming"><?= $incoming > 0 ? $incoming : "" ?></span><br>Incoming Applicants </a> </li>

          <li class="bg_lo"> <a href="<?php echo base_url(); ?>dashboard/on_process_applications"> <i class="fa fa-circle-o-notch fa-2x" aria-hidden="true"></i>
            <span class="label label-success badge-process"><?= $process > 0 ? $process : "" ?></span><br><span>On Process</span> </a> </li>
            <li class="bg_c"> <a href="<?php echo base_url(); ?>dashboard/completed_applications"> <i class="fa fa-th-list fa-2x" aria-hidden="true"></i>
              <span class="label label-info badge-completed"><?= $complete > 0 ? $complete : "" ?></span><br>Complete Requirements</a> </li>

              <li class="bg_ls"> <a href="<?php echo base_url(); ?>dashboard/issued_applications"> <i class="fa fa-check-square fa-2x" aria-hidden="true"></i>
                <span class="label label-info badge-issued"><?= $issued > 0 ? $issued : "" ?></span><br>Issued</a> </li>


              </ul>
            </div>
            <div class="quick-actions_homepage">
              <ul class="quick-actions">
                <li class="bg_lr"> <a href="<?php echo base_url() ?>dashboard/retirements"><span><i class="fa fa-times-rectangle fa-2x" aria-hidden="true"></i><span class="label label-info badge-retirement"><?= $retirement > 0 ? $retirement : "" ?></span> </span><br>Retirements</a> </li>
                <li class="bg_c span2"> <a href="<?php echo base_url(); ?>dashboard/payments"> <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                  <span class="label label-info"><?= $unsettled_accounts > 0 ? $unsettled_accounts : "" ?></span><br>Payments</a> </li>
                  <li class="bg_ly span2"> <a href="<?php echo base_url(); ?>dashboard/task_logs"> <i class="fa fa-th-list fa-2x" aria-hidden="true"></i><br>Task Logs</a> </li>
                </ul>
              </div>
              <div class="quick-actions_homepage">
                <ul class="quick-actions">
                  <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-bar-chart-o fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
                  <li class="bg_ly span1"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li>
                </ul>
              </div>


            </div>

            <?php if($this->session->flashdata('message')): ?>
              <script>
                alert("<?= $this->session->flashdata('message'); ?>");
              </script>
            <?php endif; ?>


            <!--Footer-part-->
