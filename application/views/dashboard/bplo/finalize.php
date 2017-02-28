<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> 
      <a href="<?php echo base_url(); ?>dashboard/pending_applications" class="current">Finalize Applications</a>
    </div>
    <h1>Applications for Finalization </h1>
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
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($finalize)): ?>
              <?php foreach ($finalize as $application): ?>
                <tr>
                  <td><?= $this->encryption->decrypt($application->get_referenceNum()) ?></td>
                  <td><?= $application->get_businessName() ?></td>
                  <td><a href="<?php echo base_url(); ?>dashboard/view_application/<?= bin2hex($this->encryption->encrypt($application->get_applicationId(), $custom_encrypt)) ?>" class="btn btn-info btn-block">Show Details</a></td>
                </tr>
              <?php endforeach; ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<?php if ($this->session->flashdata('message')): ?>
  <script>
    alert('<?= $this->session->flashdata('message') ?>');
  </script>
<?php endif ?>

