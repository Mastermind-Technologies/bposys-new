<body class="content-container">
	<!-- Page Content -->
	<div style="padding-top:45px;" id="page-wrapper">
		<div class="container-fluid">

			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"> <!--bootstrap error div-->
					<?=$this->session->flashdata('error')?>
				</div>
			<?php endif; ?>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Application Details</h3>
				</div>

				<!-- class "colored-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom" -->
				<div class="panel-body" style="background-color: #f9f9f9">
					<h3>Business: <?= $application->get_businessName() ?> </h3>
					<h3>Reference Number: <strong class="text-danger"><?= $this->encryption->decrypt($application->get_referenceNum()) ?></strong></h3>
					<h3>Status: <?= $application->get_status()=="Expired"
						? '<span class="label label-danger">'.$application->get_status().'</span>'
						: '<span class="label label-primary">'.$application->get_status().'</span>' ?></h3>
						<hr>
						<div class="mdl-card mdl-shadow--2dp">
							<div class="mdl-card__supporting-text">
								<div class="mdl-stepper-horizontal-alternative">
									<?php if ($application->get_applicationType() == "New" && $application->get_status() != "Expired"): ?>
										<div class="mdl-stepper-step active-step step-done">
											<div class="mdl-stepper-circle"><span>1</span></div>
											<div class="mdl-stepper-title">Submit an Online Application</div>
											<div class="mdl-stepper-bar-left"></div>
											<div class="mdl-stepper-bar-right"></div>
										</div>
									<?php else: ?>
										<div class="mdl-stepper-step <?= $application->get_status() == "Expired" ? 'active-step' : 'active-step step-done' ?>">
											<div class="mdl-stepper-circle"><span>1</span></div>
											<div class="mdl-stepper-title">Submit Online Renewal Application</div>
											<div class="mdl-stepper-bar-left"></div>
											<div class="mdl-stepper-bar-right"></div>
										</div>
									<?php endif ?>
									<div class="mdl-stepper-step <?=
									//conditions for active-step
									$application->get_status() == "Visit the Office of the Building Official" ||
									$application->get_status() == "For applicant visit" ||
									$application->get_status() == "On process" ||
									$application->get_status() == "Completed" ||
									$application->get_status() == "Active"
									? 'active-step' : '' ?>
									<?=
									//conditions for step-done
									$application->get_status() == "For applicant visit" ||
									$application->get_status() == "On process" ||
									$application->get_status() == "Completed" ||
									$application->get_status() == "Active"
									? 'step-done' : '' ?>">
									<div class="mdl-stepper-circle"><span>2</span></div>
									<div class="mdl-stepper-title">Visit the Office of the Building Offiial</div>
									<div class="mdl-stepper-optional"></div>
									<div class="mdl-stepper-bar-left"></div>
									<div class="mdl-stepper-bar-right"></div>
								</div>
								<div class="mdl-stepper-step <?=
									//conditions for active-step
									$application->get_status() == "For applicant visit" ||
									$application->get_status() == "On process" ||
									$application->get_status() == "Completed" ||
									$application->get_status() == "Active"
								? 'active-step' : '' ?>
								<?=
									//conditions for step-done
									$application->get_status() == "On process" ||
									$application->get_status() == "Completed" ||
									$application->get_status() == "Active"
								? 'step-done' : '' ?>"> <!-- <div class="mdl-stepper-step active-step"> -->
								<div class="mdl-stepper-circle"><span>3</span></div>
								<div class="mdl-stepper-title">Interview and Assessment of Fees</div>
								<div class="mdl-stepper-optional"></div>
								<div class="mdl-stepper-bar-left"></div>
								<div class="mdl-stepper-bar-right"></div>
							</div>
							<div class="mdl-stepper-step <?=
									//conditions for active-step
							$application->get_status() == "On process" ||
							$application->get_status() == "Active"
							? 'active-step' : '' ?>
							<?=
							$application->get_status() == "Active" ||
							$application->get_status() == "Completed"
							? 'step-done' : '' ?>">
							<div class="mdl-stepper-circle"><span>4</span></div>
							<div class="mdl-stepper-title">Complete Requirements</div>
							<div class="mdl-stepper-optional"></div>
							<div class="mdl-stepper-bar-left"></div>
							<div class="mdl-stepper-bar-right"></div>
						</div>

						<div class="mdl-stepper-step <?=
									//conditions for active-step
						$application->get_status() == "Active"
						? 'active-step' : '' ?>
						<?=
						$application->get_status() == "Active"
						? 'step-done' : '' ?>">
						<div class="mdl-stepper-circle"><span>5</span></div>
						<div class="mdl-stepper-title">Claim Business Permit</div>
						<div class="mdl-stepper-optional"></div>
						<div class="mdl-stepper-bar-left"></div>
						<div class="mdl-stepper-bar-right"></div>

					</div>
				</div>
			</div>
		</div>



	<div class="row" style="padding: 15px">
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th style="text-align:center">Requirement</th>
						<th style="text-align:center">Office/Agency</th>
						<th style="text-align:center">Status</th>
						<th style="text-align:center">Action</th>
					</tr>
					<tr class="success">
						<td>DTI/SEC/CDA Registration</td>
						<td>DTI/SEC/CDA</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
						<td style="text-align:center"><!-- <button type="button" class="btn btn-primary">View Details</button> --></td>
					</tr>
					<tr class="success">
						<td>Barangay Clearance</td>
						<td>Barangay</td>
						<td style="text-align:center"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
						<td style="text-align:center"><!-- <button type="button" class="btn btn-primary">View Details</button> --></td>
					</tr>
					<tr class="<?= isset($engineering[0]->createdAt) ? 'success' : 'danger' ?>">
						<td>Engineering Clearance</td>
						<td>Office of the Building Official</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon <?= isset($engineering[0]->createdAt) ? 'glyphicon-ok' : 'glyphicon-remove' ?>" aria-hidden="true"></span></td>
						<td style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEngineering">View Details</button></td>
					</tr>
					<tr class="<?= isset($sanitary[0]->createdAt) ? 'success' : 'danger' ?>">
						<td>Sanitary Permit/Health Clearance</td>
						<td>City Health Office</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($sanitary[0]->createdAt) ? 'glyphicon-ok' : 'glyphicon-remove' ?>" aria-hidden="true"></span></td>
						<td style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCHO">View Details</button></td>
					</tr>
					<tr class="<?= isset($cenro[0]->createdAt) ? 'success' : 'danger' ?>">
						<td>City Environmental Certificate</td>
						<td>City Environmental and Natural Resources Office</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($cenro[0]->createdAt) ? 'glyphicon-ok' : 'glyphicon-remove' ?>" aria-hidden="true"></span></td>
						<td style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCenro">View Details</button></td>
					</tr>
					<tr class="<?= isset($bfp[0]->createdAt) ? 'success' : 'danger' ?>">
						<td>Fire Safety Inspection Certificate</td>
						<td>Bureau of Fire Protection</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($bfp[0]->createdAt) ? 'glyphicon-ok' : 'glyphicon-remove' ?>" aria-hidden="true"></span></td>
						<td style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBFP">View Details</button></td>
					</tr>
					<tr class="<?= isset($zoning[0]->createdAt) ? 'success' : 'danger' ?>">
						<td>Zoning Clearance</td>
						<td>City Planning & Development Office</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($zoning[0]->createdAt) ? 'glyphicon-ok' : 'glyphicon-remove' ?>" aria-hidden="true"></span></td>
						<td style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalZoning">View Details</button></td>
					</tr>
				</div>

			</table>
		</div>
		<div style="text-align: center">
			<?php if ($application->get_status() == "Active" || $application->get_status() == "Expired" || $application->get_applicationType() == "Renew" && $application->get_status() != "For Retirement"): ?>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#model-retire"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Retire Business</button>
			<?php endif ?>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalReference"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
		</div>



		</div>



	</div>
