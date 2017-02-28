<title>BPOSys | <?= $title ?></title>
<div id="content">
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url(); ?>Bposys_admin/dashboard" class="tip-bottom"><i class="icon-home current"></i> Dashboard</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Admin Dashboard</h1>
	</div>
	<div class="container-fluid">

		<hr>
		<div class="quick-actions_homepage">
			<ul class="quick-actions">
				<li class="bg_lo">
					<a href="<?php echo base_url(); ?>Bposys_admin/users/"> <i class="fa fa-user fa-2x" aria-hidden="true"></i>
						<span class="label label-success">2</span><br><span>Employees</span>
					</a>
				</li>
				<li class="bg_c">
					<a href="<?php echo base_url(); ?>Bposys_admin/users/"> <i class="fa fa-users fa-2x" aria-hidden="true"></i>
						<span class="label label-info">3</span><br>Users Accounts
					</a>
				</li>

			</ul>
		</div>
	</div>
</div>


<?php if($this->session->flashdata('message')): ?>
	<script>
		alert("<?= $this->session->flashdata('message'); ?>");
	</script>
<?php endif; ?>
