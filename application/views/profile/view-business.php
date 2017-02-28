<!-- <body class="content-container"> -->
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
				<?php if($this->session->flashdata('message')): ?>
					<div class="alert alert-info"> <!--bootstrap message div-->
						<?=$this->session->flashdata('message')?>
					</div>
				<?php endif; ?>

				<div class="panel panel-primary">
					<div class="panel-heading panel-head">
						<h3>View Business Information</h3>
					</div>
					<div class="panel-body">
						<h4 class="panel-header" style="font-weight: bolder">Employee Details</h4>
						<div class="row">
							<div class="col-sm-3">
								<label for="business-owner" class="label-information"><?= ($business->get_FirstName() != "" || $business->get_LastName() != "" ? $business->get_FirstName() . " " . $business->get_LastName(): "N/A" )?></label>
								<p class="label-style">Business Owner</p>
							</div>
							<div class="col-sm-5">
								<label for="president-treasurer" class="label-information"><?= ($business->get_PresidentTreasurerName() != "" ? $business->get_PresidentTreasurerName() : "N/A" )?></label>
								<p class="label-style">Name of President/Treasurer of Corporation</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label for="pollution-control-officer" class="label-information"><?= ($business->get_PollutionControlOfficer() != "" ? $business->get_PollutionControlOfficer(): "N/A" )?></label>
								<p class="label-style">Pollution Control Officer</p>
							</div>
							<div class="col-sm-3">
								<label for="male-employees" class="label-information"><?= ($business->get_MaleEmployees() != "" ? $business->get_MaleEmployees(): "N/A" )?></label>
								<p class="label-style">No. of Male Employees</p>
							</div>
							<div class="col-sm-3">
								<label for="female-employees" class="label-information"><?= ($business->get_FemaleEmployees() != "" ? $business->get_FemaleEmployees(): "N/A" )?></label>
								<p class="label-style">No. of Female Employees</p>
							</div>
							<div class="col-sm-3">
								<label for="pwd-employees" class="label-information"><?= ($business->get_PWDEmployees() != "" ? $business->get_PWDEmployees(): "N/A" )?></label>
								<p class="label-style">No. of PWD Employees</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<label for="lgu-employees" class="label-information"><?= ($business->get_LGUEmployees() != "" ? $business->get_LGUEmployees(): "N/A" )?></label>
								<p class="label-style">No. of Employees Residing in LGU</p>
							</div>
						</div>
						<h4 class="panel-header" style="margin-top: 60px; font-weight: bolder">Business Details</h4>
							<div class="row">
								<div class="col-sm-3">
									<label for="business-name" class="label-information"><?= ($business->get_BusinessName() != "" ? $business->get_BusinessName(): "N/A" )?></label>
									<p class="label-style">Business Name</p>
								</div>
								<div class="col-sm-3">
									<label for="company-name" class="label-information"><?= ($business->get_CompanyName() != "" ? $business->get_CompanyName(): "N/A" )?></label>
									<p class="label-style">Company Name</p>
								</div>
								<div class="col-sm-3">
									<label for="trade-franchise-name" class="label-information"><?= ($business->get_TradeName() != "" ? $business->get_TradeName(): "N/A" )?></label>
									<p class="label-style">Trade/Franchise Name</p>
								</div>
								<div class="col-sm-3">
									<label for="signage-name" class="label-information"><?= ($business->get_SignageName() != "" ? $business->get_SignageName(): "N/A" )?></label>
									<p class="label-style">Signage Name</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="zone-type-name" class="label-information"><?= ($business->get_ZoneType() != "" ? $business->get_ZoneType(): "N/A" )?></label>
									<p class="label-style">Zone Type</p>
								</div>
								<div class="col-sm-3">
									<label for="organization-type" class="label-information"><?= ($business->get_OrganizationType() != "" ? $business->get_OrganizationType(): "N/A" )?></label>
									<p class="label-style">Organization Type</p>
								</div>
								<div class="col-sm-3">
									<label for="trade-franchise-name" class="label-information"><?= ($business->get_CorporationName() != "" ? $business->get_CorporationName(): "N/A" )?></label>
									<p class="label-style">Corporation Name</p>
								</div>
								<div class="col-sm-3">
									<label for="signage-name" class="label-information"><?= ($business->get_DateOfOperation() != "" ? $business->get_DateOfOperation(): "N/A" )?></label>
									<p class="label-style">Date of Operation/Date Started</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="business-area" class="label-information"><?= ($business->get_BusinessArea() != "" ? $business->get_BusinessArea(): "N/A" )?></label>
									<p class="label-style">Business Area (in sq. m)</p>
								</div>
								<div class="col-sm-9">
									<label for="business-description" class="label-information"><?= ($business->get_BusinessDesc() != "" ? $business->get_BusinessDesc(): "N/A" )?></label>
									<p class="label-style">Description of Business</p>
								</div>
							</div>
							<h4 class="panel-header" style="margin-top: 60px; font-weight: bolder">Business Address</h4>
							<div class="row">
								<div class="col-sm-3">
									<label for="house-no" class="label-information"><?= ($business->get_HouseBldgNum() != "" ? $business->get_HouseBldgNum(): "N/A" )?></label>
									<p class="label-style">House No./Bldg No.</p>
								</div>
								<div class="col-sm-3">
									<label for="building-name" class="label-information"><?= ($business->get_BldgName() != "" ? $business->get_BldgName(): "N/A" )?></label>
									<p class="label-style">Building Name</p>
								</div>
								<div class="col-sm-3">
									<label for="unit-number" class="label-information"><?= ($business->get_UnitNum() != "" ? $business->get_UnitNum(): "N/A" )?></label>
									<p class="label-style">Unit Number</p>
								</div>
								<div class="col-sm-3">
									<label for="street" class="label-information"><?= ($business->get_Street() != "" ? $business->get_Street(): "N/A" )?></label>
									<p class="label-style">Street</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="house-no" class="label-information"><?= ($business->get_Subdivision() != "" ? $business->get_Subdivision(): "N/A" )?></label>
									<p class="label-style">Subdivision</p>
								</div>
								<div class="col-sm-3">
									<label for="building-name" class="label-information"><?= ($business->get_Barangay() != "" ? $business->get_Barangay(): "N/A" )?></label>
									<p class="label-style">Barangay</p>
								</div>
								<div class="col-sm-3">
									<label for="unit-number" class="label-information"><?= ($business->get_CityMunicipality() != "" ? $business->get_CityMunicipality(): "N/A" )?></label>
									<p class="label-style">City/Municipality</p>
								</div>
								<div class="col-sm-3">
									<label for="street" class="label-information"><?= ($business->get_Province() != "" ? $business->get_Province(): "N/A" )?></label>
									<p class="label-style">Province</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="Zip/Postal Code" class="label-information"><?= ($business->get_PIN() != "" ? $business->get_PIN(): "N/A" )?></label>
									<p class="label-style">Zip/Postal Code</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<label for="">Map Location</label>
									<br>
									<span><strong>Google Maps Address: </strong> <span id='gmaps-address'>NA</span></span>
									<input type="hidden" required name="lat" id="lat" value="">
									<input type="hidden" required name="lng" id="lng" value="">
									<input type="hidden" required name="g-address" id="g-address" value="">
									<div id="map" style="width:100%; height:400px"></div>
								</div>
							</div>
							<h4 class="panel-header" style="margin-top: 60px; font-weight: bolder">Contact Details</h4>
							<div class="row">
								<div class="col-sm-3">
									<label for="email" class="label-information"><?= ($business->get_Email() != "" ? $business->get_Email(): "N/A" )?></label>
									<p class="label-style">Email</p>
								</div>
								<div class="col-sm-3">
									<label for="tel-number" class="label-information"><?= ($business->get_Telnum() != "" ? $business->get_Telnum(): "N/A" )?></label>
									<p class="label-style">Telephone Number (Landline)</p>
								</div>
							</div>
							<h4 class="panel-header" style="margin-top: 60px; font-weight: bolder">In case of emergency</h4>
							<div class="row">
								<div class="col-sm-3">
									<label for="contact-person-name" class="label-information"><?= ($business->get_EmergencyContactPerson() != "" ? $business->get_EmergencyContactPerson(): "N/A" )?></label>
									<p class="label-style">Contact Person Name</p>
								</div>
								<div class="col-sm-3">
									<label for="contact-person-tel-number" class="label-information"><?= ($business->get_EmergencyTelNum() != "" ? $business->get_EmergencyTelNum(): "N/A" )?></label>
									<p class="label-style">Tel No./Cel No.</p>
								</div>
								<div class="col-sm-3">
									<label for="contact-person-email" class="label-information"><?= ($business->get_EmergencyEmail() != "" ? $business->get_EmergencyEmail(): "N/A" )?></label>
									<p class="label-style">Email Address</p>
								</div>
							</div>
						<?php
						// echo "<h2>This page[view business] is still under development.</h2>";
						// echo "<pre>";
						// print_r($business);
						// echo "</pre>";
						?>
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
<!-- </body> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLMOtCdi62jLDT9JFcUh8vN3WYPakFMY8&callback=initMap" async defer></script>

<script>
	var map;
	function initMap(){
		latlang = new google.maps.LatLng(<?= $business->get_Lat() ?>,<?= $business->get_Lng() ?>);
		map = new google.maps.Map(document.getElementById('map'), {
			center: latlang,
			zoom: 15

		});
		var geocoder = new google.maps.Geocoder();
		var marker = new google.maps.Marker({
			position: latlang,
		});

		marker.setMap(map);
	}
</script>
