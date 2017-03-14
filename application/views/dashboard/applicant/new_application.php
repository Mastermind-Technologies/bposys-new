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
<h3>New Application</h3>
</div>
<div class="panel-body">

<form id="new_application_form" method="post" data-parsley-validate="">
<div class="row">
<div class="tab-content clearfix">
<div class="tab-pane active" id='step1'>
<h2 class=panel-header>Terms of Use</h2>
<div class="col-sm-12">
<div class="form-group">
	<div class="checkbox">
		<label>
			<input type="checkbox" id="certify" name="certify"><strong>I certify that all information is true and correct to the best of my knowledge. I understand that any incorrect, false or misleading statement is punishable by law.</strong>
		</label>
	</div>
</div>
<div class="col-sm-4 col-sm-offset-4">
	<a data-toggle='tab' id='s1-proceed' disabled class='btn btn-success btn-block'>Proceed</a>
</div>
</div>
</div>
<div class="tab-pane" id='step2'>
<h2 class="text-center">Unified Application Form for Business Permit</h2>
<h4 class="text-center"><strong>Tax Year <?= date('Y') ?></strong></h4>
<h4 class="text-center"><strong>CITY OF BIÑAN</strong></h4>
<input type="hidden" name="tax-year" id="tax-year" value="<?= date('Y') ?>">
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
				<option value="Anually">Anually (Every year)</option>
				<option value="Semi-Anually">Semi-Anually (Every 6 months)</option>
				<option value="Quarterly">Quarterly (Every 3 months)</option>
			</select>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="id-presented">ID Presented</label>
			<input type="text" name="id-presented" required="" id="id-presented" class="form-control" placeholder='i.e.: Student ID - 123456789'>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label for="DTISECCDA_RegNum">DTI/SEC/CDA Registration Number*</label>
			<input type="text" required name="DTISECCDA_RegNum" data-parsley-type="digits" id="DTISECCDA_RegNum" class="form-control">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="DTISECCDA_Date">DTI/SEC/CDA Date of Registration*</label>
			<div class="input-group">
				<input required type="text" name="DTISECCDA_Date" id="DTISECCDA_Date" class="form-control">  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="brgy-clearance-date-issued">Barangay Clearance Date Issued</label>
			<div class="input-group">
				<input type="text" required="" name="brgy-clearance-date-issued" id="brgy-clearance-date-issued" class="form-control date-field"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label for="ctc-number">CTC Number*</label>
			<input required type="text" name="ctc-number" id="ctc-number" data-parsley-type="digits" class="form-control">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="tin">TIN*</label>
			<input required type="text" name="tin" id="tin" class="form-control">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="occupancy-permit-number">Occupany Permit Number</label>
			<input type="text" required="" name="occupancy-permit-number" id="occupancy-permit-number" class="form-control">
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<input type="checkbox" id="tax-incentive" name="tax-incentive" data-toggle="tooltip" title="Please specify entity below">
			<label for="tax-incentive">Are you enjoying tax incentive from any Government Entity?</label>
		</div>

	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="entity">Specify Entity*</label>
			<input type="text" disabled id="entity" name="entity" class="form-control">
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
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label for="business">Select Business Profile</label>
				<select name="business" required id="business" class="form-control">
					<option disabled selected>Select Business</option>
					<?php foreach ($business as $b): ?>
						<option value="<?= $this->encryption->encrypt($b->businessId) ?>"><?= $b->businessName ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
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
					<label><input type="radio" checked name="annual-exams" id="annual-yes" value="Yes">Yes</label>
					<label><input type="radio" name="annual-exams" id="annual-no" value="No">No</label>
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
				<input type="text" class='form-control' name='storeys' id="storeys" required>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="portion-occupied">Portion Occupied</label>
				<input type="text" name="portion-occupied" id="portion-occupied" class="form-control" required>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="area-per-floor">Area per Floor (in sq. m.)</label>
				<input type="text" name="area-per-floor" id="area-per-floor" data-parsley-type='digits' class="form-control" required>
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
				<input type="checkbox" name='rented' id='rented' data-toggle="tooltip" title="Please identify lessor's information below if yes">
				<label for="rented">Is the business place rented?</label>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-first-name">First Name*</label>
					<input type="text" disabled class="form-control" name='lessor-first-name' id="lessor-first-name">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-middle-name">Middle Name*</label>
					<input type="text" disabled class="form-control" name='lessor-middle-name' id="lessor-middle-name">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-last-name">Last Name*</label>
					<input type="text" disabled class="form-control" name='lessor-last-name' id="lessor-last-name">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="lessor-address">Lessor's Address*</label>
					<textarea name="lessor-address" id="lessor-address" disabled rows="1" class='form-control' placeholder="House No./Bldg.No/Street"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-subdivision">Subdivision*</label>
					<input type="text" disabled class="form-control" name="lessor-subdivision" id="lessor-subdivision">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-barangay">Barangay*</label>
					<input type="text" disabled class="form-control" name="lessor-barangay" id="lessor-barangay">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-city-municipality">City/Municipality*</label>
					<input type="text" disabled class="form-control" name="lessor-city-municipality" id="lessor-city-municipality">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-province">Province*</label>
					<input type="text" disabled class="form-control" id="lessor-province" name="lessor-province">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-monthly-rental">Monthly Rental*</label>
					<input type="text" disabled class="form-control" data-parsley-type="digits" name="lessor-monthly-rental" id="lessor-monthly-rental">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="lessor-tel-cel-no">Tel No./Cel No.*</label>
					<input type="text" disabled class="form-control" data-parsley-type="digits" name="lessor-tel-cel-no" id="lessor-tel-cel-no">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Email Address*</label>
					<input type="email" disabled class="form-control" name="lessor-email" id="lessor-email">
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
							<label><input type="checkbox" id="cnc" name="cnc"><strong>Environmental Compliance Certificate/CNC</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" id="llda" name="llda"><strong>LLDA Clearance / Certificate of Exemption</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="cnc-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" disabled="" class="form-control" name="cnc-date-issued" id="cnc-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-2">
						<label for="llda-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" disabled="" class="form-control" name="llda-date-issued" id="llda-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" id="discharge-permit" name="discharge-permit"><strong>Discharge Permit</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" id="apsci" name="apsci"><strong>Permit to Operate/APSCI</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="discharge-permit-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" disabled="" class="form-control" name="discharge-permit-date-issued" id="discharge-permit-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-2">
						<label for="apsci-date-issued">Date Issued:</label>
						<div class="input-group">
							<input type="text" disabled="" class="form-control" name="apsci-date-issued" id="apsci-date-issued"><span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="products-by-products">Products and By-Products</label>
						<input type="text" id="products-by-products" name="products-by-products" class="form-control">
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
							<label><input type="checkbox" name="smoke-emission" id="smoke-emission"><strong>Smoke/Emission</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" name="volatile-compound" id="volatile-compound"><strong>Volatile Compound</strong></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<span>Fugitive Particulates:</span>
						<div class="checkbox">
							<label><input type="checkbox" name="fugitive-particulates[]" value="Dust"><strong>Dust</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="fugitive-particulates[]" value="Mist"><strong>Mist</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="fugitive-particulates[]" value="Gas"><strong>Gas</strong></label>
						</div>
					</div>
					<div class="col-sm-5">
						<span>Steam Generator:</span>
						<div class="checkbox">
							<label><input type="checkbox" name="steam-generators[]" value="Boiler"><strong>Boiler</strong></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="steam-generators[]" value="Furnace"><strong>Furnace</strong></label>
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
						<input type="text" required id="air-pollution-control-devices" name="air-pollution-control-devices" class="form-control">
					</div>
					<div class="col-sm-4">
						<label for="stack-height">Stack Height</label>
						<input type="text" required name="stack-height" id="stack-height" class="form-control">
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
						<input required type="text" name="wastewater-treatment-facility" id="wastewater-treatment-facility" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<div class="checkbox">
							<label><input type="checkbox" name="wastewater-treatment-operation" id="wastewater-treatment-operation"><strong>Wastewater Treatment Operation and Process</strong></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<div class="checkbox">
							<label><input type="checkbox" name="pending-llda-case" id="pending-llda-case"><strong>Pending Case with LLDA?</strong></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label for="case-no">Case No.</label>
						<input type="text" disabled name="llda-case-no" data-parsley-type="digits" id="llda-case-no" class="form-control">
					</div>
				</div>
				<!-- END OF WASTEWATER -->
				<hr>
				<h4>Solid Wastes</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="type-of-solid-wastes">Type of Solid Wastes Generated</label>
							<input required type="text" id="type-of-solid-wastes" name="type-of-solid-wastes" class="form-control">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="qty-per-day">Quantity per day</label>
							<input required type="text" id="qty-per-day" data-parsley-type='digits' name="qty-per-day" class="form-control">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="method-of-garbage-collection">Method of Garbage Collection</label>
							<input required type="text" id="method-of-garbage-collection" name="method-of-garbage-collection" class="form-control">
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group" id="garbage-radio">
							<span>Frequency of Garbage Collection:</span>
							<div class="radio-inline">
								<label><input type="radio" checked name="garbage-collection-frequency" id="garbage-collection-frequency" value="Daily"><strong>Daily</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="garbage-collection-frequency" value="Weekly" id="garbage-collection-frequency"><strong>Weekly</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="garbage-collection-frequency" id="garbage-collection-others" value=""><strong>Others</strong></label>
								<input type="text" name="garbage-collection-specify" id="garbage-collection-specify" disabled placeholder="Please specify...">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="collector">Person / Company Collecting Solid Wastes</label>
							<input required type="text" id="collector" name="collector" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							<label for="collector-address">Collector's Address</label>
							<textarea required name="collector-address" id="collector-address" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<span>Method of Garbage Disposal:</span>
							<div class="radio-inline">
								<label><input type="radio" checked name="garbage-disposal-method" value="Sanitary Landfill"><strong>Sanitary Landfill</strong></label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="garbage-disposal-method" value="Controlled Dumpsite"><strong>Controlled Dumpsite</strong></label>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<span>Method of Waste Minimization (if any):</span>
							<div class="checkbox-inline">
								<label><input type="checkbox" name="waste-minimization[]" value="Recycling"><strong>Recycling</strong></label>
							</div>
							<div class="checkbox-inline">
								<label><input type="checkbox" name="waste-minimization[]" value="Reduction"><strong>Reduction</strong></label>
							</div>
							<div class="checkbox-inline">
								<label><input type="checkbox" name="waste-minimization[]" value="Reuse"><strong>Reuse</strong></label>
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
							<label><input type="checkbox" name="drainage-system" id="drainage-system"><strong>Drainage System</strong></input></label>
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
								<label><input type="radio" disabled id="drainage-system-type1" name="drainage-system-type" value="Close/Underground"><strong>Closed/Underground</strong></input></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="radio-inline">
								<label><input type="radio" disabled id="drainage-system-type2" name="drainage-system-type" value="Open Canal"><strong class="testing">Open Canal</strong></input></label>
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
								<label><input type="radio" disabled name="drainage-where-discharged" id="drainage-where-discharged1" value="Public Drainage System"><strong>Public Drainage System</strong></input></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="radio-inline">
								<label><input type="radio" disabled name="drainage-where-discharged" id="drainage-where-discharged2" value="Nature Outfall/Waterbody"><strong>Nature Outfall/Waterbody</strong></input></label>
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
							<label><input type="checkbox" name="sewerage-system" id="sewerage-system"><strong>Sewerage System</strong></input></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="checkbox">
							<label><input type="checkbox" id="septic-tank" name="septic-tank"><strong>Septic Tank</strong></input></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label for="">Where Discharged:</label></div>
						<div class="col-sm-3 col-sm-offset-1">
							<div class="radio-inline">
								<label><input type="radio" disabled name="sewerage-where-discharged" id="sewerage-where-discharged1" value="Public Drainage System"><strong>Public Drainage System</strong></input></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="radio-inline">
								<label><input type="radio" disabled name="sewerage-where-discharged" id="sewerage-where-discharged2" value="Treatment in Septic Tank"><strong>Treatment in Septic Tank</strong></input></label>
							</div>
						</div>
					</div>
					<!-- END OF SEWERAGE -->
					<hr>
					<h4>Water Supply/Source</h4>
					<div class="row">
						<div class="col-sm-3">
							<div class="radio">
								<label><input type="radio" checked name="water-supply" id="water-supply" value="Deep Well"><strong>Deep Well</strong></input></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="radio">
								<label><input type="radio" name="water-supply" id="water-supply" value="Water Utility"><strong>Local Water Utility</strong></input></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="radio">
								<label><input type="radio" name="water-supply" id="water-supply" value="Surface Water"><strong>Surface Water</strong></input></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="water-supply-type">Type of Water Supply/Source</label>
								<input type="text" required name="water-supply-type" id="water-supply-type" class="form-control">
							</div>
						</div>
					</div>
					<!-- END OF WATER SUPPLY/SOURCE -->
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

					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<table id='bus-activity' class="table table-bordered">
							<th>Line of Business</th>
							<th>Capitalization</th>
							<!-- <th></th> -->
							<tbody class="table-body">
								<tr class="data">
									<td>
										<select name='line-of-business' id='line-of-business' required class="form-control sel-line-of-business">
											<option selected disabled>Select Line of Business</option>
											<?php foreach ($line_of_business as $key => $line): ?>
												<option value="<?= $this->encryption->encrypt($line->name) ?>"><?= $line->name ?></option>
											<?php endforeach ?>
										</select>
									</td>
									<td>
										<input id='capitalization' name="capitalization" type="text" required data-parsley-type='digits' class="form-control capitalization">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4">
							<a id="btn-add-bus-activity" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Add Row</a>
						</div>
					</div>
					<hr>
					<div class="col-sm-3 pull-left">
						<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
					</div>
					<div class="col-sm-5 pull-right form-navigation">
						<!-- <button type="submit" id="btn-submit" class="btn btn-success pull-right"><i id="fa-submit" class="fa fa-check" aria-hidden="true"></i> Submit Application</button> -->
						<a data-toggle='tab' class='btn btn-success next pull-right'>Proceed to Summary</a>
						<a data-toggle='tab' class='btn btn-success previous pull-right' style="margin-right:10px">Back</a>
						<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
							Save as Draft</button>
						</div>
					</div>

					<div class="tab-pane" id='step8'>
						<h2 class="panel-header">Application Summary</h2>
						<div class="col-sm-12">
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
										<label>Mode of Payment</label>
										<br>
										<span id="s-mode-of-payment"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>ID Presented</label>
										<span id="s-id-presented"></span>
									</div>
								</div>
							</div>
							

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>DTI/SEC/CDA Registration Number*</label>
										<span id="s-id-dtiseccda-regnum"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>DTI/SEC/CDA Date of Registration*</label>
										<span id="s-dtiseccda-regdate"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="brgy-clearance-date-issued">Barangay Clearance Date Issued</label>
										<span id="s-brgy-clearance-date-issued"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="ctc-number">CTC Number*</label>
										<span id="s-ctc-number"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="tin">TIN*</label>
										<span id="s-tin"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="occupancy-permit-number">Occupany Permit Number</label>
										<span id="s-occupancy-permit-number"></span>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input type="checkbox" disabled id="s-tax-incentive" name="tax-incentive" data-toggle="tooltip" title="Please specify entity below">
										<label for="tax-incentive">Are you enjoying tax incentive from any Government Entity?</label>
									</div>

								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="entity">Specify Entity*</label>
										<span id="s-entity"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="business">Select Business Profile</label>
										<span id="s-business"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label>Tax Payer Name</label>
									<br>
									<span id="s-tax-payer-name">N/A</span>
								</div>
								<div class="col-sm-5">
									<label>Name of President/Treasurer of Corporation</label>
									<br>
									<span id='s-president-treasurer-name'>N/A</span>
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
										<span id="s-pollution-control-officer">N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Number of Male Employees</label>
										<br>
										<span id="s-male-employees">N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Number of Female Employees</label>
										<br>
										<span id="s-female-employees">N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Number of PWD Employees</label>
										<br>
										<span id="s-pwd-employees">N/A</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Number of Employees Residing in LGU</label>
										<br>
										<span id="s-lgu-employees">N/A</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Annual Physical Exams for Employees</label>
										<div class="radio">
											<label><input type="radio" disabled id="s-annual-exams-yes" value="Yes">Yes</label>
											<label><input type="radio" disabled id="s-annual-exams-no" value="No">No</label>
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
										<span id="s-company-name">N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Business Name</label>
										<br>
										<span id="s-business-name">N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Trade Name/Franchise</label>
										<br>
										<span id='s-trade-name'>N/A</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Signage Name</label>
										<br>
										<span id='s-signage-name'>N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Organization Type</label>
										<br>
										<span id='s-organization-type'>N/A</span>
									</div>

								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Corporation Name <small>(if corporation)</small></label>
										<br>
										<span id='s-corporation-name'>N/A</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Date of Operation</label>
										<br>
										<span id='s-date-of-operation-text'>N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Description of Business</label>
										<br>
										<span id='s-business-desc'>N/A</span>
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
										<span id='s-house-bldg-no'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Building Name</label>
										<br>
										<span id='s-bldg-name'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Unit Number</label>
										<br>
										<span id='s-unit-num'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Street</label>
										<br>
										<span id='s-street'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Barangay</label>
										<br>
										<span id='s-barangay'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Subdivision</label>
										<br>
										<span id='s-subdivision'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>City/Municipality</label>
										<br>
										<span id='s-city-municipality'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Province</label>
										<br>
										<span id='s-province'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Business Area (in sq. m.)</label>
										<br>
										<span id='s-business-area'>N/A</span>
									</div>
								</div>
								<div class="col-sm-3">
									<label>Zip/Postal Code (PIN)</label>
									<br>
									<span id='s-pin'>N/A</span>
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
										<label>No. of Storeys</label>
										<span id="s-storeys"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="portion-occupied">Portion Occupied</label>
										<span id="s-portion-occupied"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="area-per-floor">Area per Floor (in sq. m.)</label>
										<span id="s-area-per-floor"></span>
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
									<span id='s-tel-num'>N/A</span>
								</div>
								<div class="col-sm-4">
									<label>Email Address</label>
									<br>
									<span id='s-email'>N/A</span>
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
										<span id="s-emergency-contact-name">N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="emergency-tel-cel-no">Tel No./Cel No.</label>
										<br>
										<span id="s-emergency-tel-cel-no">N/A</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="emergency-email">Email Address</label>
										<br>
										<span id="s-emergency-email">N/A</span>
									</div>
								</div>
								<h2 class="panel-header">Lessor Details (if rented)</h2>
								<div class="col-sm-12 lessor-controls">
									<div class="row">
										<div class="col-sm-12">
											<input type="checkbox" disabled name='rented' id='s-rented'>
											<label>Is the business place rented?</label>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>First Name</label>
												<span id="s-lessor-first-name"></span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Middle Name</label>
												<span id="s-lessor-middle-name"></span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Last Name</label>
												<span id="s-lessor-last-name"></span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Lessor's Address</label>
												<span id="s-lessor-address"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Subdivision*</label>
												<span id="s-lessor-subdivision"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Barangay*</label>
												<span id="s-lessor-barangay"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lessor-city-municipality">City/Municipality*</label>
												<span id="s-lessor-city-municipality"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lessor-province">Province*</label>
												<span id="s-lessor-province"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lessor-monthly-rental">Monthly Rental*</label>
												<span id="s-lessor-monthly-rental"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lessor-tel-cel-no">Tel No./Cel No.*</label>
												<span id="s-lessor-tel-cel-no"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>Email Address*</label>
												<span id="s-lessor-email-address"></span>
											</div>
										</div>
									</div>
									<h2 class="panel-header">Issued Certificates/Permits</h2>
									<div class="col-sm-12">
										<small>Click the checkbox if specific permit is issued.</small>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-cnc"><strong>Environmental Compliance Certificate/CNC</strong></label>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-llda"><strong>LLDA Clearance / Certificate of Exemption</strong></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<label>Date Issued:</label>
													<div class="input-group">
														<span id="s-cnc-date-issued"></span>
													</div>
												</div>
												<div class="col-sm-3 col-sm-offset-2">
													<label>Date Issued:</label>
													<div class="input-group">
														<span id="s-llda-date-issued"></span>
													</div>

												</div>
											</div>

											<div class="row">
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-discharge-permit"><strong>Discharge Permit</strong></label>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-apsci" name="apsci"><strong>Permit to Operate/APSCI</strong></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<label>Date Issued:</label>
													<div class="input-group">
														<span id="s-discharge-permit-date-issued"></span>
													</div>
												</div>
												<div class="col-sm-3 col-sm-offset-2">
													<label for="apsci-date-issued">Date Issued:</label>
													<div class="input-group">
														<span id="s-apsci-date-issued"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label for="products-by-products">Products and By-Products</label>
													<span id="s-products-by-products"></span>
												</div>
											</div>
										</div>
										<h2 class="panel-header">Environmental Details</h2>
										<div class="col-sm-12">
											<h4>Air Pollutants</h4>
											<div class="row">
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-smoke-emission"><strong>Smoke/Emission</strong></label>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-volatile-compound"><strong>Volatile Compound</strong></label>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-5">
													<span>Fugitive Particulates:</span>
													<div class="checkbox">
														<label><input type="checkbox" disabled id=s-fugitive-particulate-dust><strong>Dust</strong></label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" disabled id=s-fugitive-particulate-mist value="Mist"><strong>Mist</strong></label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" disabled id=s-fugitive-particulate-gas><strong>Gas</strong></label>
													</div>
												</div>
												<div class="col-sm-5">
													<span>Steam Generator:</span>
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-steam-generators-bioler"><strong>Boiler</strong></label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-steam-generators-furnace"><strong>Furnace</strong></label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-steam-generators-others"><strong>Others</strong></label>
														<input type="text" disabled id="s-steam-generator-specify" disabled>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-4">
													<label for="air-pollution-control-devices">Air Pollution Control Devices Being Used</label>
													<span id="s-air-pollution-control-devices"></span>
												</div>
												<div class="col-sm-4">
													<label for="stack-height">Stack Height</label>
													<span id="s-stack-height"></span>
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
													<span id="s-wastewater-treatment-facility"></span>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-5">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-wastewater-treatment-operation"><strong>Wastewater Treatment Operation and Process</strong></label>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-3">
													<div class="checkbox">
														<label><input type="checkbox" disabled id="s-pending-llda-case"><strong>Pending Case with LLDA?</strong></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<label for="case-no">Case No.</label>
													<span id="s-llda-case-no"></span>
												</div>
											</div>
											<!-- END OF WASTEWATER -->
											<hr>
											<h4>Solid Wastes</h4>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label for="type-of-solid-wastes">Type of Solid Wastes Generated</label>
														<span id="s-type-of-solid-wastes"></span>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<label for="qty-per-day">Quantity per day</label>
														<span id="s-qty-per-day"></span>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label for="method-of-garbage-collection">Method of Garbage Collection</label>
														<span id="s-method-of-garbage-collection"></span>
													</div>
												</div>
											</div>
											<br>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group" id="garbage-radio">
														<span>Frequency of Garbage Collection:</span>
														<div class="radio-inline">
															<label><input type="radio" disabled id="s-garbage-collection-frequency" value="Daily"><strong>Daily</strong></label>
														</div>
														<div class="radio-inline">
															<label><input type="radio" disabled value="Weekly" id="s-garbage-collection-frequency"><strong>Weekly</strong></label>
														</div>
														<div class="radio-inline">
															<label><input type="radio" disabled id="garbage-collection-others" value=""><strong>Others</strong></label>
															<input type="text" disabled id="s-garbage-collection-specify" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label>Person / Company Collecting Solid Wastes</label>
														<span id="s-collector"></span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<label>Collector's Address</label>
														<span id="s-collector-address"></span>
													</div>
												</div>
											</div>
											<br>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<span>Method of Garbage Disposal:</span>
														<div class="radio-inline">
															<label><input type="radio" id="s-sanitary-landfill" disabled value="Sanitary Landfill"><strong>Sanitary Landfill</strong></label>
														</div>
														<div class="radio-inline">
															<label><input type="radio" id="s-controlled-dumpsite" disabled value="Controlled Dumpsite"><strong>Controlled Dumpsite</strong></label>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<span>Method of Waste Minimization (if any):</span>
														<div class="checkbox-inline">
															<label><input type="checkbox" disabled id="s-recycling" value="Recycling"><strong>Recycling</strong></label>
														</div>
														<div class="checkbox-inline">
															<label><input type="checkbox" disabled id="s-reduction" value="Reduction"><strong>Reduction</strong></label>
														</div>
														<div class="checkbox-inline">
															<label><input type="checkbox" disabled id="s-reuse" value="Reuse"><strong>Reuse</strong></label>
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
														<label><input type="checkbox" disabled id="s-drainage-system"><strong>Drainage System</strong></input></label>
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
															<label><input type="radio" disabled id="s-close-underground" value="Close/Underground"><strong>Closed/Underground</strong></input></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="radio-inline">
															<label><input type="radio" disabled id="s-open-canal" value="Open Canal"><strong class="testing">Open Canal</strong></input></label>
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
															<label><input type="radio" disabled id="s-public-drainage-system"><strong>Public Drainage System</strong></input></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="radio-inline">
															<label><input type="radio" disabled id="s-nature-outfall-waterbody"><strong>Nature Outfall/Waterbody</strong></input></label>
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
														<label><input type="checkbox" disabled id="s-sewerage-system"><strong>Sewerage System</strong></input></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="checkbox">
														<label><input type="checkbox" id="s-septic-tank" disabled><strong>Septic Tank</strong></input></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<label for="">Where Discharged:</label></div>
													<div class="col-sm-3 col-sm-offset-1">
														<div class="radio-inline">
															<label><input type="radio" disabled id="s-septic-public-drainage-system"><strong>Public Drainage System</strong></input></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="radio-inline">
															<label><input type="radio" disabled id="s-septic-treatment-in-septic-tank"><strong>Treatment in Septic Tank</strong></input></label>
														</div>
													</div>
												</div>
												<!-- END OF SEWERAGE -->
												<hr>
												<h4>Water Supply/Source</h4>
												<div class="row">
													<div class="col-sm-3">
														<div class="radio">
															<label><input type="radio" disabled id="s-deep-well"><strong>Deep Well</strong></input></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="radio">
															<label><input type="radio" disabled id="s-local-water"><strong>Local Water Utility</strong></input></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="radio">
															<label><input type="radio" disabled id="s-surface-water"><strong>Surface Water</strong></input></label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-3">
														<div class="form-group">
															<label for="water-supply-type">Type of Water Supply/Source</label>
															<span id="s-water-supply-type"></span>
														</div>
													</div>
												</div>
												<h2 class="panel-header">Business Activities</h2>

												<div class="col-sm-8 col-sm-offset-2">
													<table id='bus-activity' class="table table-bordered">
														<th>Line of Business</th>
														<th>Capitalization</th>
														<!-- <th></th> -->
														<tbody class="table-body">
															<tr class="data">
																<td>
																	<!-- line of businesses -->
																</td>
																<td>
																	<!-- capitaliation -->
																</td>
															</tr>
														</tbody>
													</table>
												</div>

											</div>
											<hr>
							<!-- <div class="col-sm-3 pull-left">
								<a href="<?php echo base_url(); ?>dashboard" class='btn btn-danger'>Cancel</a>
							</div> -->
							<!-- <div class="col-sm-4 pull-right form-navigation">
								<a data-toggle='tab' class='btn btn-success next pull-right'>Next 2/6</a>
								<a data-toggle='tab' class='btn btn-success previous pull-right' style='margin-right:10px;'>Back</a>
								<button class="btn btn-warning pull-right btn-draft" style='margin-right:10px;' id='save-as-draft' data-toggle="tooltip" title="Save as draft so you can continue later." type="submit"><i class="fa fa-pencil-square-o fa-draft-icon" aria-hidden="true"></i>
									Save as Draft</button>
								</div> -->
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

<script>
