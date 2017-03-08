<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Fixed Fees Settings</h1>
  </div>

  <div class="container-fluid">
    <hr>

    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
            <h5>Add Fixed Fee</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url(); ?>settings/add_fixed_fees" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Particular :</label>
                <div class="controls">
                  <input class="span11" placeholder="i.e.: Business Inspection Fee" required type="text" name="particular">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" type="text" required name="fixed-fee">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Submit Fixed Fee</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Conditions</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Particular</th>
                  <th>Fees</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($fixed_fees as $key => $fees): ?>
                <tr>
                  <td><?= $fees->particular ?></td>
                  <td><?= $fees->fee ?></td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
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
