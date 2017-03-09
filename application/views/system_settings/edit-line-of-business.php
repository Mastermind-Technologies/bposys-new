<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>settings" class="tip-bottom"> Settings</a>
      <a href="#" class="current"> Line of Businesses</a>
    </div>
    <!--End-breadcrumbs-->
    <h1> Line of Businesses Settings</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
            <h5>Add Line of Business</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?php echo base_url(); ?>settings/save_edit_line_of_business/<?= str_replace(['/','+','='], ['-','_','='], $this->encryption->encrypt($line_of_business->lineOfBusinessId))?>" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Line of Business Name :</label>
                <div class="controls">
                  <input class="span11" value="<?= $line_of_business->name ?>" required placeholder="i.e.: Food Manufacturing" type="text" name="line-of-business-name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description :</label>
                <div class="controls">
                  <textarea name="description" required class="span11" id="description" cols="30" rows="3"><?= $line_of_business->description ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Type :</label>
                <div class="controls">
                  <select name="type" required class="span5" id="type">
                    <option disabled>Select Type</option>
                    <option <?= $line_of_business->type=="Amusement" ? "selected" : '' ?> value="Amusement">Amusement</option>
                    <option <?= $line_of_business->type=="Common Enterprise" ? "selected" : '' ?> value="Common Enterprise">Common Enterprise</option>
                    <option <?= $line_of_business->type=="Financial Institution" ? "selected" : '' ?> value="Financial Institution">Financial Institution</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Imposition of Tax :</label>
                <div class="controls">
                  <select name="imposition-of-tax" class="span5" required id="type">
                    <option disabled>Select Category</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="A" ? "selected" : '' ?> value="A">Category A</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="B" ? "selected" : '' ?> value="B">Category B</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="D" ? "selected" : '' ?> value="D">Category D</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="E" ? "selected" : '' ?> value="E">Category E</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="F" ? "selected" : '' ?> value="F">Category F</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="G" ? "selected" : '' ?> value="G">Category G</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="H" ? "selected" : '' ?> value="H">Category H</option>
                    <option <?= $line_of_business->impositionOfTaxCategory=="I" ? "selected" : '' ?> value="I">Category I</option>
                  </select>
                  <button type="button" data-target="#modal-info" data-toggle="modal" class="btn btn-info span4">See Imposition of Tax Information</button>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tax Rate :</label>
                <div class="controls">
                  <div class="input-append">
                    <input class="span3" placeholder="10" value="<?= $line_of_business->taxRate ?>" required type="text" name="tax-rate">
                    <span class="add-on">%</span>
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Garbage Service Fee :</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on">PHP</span>
                    <input class="span4" placeholder=".00" value="<?= $line_of_business->garbageServiceFee ?>" required type="text" name="garbage-service-fee">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button class="btn btn-success pull-right">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
  </div>

  <div id="modal-info" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h4>Imposition of Tax Categories</h4>
    </div>
    <div class="modal-body">
      <p>This is based in Tax Code Revenue of Biñan</p>
      <br>
      <p>There is hereby imposed an annual tax on every business within the City a graduated business tax in the amounts hereafter prescribed:</p>
      <br>
      <p><strong>Category A</strong> - On manufacturers, assemblers, repackers, processors, brewers, distillers, rectifiers, and compounders of liquors, distilled spirits, and wines or manufacturers of any article of commerce of whatever kind or nature.</p>
      <br>
      <p><strong>Category B</strong> - On Wholesalers, distributors, or dealers in any article of commerce of whatever kind or nature.</p>
      <br>
      <p><strong>Category D</strong> - On retailers</p>
      <br>
      <p>*On exporters, and on manufacturers, millers, producers,wholesalers, distributors, dealers or retailers of <strong>essential commodities</strong> enumerated hereunder at a rate not exceeding one-half (1/2) of the rates prescribed under subsections <strong>categories A, B, and D</strong>. (See the tax code revenue for the list of rates.)</p>
      <br>
      <p><strong>Category E</strong> - On contractors and other independent contractors, which will include persons, natural or juridicical whose activity consists essentially of the sales of service for a fee, regardless whether or not the performance of the service calls for the exercise or use of the physical or mental faculties of such contractor or his employees.</p>
      <br>
      <p><strong>Category F</strong> - On banks and other financial institutions including non-bank intermediaries, lending investors, finance and investment companies, pawnshops, money shops, insurance companies, stock markets/brokers and foreign exchange agencies.</p>
      <br>
      <p><strong>Category G</strong> - On peddlers engaged in the sale of any merchandise or article of commerce at the rate of PHP 75.00 per peddler per annum.</p>
      <br>
      <p><strong>Category H</strong> - Amusement places and other kinds</p>
      <br>
      <p><strong>Category I</strong> - On Lessor of Real Estate including apartments/boarding houses</p>
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
