<!-- <body class="content-container"> -->
<!-- Page Content -->

<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
						<h3>Unsettled Charges</h3>
					</div>
          <div class="panel-body">
						<?php
							$totalBalance = 0;
							foreach ($unsettled_charges as $key => $value):
								$totalBalance += $value->due;
								$totalBalance += $value->surcharge;
								$totalBalance += $value->interest;

							 endforeach; ?>
							 <h5>Remaining Balance: <?= $totalBalance ?></h5><br />



              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>Ref. No.</th>
                          <th>Business</th>
                          <th>Particular</th>
                          <th>Due</th>
													<th>Surcharge</th>
													<th>Interest</th>
                          <th>Due Date</th>
                      </tr>
                  </thead>
                  <tbody>
										<?php foreach ($unsettled_charges as $key => $value): ?>

                      <tr>
                          <td><?= $value->referenceNum ?></td>
													<td><?= $value->businessName ?></td>
                          <td><?= $value->period . " " . $value->particulars ?>	</td>
                          <td><?= $value->due ?></td>
													<td><?= $value->surcharge ?></td>
													<td><?= $value->interest ?></td>
                          <td><?php

														$createdAt = date($value->createdAt);
														$convertedCreatedAt = strtotime($createdAt);
														$year = date('Y', $convertedCreatedAt);

														switch($value->period)
														{
															case 'Q1': echo 'January 20, '. $year; break;
															case 'F1': echo 'January 20, '. $year; break;
															case 'Q2': echo 'April 20, '. $year; break;
															case 'Q3': echo 'July 20, '. $year; break;
															case 'Q4': echo 'October 20, '. $year; break;
														}

													 ?></td>
                      </tr>

											<?php endforeach; ?>
                  </tbody>
              </table>
              <!-- /.table-responsive -->
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
<!-- jQuery -->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
