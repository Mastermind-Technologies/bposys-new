<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    </div>
    <!--End-breadcrumbs-->
    <h1> Environmental Clearance Settings</h1>
  </div>

  <div class="container-fluid">
    <hr>

    <div class="row-fluid">
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
            <h5>Add Fee Condition</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url(); ?>settings/add_environmental_fee_condition" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Capitalization above :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" required type="text" name="capitalization-above">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Capitalization below :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" required type="text" name="capitalization-below">
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Range Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span6" placeholder=".00" required type="text" name="range-fee">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Submit Fee Condition</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="span7">
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
              <?php foreach ($conditions as $key => $c): ?>
                <tr>
                  <td><?= $c->above ?></td>
                  <td><?= $c->below ?></td>
                  <td><?= $c->fee ?></td>
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
