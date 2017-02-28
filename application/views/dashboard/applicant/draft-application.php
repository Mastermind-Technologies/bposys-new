<body class="content-container">
	<!-- Page Content -->
	<div style="padding-top:45px;" id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">

					<?php if($this->session->flashdata('error')): ?>
						<div class="alert alert-danger"> <!--bootstrap error div-->
							<?=$this->session->flashdata('error')?>
						</div>
					<?php endif; ?>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3>Continue Draft Application</h3>
						</div>
						<div class="panel-body">
							<!-- action="<?php echo base_url() ?>dashboard/submit_application" -->
							<form id="new_application_form" method="post" data-parsley-validate="">
								<input type="hidden" name='ref' value='<?= $application->get_referenceNum() ?>'>
								<input type="hidden" name='aid' value='<?= $application->get_applicationId() ?>'>
								<div class="row">
									<div class="tab-content clearfix">
										<div class="tab-pane">
											<!-- filler -->
										</div>
										<div class="tab-pane active" id='step2'>
											<h2 class="text-center">Unified Application Form for Business Permit</h2>
											<h4 class="text-center"><strong>Tax Year <?= date('Y') ?></strong></h4>
											<h4 class="text-center"><strong>CITY OF BIÑAN</strong></h4>
											<input type="hidden" name="tax-year" id="tax-year" value="<?= date('Y') ?>">
											<!-- <hr> -->
											<div class="col-sm-12">
												<br>
												<h3 class='panel-header'>Basic Information</h3>
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label for="">Date of Application</label>
															<h5 style='margin-top:0'><strong><?= date('F j, Y') ?></strong></h5>
															<input type="hidden" id="application-date" name="application-date" value="<?= date('F j, Y') ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="mode-of-payment">Mode of Payment</label>
															<select name="mode-of-payment" required id="mode-of-payment" class='form-control'>
																<option selected disabled>Select mode of payment</option>
																<option <?= $application->get_ModeOfPayment()=='Anually' ? 'selected' : '' ?> value="Anually">Anually (Every year)</option>
																<option <?= $application->get_ModeOfPayment()=='Semi-Anually' ? 'selected' : '' ?> value="Semi-Anually">Semi-Anually (Every 6 months)</option>
																<option <?= $application->get_ModeOfPayment()=='Quarterly' ? 'selected' : '' ?> value="Quarterly">Quarterly (Every 3 months)</option>
															</select>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="id-presented">ID Presented</label>
															<input type="text" name="id-presented" required="" id="id-presented" class="form-control" placeholder='i.e.: Student ID - 123456789' value="<?= $application->get_IdPresented() ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label for="DTISECCDA_RegNum">DTI/SEC/CDA Registration Number*</label>
															<input type="text" required name="DTISECCDA_RegNum" data-parsley-type="digits" class="form-control" value='<?= $application->get_DTISECCDARegNum() ?>'>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="DTISECCDA_Date">DTI/SEC/CDA Date of Registration*</label>
															<div class="input-group">
																<input required type="text" name="DTISECCDA_Date" id="DTISECCDA_Date" class="form-control" value='<?= $application->get_DTISECCDADate() ?>'>  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="brgy-clearance-date-issued">Barangay Clearance Date Issued</label>
															<div class="input-group">
																<input type="text" required="" name="brgy-clearance-date-issued" class="form-control date-field" value="<?= $application->get_BrgyClearanceDateIssued() ?>"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>	
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label for="ctc-number">CTC Number*</label>
															<input required type="text" name="ctc-number" data-parsley-type="digits" class="form-control" value="<?= $application->get_CTCNum() ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="tin">TIN*</label>
															<input required type="text" name="tin" class="form-control" value="<?= $application->get_TIN() ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="occupancy-permit-number">Occupany Permit Number</label>
															<input type="text" required="" name="occupancy-permit-number" class="form-control" value="<?= $bfp->get_OccupancyPermitNum() ?>">
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<input type="checkbox" id="tax-incentive" name="tax-incentive" data-toggle="tooltip" <?= $application->get_entityName()!='NA' ? 'checked' : '' ?> title="Please specify entity below">
															<label for="tax-incentive">Are you enjoying tax incentive from any Government Entity?</label>
														</div>

													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label for="entity">Specify Entity*</label>
															<input type="text" value="<?= $application->get_entityName()!='NA' ? $application->get_entityName() : '' ?>" <?= $application->get_entityName()!='NA' ? '' : 'disabled' ?> id="entity" name="entity" class="form-control">
														</div>
													</div>
												</div>
												<hr>
												<div class="col-sm-3 pull-left">
													<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
												</div>
												<div class="col-sm-4 pull-right form-navigation">
													<a data-toggle='tab' class='btn btn-success next pull-right'>Next 1/6</a>
													<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
														Save as Draft</button>
													</div>
												</div>
											</div>
											<div class="tab-pane" id='step3'>
												<h2 class="panel-header">Applying Business</h2>
												<?php if (isset($business)): ?>
													<div class="col-sm-12">
														<div class="row">
															<div class="col-sm-3">
																<div class="form-group">
																	<label for="business">Select Business Profile</label>
																	<select name="business" required id="business" class="form-control">
																		<option disabled>Select Business</option>
																		<?php foreach ($businesses as $b): ?>
																			<option <?= $this->encryption->decrypt($business->get_businessId())==$b->businessId ? 'selected' : '' ?> value="<?= $this->encryption->encrypt($b->businessId) ?>"><?= $b->businessName ?></option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-3">
																<label>Tax Payer Name</label>
																<br>
																<span id="tax-payer-name"><?= $business->get_FirstName()." ".$business->get_lastName() ?></span>
															</div>
															<div class="col-sm-5">
																<label>Name of President/Treasurer of Corporation</label>
																<br>
																<span id='president-treasurer-name'><?= $business->get_presidentTreasurerName() ?></span>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>Employee Details</h4>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Pollution Control Officer</label>
																	<br>
																	<span id="pollution-control-officer"><?= $business->get_pollutionControlOfficer() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Number of Male Employees</label>
																	<br>
																	<span id="male-employees"><?= $business->get_maleEmployees() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Number of Female Employees</label>
																	<br>
																	<span id="female-employees"><?= $business->get_femaleEmployees() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Number of PWD Employees</label>
																	<br>
																	<span id="pwd-employees"><?= $business->get_PWDEmployees() ?></span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Number of Employees Residing in LGU</label>
																	<br>
																	<span id="lgu-employees"><?= $business->get_LGUEmployees() ?></span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="">Annual Physical Exams for Employees</label>
																	<div class="radio">
																		<label><input type="radio" <?= $sanitary->get_annualEmployeePhysicalExam()=='1' ? 'checked' : '' ?> name="annual-exams" value="Yes">Yes</label>
																		<label><input type="radio" <?= $sanitary->get_annualEmployeePhysicalExam()=='0' ? 'checked' : '' ?> name="annual-exams" value="No">No</label>
																	</div>
																</div>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>Business Details</h4>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Company Name</label>
																	<br>
																	<span id="company-name"><?= $business->get_CompanyName() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Business Name</label>
																	<br>
																	<span id="business-name"><?= $business->get_businessName() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Trade Name/Franchise</label>
																	<br>
																	<span id='trade-name'><?= $business->get_tradeName() ?></span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Signage Name</label>
																	<br>
																	<span id='signage-name'><?= $business->get_SignageName() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Organization Type</label>
																	<br>
																	<span id='organization-type'><?= $business->get_OrganizationType() ?></span>
																</div>

															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Corporation Name <small>(if corporation)</small></label>
																	<br>
																	<span id='corporation-name'><?= $business->get_CorporationName() ?></span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Date of Operation</label>
																	<br>
																	<span id='date-of-operation-text'><?= $business->get_DateOfOperation() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label>Description of Business</label>
																	<br>
																	<span id='business-desc'><?= $business->get_BusinessDesc() ?></span>
																</div>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>Business Address</h4>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-3">
																<div class="form-group">
																	<label>House No./Bldg No.</label>
																	<br>
																	<span id='house-bldg-no'><?= $business->get_houseBldgNum() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Building Name</label>
																	<br>
																	<span id='bldg-name'><?= $business->get_bldgName() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Unit Number</label>
																	<br>
																	<span id='unit-num'><?= $business->get_unitNum() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Street</label>
																	<br>
																	<span id='street'><?= $business->get_street() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Barangay</label>
																	<br>
																	<span id='barangay'><?= $business->get_barangay() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Subdivision</label>
																	<br>
																	<span id='subdivision'><?= $business->get_subdivision() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>City/Municipality</label>
																	<br>
																	<span id='city-municipality'><?= $business->get_cityMunicipality() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Province</label>
																	<br>
																	<span id='province'><?= $business->get_province() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label>Business Area (in sq. m.)</label>
																	<br>
																	<span id='business-area'><?= $business->get_businessArea() ?></span>
																</div>
															</div>
															<div class="col-sm-3">
																<label>Zip/Postal Code (PIN)</label>
																<br>
																<span id='pin'><?= $business->get_PIN() ?></span>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>Building Details</h4>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="storeys">No. of Storeys</label>
																	<input type="text" class='form-control' value='<?= $bfp->get_storeys() ?>' name='storeys' required>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="portion-occupied">Portion Occupied</label>
																	<input type="text" name="portion-occupied" value='<?= $bfp->get_occupiedPortion() ?>' required class="form-control">
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="area-per-floor">Area per Floor (in sq. m.)</label>
																	<input type="text" name="area-per-floor" value='<?= $bfp->get_AreaPerFloor() ?>' data-parsley-type='digits' class="form-control" required>
																</div>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>Contact Details</h4>
															</div>

															<div class="col-sm-4">
																<label>Telephone Number</label>
																<br>
																<span id='tel-num'><?= $business->get_telNum() ?></span>
															</div>
															<div class="col-sm-4">
																<label>Email Address</label>
																<br>
																<span id='email'><?= $business->get_email() ?></span>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-sm-12">
																<h4>In case of emergency</h4>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="contact-name">Contact Person Name</label>
																	<br>
																	<span id="emergency-contact-name"><?= $business->get_emergencyContactPerson() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="emergency-tel-cel-no">Tel No./Cel No.</label>
																	<br>
																	<span id="emergency-tel-cel-no"><?= $business->get_emergencyTelNum() ?></span>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label for="emergency-email">Email Address</label>
																	<br>
																	<span id="emergency-email"><?= $business->get_emergencyEmail() ?></span>
																</div>
															</div>
														</div>
													<?php else: ?>
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-3">
																	<div class="form-group">
																		<label for="business">Select Business Profile</label>
																		<select name="business" required id="business" class="form-control">
																			<option disabled selected>Select Business</option>
																			<?php foreach ($businesses as $b): ?>
																				<option value="<?= $this->encryption->encrypt($b->businessId) ?>"><?= $b->businessName ?></option>
																			<?php endforeach ?>
																		</select>
																	</div>
																</div>
