<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Sanitary Permit Settings</h1>
  </div>

  <div class="container-fluid">
    <hr>

    <div class="row-fluid">
      <div class="span6 offset3">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
            <h5>Edit Fees</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url(); ?>settings/update_sanitary_fees" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">First :</label>
                <div class="controls">
                  <div class="input-append">
                    <input class="span6" placeholder="" value="<?= $sanitary->firstUnits ?>" required type="text" name="first-square-meters">
                    <span class="add-on">sq. m.</span>
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" value="<?= $sanitary->firstFee ?>" required type="text" name="fee">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Succeeding Fee (per sq. m.) :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" value="<?= $sanitary->succeedingFee ?>" required type="text" name="succeeding-fee">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Health Card Fee:</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" value="<?= $sanitary->healthCardFee ?>" required type="text" name="health-card-fee">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Conditions</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Capitalization Above</th>
                  <th>Capitalization Below</th>
                  <th>Fees</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
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
