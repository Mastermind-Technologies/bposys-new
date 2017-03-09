<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Edit Fixed Fee</h1>
  </div>

  <div class="container-fluid">
    <hr>

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
      <h5>Fixed Fee</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="<?php echo base_url(); ?>settings/save_edit_fixed_fee/<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($fixed_fee->feeFixedId)) ?>" method="post" class="form-horizontal">
          <div class="control-group">
            <label class="control-label">Particular :</label>
            <div class="controls">
              <input class="span11" value="<?= $fixed_fee->particular ?>" required type="text" name="particular">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Fee :</label>
            <div class="controls">
              <div class="input-prepend">
                <span class="add-on">PHP</span>
                <input class="span6" placeholder=".00" type="text" value="<?= $fixed_fee->fee ?>" required name="fixed-fee">
              </div>
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-success pull-right">Update Fixed Fee</button>
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