<!-- <div class="col-sm-3">
<div class="form-group">
<label>Capital Invested</label>
<input type="text" name="capital-invested" required data-parsley-type="digits" id="capital-invested" class="form-control">
</div>
</div> -->
</div>
<div class="row">
	<div class="col-sm-3">
		<label>Tax Payer Name</label>
		<br>
		<span id="tax-payer-name">N/A</span>
	</div>
	<div class="col-sm-5">
		<label>Name of President/Treasurer of Corporation</label>
		<br>
		<span id='president-treasurer-name'>N/A</span>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>Employee Details</h4>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Pollution Control Officer</label>
			<br>
			<span id="pollution-control-officer">N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Number of Male Employees</label>
			<br>
			<span id="male-employees">N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Number of Female Employees</label>
			<br>
			<span id="female-employees">N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Number of PWD Employees</label>
			<br>
			<span id="pwd-employees">N/A</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Number of Employees Residing in LGU</label>
			<br>
			<span id="lgu-employees">N/A</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label for="">Annual Physical Exams for Employees</label>
			<div class="radio">
				<label><input type="radio" checked name="annual-exams" value="Yes">Yes</label>
				<label><input type="radio" name="annual-exams" value="No">No</label>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>Business Details</h4>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Company Name</label>
			<br>
			<span id="company-name">N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Business Name</label>
			<br>
			<span id="business-name">N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Trade Name/Franchise</label>
			<br>
			<span id='trade-name'>N/A</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Signage Name</label>
			<br>
			<span id='signage-name'>N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Organization Type</label>
			<br>
			<span id='organization-type'>N/A</span>
		</div>

	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Corporation Name <small>(if corporation)</small></label>
			<br>
			<span id='corporation-name'>N/A</span>
		</div>
	</div>
