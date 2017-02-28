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
						<h3>Edit Owner Profile</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>profile/save_edit_owner/<?= str_replace(['/','+','='], ['-','_','='], $owner->get_ownerId()) ?>" method="post" data-parsley-validate="">
							<div class="row">
								<div class="col-sm-12">
									<h4 class="panel-header">Owner Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" required class="form-control" name="fname" value="<?= $owner->get_firstName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="mname">Middle Name</label>
												<input type="text" class="form-control" name="mname" value="<?= $owner->get_middleName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" required class="form-control" name="lname" value="<?= $owner->get_lastName() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="suffix">Suffix</label>
												<input type="text" class="form-control" name="suffix" value="<?= $owner->get_ownersuffix() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<p>
													<label for="gender">Gender</label>
													<div class="btn-group" style="margin-top:-10px;" role="group" aria-label="gender">
														<button type="button" class="btn btn-default <?= $owner->get_ownergender() == 'Male' ? 'active' : '' ?>" id="btn-male">Male</button>
														<button type="button" class="btn btn-default <?= $owner->get_ownergender() == 'Female' ? 'active' : '' ?>" id="btn-female ">Female</button>
														<input type="hidden" name="gender" id="hidden-gender" value="Male">
													</div>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h4 class="page-header">Owner Address</h4>

									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="house-bldg-no">House No./Bldg No.</label>
												<input type="text" required class="form-control" name="house-bldg-no" value="<?= $owner->get_ownerHousebldgno() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="bldg-name">Building Name</label>
												<input type="text" required class="form-control" name="bldg-name" value="<?= $owner->get_ownerBldgName() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unit-no">Unit Number</label>
												<input type="text" required class="form-control" name="unit-no" value="<?= $owner->get_ownerUnitNum() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="street">Street</label>
												<input type="text" required class="form-control" name="street" value="<?= $owner->get_ownerStreet() ?>">
											</div>

										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="subdivision">Subdivision</label>
												<input type="text" required class="form-control" name="subdivision" value="<?= $owner->get_ownerSubdivision() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="barangay">Barangay</label>
												<input type="text" required class="form-control" name="barangay" value="<?= $owner->get_ownerbarangay() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="city-municipality">City/Municipality</label>
												<input type="text" required class="form-control" name="city-municipality" value="<?= $owner->get_ownercityMunicipality() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="province">Province</label>
												<input type="text" required class="form-control" name="province" value="<?= $owner->get_ownerProvince() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="PIN">Zip/Postal Code</label>
												<input type="text" required class="form-control" name="PIN" value="<?= $owner->get_ownerPIN() ?>">
											</div>
										</div>
									</div>

									<h4 class="page-header">Contact Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" name="email" value="<?= $owner->get_ownerEmail() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="contact-number">Contact Number</label>
												<input type="text" required class="form-control" name="contact-number" value="<?= $owner->get_ownerContactNum() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="telephone-number">Telephone Number (Landline)</label>
												<input type="text" class="form-control" name="telephone-number" value="<?= $owner->get_ownertelNum() ?>">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3 col-sm-offset-3">
											<input type="submit" value="Save" class="btn btn-success btn-block">
										</div>
										<div class="col-sm-3">
											<a href="<?php echo base_url() ?>profile/owners" class="btn btn-danger btn-block">Cancel</a>
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

		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- </body> -->
