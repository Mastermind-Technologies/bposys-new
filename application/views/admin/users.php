<title>BPOSys | <?= $title ?></title>

<div id="content">

	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="#" class="current">Users</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Users</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<a class="btn btn-success" href="<?php echo base_url(); ?>bposys_admin/add_user/"><i class="fa fa-plus" aria-hidden="true"></i> New User</a>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Users</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>User Type</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $key => $user): ?>
							<?php if ($user->get_role() != "Applicant"): ?>
								<tr>
									<td><?= $this->encryption->decrypt($user->get_userId()) ?></td>
									<td><?= $user->get_firstName()." ".$user->get_lastName() ?></td>
									<td><?= $user->get_role() ?></td>
									<td style="text-align: center"><a href="<?php echo base_url(); ?>Bposys_admin/edit_user/" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>	<a href="#" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>


<?php if($this->session->flashdata('message')): ?>
	<script>
		alert("<?= $this->session->flashdata('message'); ?>");
	</script>
<?php endif; ?>
