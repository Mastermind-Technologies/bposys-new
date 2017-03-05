<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> 
      <a href="<?php echo base_url(); ?>dashboard/payments" class="tip-bottom">Payments</a>
      <a href="#" class="current">View Payment</a>
    </div>
    <h1>Payment</h1>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span8 offset2">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Payment Form</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url(); ?>form/accept_payment/<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($application->get_assessment()->assessmentId)) ?>" method="post" class="form-horizontal" data-parsley-validate="">
              <div class="control-group">
                <label class="control-label">Reference Number:</label>
                <label class='control-label text-warning' style='text-align: left; padding-left:20px'><strong><?= $this->encryption->decrypt($application->get_referenceNum()) ?></strong></label>
                <input type="hidden" name="ref" id='ref' value='<?= str_replace(['/','+','='], ['-','_','='], $application->get_referenceNum()) ?>'> 
                <input type="hidden" id="aid" name="aid" value="<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($application->get_assessment()->assessmentId)) ?>">
              </div>
              <div class="control-group">
                <label class="control-label">Business Name:</label>
                <label class='control-label' style='text-align: left; padding-left:20px'><strong><?= $application->get_businessName() ?></strong></label> 
              </div>
              <div class="control-group">
                <label class="control-label">Due:</label>
                <label class='control-label' style='text-align: left; padding-left:20px'><strong>PHP <?= number_format($application->get_assessment()->amount, 2) ?></strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Paid Up To:</label>
                <?php 
                $first = false;
                $second = false;
                $third = false;
                $fourth = false;
                switch($application->get_assessment()->paidUpTo)
                {
                  case "None": 
                  $index = 0;
                  break;
                  case "First Quarter": 
                  $first = true;
                  $index = 1;
                  break;
                  case "Second Quarter": 
                  $second = true;
                  $index = 2;
                  break;
                  case "Third Quarter": 
                  $third = true;
                  $index = 3;
                  break;
                  case "Fourth Quarter": 
                  $third = true;
                  $index = 3;
                  break;
                } 
                ?>
                <div class="controls">
                  <div data-toggle="buttons-radio" class="btn-group">
                    <button name='paid-up-to' id='paid-up-to' value="First Quarter" <?= $first == true || $second == true || $third == true || $fourth == true ? 'disabled' : '' ?> class="btn btn-default paid-up-to <?= $application->get_assessment()->paidUpTo=="None" ? "active" : '' ?>" type="button">First Quarter</button>
                    <button name='paid-up-to' id='paid-up-to' value="Second Quarter" <?= $second == true || $third == true || $fourth == true ? 'disabled' : '' ?> class="btn btn-default paid-up-to <?= $application->get_assessment()->paidUpTo=="First Quarter" ? 'active' : '' ?>" type="button">Second Quarter</button>
                    <button name='paid-up-to' id='paid-up-to' value="Third Quarter" <?= $third == true || $fourth == true ? 'disabled' : '' ?> class="btn btn-default paid-up-to <?= $application->get_assessment()->paidUpTo=="Second Quarter" ? 'active' : '' ?>" type="button">Third Quarter</button>
                    <button name='paid-up-to' id='paid-up-to' value="Fourth Quarter" class="btn btn-default paid-up-to <?= $application->get_assessment()->paidUpTo=="Fourth Quarter" ? 'active' : '' ?>" type="button">Fourth Quarter</button>
                  </div>
                  <input type="hidden" name="hidden-paid-up-to" value="<?php 
                  // $first = false;
                  // $second = false;
                  // $third = false;
                  // $fourth = false;

                  switch($application->get_assessment()->paidUpTo)
                  {
                    case "None": 
                    echo "First Quarter";
                    break;

                    case "First Quarter": 
                    echo "Second Quarter";
                    break;

                    case "Second Quarter": 
                    echo "Third Quarter";
                    break;

                    case "Third Quarter": 
                    echo "Fourth Quarter";
                    break;


                    case "Fourth Quarter": 
                    echo "Fourth Quarter";
                    break;
                  } 
                  ?>" id="hidden-paid-up-to">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">OR Number:</label>
                <div class="controls">
                  <input type="text" name='or-number' required class="span4" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Amount Paid:</label>
                <div class="controls-group">
                  <label class='control-label' id='amount-paid' style='text-align: left; padding-left:20px'><strong>PHP <?= $application->get_assessment()->paidUpTo == "Fourth Quarter" ? number_format($amount_paid, 2) : number_format($application->get_quarterPayment()[$index], 2) ?></strong></label>
                  <input type="hidden" name='amount-paid' id='hap' value="<?= $application->get_assessment()->paidUpTo == "Fourth Quarter" ? number_format($amount_paid, 2) : number_format($application->get_quarterPayment()[$index], 2) ?>">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success btn-large pull-right">Issue Business Permit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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