<body>
	<div id="content-container">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" value="<?= $user->get_userId() ?>" id="user-id">
						<h1 class="page-header"><?= $user->get_lastName() . ", " . $user->get_firstName() . " (".$user->get_middleName().")" ?></h1>

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3>Applications <button class="btn btn-success" id="btn-edit-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Business Permit Application</button></h3>
							</div>
							<div class="panel-body table-responsive">
								<?php if(count($applications)>0): ?>
									<table id="application-table" class="table table-bordered">
										<th class="text-center">Reference Number</th>
										<th class="text-center">Details</th>
										<th class="text-center">Actions</th>
										<tbody id="application-table-body">
											<?php foreach ($applications as $application): ?>
												<?php if ($application->get_status() != "Cancelled" && $application->get_status() != "Closed"): ?>
													<tr>
														<td style="width:30%;"><p style="margin-top:6%" id="referenceNumber" class="lead text-center text-danger"><?= $this->encryption->decrypt($application->get_referenceNum()) ?></p></td>
														<td style="width:45%;">
															<?php if ($application->get_status() == "Draft"): ?>
																<div style="margin-top:2%" class="row">
																	<div class="col-sm-12">
																		<label for="">Draft Application</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12">
																		<span>Last Edited: <strong><?= date('F j, Y', strtotime($application->get_LastEdited())) ?></strong></span>
																	</div>
																</div>
															<?php else: ?>
																<div style="margin-top:2%" class="row">
																	<div class="col-sm-12">
																		<span>Business Name: <strong><?= $application->get_businessName()?></strong></span>
																		<input type="hidden" value="<?= $this->encryption->encrypt($application->get_applicationId()) ?>" class="hidden-business-id">
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12">
																		<?php if ($application->get_status() == "Expired"): ?>
																			<span class='status'>Status: <span class='label label-danger' style='font-size:14px'><?= $application->get_status() ?></span></span>
																		<?php elseif($application->get_status() == "For Retirement"): ?>
																			<span class='status'>Status: <span class='label label-warning' style='font-size:14px'><?= $application->get_status() ?></span></span>
																		<?php else: ?>
																			<span class='status'>Status: <span class='label label-info' style='font-size:14px'><?= $application->get_status() ?></span></span>
																		<?php endif ?>
																	</div>
																</div>
																<!-- <div class="row">
																	<div class="col-sm-12">
																		<span>Application Type: <span class='label label-info' style='font-size:13px'><?= $application->get_applicationType() ?></span></span>
																	</div>
																</div> -->
															<?php endif ?>
														</td>
														<td style="width:25%;">
															<div style="margin-top:6%" class="block text-center button-container">
																<?php if ($application->get_status() == "Draft"): ?>
																	<a href="<?php echo base_url(); ?>dashboard/draft_application/<?= str_replace(['/','+','='], ['-','_','='], $application->get_referenceNum()) ?>" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
																	<button class="btn btn-danger btn-delete" id="<?php echo base_url(); ?>dashboard/delete_draft/<?= str_replace(['/','+','='], ['-','_','='],$application->get_referenceNum()) ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
																<?php else: ?>
																	<a href="<?php echo base_url('form/view/'.bin2hex($this->encryption->encrypt($application->get_applicationId().'|'.$this->encryption->decrypt($application->get_referenceNum()), $custom_encrypt))); ?>"  id="btn-view-details" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
																	<?php if ($application->get_status() != "Active" && $application->get_status() != "Expired" && $application->get_applicationType() != 'Renew' && $application->get_status() != 'For finalization' && $application->get_status() != 'For Retirement'): ?>
																		<button id="<?php echo base_url('dashboard/cancel_application/'.bin2hex($this->encryption->encrypt($this->encryption->decrypt($application->get_referenceNum()),$custom_encrypt))) ?>" value="Cancel" class="btn btn-danger btn-cancel"><i class="fa fa-ban" aria-hidden="true"></i></button>
																	<?php elseif($application->get_status() == 'Expired'): ?>
																		<a type="button" class="btn btn-warning" href="<?php echo base_url('form/renew/'.bin2hex($this->encryption->encrypt($this->encryption->decrypt($application->get_applicationId()).'|'.$this->encryption->decrypt($application->get_referenceNum()), $custom_encrypt))); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
																	<?php endif ?>
																<?php endif ?>
															</div>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								<?php else: ?>
									<h2 class="text-center text-muted">You have no applications at the moment.</h2>
								<?php endif; ?>


								<div id="test" class="collapse">
									Lorem ipsum dolor text....
								</div>
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
		<!-- /#page-wrapper -->
	</div>
	<!-- Page Content -->
</body>

<?php if($this->session->flashdata('message')): ?>
	<script>
		alert("<?= $this->session->flashdata('message'); ?>");
	</script>
<?php endif; ?>
