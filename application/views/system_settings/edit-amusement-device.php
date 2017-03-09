<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>settings" class="tip-bottom"> Settings</a>
      <a href="#" class="current"> Line of Businesses</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Edit Amusement Device Fee</h1>
  </div>

  <div class="container-fluid">
    <hr>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-error">
        <button class="close" data-dismiss="alert">×</button>
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
            <h5>Add Amusement Devices</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>settings/save_edit_amusement_device/<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($device->amusementDeviceId)) ?>" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                <input type="text" required name="amusement-device-name" value="<?= $device->name ?>" class="span5">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Rate per unit :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span5" placeholder=".00" value="<?= $device->ratePerUnit ?>" required type="text" name="rate-per-unit">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Submit Amusement Device</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
