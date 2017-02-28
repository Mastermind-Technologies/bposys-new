<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> 
      <a href="<?php echo base_url(); ?>dashboard/on_process_applications" class="current">On Process Applications</a>
    </div>
    <h1>On Process Applications</h1>
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
              <th>Application Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (is_array($on_process) || is_object($on_process)): ?>
              <?php foreach ($on_process as $application): ?>
                <tr>
                  <td><?= $this->encryption->decrypt($application->get_referenceNum()) ?></td>
                  <td><?= $application->get_businessName() ?></td>
                  <td><?= $application->get_ApplicationType() ?></td>
                  <td><a href="<?php echo base_url(); ?>dashboard/view_application/<?= bin2hex($this->encryption->encrypt($application->get_applicationId(), $custom_encrypt)) ?>" class="btn btn-info btn-block">Show Details</a></td>
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