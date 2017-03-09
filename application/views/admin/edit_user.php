<title>BPOSys | <?= $title ?></title>

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> 
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="<?php echo base_url(); ?>bposys_admin/users">Users</a>
			<a href="#" class="current">Edit User</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Add User</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">×</button>
				<?= $this->session->flashdata('error') ?>
			</div>
		<?php endif ?>

		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="fa fa-plus" aria-hidden="true"></i> </span>
						<h5>New Employee Account</h5>
					</div>
					<form action="<?php echo base_url(); ?>bposys_admin/save_edit_user/<?= str_replace(['/','+','='], ['-','_','='], $user->get_userId())?>" method="post" class="form-horizontal">
						<div class="widget-content">
							<div class="span8">
								<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
										<h5>Personal Details</h5>
									</div>
									<div class="widget-content nopadding">

										<div class="control-group">
											<label class="control-label">First Name :</label>
											<div class="controls">
												<input class="span11" placeholder="First name" required type="text" name="firstName" value="<?= $user->get_firstName() ?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Last Name :</label>
											<div class="controls">
												<input class="span11" placeholder="Last name" required type="text" name="lastName" value="<?= $user->get_lastName() ?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Middle Name :</label>
											<div class="controls">
												<input class="span11" placeholder="Middle name" type="text" name="middleName" value="<?= $user->get_middleName() ?>">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Suffix :</label>
											<div class="controls">
												<input class="span2" placeholder="Suffix" type="text" name="middleName" value="<?= $user->get_suffix() ?>">
											</div>
										</div>
										<div class="control-group">
											<label for="checkboxes" class="control-label">Gender :</label>
											<div class="controls">
												<div data-toggle="buttons-radio" class="btn-group">
													<button class="btn btn-primary <?= $user->get_gender()=="Male" ? 'active' : '' ?>" type="button" id='gender-male' name="genderMale">Male</button>
													<button class="btn btn-primary <?= $user->get_gender()=="Female" ? 'active' : '' ?>" type="button" id='gender-female' name="genderFemale">Female</button>
													<input type="hidden" name="hidden-gender" id='hidden-gender' value="<?= $user->get_gender()=="Male" ? 'Male' : 'Female' ?>">
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Civil Status :</label>
											<div class="controls">
												<select name="civilStatus" id="civilStatus">
													<option selected disabled>Select Civil Status</option>
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
										<div class="control-group">
											<label class="control-label">Birthdate :</label>
											<div class="controls">
												<input type="text" placeholder='mm/dd/yyyy' value="<?= $user->get_birthdate() ?>" name='birthdate' id='birthdate' class="span11">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Contact Number (Cellphone) :</label>
											<div class="controls">
												<input id="number" class="span11" value="<?= $user->get_contactNum() ?>" placeholder="Contact Number" type="text" name="contactNumber">
											</div>
										</div>

									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span8">
									<div class="widget-box">
										<div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
											<h5>Account Details</h5>
										</div>
										<div class="widget-content nopadding">

											<div class="control-group">
												<label class="control-label">Email Address :</label>
												<div class="controls">
													<input id="email" class="span11" value="<?= $user->get_email() ?>" disabled placeholder="Email Address" required type="text" name="emailAddress">
												</div>
											</div>

										</div>
										
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<div class="span8">
									<div class="widget-box">
										<div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
											<h5>Staff Details</h5>
										</div>
										<div class="widget-content nopadding">
											
											<div class="control-group">
												<label class="control-label">Designated Office:</label>
												<div class="controls">
													<select required name='role' style="display: none;">
														<option selected disabled>Select Office</option>
														<option <?= $user->get_role()=="4"? "selected" : '' ?> value="4">Business Permit and Licensing Office (BPLO)</option>
														<option <?= $user->get_role()=="8"? "selected" : '' ?> value="8">City Planning and Development Office (Zoning)</option>
														<option <?= $user->get_role()=="10"? "selected" : '' ?> value="10">City Health Office (CHO)</option>
														<option <?= $user->get_role()=="7"? "selected" : '' ?> value="7">City Environment and Natural Resources Office (CENRO)</option>
														<option <?= $user->get_role()=="9"? "selected" : '' ?> value="9">Office of the Building Official (Engineering)</option>
														<option <?= $user->get_role()=="5"? "selected" : '' ?> value="5">Bureau of Fire Protection (BFP)</option>
													</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label">Permission Level:</label>
												<div class="controls">
													<select required name='permissionLevel' style="display: none;">
														<option selected disabled>Select Permission Level</option>
														<option <?= $user->get_permissionLevel()=="1" ? "selected" : "" ?> value="1">1 (Limited)</option>
														<option <?= $user->get_permissionLevel()=="2" ? "selected" : "" ?> value="2">2 (All)</option>
													</select>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<div class="add-form" style="text-align: center">
							<input value="Submit" class="btn btn-success" type="submit" name="btnSubmit" style="right">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if($this->session->flashdata('message')): ?>
		<script>
			alert("<?= $this->session->flashdata('message'); ?>");
		</script>
	<?php endif; ?>