<!-- 										<div class="col-sm-4">
<div class="form-group">
<label>Nature of Business</label>
<br>
<span id='nature-of-business'>N/A</span>
</div>
</div> -->
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Date of Operation</label>
			<br>
			<span id='date-of-operation-text'>N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Description of Business</label>
			<br>
			<span id='business-desc'>N/A</span>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>Business Address</h4>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label>House No./Bldg No.</label>
			<br>
			<span id='house-bldg-no'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Building Name</label>
			<br>
			<span id='bldg-name'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Unit Number</label>
			<br>
			<span id='unit-num'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Street</label>
			<br>
			<span id='street'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Barangay</label>
			<br>
			<span id='barangay'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Subdivision</label>
			<br>
			<span id='subdivision'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>City/Municipality</label>
			<br>
			<span id='city-municipality'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Province</label>
			<br>
			<span id='province'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label>Business Area (in sq. m.)</label>
			<br>
			<span id='business-area'>N/A</span>
		</div>
	</div>
	<div class="col-sm-3">
		<label>Zip/Postal Code (PIN)</label>
		<br>
		<span id='pin'>N/A</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label for="">Map Location (Click to replace marker)</label>
			<br>
			<span><strong>Google Maps Address: </strong> <span id='gmaps-address'>NA</span></span>
			<div id="gmaps" style="height:400px; width:100%; background-color: gray"></div>
		</div>

	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>Building Details</h4>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label for="storeys">No. of Storeys</label>
			<input type="text" class='form-control' name='storeys' required>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="portion-occupied">Portion Occupied</label>
			<input type="text" name="portion-occupied" class="form-control" required>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="area-per-floor">Area per Floor (in sq. m.)</label>
			<input type="text" name="area-per-floor" data-parsley-type='digits' class="form-control" required>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>Contact Details</h4>
	</div>

	<div class="col-sm-4">
		<label>Telephone Number</label>
		<br>
		<span id='tel-num'>N/A</span>
	</div>
	<div class="col-sm-4">
		<label>Email Address</label>
		<br>
		<span id='email'>N/A</span>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<h4>In case of emergency</h4>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			<label for="contact-name">Contact Person Name</label>
			<br>
			<span id="emergency-contact-name">N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="emergency-tel-cel-no">Tel No./Cel No.</label>
			<br>
			<span id="emergency-tel-cel-no">N/A</span>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="emergency-email">Email Address</label>
			<br>
			<span id="emergency-email">N/A</span>
		</div>
	</div>
</div>
<?php endif ?>

