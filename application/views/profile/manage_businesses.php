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
						<h3>Manage Businesses <a href="<?php echo base_url(); ?>profile/add_business" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Business</a></h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<th>Business Name</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php foreach ($business as $key => $b): ?>
									<tr>
										<td>
											<?= $b->get_BusinessName() ?>
										</td>
										<td>
											<a href="<?php echo base_url(); ?>profile/view_business?n=<?=$this->encryption->decrypt($b->get_BusinessId())?>" class="btn btn-primary">View</a>
											<a href="<?php echo base_url(); ?><?= $b->get_IsApplied()==1 ? 'profile/businesses#' : 'profile/edit_business?app='.str_replace(['/','+','='], ['-','_','='], $b->get_BusinessId()) ?>" <?= $b->get_IsApplied()==1 ? "disabled data-toggle='tooltip' title='This business is currently applying for permits/clearances or has an active permit/clearance'" :""?> class="btn btn-warning">Edit</a>
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
