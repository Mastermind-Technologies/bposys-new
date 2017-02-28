<title>BPOSys | <?= $title ?></title>

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> 
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="<?php echo base_url(); ?>bposys_admin/users">Users</a>
			<a href="#" class="current">Add Users</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Add User</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="fa fa-plus" aria-hidden="true"></i> </span>
						<h5>New Employee Account</h5>
					</div>
					<div class="widget-content">
						<div class="span8">
							<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </span>
									<h5>Personal Details</h5>
								</div>
								<div class="widget-content nopadding">
									<form action="#" method="get" class="form-horizontal">
										<div class="control-group">
											<label class="control-label">First Name :</label>
											<div class="controls">
												<input class="span11" placeholder="First name" type="text" name="firstName">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Last Name :</label>
											<div class="controls">
												<input class="span11" placeholder="Last name" type="text" name="lastName">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Middle Name :</label>
											<div class="controls">
												<input class="span11" placeholder="Middle name" type="text" name="middleName">
											</div>
										</div>
										<div class="control-group">
											<label for="checkboxes" class="control-label">Gender</label>
											<div class="controls">
												<div data-toggle="buttons-radio" class="btn-group">
													<button class="btn btn-primary active" type="button" name="genderMale">Male</button>
													<button class="btn btn-primary" type="button" name="genderFemale">Female</button>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Contact Details :</label>
											<div class="controls">
												<input id="number" class="span11" placeholder="Contact Details" type="text" name="contactDetails">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="span4">
							<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="fa fa-info" aria-hidden="true"></i> </span>
									<h5>Staff Details</h5>
								</div>
								<div class="widget-content nopadding">
									<form action="#" method="get" class="form-horizontal">
										<div class="control-group">
											<label class="control-label">Select input</label>
											<div class="controls">
												<abbr class="select2-search-choice-close" style="display:none;"></abbr>
												<div><b></b></div></a>
												<div class="select2-drop select2-offscreen">
													<div class="select2-search">
														<input autocomplete="off" class="select2-input" tabindex="0" type="text" name="role">
													</div>
													<ul class="select2-results">
													</ul>
												</div>
												<select style="display: none;">
													<option>Business Permit and Licensing Office</option>
													<option>City Planning and Development Office</option>
													<option>City Health Office</option>
													<option>City Environment and Natural Resources Office</option>
													<option>Office of the Building Official</option>
													<option>Bureau of Fire Protection</option>
												</select>
											</div>
										</div>
									</form>
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
										<form action="#" method="get" class="form-horizontal">
											<div class="control-group">
												<label class="control-label">Email Address :</label>
												<div class="controls">
													<input id="email" class="span11" placeholder="Email Address" type="text" name="emailAddress">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">Password :</label>
												<div class="controls">
													<input class="span11" placeholder="Enter Password" type="password" name="password">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">Confirm Password :</label>
												<div class="controls">
													<input class="span11" placeholder="Confirm Password" type="password" name="confirmPassword">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
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
