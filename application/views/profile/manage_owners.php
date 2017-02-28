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
						<h3>Manage Owners <a href="<?php echo base_url(); ?>profile/add_owner" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Owner</a></h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<th>Owner Name</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php foreach ($owner as $key => $o): ?>
									<tr>
										<td>
											<?= $o->get_FirstName()." ".$o->get_LastName() ?>
										</td>
										<td>
											<a href="<?php echo base_url(); ?>profile/view_owner?n=<?=$this->encryption->decrypt($o->get_OwnerId())?>" class="btn btn-primary">View</a>
											<a href="<?php echo base_url(); ?><?= $o->get_IsApplied()==1 ? 'profile/owners#' : 'profile/edit_owner?ownr='.str_replace(['/','+','='], ['-','_','='], $o->get_OwnerId()) ?>" <?= $o->get_IsApplied()==1 ? "disabled data-toggle='tooltip' title='This owner is currently applying for permits/clearances or has an active permit/clearance'" :""?> class="btn btn-warning">Edit</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
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