</div>
</div>

<!-- /.panel-body -->
</div>


<!-- Modal -->
<div id="modalReference" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Reference Number</h4>
			</div>
			<div class="modal-body">
				<h3>Reference Number: <strong class="text-danger"><?= $this->encryption->decrypt($application->get_referenceNum()) ?></strong></h3>
				<div class="alert alert-info">
					<label style="font-size: 11px;font-weight: lighter"><i>Note: Printing of reference number is optional. You can either write it on a clean piece of paper or take a picture of it.</i></label>
	      </div>

				<div>
					<a href="<?php echo base_url(); ?>/dashboard/get_reference_info" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Reference</a>&nbsp;<a href="<?php echo base_url(); ?>/dashboard/get_bplo_form_info" class="btn btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Form</a><label style="font-size: 11px;font-weight: lighter"><i>&nbsp; Note: Printing of application form is not required.</i></label>
				</div>
		  </div>
	  </div>
  </div>
</div>

<div id="modalEngineering" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Engineering Clearance</h4>
			</div>
			<div class="modal-body">
				<p>Status: <span class="badge"><?= isset($engineering[0]->createdAt) ? 'Issued' : 'Incomplete' ?></span></p>
				<p>Date of Completion: <?= isset($engineering[0]->createdAt) ? $engineering[0]->createdAt : 'Incomplete' ?></p>
			</div>



	</div>
