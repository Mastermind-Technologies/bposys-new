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

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Edit Information</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>profile/save_edit_info" method="post" data-parsley-validate="">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="panel-header">Basic Information</h3>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" required class="form-control" name="fname" value="<?= $user->get_firstName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="mname">Middle Name</label>
												<input type="text" class="form-control" name="mname" value="<?= $user->get_middleName() ?>">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" required class="form-control" name="lname" value="<?= $user->get_lastName() ?>">
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="suffix">Suffix</label>
												<input type="text" class="form-control" name="suffix" value="<?= $user->get_suffix() ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<p>
													<label for="gender">Gender</label>
													<div class="btn-group" style="margin-top:-10px;" role="group" aria-label="gender">
														<button type="button" class="btn btn-default <?= $user->get_gender()=='Male' ? 'active' : '' ?>" id="btn-male">Male</button>
														<button type="button" class="btn btn-default <?= $user->get_gender()=='Female' ? 'active' : '' ?>" id="btn-female">Female</button>
														<input type="hidden" name="gender" id="hidden-gender" value="<?= $user->get_gender()=='Male' ? 'Male' : 'Female' ?>">
													</div>
												</p>
											</div>

										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="">Birth date</label>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<div class="input-group date">
																<input type="text" required id="datetimepicker1" name="birth-date" class="form-control" data="DateTimePicker" value="<?= $user->get_birthDate() ?>" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
															</div>
														</div>
													</div>
												</div>
												<script>
													$(document).ready(function(){
														$('#datetimepicker1').datetimepicker({
															format: 'MM/DD/YYYY',
															viewMode: 'years'
														});
													});
												</script>
											</div>

										</div>
										<div class="col-sm-3">
											<label for="civil-staus">Civil Status</label>
											<div class="form-group">
												<select class="form-control" required name="civil-status" id="civil-status">
													<option <?= $user->get_civilStatus()=="" ? 'selected' : '' ?> disabled select>Civil Status</option>
													<option <?= $user->get_civilStatus()=="Single" ? 'selected' : '' ?> value="Single">Single</option>
													<option <?= $user->get_civilStatus()=="Married" ? 'selected' : '' ?> value="Married">Married</option>
													<option <?= $user->get_civilStatus()=="Separated" ? 'selected' : '' ?> value="Separated">Separated</option>
													<option <?= $user->get_civilStatus()=="Widowed" ? 'selected' : '' ?> value="Widowed">Widowed</option>
													<option <?= $user->get_civilStatus()=="Divorced" ? 'selected' : '' ?> value="Divorced">Divorced</option>
													<option <?= $user->get_civilStatus()=="Annulled" ? 'selected' : '' ?> value="Annulled">Annulled</option>
													<option <?= $user->get_civilStatus()=="Widower" ? 'selected' : '' ?> value="Widower">Widower</option>
													<option <?= $user->get_civilStatus()=="Single Parent" ? 'selected' : '' ?> value="Single Parent">Single Parent</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h3 class="panel-header">Contact Information</h3>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" class='form-control' name='email' value="<?= $user->get_email() ?>">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="contact-number">Contact Number</label>
										<input type="text" class='form-control' name='contact-number' value="<?= $user->get_contactNum() ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 col-sm-offset-4">
									<input type="submit" class='btn btn-success btn-block' value='Submit'>
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
