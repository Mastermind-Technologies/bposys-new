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
					<div class="panel-heading">
						<h3>Edit Business Profile</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>profile/save_edit_business/<?= str_replace(['/','+','='], ['-','_','='],$business->get_businessId()) ?>" method="post" data-parsley-validate="">
							<?php if($this->session->flashdata('ft')): ?>
								<input type="hidden" name="ft" value="1">
							<?php endif; ?>
							<div class="row">
								<div class="col-sm-12">
									<h4 class="panel-header">Employee Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="owner">Business Owner</label>
												<select name="business-owner" required id="business-owner" class="form-control">
													<option disabled selected>Select Owner</option>
													<?php foreach ($owner as $o): ?>
														<option <?=  $o->ownerId == $this->encryption->decrypt($business->get_OwnerId()) ? 'selected' : '' ?> value="<?= $this->encryption->encrypt($o->ownerId) ?>"><?= $o->firstName." ".$o->lastName ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group">
												<label for="president-treasurer-name">Name of President/Treasurer of Corporation</label>
												<input type="text" required name="president-treasurer-name" id="president-treasurer-name" class="form-control" placeholder="Last Name, First Name, Middle Name" value="<?= $business->get_PresidentTreasurerName() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="pollution-control-officer">Pollution Control Officer</label>
												<input type="text" class="form-control" required name="pollution-control-officer" value="<?= $business->get_PollutionControlOfficer() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="male-employees">No. of Male Employees</label>
												<input type="text" class="form-control" data-parsley-type="digits" name="male-employees" required name="employee-male"  value="<?= $business->get_MaleEmployees() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="female-employees">No. of Female Employee</label>
												<input type="text" class="form-control" data-parsley-type="digits" name="female-employees" required name="employee-female" value="<?= $business->get_FemaleEmployees() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="pwd-employees">No. of PWD Employee</label>
												<input type="text" class="form-control" data-parsley-type="digits" name="pwd-employees" required name="employee-pwd" value="<?= $business->get_PWDEmployees() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="lgu-employees">No. of Employees Residing in LGU</label>
												<input type="text" id="lgu-employees" name='lgu-employees' required data-parsley-type='digits' class='form-control' value="<?= $business->get_LGUEmployees() ?>">
											</div>
										</div>
									</div>
									<h4 class="panel-header">Business Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="business-name">Business Name</label>
												<input type="text" name="business-name" required id="business-name" class="form-control" value="<?= $business->get_BusinessName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="company-name">Company Name</label>
												<input type="text" id='company-name' required name='company-name' class="form-control" value="<?= $business->get_CompanyName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="trade-name">Trade/Franchise Name</label>
												<input type="text" id="trade-name" required name="trade-name" class="form-control" value="<?= $business->get_TradeName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="signage-name">Signage Name</label>
												<input type="text" id="signage=name" required name="signage-name" class="form-control" value="<?= $business->get_SignageName() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="zone-type">Zone Type</label>
												<select name="zone-type" id="zone-type" required class="form-control">
													<option disabled selected>Select Zone Type</option>
													<option value="Single residential" <?= $business->get_ZoneType() == "Single residential" ? 'selected' : '' ?>>Single residential</option>
													<option value="Apartments/Townhouses" <?= $business->get_ZoneType() == "Apartments/Townhouses" ? 'selected' : '' ?>>Apartments/Townhouses</option>
													<option value="Dormitories" <?= $business->get_ZoneType() == "Dormitories" ? 'selected' : '' ?>>Dormitories</option>
													<option value="Commercial/Industrial kind" <?= $business->get_ZoneType() == "Commercial/Industrial kind" ? 'selected' : '' ?>>Commercial/Industrial kind</option>
													<option value="Special Uses/Special Projects" <?= $business->get_ZoneType() == "Special Uses/Special Projects" ? 'selected' : '' ?>>Special Uses/Special Projects</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="organization-type">Organization Type</label>
												<select required name="organization-type" id="organization-type" class="form-control">
													<option selected disabled>Select Organzation Type</option>
													<option <?= $business->get_organizationType()=="Singe" ? 'selected' : '' ?> value="Single">Single</option>
													<option <?= $business->get_organizationType()=="Partnership" ? 'selected' : '' ?> value="Partnership">Partnership</option>
													<option <?= $business->get_organizationType()=="Corporation" ? 'selected' : '' ?> value="Corporation">Corporation</option>
													<option <?= $business->get_organizationType()=="Cooperative" ? 'selected' : '' ?> value="Cooperative">Cooperative</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="corporation-name">Corporation Name</label>
												<input type="text" id="corporation-name" <?= $business->get_organizationType() == 'Corporation' ? '' : 'disabled' ?> name="corporation-name" class="form-control" value="<?= $business->get_CorporationName()=="NA" ? '' : $business->get_CorporationName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="date-of-operation">Date of Operation/Date Started</label>
												<div class="input-group date">
													<input type="text" required id="date-of-operation" name="date-of-operation" class="form-control" data="DateTimePicker" value="<?= $business->get_DateOfOperation() ?>"/>  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="business-area">Business Area (in sq. m.)</label>
												<input type="text" required name="business-area" id="business-area" class="form-control" value="<?= $business->get_BusinessArea() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="business-desc">Description of Business</label>
												<textarea name="business-desc" required id="business-desc" rows="1" class='form-control'><?= $business->get_BusinessDesc() ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h4 class="page-header">Business Address</h4>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="house-bldg-no">House No./Bldg No.</label>
												<input type="text" required class="form-control" name="house-bldg-no"  value="<?= $business->get_HouseBldgNum() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="bldg-name">Building Name</label>
												<input type="text" required class="form-control" name="bldg-name"  value="<?= $business->get_BldgName() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unit-no">Unit Number</label>
												<input type="text" required class="form-control" name="unit-no"  value="<?= $business->get_UnitNum() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="street">Street</label>
												<input type="text" required class="form-control" name="street"  value="<?= $business->get_Street() ?>">
											</div>

										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="subdivision">Subdivision</label>
												<input type="text" required class="form-control" name="subdivision"  value="<?= $business->get_Subdivision() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="barangay">Barangay</label>
												<select name="barangay" required id="barangay" class="form-control">
													<option disabled selected>Select Barangay</option>
													<option value=<?= $this->encryption->encrypt("Biñan")?> <?= $business->get_Barangay() == "Biñan" ? 'selected' : '' ?>>Biñan</option>
													<option value=<?= $this->encryption->encrypt("Bungahan")?> <?= $business->get_Barangay() == "Bungahan" ? 'selected' : '' ?>>Bungahan</option>
													<option value=<?= $this->encryption->encrypt("Canlalay")?> <?= $business->get_Barangay() == "Canlalay" ? 'selected' : '' ?>>Canlalay</option>
													<option value=<?= $this->encryption->encrypt("Casile")?> <?= $business->get_Barangay() == "Casile" ? 'selected' : '' ?>>Casile</option>
													<option value=<?= $this->encryption->encrypt("Dela Paz")?> <?= $business->get_Barangay() == "Dela Paz" ? 'selected' : '' ?>>Dela Paz</option>
													<option value=<?= $this->encryption->encrypt("Ganado")?> <?= $business->get_Barangay() == "Ganado" ? 'selected' : '' ?>>Ganado</option>
													<option value=<?= $this->encryption->encrypt("Langkiwa")?> <?= $business->get_Barangay() == "Langkiwa" ? 'selected' : '' ?>>Langkiwa</option>
													<option value=<?= $this->encryption->encrypt("Loma")?> <?= $business->get_Barangay() == "Loma" ? 'selected' : '' ?>>Loma</option>
													<option value=<?= $this->encryption->encrypt("Malaban")?> <?= $business->get_Barangay() == "Malaban" ? 'selected' : '' ?>>Malaban</option>
													<option value=<?= $this->encryption->encrypt("Malamig")?> <?= $business->get_Barangay() == "Malamig" ? 'selected' : '' ?>>Malamig</option>
													<option value=<?= $this->encryption->encrypt("Mampalasan")?> <?= $business->get_Barangay() == "Mampalasan" ? 'selected' : '' ?>>Mampalasan</option>
													<option value=<?= $this->encryption->encrypt("Platero")?> <?= $business->get_Barangay() == "Platero" ? 'selected' : '' ?>>Platero</option>
													<option value=<?= $this->encryption->encrypt("Poblacion")?> <?= $business->get_Barangay() == "Poblacion" ? 'selected' : '' ?>>Poblacion</option>
													<option value=<?= $this->encryption->encrypt("San Antonio")?> <?= $business->get_Barangay() == "San Antonio" ? 'selected' : '' ?>>San Antonio</option>
													<option value=<?= $this->encryption->encrypt("San Francisco (Halang)")?> <?= $business->get_Barangay() == "San Francisco (Halang)" ? 'selected' : '' ?>>San Francisco (Halang)</option>
													<option value=<?= $this->encryption->encrypt("San Jose")?> <?= $business->get_Barangay() == "San Jose" ? 'selected' : '' ?>>San Jose</option>
													<option value=<?= $this->encryption->encrypt("San Vicente")?> <?= $business->get_Barangay() == "San Vicente" ? 'selected' : '' ?>>San Vicente</option>
													<option value=<?= $this->encryption->encrypt("Santo Domingo")?> <?= $business->get_Barangay() == "Santo Domingo" ? 'selected' : '' ?>>Santo Domingo</option>
													<option value=<?= $this->encryption->encrypt("Soro-Soro")?> <?= $business->get_Barangay() == "Soro-Soro" ? 'selected' : '' ?>>Soro-Soro</option>
													<option value=<?= $this->encryption->encrypt("Sto. Niño")?> <?= $business->get_Barangay() == "Sto. Niño" ? 'selected' : '' ?>>Sto. Niño</option>
													<option value=<?= $this->encryption->encrypt("Sto. Tomas (Calabuso)")?> <?= $business->get_Barangay() == "Sto. Tomas (Calabuso)" ? 'selected' : '' ?>>Sto. Tomas (Calabuso)</option>
													<option value=<?= $this->encryption->encrypt("Timbao")?> <?= $business->get_Barangay() == "Timbao" ? 'selected' : '' ?>>Timbao</option>
													<option value=<?= $this->encryption->encrypt("Tubigan")?> <?= $business->get_Barangay() == "Tubigan" ? 'selected' : '' ?>>Tubigan</option>
													<option value=<?= $this->encryption->encrypt("Zapote")?> <?= $business->get_Barangay() == "Zapote" ? 'selected' : '' ?>>Zapote</option>
												</select>
												<!-- <input type="text" required class="form-control" name="barangay" value=""> -->
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="city-municipality">City/Municipality</label>
												<h4>Biñan City</h4>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="province">Province</label>
												<h4>Laguna</h4>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="PIN">Zip/Postal Code</label>
												<input type="text" required data-parsley-type='digits' name="PIN" id="PIN" class="form-control" value="<?= $business->get_PIN() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label for="">Map Location</label>
												<br>
												<span><strong>Google Maps Address: </strong> <span id='gmaps-address'><?= $business->get_GmapAddress() != 'NA' ? $business->get_GmapAddress() : 'NA' ?></span></span>
												<input type="hidden" required name="lat" id="lat"  value="">
												<input type="hidden" required name="lng" id="lng"  value="">
												<input type="hidden" required name="g-address" id="g-address"  value="">
												<div id="map" style="width:100%; height:400px"></div>
											</div>
										</div>
									</div>

									<h4 class="page-header">Contact Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="contact-number">Email</label>
												<input type="text" required class="form-control" name="email" value="<?= $business->get_Email() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="telephone-number">Telephone Number (Landline)</label>
												<input type="text" class="form-control" name="telephone-number"  value="<?= $business->get_Telnum() ?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<h4>In case of emergency</h4>
											<hr>
										</div>

										<div class="col-sm-4">
											<div class="form-group">
												<label for="contact-name">Contact Person Name</label>
												<input type="text" required name="emergency-contact-name" class="form-control" value="<?= $business->get_EmergencyContactPerson() ?>">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="emergency-tel-cel-no">Tel No./Cel No.</label>
												<input type="text" required name="emergency-tel-cel-no" data-parsley-type="digits" class="form-control" value="<?= $business->get_EmergencyTelNum() ?>">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="emergency-email">Email Address</label>
												<input type="email" required name="emergency-email" class="form-control" value="<?= $business->get_EmergencyEmail() ?>">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-4 col-sm-offset-4">
											<input type="submit" value="Submit" class="btn btn-success btn-block">
										</div>
									</div>
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

		google.maps.event.addListener(map, 'click', function( event ){
			var newPos = {lat:event.latLng.lat() , lng:event.latLng.lng()};
      // console.log( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
      document.getElementById('lat').value = event.latLng.lat();
      document.getElementById('lng').value = event.latLng.lng();

      marker.setPosition(newPos);

      geocoder.geocode({
      	'latLng': event.latLng
      }, function(results, status) {
      	if (status == google.maps.GeocoderStatus.OK) {
      		if (results[0]) {
      			document.getElementById('gmaps-address').innerHTML = results[0].formatted_address;
      			document.getElementById('g-address').value =  results[0].formatted_address;
            // alert(results[0].formatted_address);
        }
    }
          });//end of geodecoder

  });
	}
</script>
