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
						<h3>Owner Information <a href="#" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></h3>
					</div>
					<div class="panel-body">
									<h4 class="panel-header">Owner Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<label for="fname" class="label-information"><?= ($owner->get_FirstName() != "" ? $owner->get_FirstName() : "NA")?></label>
											<p class="label-style">First Name</p>
										</div>
										<div class="col-sm-3">
											<label for="lname" class="label-information"><?= ($owner->get_LastName() != "" ? $owner->get_LastName() : "NA")?></label>
											<p class="label-style">Last Name</p>
										</div>
										<div class="col-sm-3">
											<label for="mname" class="label-information"><?= ($owner->get_MiddleName() != "" ? $owner->get_MiddleName() : "NA")?></label>
											<p class="label-style">Middle Name</p>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="suffix" class="label-information"><?= ($owner->get_OwnerSuffix() != "" ? $owner->get_OwnerSuffix() : "NA")?></label>
												<p class="label-style">Suffix</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="gender" class="label-information"><?= ($owner->get_OwnerGender() != "" ? $owner->get_OwnerGender() : "NA")?></label>
												<p class="label-style">Gender</p>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<h4 class="page-header">Owner Address</h4>

											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="house-bldg-no" class="label-information"><?= ($owner->get_OwnerHouseBldgNo() != "" ? $owner->get_OwnerHouseBldgNo() : "NA")?></label>
														<p class="label-style">House No./Bldg No.</p>
													</div>

												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="bldg-name" class="label-information"><?= ($owner->get_OwnerBldgName() != "" ? $owner->get_OwnerBldgName() : "NA")?></label>
														<p class="label-style">Building Name</p>
													</div>

												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="unit-no" class="label-information"><?= ($owner->get_OwnerUnitNum() != "" ? $owner->get_OwnerUnitNum() : "NA")?></label>
														<p class="label-style">Unit Number</p>
													</div>

												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="street" class="label-information"><?= ($owner->get_OwnerStreet() != "" ? $owner->get_OwnerStreet() : "NA")?></label>
														<p class="label-style">Street</p>
													</div>

												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="subdivision" class="label-information"><?= ($owner->get_OwnerSubdivision() != "" ? $owner->get_OwnerSubdivision() : "NA")?></label>
														<p class="label-style">Subdivision</p>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="barangay" class="label-information"><?= ($owner->get_OwnerBarangay() != "" ? $owner->get_OwnerBarangay() : "NA")?></label>
														<p class="label-style">Barangay</p>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="city-municipality" class="label-information"><?= ($owner->get_OwnerCityMunicipality() != "" ? $owner->get_OwnerCityMunicipality() : "NA")?></label>
														<p class="label-style">City Municipality</p>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="province" class="label-information"><?= ($owner->get_OwnerProvince() != "" ? $owner->get_OwnerProvince() : "NA")?></label>
														<p class="label-style">Province</p>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="PIN" class="label-information"><?= ($owner->get_OwnerPIN() != "" ? $owner->get_OwnerPIN() : "NA")?></label>
														<p class="label-style">Zip/Postal Code</p>
													</div>
												</div>
											</div>

											<h4 class="page-header">Contact Details</h4>
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label for="email" class="label-information"><?= ($owner->get_OwnerEmail() != "" ? $owner->get_OwnerEmail() : "NA")?></label>
														<p class="label-style">Owner Email</p>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="contact-number" class="label-information"><?= ($owner->get_OwnerContactNum() != "" ? $owner->get_OwnerContactNum() : "NA")?></label>
														<p class="label-style">Contact Number</p>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label for="telephone-number" class="label-information"><?= ($owner->get_OwnerTelNum() != "" ? $owner->get_OwnerTelNum() : "NA")?></label>
														<p class="label-style">Telephone Number (Landline)</p>
													</div>
												</div>
											</div>
									</div>
								</div>
								<div class="col-sm-12">

									<div class="row">

									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- /.panel-body -->
						<?php
						// echo "<h2>This page [view owner] is still under development</h2>";
						// echo '<pre>';
						// print_r($owner);
						// echo '</pre>';
						?>

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