</div>
</div>

<div id="modalCHO" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Sanitary Permit</h4>
			</div>
			<div class="modal-body">
				<p>Status: <span class="badge"><?= isset($sanitary[0]->createdAt) ? 'Issued' : 'Incomplete' ?></span></p>
				<p>Date of Completion: <?= isset($sanitary[0]->createdAt) ? $sanitary[0]->createdAt : 'Incomplete' ?></p>

				<table class="table table-bordered">
					<tr>
						<th style="text-align:center">Requirement</th>
						<th style="text-align:center">Status</th>
					</tr>
					<tr class="<?= isset($checklist['requirement17']) ? 'success' : 'danger' ?>">
						<td>Health Card per Employee</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon <?= isset($checklist['requirement17']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement18']) ? 'success' : 'danger' ?>">
						<td>Water Analysis</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement18']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement19']) ? 'success' : 'danger' ?>">
						<td>Vermin and Rodent Control</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement19']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>

			</table>
			<div>
				<a href="<?php echo base_url(); ?>/dashboard/get_sanitary_info" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Form</a><label style="font-size: 11px;font-weight: lighter"><i>&nbsp;Note: Printing of application form is not required.</i></label>
			</div>
		</div>
		</div>

	</div>
</div>

<div id="modalCenro" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Environmental Clearance</h4>
			</div>
			<div class="modal-body">
				<p>Status: <span class="badge"><?= isset($cenro[0]->createdAt) ? 'Issued' : 'Incomplete' ?></span></p>
				<p>Date of Completion: <?= isset($cenro[0]->createdAt) ? $cenro[0]->createdAt : 'Incomplete' ?></p>

				<table class="table table-bordered">
					<tr>
						<th style="text-align:center">Requirement</th>
						<th style="text-align:center">Status</th>
					</tr>
					<tr class="<?= isset($checklist['requirement12']) ? 'success' : 'danger' ?>">
						<td>Certificate of Non-Coverage</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon <?= isset($checklist['requirement12']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement13']) ? 'success' : 'danger' ?>">
						<td>Environmental Compliance Certificate</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement13']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement14']) ? 'success' : 'danger' ?>">
						<td> 	Laguna Lake Development Authority Certificate (LLDA)</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement14']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement15']) ? 'success' : 'danger' ?>">
						<td>DTI/SEC/CDA Permit</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement15']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement16']) ? 'success' : 'danger' ?>">
						<td>Barangay Clearance</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement16']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>

			</table>
			<div>
				<a href="<?php echo base_url(); ?>/dashboard/get_cenro_info" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Form</a><label style="font-size: 11px;font-weight: lighter"><i>&nbsp;Note: Printing of application form is not required.</i></label>
			</div>
			</div>
		</div>
	</div>