<hr>
<div class="col-sm-3 pull-left">
	<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
</div>
<div class="col-sm-4 pull-right form-navigation">
	<a data-toggle='tab' class='btn btn-success next pull-right'>Next 2/6</a>
	<a data-toggle='tab' class='btn btn-success previous pull-right' style='margin-right:10px;'>Back</a>
	<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
		Save as Draft</button>
	</div>
</div>

</div>
<div class="tab-pane" id='step4'>
	<h2 class="panel-header">Lessor Details (if rented)</h2>
	<div class="col-sm-12 lessor-controls">
		<div class="row">
			<div class="col-sm-12">
				<input type="checkbox" name='rented' <?= $application->get_lessors()!=null ? 'checked' : '' ?> id='rented' data-toggle="tooltip" title="Please identify lessor's information below if yes">
				<label for="rented">Is the business place rented?</label>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-first-name">First Name*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name='lessor-first-name' value="<?= $application->get_lessors()!=null ? $application->get_lessors()->firstName : '' ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-middle-name">Middle Name*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name='lessor-middle-name' value="<?= $application->get_lessors()!=null ? $application->get_lessors()->middleName : '' ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-last-name">Last Name*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name='lessor-last-name' value="<?= $application->get_lessors()!=null ? $application->get_lessors()->lastName : '' ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-address">Lessor's Address*</label>
					<textarea name="lessor-address" id="lessor-address" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> rows="1" class='form-control' placeholder="House No./Bldg.No/Street"><?= $application->get_lessors()!=null ? $application->get_lessors()->address : '' ?></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-subdivision">Subdivision*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name="lessor-subdivision" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->subdivision : '' ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-barangay">Barangay*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name="lessor-barangay" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->barangay : '' ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-city-municipality">City/Municipality*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name="lessor-city-municipality" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->cityMunicipality : '' ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-province">Province*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name="lessor-province" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->province : '' ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-monthly-rental">Monthly Rental*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" data-parsley-type="digits" name="lessor-monthly-rental" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->monthlyRental : '' ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-tel-cel-no">Tel No./Cel No.*</label>
					<input type="text" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" data-parsley-type="digits" name="lessor-tel-cel-no" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->telNum : '' ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Email Address*</label>
					<input type="email" <?= $application->get_lessors()!=null ? 'required' : 'disabled' ?> class="form-control" name="lessor-email" value="<?= $application->get_lessors()!=null ? $application->get_lessors()->email : '' ?>">
				</div>
			</div>
		</div>
		<hr>
		<div class="col-sm-3 pull-left">
			<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
		</div>
		<div class="col-sm-4 pull-right form-navigation">
			<a data-toggle='tab' class='btn btn-success next pull-right'>Next 3/6</a>
			<a data-toggle='tab' class='btn btn-success previous pull-right' style='margin-right:10px;'>Back</a>
			<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
				Save as Draft</button>
			</div>
		</div>

	</div>
	<div class="tab-pane" id='step5'>
		<h2 class="panel-header">Issued Certificates/Permits</h2>
		<div class="col-sm-12">
			<small>Click the checkbox if specific permit is issued.</small>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_cnc()!='NA' ? 'checked' : '' ?> id="cnc" name="cnc"><strong>Environmental Compliance Certificate/CNC</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_LLDAClearance()!='NA' ? 'checked' : '' ?> id="llda" name="llda"><strong>LLDA Clearance / Certificate of Exemption</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="cnc-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="cnc-date-issued" <?= $cenro->get_cnc()!='NA' ? 'required '.'value='.$cenro->get_cnc() : 'disabled' ?> id="cnc-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-2">
						<label for="llda-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="llda-date-issued" <?= $cenro->get_LLDAClearance()!='NA' ? 'required '.'value='.$cenro->get_LLDAClearance() : 'disabled' ?> id="llda-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_dischargepermit()!='NA' ? 'checked' : '' ?> id="discharge-permit" name="discharge-permit"><strong>Discharge Permit</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_apsci()!='NA' ? 'checked' : '' ?> id="apsci" name="apsci"><strong>Permit to Operate/APSCI</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="discharge-permit-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="discharge-permit-date-issued" <?= $cenro->get_dischargepermit()!='NA' ? 'required '.'value='.$cenro->get_dischargepermit() : 'disabled' ?> id="discharge-permit-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-2">
						<label for="apsci-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="apsci-date-issued" <?= $cenro->get_apsci()!='NA' ? 'required '.'value='.$cenro->get_apsci() : 'disabled' ?> id="apsci-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="products-by-products">Products and By-Products</label>
						<input type="text" value='<?= $cenro->get_ProductsAndByProducts() ?>' id="products-by-products" name="products-by-products" class="form-control">
					</div>
				</div>
			</div>
			<hr>
			<div class="col-sm-3 pull-left">
				<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
			</div>
			<div class="col-sm-4 pull-right form-navigation">
				<a data-toggle='tab' class='btn btn-success next pull-right'>Next 4/6</a>
				<a data-toggle='tab' class='btn btn-success previous pull-right' style='margin-right:10px;'>Back</a>
				<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
					Save as Draft</button>
				</div>
			</div>

		</div>
		<div class="tab-pane" id='step6'>
			<h2 class="panel-header">Environmental Details</h2>
			<div class="col-sm-12">
				<h4>Air Pollutants</h4>
				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_SmokeEmission()==1 ? 'checked' : '' ?> name="smoke-emission" id="smoke-emission"><strong>Smoke/Emission</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_VolatileCompound()==1 ? 'checked' : '' ?> name="volatile-compound" id="volatile-compound"><strong>Volatile Compound</strong></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<span>Fugitive Particulates:</span>
						<div class="checkbox">
							<label><input type="checkbox" <?= in_array('Dust', $cenro->get_FugitiveParticulates()) ? 'checked' : '' ?> name="fugitive-particulates[]" value="Dust"><strong>Dust</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" <?= in_array('Mist', $cenro->get_FugitiveParticulates()) ? 'checked' : '' ?> name="fugitive-particulates[]" value="Mist"><strong>Mist</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" <?= in_array('Gas', $cenro->get_FugitiveParticulates()) ? 'checked' : '' ?> name="fugitive-particulates[]" value="Gas"><strong>Gas</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<span>Steam Generator:</span>
						<div class="checkbox">
							<label><input type="checkbox" <?= in_array('Boiler', $cenro->get_SteamGenerator()) ? 'checked' : '' ?> name="steam-generators[]" value="Boiler"><strong>Boiler</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" <?= in_array('Furnace', $cenro->get_SteamGenerator()) ? 'checked' : '' ?> name="steam-generators[]" value="Furnace"><strong>Furnace</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="steam-generators[]" id="steam-generator-others" value="" ><strong>Others</strong></label>
							<input type="text" name="steam-generator-specify" id="steam-generator-specify" disabled placeholder="Please specify...">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<label for="air-pollution-control-devices">Air Pollution Control Devices Being Used</label>
						<input type="text" value="<?= $cenro->get_APCD() ?>" required id="air-pollution-control-devices" name="air-pollution-control-devices" class="form-control">
					</div>
					<div class="col-sm-4">
						<label for="stack-height">Stack Height</label>
						<input type="text" required value="<?= $cenro->get_StackHeight() ?>" name="stack-height" id="stack-height" class="form-control">
					</div>
				</div>
				<!-- END AIR POLLUTION -->
				<hr>
				<h4>Wastewater</h4>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group well well-sm">
							<span><strong class="text-warning">Note: When visiting CENRO, furnish copy of latest wastewater laboratory test results</strong></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4 ">
						<label for="wastewater-treatment-facility">Wastewater Treatment Facility</label>
						<input required type="text" value="<?= $cenro->get_wastewaterTreatmentFacility() ?>" name="wastewater-treatment-facility" id="wastewater-treatment-facility" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_wastewaterTreatmentOperationAndProcess()==1 ? 'checked' : '' ?> name="wastewater-treatment-operation" id="wastewater-treatment-operation"><strong>Wastewater Treatment Operation and Process</strong></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_pendingCaseWithLLDA()!="NA" ? 'checked' : '' ?> name="pending-llda-case" id="pending-llda-case"><strong>Pending Case with LLDA?</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="case-no">Case No.</label>
						<input type="text" name="llda-case-no" <?= $cenro->get_pendingCaseWithLLDA()!="NA" ? 'required '.'value='.$cenro->get_pendingCaseWithLLDA() : 'disabled' ?> data-parsley-type="digits" id="llda-case-no" class="form-control">
					</div>
				</div>
				<!-- END OF WASTEWATER -->
				<hr>
				<h4>Solid Wastes</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="type-of-solid-wastes">Type of Solid Wastes Generated</label>
							<input required type="text" value="<?= $cenro->get_typeOfSolidWastesGenerated() ?>" id="type-of-solid-wastes" name="type-of-solid-wastes" class="form-control">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="qty-per-day">Quantity per day</label>
							<input required type="text" value="<?= $cenro->get_qtyperday() ?>" id="qty-per-day" data-parsley-type='digits' name="qty-per-day" class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="method-of-garbage-collection">Method of Garbage Collection</label>
							<input required type="text" value="<?= $cenro->get_garbageCollectionMethod() ?>" id="method-of-garbage-collection" name="method-of-garbage-collection" class="form-control">
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group" id="garbage-radio">
							<span>Frequency of Garbage Collection:</span>
							<div class="radio-inline">
								<label><input type="radio" <?= $cenro->get_frequencyOfGarbageCollection()=='Daily' ? 'checked' : '' ?> name="garbage-collection-frequency" id="garbage-collection-frequency" value="Daily"><strong>Daily</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" <?= $cenro->get_frequencyOfGarbageCollection()=='Weekly' ? 'checked' : '' ?> name="garbage-collection-frequency" value="Weekly" id="garbage-collection-frequency"><strong>Weekly</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" <?= $cenro->get_frequencyOfGarbageCollection()!='Daily'&&$cenro->get_frequencyOfGarbageCollection()!='Weekly' ? 'checked' : '' ?> name="garbage-collection-frequency" id="garbage-collection-others" value=""><strong>Others</strong></label>
								<input type="text" <?= $cenro->get_frequencyOfGarbageCollection()!='Daily'&&$cenro->get_frequencyOfGarbageCollection()!='Weekly' ? 'required '.'value='.$cenro->get_frequencyOfGarbageCollection() : 'disabled' ?> name="garbage-collection-specify" id="garbage-collection-specify" placeholder="Please specify...">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="collector">Person / Company Collecting Solid Wastes</label>
							<input required type="text" value="<?= $cenro->get_wasteCollector() ?>" id="collector" name="collector" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="collector-address">Collector's Address</label>
							<textarea required name="collector-address" id="collector-address" class="form-control"><?= $cenro->get_collectorAddress() ?></textarea>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<span>Method of Garbage Disposal:</span>
							<div class="radio-inline">
								<label><input type="radio" <?= $cenro->get_GarbageDisposalMethod()=='Sanitary Landfill' ? 'checked' : '' ?> name="garbage-disposal-method" value="Sanitary Landfill"><strong>Sanitary Landfill</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" <?= $cenro->get_GarbageDisposalMethod()=='Controlled Dumpsite' ? 'checked' : '' ?> name="garbage-disposal-method" value="Controlled Dumpsite"><strong>Controlled Dumpsite</strong></label>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<span>Method of Waste Minimization (if any):</span>
							<div class="checkbox-inline">
								<label><input type="checkbox" <?= in_array('Recycling', $cenro->get_wasteMinimizationMethod()) ? 'checked' : '' ?> name="waste-minimization[]" value="Recycling"><strong>Recycling</strong></label>
							</div>
							<div class="checkbox-inline">
								<label><input type="checkbox" <?= in_array('Reduction', $cenro->get_wasteMinimizationMethod()) ? 'checked' : '' ?> name="waste-minimization[]" value="Reduction"><strong>Reduction</strong></label>
							</div>
							<div class="checkbox-inline">
								<label><input type="checkbox" <?= in_array('Reuse', $cenro->get_wasteMinimizationMethod()) ? 'checked' : '' ?> name="waste-minimization[]" value="Reuse"><strong>Reuse</strong></label>
							</div>
						</div>
					</div>
				</div>
				<!-- END OF SOLID WASTES -->
				<hr>
				<h4>Drainage</h4>
				<small>Check if available</small>
				<div class="row">
					<div class="col-sm-4">
						<div class="checkbox">
							<label><input type="checkbox" <?= $cenro->get_drainageSystem()==1 ? 'checked' : '' ?> name="drainage-system" id="drainage-system"><strong>Drainage System</strong></input></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label for="">Type:</label>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<div class="radio-inline">
								<label><input type="radio" 
									<?php 
									if($cenro->get_drainageType() == 'Close/Underground')
									{
										echo 'checked';
									} 
									else if($cenro->get_drainageType() == 'NA')
									{
										echo 'disabled';
									}
									else
									{
										echo '';
									}
									?> id="drainage-system-type1" name="drainage-system-type" value="Close/Underground"><strong>Closed/Underground</strong></input></label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="radio-inline">
									<label><input type="radio" <?php 
										if($cenro->get_drainageType() == 'Open Canal')
										{
											echo 'checked';
										} 
										else if($cenro->get_drainageType() == 'NA')
										{
											echo 'disabled';
										}
										else
										{
											echo '';
										}
										?> id="drainage-system-type2" name="drainage-system-type" value="Open Canal"><strong class="testing">Open Canal</strong></input></label>
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-sm-12">
									<label for="">Where Discharged:</label>
								</div>
								<div class="col-sm-3 col-sm-offset-1">
									<div class="radio-inline">
										<label><input type="radio" 
											<?php 
											if($cenro->get_DrainageDischargeLocation() == 'Public Drainage System')
											{
												echo 'checked';
											} 
											else if($cenro->get_DrainageDischargeLocation() == 'NA')
											{
												echo 'disabled';
											}
											else
											{
												echo '';
											}
											?>
											name="drainage-where-discharged" id="drainage-where-discharged1" value="Public Drainage System"><strong>Public Drainage System</strong></input></label>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="radio-inline">
											<label><input type="radio" 
												<?php 
												if($cenro->get_DrainageDischargeLocation() == 'Nature Outfall/Waterbody')
												{
													echo 'checked';
												} 
												else if($cenro->get_DrainageDischargeLocation() == 'NA')
												{
													echo 'disabled';
												}
												else
												{
													echo '';
												}
												?>
												name="drainage-where-discharged" id="drainage-where-discharged2" value="Nature Outfall/Waterbody"><strong>Nature Outfall/Waterbody</strong></input></label>
											</div>
										</div>
									</div>
								</div>
								<!-- END OF DRAINAGE -->
								<hr>
								<h4>Sewerage</h4>
								<small>Check if available</small>
								<div class="row">
									<div class="col-sm-4">
										<div class="checkbox">
											<label><input type="checkbox" <?= $cenro->get_sewerageSystem()==1 ? 'checked' : '' ?> name="sewerage-system" id="sewerage-system"><strong>Sewerage System</strong></input></label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="checkbox">
											<label><input type="checkbox" <?php $cenro->get_septicTank()==1 ? 'checked' : '' ?> id="septic-tank" name="septic-tank"><strong>Septic Tank</strong></input></label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label for="">Where Discharged:</label></div>
										<div class="col-sm-3 col-sm-offset-1">
											<div class="radio-inline">
												<label><input type="radio"
													<?php 
													if($cenro->get_SewerageDischargeLocation() == 'Public Drainage System')
													{
														echo 'checked';
													} 
													else if($cenro->get_SewerageDischargeLocation() == 'NA')
													{
														echo 'disabled';
													}
													else
													{
														echo '';
													}
													?>
													name="sewerage-where-discharged" id="sewerage-where-discharged1" value="Public Drainage System"><strong>Public Drainage System</strong></input></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="radio-inline">
													<label>
														<input type="radio"
														<?php 
														if($cenro->get_SewerageDischargeLocation() == 'Treatment in Septic Tank')
														{
															echo 'checked';
														} 
														else if($cenro->get_SewerageDischargeLocation() == 'NA')
														{
															echo 'disabled';
														}
														else
														{
															echo '';
														}
														?>
														name="sewerage-where-discharged" id="sewerage-where-discharged2" value="Treatment in Septic Tank"><strong>Treatment in Septic Tank</strong></input></label>
													</div>
												</div>
											</div>
											<!-- END OF SEWERAGE -->
											<hr>
											<h4>Water Supply/Source</h4>
											<div class="row">
												<div class="col-sm-3">
													<div class="radio">
														<label><input type="radio" checked name="water-supply" <?= $cenro->get_waterSupply()=='Deep Well' ? 'checked' : '' ?> value="Deep Well"><strong>Deep Well</strong></input></label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="radio">
														<label><input type="radio" name="water-supply" <?= $cenro->get_waterSupply()=='Water Utility' ? 'checked' : '' ?> value="Water Utility"><strong>Local Water Utility</strong></input></label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="radio">
														<label><input type="radio" name="water-supply" <?= $cenro->get_waterSupply()=='Surface Water' ? 'checked' : '' ?> value="Surface Water"><strong>Surface Water</strong></input></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="water-supply-type">Type of Water Supply/Source</label>
														<input type="text" name="water-supply-type" required value="<?= $sanitary->get_TypeLevelOfWaterSource() ?>" id="water-supply-type" class="form-control">
													</div>
												</div>
											</div>
											<!-- END OF WATER SUPPLY/SOURCE -->
											<hr>
											<h4>Hazardous Waste Treater/Transporter</h4>
											<div class="row">
												???
											</div>
											<hr>
											<div class="col-sm-3 pull-left">
												<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
											</div>
											<div class="col-sm-4 pull-right form-navigation">
												<a data-toggle='tab' class='btn btn-success next pull-right'>Next 5/6</a>
												<a data-toggle='tab' class='btn btn-success previous pull-right' style='margin-right:10px;'>Back</a>
												<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
													Save as Draft</button>
												</div>
											</div>

										</div>
										<div class="tab-pane" id='step7'>
											<h2 class="panel-header">Business Activities</h2>
											<div class="col-sm-10 col-sm-offset-1 well well-lg">
												<h3><strong>Information on Line of Businesses</strong></h3>
												<br>
												<br>
												<?php foreach ($line_of_business as $key => $line): ?>
													<?= ($key+1).".) <strong>".$line->name."</strong> - ".$line->description."<br><br>" ?>
												<?php endforeach ?>
												<!-- 1.) <strong>Manufacturer Kind</strong> - Manufacturers, assemblers, repackers, processors, brewers, distillers, rectifiers and compounders, or whatever kind or nature.
												<br>
												<br>
												2.) <strong>Wholesaler Kind</strong> - Wholesalers, distributors, or dealers or whatever kind or nature.
												<br>
												<br>
												3.) <strong>Exporter Kind</strong> - Exporters, and/or manufacturers, millers, producers, wholesalers, distributors, dealers or retailers of essential commodities, and millers of commodities other than rice and corn, operators of coffee or meat grinders or coconut grater.
												<br>
												<br>
												4.) <strong>Retailer</strong> - Retailers of all other commodities not classified as essential.
												<br>
												<br>
												5.) <strong>Contractors</strong> - Contractors and other independent contractors, Restaurants, cafes, cafeterias, carinderias, eateries, food caterers, ice cream and refreshment parlors, soda fountains, Amusement places and other establishments whose activity consists essentially of sales of services for a fee.
												<br>
												<br>
												6.) <strong>Banks</strong> - Banks and other financial institutions.
												<br>
												<br>
												7.) <strong>Lessor (Rentals)</strong> - Lessors of real estate including apartments for rent, boarding houses, Privately owned public markets, subdivision operators, or real estate developers, private cemeteries or memorial parks.
												<br>
												<br>
												8.) <strong>Peddlers</strong>
												<br>
												<br>
												9.) <strong>Amusement devices/places</strong> - Proprietors of amusement devices/places for a fee.
												<br>
												<br>
												10.) <strong>Retail Dealers (liquors)</strong> - Retailers in liquors or wines whether imported from other countries or locally manufactured including fermented liquors (beers), tuba, basi and other distilled spirits.
												<br>
												<br>
												11.) <strong>Retail Dealers (tobaccos)</strong> - Retail dealers or retailers of manufactured tobacco or snuff including cigars and cigarettes.
												<br>
												<br>
												12.) <strong>Display areas of products</strong> - Offices used as display areas of the products or where no stocks or items are stored for sale but receives orders for the products; and warehouses being utilized as storage of products and which does not accept orders or issue sales invoice.
												<br>
												<br>
												13.) <strong>Others</strong> - Other businesses, trades or commercial undertakings not herein expressly specified. -->
											</div>
											<div class="col-sm-8 col-sm-offset-2">
												<table id='bus-activity' class="table table-bordered">
													<th>Line of Business</th>
													<th>Capitalization</th>
													<!-- <th>Action</th> -->
													<!-- <th></th> -->
													<tbody class="table-body">
														<tr class="data">
															<!-- <td><input id="line-of-business" name="line-of-business" type="text" required class=form-control></td> -->
															<td><select name='line-of-business' id='line-of-business' data-type='testing' required class="form-control line-of-business">
																<option selected disabled data-type="testing">Select Line of Business</option>
																<?php foreach ($line_of_business as $key => $line): ?>
																	<option value="<?= $this->encryption->encrypt($line->name) ?>" data-type="<?= $line->type ?>"><?= $line->name ?></option>
																<?php endforeach ?>
																	<!-- <option value='Manufacturer Kind'>Manufacturer Kind</option>
																	<option value='Wholesaler kind'>Wholesaler kind</option>
																	<option value='Exporter kind'>Exporter kind</option>
																	<option value='Retailer'>Retailer</option>
																	<option value='Contractor'>Contractor</option>
																	<option value='Bank'>Bank</option>
																	<option value='Lessor (Renting)'>Lessor (Rentals)</option>
																	<option value='Peddlers'>Peddlers</option>
																	<option value='Amusement devices/places'>Amusement devices/places</option>
																	<option value='Retail Dealers (liquors)'>Retail Dealers (liquors)</option>
																	<option value='Retail Dealers (tobaccos)'>Retail Dealers (tobaccos)</option>
																	<option value='Display areas of products'>Display areas of products</option>
																	<option value='Others'>Others</option> -->
																</select></td>
																<td><input id='capitalization' name="capitalization" type="text" required data-parsley-type='digits' class=form-control></td>
																<!-- <td align='center'>
																	<button type='button' data-toggle="modal" disabled class="btn btn-primary btn-misc">Edit Misc</button>
																</td> -->
																<!-- <td><button type="button" id="btn-delete" class="btn btn-danger btn-block">Delete</button></td> -->
															</tr>
														</tbody>
													</table>
												</div>


												<div class="row">
													<div class="col-sm-4 col-sm-offset-4">
														<a id="btn-add-bus-activity" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Add Row</a>
													</div>
												</div>
												<hr>
												<div class="col-sm-3 pull-left">
													<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
												</div>
												<div class="col-sm-5 pull-right form-navigation">
													<button type="submit" id="btn-submit" class="btn btn-success pull-right"><i id="fa-submit" class="fa fa-check" aria-hidden="true"></i> Submit Application</button>
													<a data-toggle='tab' class='btn btn-success previous pull-right' style="margin-right:10px">Back</a>
													<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
														Save as Draft</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<!-- /.panel-body -->
							</div>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLMOtCdi62jLDT9JFcUh8vN3WYPakFMY8" async defer></script>

			<!-- Modal -->
			<!-- <div id="modal-amusement" class="modal fade" role="dialog">
				<div class="modal-dialog"> -->
					<!-- Modal content-->
					<!-- <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Amusement Devices</h4>
						</div>
						<div class="form-inline">
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<label>Label 1</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<label for="">Units: </label>
										<input type="text" class="form-control" name="units" id="units">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<label for="">For Bowling Alleys</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<label for="">No. of Automatic Lanes: </label>
										<input type="text" class="form-control" name="automatic-lanes" id="automatic-lanes">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<label for="">No. of Non-automatic Lanes: </label>
										<input type="text" class="form-control" name="non-automatic-lanes" id="non-automatic-lanes">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<label for="">For Golf Links</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<label for="">No. of holes: </label>
										<input type="text" class="form-control" name="holes" id="holes">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Save">
							</div>
						</div>
						
						<hr>
					</div>
				</div>
			</div> -->

			<!-- Modal -->
			<!-- <div id="modal-financial" class="modal fade" role="dialog">
				<div class="modal-dialog"> -->
					<!-- Modal content-->
					<!-- <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Financial Institution Type</h4>
						</div>
						
						<div class="modal-body">
							<?php foreach ($financial_institutions as $key => $fi): ?>
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<div class="radio">
										<label><input type="radio" name="financial-institution" id="financial-institution" value="<?= $this->encryption->encrypt($fi->financialInstitutionId) ?>"><?= $fi->description ?></label>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Save">
							</div>
						</div>
						
						<hr>
					</div>
				</div>
			</div> -->
<!-- </body>