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
    <div class="widget-box">
      <div class="widget-title">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab1">Line of Businesses</a></li>
          <li><a data-toggle="tab" href="#tab2">
            <?php if (count($unapplied_common_enterprise) > 0): ?>
              <span style="color:red">(<?= count($unapplied_common_enterprise) ?>) </span>
            <?php endif ?>
            Common Enterprise Fees</a>
          </li>
          <li><a data-toggle="tab" href="#tab3">Amusement Devices</a></li>
          <li><a data-toggle="tab" href="#tab4">Golf Links</a></li>
          <li><a data-toggle="tab" href="#tab5">Bowling Alleys</a></li>
          <li><a data-toggle="tab" href="#tab6">Financial Institutions</a></li>
        </ul>
      </div>
      <div class="widget-content tab-content">

        <div id="tab1" class="tab-pane active">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                  <h5>Add Line of Business</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url(); ?>settings/save_line_of_business" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Line of Business Name :</label>
                      <div class="controls">
                        <input class="span11" required placeholder="i.e.: Food Manufacturing" type="text" name="line-of-business-name">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Description :</label>
                      <div class="controls">
                        <textarea name="description" required class="span11" id="description" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Type :</label>
                      <div class="controls">
                        <select name="type" required class="span5" id="type">
                          <option selected disabled>Select Type</option>
                          <option value="Amusement">Amusement</option>
                          <option value="Common Enterprise">Common Enterprise</option>
                          <option value="Financial Institution">Financial Institution</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Imposition of Tax :</label>
                      <div class="controls">
                        <select name="imposition-of-tax" class="span5" required id="type">
                          <option selected disabled>Select Category</option>
                          <option value="A">Category A</option>
                          <option value="B">Category B</option>
                          <option value="D">Category D</option>
                          <option value="E">Category E</option>
                          <option value="F">Category F</option>
                          <option value="G">Category G</option>
                          <option value="H">Category H</option>
                          <option value="I">Category I</option>
                        </select>
                        <button type="button" data-target="#modal-info" data-toggle="modal" class="btn btn-info span4">See Imposition of Tax Information</button>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Tax Rate :</label>
                      <div class="controls">
                        <div class="input-append">
                          <input class="span3" placeholder="10" required type="text" name="tax-rate">
                          <span class="add-on">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Garbage Service Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" placeholder=".00" required type="text" name="garbage-service-fee">
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button class="btn btn-success pull-right">Submit Line of Business</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="row-fluid">
            <table class="table table-bordered">
              <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Tax Rate</th>
                <th>Type</th>
                <th>Description</th>
                <th>Imposition of Tax Category</th>
                <th>Garbage Service Fee</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php foreach ($line_of_business as $key => $line): ?>
                  <tr>
                    <td><?= $line->lineOfBusinessId ?></td>
                    <td><?= $line->name ?></td>
                    <td><?= $line->taxRate."%" ?></td>
                    <td><?= $line->type ?></td>
                    <td><?= $line->description ?></td>
                    <td><?= $line->impositionOfTaxCategory ?></td>
                    <td><?= "PHP ".number_format($line->garbageServiceFee,2) ?></td>
                    <td>
                      <a href="#" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

        <div id="tab2" class="tab-pane">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
                  <h5>Common Enterprise Fees</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url(); ?>settings/save_common_enterprise" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Line of Business :</label>
                      <div class="controls">
                        <select name="line-of-business" required class="span11" id="line-of-business">
                          <option disabled selected >Select Line of Business which will apply</option>
                          <?php foreach ($unapplied_common_enterprise as $key => $line): ?>
                            <option value="<?= $this->encryption->encrypt($line->lineOfBusinessId) ?>"><?= $line->name ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Cottage Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span5" placeholder=".00" required type="text" name="cottage-fee">
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Small Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span5" placeholder=".00" required type="text" name="small-scale-fee">
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Medium Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span5" placeholder=".00" required type="text" name="medium-scale-fee">
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Large Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span5" placeholder=".00" required type="text" name="large-scale-fee">
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button class="btn btn-success pull-right">Submit Common Enterprise Fees</button>
                    </div>
                  </div>
                </form>
              </div>
            </div><!-- end of row fluid -->
            <table class="table table-bordered">
              <thead>
                <th>Name</th>
                <th>Cottage Fee</th>
                <th>Small Scale Fee</th>
                <th>Medium Scale Fee</th>
                <th>Large Scale Fee</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php foreach ($fee_common_enterprise as $key => $common_enterprise): ?>
                  <tr>
                    <td><?= $common_enterprise->name ?></td>
                    <td><?= "PHP ".number_format($common_enterprise->cottageFee) ?></td>
                    <td><?= "PHP ".number_format($common_enterprise->smallScaleFee) ?></td>
                    <td><?= "PHP ".number_format($common_enterprise->mediumScaleFee) ?></td>
                    <td><?= "PHP ".number_format($common_enterprise->largeScaleFee) ?></td>
                    <td>
                      <a href="#" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

        <div id="tab3" class="tab-pane">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
                  <h5>Add Amusement Devices</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url() ?>settings/add_amusement_device" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Name</label>
                      <div class="controls">
                        <input type="text" required name="amusement-device-name" class="span5">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Rate per unit :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span5" placeholder=".00" required type="text" name="rate-per-unit">
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
          <table class="table table-bordered">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Rate per unit</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <?php foreach ($amusement_device as $key => $device): ?>
                <tr>
                  <td><?= $device->amusementDeviceId ?></td>
                  <td><?= $device->name ?></td>
                  <td><?= "PHP ".number_format($device->ratePerUnit) ?></td>
                  <td>
                    <a href="#" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>


        <div id="tab4" class="tab-pane">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                  <h5>Golf Link Fees</h5>

                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url(); ?>settings/add_golf_link_fees" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Above :</label>
                      <div class="controls">
                        <div class="input-append">
                          <input class="span4" required type="text" name="above">
                          <span class="add-on">holes</span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Below :</label>
                      <div class="controls">
                        <div class="input-append">
                          <input class="span4" required type="text" name="below">
                          <span class="add-on">holes</span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Range Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" required placeholder=".00" type="text" name="range-fee">
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button class="btn btn-success pull-right">Submit Golf Fee</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <th>Above</th>
              <th>Below</th>
              <th>Fee</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <?php foreach ($golf_link_fees as $key => $golf_link): ?>
                <tr>
                  <td><?= $golf_link->above." holes" ?></td>
                  <td><?= $golf_link->below." holes" ?></td>
                  <td><?= "PHP". number_format($golf_link->fee) ?></td>
                  <td>
                    <a href="#" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div id="tab5" class="tab-pane">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                  <h5>Bowling Alley Fees</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url() ?>settings/update_bowling_alley_fee" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Per Automatic Lane Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" required placeholder=".00" type="text" value="<?= $bowling_alley_fees->automaticLaneFee ?>" name="automatic-lane-fee">
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Per Non-automatic Lane Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" required placeholder=".00" type="text" value="<?= $bowling_alley_fees->nonAutomaticLaneFee ?>" name="non-automatic-lane-fee">
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button class="btn btn-success pull-right">Submit Bowling Alley Fee</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="tab6" class="tab-pane">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                  <h5>Financial Institutions</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url(); ?>settings/update_financial_institution_fees" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">Small Scale Description :</label>
                      <div class="controls">
                        <textarea name="small-scale-desc" id="large-scale-desc" cols="30" rows="2" class="span11"><?= $financial_institution_fees[0]->description ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Small Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" required placeholder=".00" value="<?= $financial_institution_fees[0]->fee ?>" type="text" value="" name="small-scale-fee">
                        </div>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Medium Scale Description :</label>
                      <div class="controls">
                        <textarea name="medium-scale-desc" id="medium-scale-desc" cols="30" rows="2" class="span11"><?= $financial_institution_fees[1]->description ?></textarea>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Medium Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" value="<?= $financial_institution_fees[1]->fee ?>" required placeholder=".00" type="text" value="" name="medium-scale-fee">
                        </div>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Large Scale Description :</label>
                      <div class="controls">
                        <textarea name="large-scale-desc" id="large-scale-desc" cols="30" rows="2" class="span11"><?= $financial_institution_fees[2]->description ?></textarea>
                        <!-- <input type="text" required value="<?= $financial_institution_fees[2]->description ?>" placeholder="Commercial, Development and Universal Banks" class="span11" name='large-scale-desc'> -->
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Large Scale Fee :</label>
                      <div class="controls">
                        <div class="input-prepend">
                          <span class="add-on">PHP</span>
                          <input class="span4" required placeholder=".00" value="<?= $financial_institution_fees[2]->fee ?>" type="text" value="" name="large-scale-fee">
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
