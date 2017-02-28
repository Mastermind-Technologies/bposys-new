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
						<h3>Manage Owner Information</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>profile/save_owner" method="post" data-parsley-validate="">
							<div class="row">
								<div class="col-sm-12">
									<h4 class="panel-header">Owner Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" required class="form-control" name="fname" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="mname">Middle Name</label>
												<input type="text" class="form-control" name="mname" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" required class="form-control" name="lname" value="">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="suffix">Suffix</label>
												<input type="text" class="form-control" name="suffix" value="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<p>
													<label for="gender">Gender</label>
													<div class="btn-group" style="margin-top:-10px;" role="group" aria-label="gender">
														<button type="button" class="btn btn-default active" id="btn-male">Male</button>
														<button type="button" class="btn btn-default" id="btn-female">Female</button>
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
												<input type="text" required class="form-control" name="house-bldg-no" value="">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="bldg-name">Building Name</label>
												<input type="text" required class="form-control" name="bldg-name" value="">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unit-no">Unit Number</label>
												<input type="text" required class="form-control" name="unit-no" value="">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="street">Street</label>
												<input type="text" required class="form-control" name="street" value="">
											</div>

										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="subdivision">Subdivision</label>
												<input type="text" required class="form-control" name="subdivision" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="barangay">Barangay</label>
												<input type="text" required class="form-control" name="barangay" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="city-municipality">City/Municipality</label>
												<input type="text" required class="form-control" name="city-municipality" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="province">Province</label>
												<input type="text" required class="form-control" name="province" value="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="PIN">Zip/Postal Code</label>
												<input type="text" required class="form-control" name="PIN" value="">
											</div>
										</div>
									</div>
									
									<h4 class="page-header">Contact Details</h4>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" name="email" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="contact-number">Contact Number</label>
												<input type="text" required class="form-control" name="contact-number" value="">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="telephone-number">Telephone Number (Landline)</label>
												<input type="text" class="form-control" name="telephone-number" value="">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3 col-sm-offset-3">
											<input type="submit" value="Save" class="btn btn-success btn-block">
										</div>
										<div class="col-sm-3">
											<a href="<?php echo base_url() ?>dashboard" class="btn btn-danger btn-block">Cancel</a>
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