</div>

<div id="modalBFP" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Fire Safety Inspection Certificate</h4>
			</div>
			<div class="modal-body">
				<p>Status: <span class="badge"><?= isset($bfp[0]->createdAt) ? 'Issued' : 'Incomplete' ?></span></p>
				<p>Date of Completion: <?= isset($bfp[0]->createdAt) ? $bfp[0]->createdAt : 'Incomplete' ?></p>

				<table class="table table-bordered">
					<tr>
						<th style="text-align:center">Requirement</th>
						<th style="text-align:center">Status</th>
					</tr>
					<tr class="<?= isset($checklist['requirement20']) ? 'success' : 'danger' ?>">
						<td>Fire Safety Evaluation Clearance</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon <?= isset($checklist['requirement20']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement21']) ? 'success' : 'danger' ?>">
						<td>Building Permit</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement21']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement22']) ? 'success' : 'danger' ?>">
						<td>FSIC for Occupancy</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement22']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement23']) ? 'success' : 'danger' ?>">
						<td>Fire Insurance Policy</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement23']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement24']) ? 'success' : 'danger' ?>">
						<td>Copy of Contract List (If renting)</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement24']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement25']) ? 'success' : 'danger' ?>">
						<td>Receipt of Realty Tax (If own)</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement25']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement26']) ? 'success' : 'danger' ?>">
						<td>Proof of Service and Maintenance of Fire Fighting Equipment</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement26']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement27']) ? 'success' : 'danger' ?>">
						<td>Picture of Establishment (Exterior/Interior)</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement27']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
			</table>
			<div>
				<a href="<?php echo base_url(); ?>/dashboard/get_bfp_info" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Form</a><label style="font-size: 11px;font-weight: lighter"><i>&nbsp;Note: Printing of application form is not required.</i></label>
			</div>
			</div>
		</div>

	</div>
</div>

