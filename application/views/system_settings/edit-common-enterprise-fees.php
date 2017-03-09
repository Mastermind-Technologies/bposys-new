<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>settings" class="tip-bottom"> Settings</a>
      <a href="#" class="current"> Line of Businesses</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Edit Common Enterprise Fee</h1>
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
            <h5>Common Enterprise Fees</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url(); ?>settings/save_edit_common_enterprise_fee/<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($common_ent_fee->commonEnterpriseFeeId)) ?>" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Line of Business :</label>
                <div class="controls">

                <input class="span11" required type="text" disabled value="<?= $common_ent_fee->name ?>">

                  <!-- <select name="line-of-business" required class="span11" id="line-of-business">
                    <option disabled selected >Select Line of Business which will apply</option>
                    <?php foreach ($unapplied_common_enterprise as $key => $line): ?>
                      <option value="<?= $this->encryption->encrypt($line->lineOfBusinessId) ?>"><?= $line->name ?></option>
                    <?php endforeach ?>
                  </select> -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Cottage Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span5" value="<?= $common_ent_fee->cottageFee ?>" placeholder=".00" required type="text" name="cottage-fee">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Small Scale Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span5" value="<?= $common_ent_fee->smallScaleFee ?>" placeholder=".00" required type="text" name="small-scale-fee">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Medium Scale Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span5" value="<?= $common_ent_fee->mediumScaleFee ?>" placeholder=".00" required type="text" name="medium-scale-fee">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Large Scale Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span5" value="<?= $common_ent_fee->largeScaleFee ?>" placeholder=".00" required type="text" name="large-scale-fee">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Update</button>
              </div>
            </div>
          </form>
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
