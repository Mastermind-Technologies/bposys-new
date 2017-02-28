<title>BPOSys | <?= $title ?></title>

<div id="content">

	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url(); ?>bposys_admin/dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
			<a href="#" class="current">Users</a>
		</div>
		<!--End-breadcrumbs-->
		<h1></h1>
	</div>
	<div class="container-fluid">

    <div class="container-fluid">
      <div class="widget-box widget-plain">
        <div class="center">
          <ul class="stat-boxes2">
            <li>
              <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                <canvas width="50" height="24"></canvas>
              </span><!-- +10% --></div>
              <div class="right"> <strong class='count'>5</strong> Issued Permits </div>
            </li>
            <li>
              <div class="left peity_line_good"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
                <canvas width="50" height="24"></canvas>
              </span><!-- 10% --></div>
              <div class="right"> <strong class='count'>3</strong> Validated </div>
            </li>
            <li>
              <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                <canvas width="50" height="24"></canvas>
              </span><!-- -40% --></div>
              <div class="right"> <strong class='count'>2</strong> Approved</div>
            </li>
            <li>
              <div class="left peity_line_bad"><span><span style="display: none;">12,6,9,23,14,10,17</span>
                <canvas width="50" height="24"></canvas>
              </span><!-- +60% --></div>
              <div class="right"> <strong class='count'>6</strong> Approved Capital </div>
            </li>
            <li>
              <div class="left peity_bar_neutral"><span>12,6,9,23,14,10,13</span><!-- +30% --></div>
              <div class="right"> <strong class='count'>12</strong> Printout</div>
            </li>
          </ul>
        </div>
      </div>

		<hr>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Logs</h5>
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
