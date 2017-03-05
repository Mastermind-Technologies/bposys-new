<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> 
      <a href="#" class="current">Retirements</a>
    </div>
    <h1>Retirements</h1>
    <hr>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Reference Number</th>
              <th>Business Name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (is_array($retirements) || is_object($retirements)): ?>
             <?php foreach ($retirements as $application): ?>
              <tr>
                <td><?= $this->encryption->decrypt($application->get_referenceNum()) ?></td>
                <td><?= $application->get_businessName() ?></td>
                <td><?= $application->get_status() ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>dashboard/view_retirement/<?= bin2hex($this->encryption->encrypt($application->get_applicationId(), $custom_encrypt)) ?>" class="btn btn-info btn-block">Show Details</a>
                  <a href="<?php echo base_url(); ?>dashboard/get_cert_closure_form_info/<?= str_replace(['/','+','='], ['-','_','='], $application->get_referenceNum() ) ?>" class="btn btn-success btn-block">Print Retirement Form</a>
                  <?php if ($application->get_status() == "Closed"): ?>
                    <a href="<?php echo base_url(); ?>dashboard/get_cert_closure_info/<?= str_replace(['/','+','='], ['-','_','='], $application->get_referenceNum() ) ?>" class="btn btn-success btn-block">Print Certificate</a>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif ?>
        </tbody>
      </table>
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

  <!--Footer-part-->

<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<!--end-Footer-part-->