<div id="modalZoning" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Zoning Application</h4>
			</div>
			<div class="modal-body">
				<p>Status: <span class="badge"><?= isset($zoning[0]->createdAt) ? 'Issued' : 'Incomplete' ?></span></p>
				<p>Date of Completion: <?= isset($zoning[0]->createdAt) ? $zoning[0]->createdAt : 'Incomplete' ?></p>

				<table class="table table-bordered">
					<tr>
						<th style="text-align:center">Requirement</th>
						<th style="text-align:center">Status</th>
					</tr>
					<tr class="<?= isset($checklist['requirement8']) ? 'success' : 'danger' ?>">
						<td>Building Plan</td>
						<td style="text-align:center"><span style="text-align:center" class="glyphicon <?= isset($checklist['requirement8']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement9']) ? 'success' : 'danger' ?>">
						<td>Barangay Clearance</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement9']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement10']) ? 'success' : 'danger' ?>">
						<td>Realty Tax Receipt</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement10']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>
					<tr class="<?= isset($checklist['requirement11']) ? 'success' : 'danger' ?>">
						<td>Certificate of Land Title</td>
						<td style="text-align:center"><span class="glyphicon <?= isset($checklist['requirement11']) ? 'glyphicon-ok' : 'glyphicon-remove'  ?>" aria-hidden="true"></span></td>
					</tr>

			</table>
			<div>
				<a href="<?php echo base_url(); ?>/dashboard/get_zoning_info" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Form</a><label style="font-size: 11px;font-weight: lighter"><i>&nbsp;Note: Printing of application form is not required.</i></label>
			</div>
		</div>
		</div>

	</div>

	</div>


				<!-- <div class="boxes">
				  <input type="checkbox" id="box-1">
				  <label for="box-1">Billy Pogi</label>

				  <input type="checkbox" id="box-2" checked>
				  <label for="box-2">Billy mas pogi </label>

				  <input type="checkbox" id="box-3">
				  <label for="box-3">Billy super pogi</label>
				</div> -->

				<!---
				<h4>Select form to view:</h4>
				<div class="row" style="margin:0">
					<ul  class="nav nav-tabs">
						<li class="active">
							<a  href="#bploform" class="testing" data-toggle="tab">BPLO</a>
						</li>
						<li><a href="#zoningform" data-toggle="tab">Zoning</a>
						</li>
						<li><a href="#engineeringform" data-toggle="tab">Engineering</a>
						</li>
						<li><a href="#healthdeptform" data-toggle="tab">Health Dept.</a>
						</li>
						<li><a href="#firedeptform" data-toggle="tab">Fire Dept.</a>
						</li>
						<li><a href="#cenroform" data-toggle="tab">CENRO</a>
						</li>
					</ul>
				</div>
				<div class="row">

					<div class="tab-content clearfix">
						<div class="tab-pane active" id="bploform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>BPLO Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Submit an Online Application</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step"> <div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>3</span></div>
													<div class="mdl-stepper-title">Interview and Assessment</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Business Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">
										<table class="application-form-table">
											<tr class="application-form-table-row">
												<td>
													<label for="date_of_application">Date of Application</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="dti_registration_number">DTI/SEC/CDA Registration No.</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="reference_no">Reference No.</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="dti_date_of_registration">DTI/SEC/CDA Date of Registration</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="type_of_organization">Type of Organization</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="ctc_no">CTC No.</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="tin">TIN</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="is_enjoying_tax_incentives">Tax incentive from any Government Entity?</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="specified_entity">Specified Entity:</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="name_of_tax_payer">Name of Tax Payer</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="business_name">Business Name</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="trade_name_franchise">Trade Name/ Franchise</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="name_of_president_or_treasurer">Name of President/ Treasurer of Corporation</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td style="text-align:center">
													<h4 style="font-weight: bolder">Business Address</h4>
												</td>
												<td style="text-align:center">
													<h4 style="font-weight: bolder">Owner's Address Address</h4>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_house_no">House No. / Bldg. No.</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_house_no">House No. / Bldg. No.</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_building_name">Building Name</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_building_name">Building Name</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_unit_no">Unit No.</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_unit_no">Unit No.</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_street">Street</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_street">Street</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_brgy">Barangay</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_brgy">Barangay</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_subdivision">Subdivision</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_subdivision">Subdivision</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_city_municipality">City/ Municipality</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_city_municipality">City/ Municipality</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_province">Province</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_city_province">Province</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_tel_no">Tel No.</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_tel_no">Tel No.</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_email_address">Email Address</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_email_address">Email Address</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_property_index_no">Property Index Number (PIN)</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_business_area">Business Area (in sq. m.)</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="business_address_no_of_employees_in_establishment">Property Index Number (PIN)</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="owners_address_no_of_employees_residing_in_lgu">Business Area (in sq. m.)</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="lessors_name">Lessor's Name</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td colspan="2">
													<label for="lessors_address">Lessor's Address</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="lessor_monthly_rental">Monthly Rental</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="lessor_tel_cel_no">Tel No./ Cel.No.</label>
													<h5>???</h5>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td>
													<label for="lessor_email_address">Email Address</label>
													<h5>???</h5>
												</td>
												<td>
													<label for="lessor_in_case_of_emergency">In case of emergency</label>
													<h5>???</h5>
												</td>
											</tr>


										</table>
										<table class="application-form-table" style="text-align:center">
											<tr class="application-form-table-row">
												<td colspan="6" style="text-align:center">
													<label for="business_activities">BUSINESS ACTIVITY</label>
												</td>
											</tr>
											<tr class="application-form-table-row">
												<td rowspan="2" style="width: 15%">
													<label for="business_activity_code">Code</label>
												</td>
												<td rowspan="2" style="width: 30%">
													<label for="business_activity_line_of_business">Line of Business</label>
												</td>
												<td rowspan="2" style="width: 10%">
													<label for="business_activity_no_of_units">No. of Units</label>
												</td>
												<td rowspan="2" style="width: 20%">
													<label for="business_activity_capitalization">Capitalization</label>
												</td>
												<td colspan="2" style="width: 25%">
													<label for="business_activity_gross_sales_receipt">Gross Sales/ Receipts</label>
												</td>
											</tr>
											<tr>
												<td style="width: 10%">
													<label for="business_activity_essential">Essential</label>
												</td>
												<td style="width: 10%">
													<label for="business_non_essential">Non-essential</label>
												</td>
											</tr>
											<tr>
												<td style="width: 15%">
													<h5>???</h5>
												</td>
												<td style="width: 30%">
													<h5>???</h5>
												</td>
												<td style="width: 10%">
													<h5>???</h5>
												</td>
												<td style="width: 20%">
													<h5>???</h5>
												</td>
												<td style="width: 10%">
													<h5>???</h5>
												</td>
												<td style="width: 10%">
													<h5>???</h5>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>





						</div>
						<div class="tab-pane" id="zoningform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Zoning Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Visit City Planning and Development Office</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Zoning Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">


									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="engineeringform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Engineering Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Visit City Engineering Office</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Engineering Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">


									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="healthdeptform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Health Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Visit City Health Office</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Sanitary Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">


									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="firedeptform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Fire Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Visit Bureau of Fire Protection Biñan</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Fire Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">


									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="cenroform">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>CENRO Application Form</h3>
								</div>
								<div class="panel-body">

									<div class="mdl-card mdl-shadow--2dp">
										<div class="mdl-card__supporting-text">
											<div class="mdl-stepper-horizontal-alternative">
												<div class="mdl-stepper-step active-step step-done">
													<div class="mdl-stepper-circle"><span>1</span></div>
													<div class="mdl-stepper-title">Visit City Environmental and Natural Resources Office</div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step active-step">
													<div class="mdl-stepper-circle"><span>2</span></div>
													<div class="mdl-stepper-title">Submit Requirements</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
												<div class="mdl-stepper-step">
													<div class="mdl-stepper-circle"><span>4</span></div>
													<div class="mdl-stepper-title">Claim Environmental Permit</div>
													<div class="mdl-stepper-optional"></div>
													<div class="mdl-stepper-bar-left"></div>
													<div class="mdl-stepper-bar-right"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="application-form">


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				--->


        <!-- <div class="row">
          <div class="col-lg-6 view-application-thumbnail">

          </div>
          <div class="col-lg-6 view-application-thumbnail">

          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 view-application-thumbnail">

          </div>
          <div class="col-lg-6 view-application-thumbnail">

          </div>
      </div> -->

      <div id="modal-bplo-requirements" class="modal fade" role="dialog">
      	<div class="modal-dialog">

      		<!-- Modal content-->
      		<div class="modal-content">
      			<div class="modal-header">
      				<button type="button" class="close" data-dismiss="modal">&times;</button>
      				<h4 class="modal-title">Business Permit Requirements <span class="badge">2/7</span></h4>
      			</div>
      			<div class="modal-body">

      				<div class="row">
      					<div class="col-sm-12">
      						<div class="table-responsive">
      							<table class="table table-bordered">
      								<tr>
      									<th>Requirement</th>
      									<th>Office/Agency</th>
      									<th>Status</th>
      								</tr>
      								<tr class="success">
      									<td>DTI/SEC/CDA Registration</td>
      									<td>DTI/SEC/CDA</td>
      									<td style="text-align:center"><span style="text-align:center" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="success">
      									<td>Engineering Clearance</td>
      									<td>Office of the Building Official</td>
      									<td style="text-align:center"><span style="text-align:center" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="danger">
      									<td>Barangay Clearance</td>
      									<td>Barangay</td>
      									<td style="text-align:center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="danger">
      									<td>Sanitary Permit/Health Clearance</td>
      									<td>City Health Office</td>
      									<td style="text-align:center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="danger">
      									<td>City Environmental Certificate</td>
      									<td>City Environmental and Naturao Resources Office</td>
      									<td style="text-align:center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="danger">
      									<td>Fire Safety Inspection Certificate</td>
      									<td>Bureau of Fire Protection</td>
      									<td style="text-align:center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
      								</tr>
      								<tr class="danger">
      									<td>Zoning Clearance</td>
      									<td>City Planning & Development Office</td>
      									<td style="text-align:center"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
      								</tr>
      							</div>

      						</table>
      					</div>
      				</div>

      				<hr>

      			</form>

      		</div>

      	</div>
      </div>


  </div>
  <!-- /.container-fluid -->
