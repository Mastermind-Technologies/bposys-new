<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="#" class="current"> Settings</a>
    </div>
    <!--End-breadcrumbs-->
    <h1> Tax Code Revenue Configuration </h1>
  </div>



  <div class="container-fluid">
    
    <hr>
    <!--Action boxes-->
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
       <li class="bg_db"> <a href="<?php echo base_url(); ?>settings/line_of_businesses"> <i class="fa fa-share fa-2x" aria-hidden="true"></i>
      <span class="label label-warning"></span><br>Line of Businesses</a> </li>

      <li class="bg_lo"> <a href="<?php echo base_url(); ?>settings/environmental_clearance"> <i class="fa fa-circle-o-notch fa-2x" aria-hidden="true"></i>
       <span class="label label-success"></span><br><span>Environmental Clearance Fee Settings</span> </a> </li>
       <li class="bg_c"> <a href="<?php echo base_url(); ?>settings/sanitary_permit"> <i class="fa fa-th-list fa-2x" aria-hidden="true"></i>
        <span class="label label-info"></span><br>Sanitary Permit Fee Settings</a> </li>
        <!-- <li class="bg_ly span2"> <a href="<?php echo base_url(); ?>dashboard/finalize_applications"> <i class="fa fa-hourglass fa-2x" aria-hidden="true"></i>
          <span class="label label-important"><?= $finalization > 0 ? $finalization : "" ?></span><br><span>Finalization</span> </a> </li> -->
          <li class="bg_ls"> <a href="<?php echo base_url(); ?>settings/fixed_fees"> <i class="fa fa-check-square fa-2x" aria-hidden="true"></i>
            <span class="label label-info"></span><br>Fixed Fees Setting</a> </li>
            <!-- <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li> -->
            

            <!-- <li class="bg_db"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
            <li class="bg_lo"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li>
            <li class="bg_db"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
            <li class="bg_lo"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li> -->

          </ul>
        </div>
        <!-- <div class="quick-actions_homepage">
          <ul class="quick-actions">
           <li class="bg_lr"> <a href="<?php echo base_url() ?>dashboard/retirements"><span><i class="fa fa-times-rectangle fa-2x" aria-hidden="true"></i><span class="label label-info badge-retirement"></span> </span><br>Retirements</a> </li>
           <li class="bg_ly span3"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li>
         </ul>
       </div> -->
       <!-- <div class="quick-actions_homepage">
        <ul class="quick-actions">
         <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-bar-chart-o fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
       </ul>
     </div> -->
  </div>
</div>

<?php if($this->session->flashdata('message')): ?>
  <script>
    alert("<?= $this->session->flashdata('message'); ?>");
  </script>
<?php endif; ?>


<!--Footer-part-->

<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<!--end-Footer-part-->
