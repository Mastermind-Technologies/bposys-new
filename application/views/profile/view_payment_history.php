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
						<h3>Payment History</h3>
					</div>
          <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>OR Number</th>
                  <th>Reference Number</th>
                  <th>Business Name</th>
                  <th>Amount</th>
                  <th>Quarter</th>
                  <th>Payment Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($payments)): ?>
                  <?php foreach ($payments as $key => $payment): ?>
                    <tr>
                      <td><?= $payment->orNumber ?></td>
                      <td><?= $payment->referenceNum ?></td>
                      <td><?= $payment->businessName ?></td>
                      <td><?= number_format($payment->amountPaid,2) ?></td>
                      <td><?= $payment->quarterPaid ?></td>
                      <td><?= date('F j, o', strtotime($payment->createdAt)) ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
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

<!-- <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr>
                      <tr>
                          <td>O24SGPM812</td>
                          <td>JFAHSFAJZJVZ</td>
                          <td>Mastermind IT Solutions</td>
                          <td>Q1 Tax Payment</td>
                          <td>16,045</td>
                          <td>February 21, 2017</td>
                      </tr> -->