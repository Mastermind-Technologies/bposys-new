<title>BPOSys | <?= $title ?></title>

<div id="content">

	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="#" class="current">Applications</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Applications</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Applications</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>Reference Number</th>
							<th>User</th>
							<th>Business Name</th>
							<th>Owner Name</th>
							<th>Status</th>
							<th>Application Date</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($applications as $key => $app): ?>
						<tr>
							<td><?= $this->encryption->decrypt($app->get_referenceNum()) ?></td>
							<td><?= $app->get_User()->get_firstName()." ".$app->get_User()->get_lastName() ?></td>
							<td><?= $app->get_businessName() ?></td>
							<td><?= $app->get_firstName()." ".$app->get_lastName() ?></td>
							<td><?= $app->get_status() ?></td>
							<td><?= $app->get_applicationDate() ?></td>
						</tr>
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
