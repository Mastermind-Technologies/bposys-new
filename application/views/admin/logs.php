<title>BPOSys | <?= $title ?></title>

<div id="content">

	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="#" class="current">Logs</a>
		</div>
		<!--End-breadcrumbs-->
		<h1>Employee Logs</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Data table</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Office/Department</th>
							<th>Action</th>
              <th>Application</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>

            <!--
            ACTIONS
            Issue
            Validate
            Approve
            Approve Capital
            Print
            -->


						<tr>
							<td>1</td>
							<td>Labay, Billy James S.</td>
							<td>Business Permit and Licensing Office</td>
              <td>Validate</td>
              <td>BP-74812594</td>
               <td>February 14, 2015 2:13 PM</td>
						</tr>
            <tr>
              <td>1</td>
              <td>Labay, Billy James S.</td>
              <td>Business Permit and Licensing Office</td>
              <td>Printed Tax Order of Payment</td>
              <td>BP-74812594</td>
               <td>February 14, 2015 2:41 PM</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Labay, Billy James S.</td>
              <td>Business Permit and Licensing Office</td>
              <td>Printed BPLO Certificate</td>
              <td>BP-74812594</td>
				      <td>February 14, 2015 2:56 PM</td>
            </tr>
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
