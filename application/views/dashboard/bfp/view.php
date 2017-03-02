<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <?php if ($application->get_status() == "On process"): ?>
        <a href="<?php echo base_url(); ?>dashboard/on_process_applications">On Process Applications</a>
      <?php elseif ($application->get_status() == "For applicant visit"): ?>
        <a href="<?php echo base_url(); ?>dashboard/incoming_applications">Incoming Applications</a>
      <?php elseif ($application->get_status() == "Active"): ?>
        <a href="<?php echo base_url(); ?>dashboard/issued_applications">Issued Applications</a>
      <?php endif ?>

      <a href="#" class="current">View</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Business Name: <strong><?= $application->get_businessName() ?></strong></h1>
    <h4 style="padding-left: 20px;">Status: <span class="text-warning"><?= $application->get_status() ?></span></h4>
    <hr>
  </div>

  <div class="container-fluid">

    <div class="widget-box">
      <div class="widget-title">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab1">BFP Form</a></li>
          <li><a data-toggle="tab" href="#bplo">BPLO Form</a></li>
          <li><a data-toggle="tab" href="#tab2">Order of Payment</a></li>
          <li><a data-toggle="tab" onclick="initMap()" href="#tab3">Business Location</a></li>
        </ul>
      </div>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active">
          <!-- <pre>
            <?php print_r($application); ?>
          </pre> -->
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td colspan="2">
                  <label for="name_of_building">Name of Building</label>
                  <h5><?=$application->get_bldgName()?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="business_name">Business Name</label>
                  <h5><?=$application->get_businessName()?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="address">Address</label>
                  <h5><?=$application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province()?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="nature_of_business">Nature of Business</label>
                  <h5><?= $application->get_LineOfBusiness() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="name_of_owner">Name of Owner / Occupant</label>
                  <h5><?=$application->get_FirstName() . " " . $application->get_MiddleName() . " " . $application->get_LastName()?></h5>
                </td>
                <td>
                  <label for="owner_contact_number">Contact No.</label>
                  <h5><?=$application->get_OwnertelNum()?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="name_of_representative">Name of Representative</label>
                  <h5><?=$this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['middleName'] . " " . $this->session->userdata['userdata']['lastName']?></h5>
                </td>
                <td>
                  <label for="representative_contact_number">Contact No.</label>
                  <h5><?= $representative->get_contactNum() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="number_of_storey">No. of Storey</label>
                  <h5><?=$application->get_storeys()?></h5>
                </td>
                <td>
                  <label for="portion_occupied">Portion Occupied</label>
                  <h5><?=$application->get_occupiedPortion()?></h5>
                </td>
                <tr>
                  <td>
                    <label for="area_per_floor">Area per Flr.</label>
                    <h5><?=$application->get_areaPerFloor()?></h5>
                  </td>
                  <td>
                    <!-- <label for="date_issued">Date Issued</label>
                    <h5>???</h5> -->
                  </td>
                </tr>
              </tr>
            </tbody>
          </table>
          <?php if ($application->get_status() == "On process"): ?>
            <form action="<?php echo base_url(); ?>dashboard/approve_application/<?= $application->get_referenceNum() ?>" method="POST">
              <div class="row-fluid text-center">
                <div class="span4 offset4">
                  <table class="table table-bordered">
                    <th colspan="2" class='text-center'>Requirements Checklist</th>
                    <tbody>
                      <?php foreach ($application->get_requirements() as $key => $requirements): ?>
                        <tr>
                          <td style="width:10%"><input type="checkbox" value="<?= $this->encryption->encrypt($requirements->requirementId) ?>" class='requirements-checkbox' name="requirements[]" /></td>
                          <td> <?= $requirements->name ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php endif ?>
            <div class="form-action">
              <?php if ($application->get_status() != "Active"): ?>
                <div class="row text-center">
                  <?php if ($application->get_status() == "For applicant visit"): ?>
                    <a href="<?php echo base_url(); ?>dashboard/validate_application/<?= $application->get_referenceNum() ?>" class="btn btn-success btn-process">Validate</a>
                    <!-- <a href="#" class="btn btn-danger btn-lg">Reject</a> -->
                  <?php elseif ($application->get_status() == "On process"): ?>
                    <button class="btn btn-success btn-process" disabled="" id="approve-btn">Issue Fire Safety Insurance Certificate</button>
                  </form>
                  <!-- <a href="<?php echo base_url(); ?>dashboard/approve_application/<?= $application->get_referenceNum() ?>" class="btn btn-success">Approve</a> -->
                  <!-- <a href="#" class="btn btn-warning btn-lg">Edit information</a> -->
                <?php endif ?>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div id="bplo" class="tab-pane">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>
                  <label for="date_of_application">Date of Application</label>
                  <h5><?=$bplo->get_applicationDate() ?></h5>
                </td>
                <td>
                  <label for="dti_registration_number">DTI/SEC/CDA Registration No.</label>
                  <h5><?= $bplo->get_DTISECCDARegNum() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="reference_no">Reference No.</label>
                  <h5><?= $this->encryption->decrypt(str_replace(['-','_','='], ['/','+','='],  $bplo->get_referenceNum())) ?></h5>
                </td>
                <td>
                  <label for="dti_date_of_registration">DTI/SEC/CDA Date of Registration</label>
                  <h5><?= $bplo->get_DTISECCDADate() ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="type_of_organization">Type of Organization</label>
                  <h5><?= $bplo->get_organizationType() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="ctc_no">CTC No.</label>
                  <h5><?= $bplo->get_CTCNum() ?></h5>
                </td>
                <td>
                  <label for="tin">TIN</label>
                  <h5><?= $bplo->get_TIN() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="is_enjoying_tax_incentives">Tax incentive from any Government Entity?</label>
                  <h5><?= $bplo->get_entityName()=="NA" ? "No" : "Yes" ?></h5>
                </td>
                <td>
                  <label for="specified_entity">Specified Entity:</label>
                  <h5><?= $bplo->get_entityName() ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="name_of_tax_payer">Name of Tax Payer</label>
                  <h5><?= $bplo->get_LastName().", ".$bplo->get_FirstName()." (".$bplo->get_MiddleName().")" ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="business_name">Business Name</label>
                  <h5><?= $bplo->get_businessName() ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="trade_name_franchise">Trade Name/ Franchise</label>
                  <h5><?= $bplo->get_tradeName() ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="name_of_president_or_treasurer">Name of President/ Treasurer of Corporation</label>
                  <h5><?= $bplo->get_presidentTreasurerName() ?></h5>
                </td>
              </tr>
              <tr>
                <td style="text-align:center">
                  <h4 style="font-weight: bolder">Business Address</h4>
                </td>
                <td style="text-align:center">
                  <h4 style="font-weight: bolder">Owner's Address Address</h4>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_house_no">House No. / Bldg. No.</label>
                  <h5><?= $bplo->get_houseBldgNum() ?></h5>
                </td>
                <td>
                  <label for="owners_address_house_no">House No. / Bldg. No.</label>
                  <h5><?= $bplo->get_houseBldgNum() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_building_name">Building Name</label>
                  <h5><?= $bplo->get_bldgName() ?></h5>
                </td>
                <td>
                  <label for="owners_address_building_name">Building Name</label>
                  <h5><?= $bplo->get_OwnerbldgName() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_unit_no">Unit No.</label>
                  <h5><?= $bplo->get_unitNum() ?></h5>
                </td>
                <td>
                  <label for="owners_address_unit_no">Unit No.</label>
                  <h5><?= $bplo->get_OwnerunitNum() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_street">Street</label>
                  <h5><?= $bplo->get_street() ?></h5>
                </td>
                <td>
                  <label for="owners_address_street">Street</label>
                  <h5><?= $bplo->get_Ownerstreet() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_brgy">Barangay</label>
                  <h5><?= $bplo->get_barangay() ?></h5>
                </td>
                <td>
                  <label for="owners_address_brgy">Barangay</label>
                  <h5><?= $bplo->get_Ownerbarangay() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_subdivision">Subdivision</label>
                  <h5><?= $bplo->get_Subdivision() ?></h5>
                </td>
                <td>
                  <label for="owners_address_subdivision">Subdivision</label>
                  <h5><?= $bplo->get_Ownersubdivision() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_city_municipality">City/ Municipality</label>
                  <h5><?= $bplo->get_cityMunicipality() ?></h5>
                </td>
                <td>
                  <label for="owners_address_city_municipality">City/ Municipality</label>
                  <h5><?= $bplo->get_OwnercityMunicipality() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_province">Province</label>
                  <h5><?= $bplo->get_province() ?></h5>
                </td>
                <td>
                  <label for="owners_address_city_province">Province</label>
                  <h5><?= $bplo->get_Ownerprovince() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_tel_no">Tel No.</label>
                  <h5><?= $bplo->get_telNum() ?></h5>
                </td>
                <td>
                  <label for="owners_address_tel_no">Tel No.</label>
                  <h5><?= $bplo->get_OwnertelNum() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_email_address">Email Address</label>
                  <h5><?= $bplo->get_email() ?></h5>
                </td>
                <td>
                  <label for="owners_address_email_address">Email Address</label>
                  <h5><?= $bplo->get_OwnerEmail() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_property_index_no">Property Index Number (PIN)</label>
                  <h5><?= $bplo->get_PIN() ?></h5>
                </td>
                <td>
                  <label for="owners_address_business_area">Business Area (in sq. m.)</label>
                  <h5><?= $bplo->get_businessArea() ?></h5>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="business_address_no_of_employees_in_establishment">Total No. of Employees in Establishment</label>
                  <h5><?= $bplo->get_MaleEmployees() + $bplo->get_FemaleEmployees() + $bplo->get_PWDEmployees() ?></h5>
                </td>
                <td>
                  <label for="owners_address_no_of_employees_residing_in_lgu">No. of Employees Residing in LGU</label>
                  <h5><?= $bplo->get_LGUEmployees() ?></h5>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="lessors_name">Lessor's Name</label>
                  <h5><?= isset($bplo->lessors) ?
                    $bplo->get_lessors()->lastName.", ".
                    $bplo->get_lessors()->firstName." (".
                    $bplo->get_lessors()->middleName.")" : "NA" ?></h5>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="lessors_address">Lessor's Address</label>
                    <h5><?= isset($bplo->lessors) ?
                      $bplo->get_lessors()->address.", "
                      .$bplo->get_lessors()->subdivision.", "
                      .$bplo->get_lessors()->barangay.", "
                      .$bplo->get_lessors()->cityMunicipality.", "
                      .$bplo->get_lessors()->province : "NA" ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="lessor_monthly_rental">Monthly Rental</label>
                      <h5><?= isset($bplo->lessors) ? $bplo->get_lessors()->monthlyRental : "NA" ?></h5>
                    </td>
                    <td>
                      <label for="lessor_tel_cel_no">Tel No./ Cel.No.</label>
                      <h5><?= isset($bplo->lessors) ? $bplo->get_lessors()->telNum : "NA" ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="lessor_email_address">Email Address</label>
                      <h5><?= isset($bplo->lessors) ? $bplo->get_lessors()->email : "NA" ?></h5>
                    </td>
                    <td>
                      <label for="lessor_in_case_of_emergency">In case of emergency (Contact Person | Tel No./Cel No. | Email)</label>
                      <h5><?=
                        $bplo->get_emergencyContactPerson()." | ".
                        $bplo->get_emergencyTelNum()." | ".
                        $bplo->get_emergencyEmail() ?></h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td colspan="5" style="text-align:center">
                        <h4 class=text-center>Business Activities</h4>
                      </td>
                    </tr>
                    <tr>
                      <th rowspan="2" style="width: 30%">
                        <label for="business_activity_line_of_business">Line of Business</label>
                      </th>

                      <th rowspan="2" style="width: 20%">
                        <label for="business_activity_capitalization">Capitalization</label>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($bplo->get_businessActivities() as $activity): ?>
                      <tr>
                        <!-- <td><?= $activity->code ?></td> -->
                        <td><?= $activity->lineOfBusiness ?></td>
                        <!-- <td><?= $activity->numOfUnits ?></td> -->
                        <td><?= $activity->capitalization ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <?php if ($bplo->get_status() == "Completed" || $bplo->get_status() == "Active" || $bplo->get_status() == "On process"): ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td colspan="3">
                          <h4 class='text-center'>Verification of Documents</h4>
                        </td>
                      </tr>
                      <tr>
                        <th>Description</th>
                        <th>Office/Agency</th>
                        <th>Date Issued</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Barangay Clearance</td>
                        <td>Barangay</td>
                        <td><?= date('F j, o',strtotime($bplo->get_BrgyClearanceDateIssued())) ?></td>
                      </tr>
                      <tr>
                        <td>Zoning Clearance</td>
                        <td>City Planning and Development Office</td>
                        <td><?= isset($zoning[0]->createdAt) ? date('F j, o',strtotime($zoning[0]->createdAt)) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Sanitary Permit / Health Clearance</td>
                        <td>City Health Office</td>
                        <td><?= isset($sanitary[0]->createdAt) ? date('F j, o',strtotime($sanitary[0]->createdAt)) : '' ?></td>
                      </tr>
                      <tr>
                        <td>City Environmental Certificate</td>
                        <td>City Environment and Natural Resources Office</td>
                        <td><?= isset($cenro[0]->createdAt) ? date('F j, o',strtotime($cenro[0]->createdAt)) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Engineering Clearance</td>
                        <td>Office of the Building Official</td>
                        <td><?= isset($engineering[0]->createdAt) ? date('F j, o',strtotime($engineering[0]->createdAt)) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Valid Fire Safety Inspection Certificate</td>
                        <td>Bureau of Fire Protection</td>
                        <td><?= isset($bfp[0]->createdAt) ? date('F j, o',strtotime($bfp[0]->createdAt)) : '' ?></td>
                      </tr>
                    </tbody>
                  </table>
                <?php endif ?>
              </div>
              <div id="tab2" class="tab-pane">
                <h3 class='text-center'>Tax Order of Payment</h3>
                <div class="control-group">
                  <div class="row">
                    <div class="span2">
                      <label for=""><strong>Name of Business</strong></label>
                      <span><?= $bplo->get_BusinessName() ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Line of Business</strong></label>
                      <span><?= $bplo->get_LineOfBusiness() ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Status</strong></label>
                      <span><?= $bplo->get_applicationType() ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Bill No.</strong></label>
                      <span><?= $bplo->get_Assessment()->assessmentId ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Year</strong></label>
                      <span><?= date('Y', strtotime($bplo->get_Assessment()->createdAt)) ?></span>
                    </div>
                  </div>
                </div>
                <div class="control-group">
                  <div class="row">
                    <div class="span2">
                      <label for=""><strong>Owner/Taxpayer</strong></label>
                      <span><?= $bplo->get_FirstName()." ".strtoupper(substr($bplo->get_MiddleName(),0,1)).". ".$bplo->get_LastName() ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Business Address</strong></label>
                      <span><?= $bplo->get_barangay().", Biñan City, Laguna" ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Capital</strong></label>
                      <span><?= "PHP ".number_format($bplo->get_capital(), 2) ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Date Issued</strong></label>
                      <span><?= date('F j, o',strtotime($bplo->get_Assessment()->createdAt)) ?></span>
                    </div>
                    <div class="span2">
                      <label for=""><strong>Mode of Payment</strong></label>
                      <span><?= $bplo->get_modeOfPayment() ?></span>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <th>Year</th>
                    <th>Period</th>
                    <th>Particulars</th>
                    <th>Due</th>
                    <th>Surcharge</th>
                    <th>Interest</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    <?php 
                    $total = 0; 
                    $total_due = 0;
                    $total_surcharge = 0;
                    $total_interest = 0;
                    ?>
                    <?php foreach ($bplo->get_Charges() as $key => $charge): ?>
                      <tr>
                        <td><?= date('Y', strtotime($charge->createdAt)) ?></td>
                        <td><?= $charge->period ?></td>
                        <td><?= $charge->particulars ?></td>
                        <td><?= number_format($charge->due, 2) ?></td>
                        <td><?= number_format($charge->surcharge, 2) ?></td>
                        <td><?= number_format($charge->interest, 2) ?></td>
                        <td>
                          <?php 
                          $t = $charge->due + $charge->surcharge + $charge->interest;
                          echo number_format($t, 2);
                          $total += $t; 
                          $total_due += $charge->due;
                          $total_surcharge += $charge->surcharge;
                          $total_interest += $charge->interest;
                          ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <div class="row">
                  <div class="span1 offset5">
                    <label for="" class='pull-right'>Total:</label>
                  </div>
                  <div class="span1"><?= number_format($total_due, 2) ?></div>
                  <div class="span1"><?= number_format($total_surcharge, 2) ?></div>
                  <div class="span1" style="padding-left:50px"><?= number_format($total_interest, 2) ?></div>
                  <div class="span1" style="padding-left:20px"><?= number_format($bplo->get_totalAssessment(), 2) ?></div>
                </div>
                <div class="row">
                  <div class="span1 offset5">
                    <label for="" class="pull-right">Balance:</label>
                  </div>
                  <div class="span1"><?= number_format($bplo->get_Assessment()->amount, 2) ?></div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <th>Due Date</th>
                    <th>First Quarter (Jan 20)</th>
                    <th>Second Quarter (Apr 20)</th>
                    <th>Third Quarter (Jul 20)</th>
                    <th>Fourth Quarter (Oct 20)</th>
                  </thead>
                  <tbody>
                    <th>Amount Due</th>
                    <td><span class="pull-right"><?= isset($bplo->get_quarterPayment()[0]) ? number_format($bplo->get_quarterPayment()[0], 2) : '.00' ?></span></td>
                    <td><span class="pull-right"><?= isset($bplo->get_quarterPayment()[1]) ? number_format($bplo->get_quarterPayment()[1], 2) : '.00' ?></span></td>
                    <td><span class="pull-right"><?= isset($bplo->get_quarterPayment()[2]) ? number_format($bplo->get_quarterPayment()[2], 2) : '.00' ?></span></td>
                    <td><span class="pull-right"><?= isset($bplo->get_quarterPayment()[3]) ? number_format($bplo->get_quarterPayment()[3], 2) : '.00' ?></span></td>
                  </tbody>
                </table>
                <!-- <span>This Statement is valid until 1/30/<?= date('Y') ?></span><br>
                <span>Please disregard this statement if payment has been made. Thank you.</span> -->
              </div>
              <div id="tab3" class='tab-pane'>
                <div id="gmaps" style="width:100%; height:500px; background-color: gray"></div>
              </div>
            </div>
          </div>
          <!-- End Container Fluid -->
        </div>
      </div>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLMOtCdi62jLDT9JFcUh8vN3WYPakFMY8"
      async defer></script>
      <script>
        var map;
        var loaded = false;
        function initMap(){
          if(loaded == false)
          {
            loaded = true;
            latlang = new google.maps.LatLng(<?= $application->get_lat() ?>,<?= $application->get_lng() ?>);
            map = new google.maps.Map(document.getElementById('gmaps'), {
              center: latlang,
              zoom: 15

            });
            var marker = new google.maps.Marker({
              position: latlang,
            });

            marker.setMap(map);
          }
        }
      </script>
