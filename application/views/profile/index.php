<!-- <body class="content-container"> -->
<!-- Page Content -->
<div style="padding-top:45px;" id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Your Information</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="panel-header">Basic Information</h3>
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label for="fname">First Name</label>
											<h5><?= $user->get_firstName() ?></h5>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="mname">Middle Name</label>
											<h5><?= $user->get_middleName() ?></h5>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="lname">Last Name</label>
											<h5><?= $user->get_lastName() ?></h5>
										</div>

									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="suffix">Suffix</label>
											<h5><?= $user->get_suffix()==null ? "N/A" : $user->get_suffix() ?></h5>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<p>
												<label for="gender">Gender</label>
												<h5><?= $user->get_gender() ?></h5>
											</p>
										</div>

									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Birth date</label>
											<h5><?= $user->get_birthDate() ?></h5>
										</div>

									</div>
									<div class="col-sm-3">
										<label for="civil-staus">Civil Status</label>
										<h5><?= $user->get_civilStatus() ?></h5>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<h3 class="panel-header">Contact Information</h3>
									</div>
									<div class="col-sm-3">
										<label for="email">Email</label>
										<h5><?= $user->get_email() ?></h5>
									</div>
									<div class="col-sm-3">
										<label for="contact-number">Contact Number</label>
										<h5><?= $user->get_ContactNum() ?></h5>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-4 col-sm-offset-4">
										<a href="<?php echo base_url() ?>profile/edit" class="btn btn-warning btn-block">Edit</a>
									</div>
								</div>
							</div>
						</div>


					</div>
					<!-- /.panel-body
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- </body> -->
</div>
</div>

<?php if($this->session->flashdata('message')): ?>
	<script>
		alert("<?= $this->session->flashdata('message'); ?>");
	</script>
<?php endif; ?>