</div>

<!-- Modal -->
<div id="model-retire" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Retire Business</h4>
			</div>
			<div class="modal-body">

				<form action="<?php echo base_url(); ?>form/submit_retirement/<?= str_replace(['/','+','='], ['-','_','='],  $application->get_referenceNum()) ?>" method="post" data-parsley-validate="">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Business Name</label>
								<br>
								<span><?= $application->get_businessName() ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Business Address:</label>
								<br>
								<span><?=$application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . ", " . $application->get_Subdivision() . ", " . $application->get_barangay() . ", " . $application->get_cityMunicipality() . ", " . $application->get_province()?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Owner's Name</label>
								<br>
								<span><?= $application->get_firstName()." ".$application->get_middleName()." ".$application->get_lastName() ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Owner Address</label>
								<br>
								<span><?=$application->get_ownerbldgName() . " " . $application->get_ownerhouseBldgNo() . " " . $application->get_ownerunitNum() . " " . $application->get_ownerstreet() . ", " . $application->get_ownerSubdivision() . ", " . $application->get_ownerbarangay() . ", " . $application->get_ownercityMunicipality() . ", " . $application->get_ownerprovince()?></span>
							</div>
						</div>
					</div>
					<table class="table table-bordered">

						<tr>
							<th></th>
							<th></th>
							<th colspan='2' class='text-center'>Gross Sales/Receipt</th>
						</tr>
						<tr>
							<th class='text-center'>Line of Business</th>
							<th class='text-center'>Last Capital/Gross Declared</th>
							<th class='text-center'>Essential</th>
							<th class='text-center'>Non-Essential</th>
						</tr>

						<tbody>
							<?php foreach ($application->get_businessactivities() as $key => $activity): ?>
								<tr>
									<td>
										<?= $activity->lineOfBusiness ?>
										<input type="hidden" name="activity-id[]" required value="<?= $activity->activityId ?>">
									</td>
									<td>
										<span class="pull-right"><?= number_format($application->get_applicationType() == "New" ? $activity->capitalization : $activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials, 2) ?></span>
									</td>
									<td><input type="text" data-parsley-type="digits" class="form-control" required name="essentials[]"></td>
									<td><input type="text" data-parsley-type="digits" class="form-control" required name="non-essentials[]"></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Reason for retirement / Closure of Business</label>
								<textarea name="reason" id="reason" cols="10" rows="2" required class="form-control"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" class="btn btn-primary btn-block" value="Submit Retirement">
						</div>
					</div>

					<hr>

				</form>

			</div>

		</div>
	</div>
	<!-- </body> -->
	<script>
		$(document).ready(function(){
			$("a").tooltip();
		});
	</script>
