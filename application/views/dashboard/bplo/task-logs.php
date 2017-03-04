<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> 
      <a href="#" class="current">Task Logs</a>
    </div>
    <h1>Task Logs</h1>
    <hr>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Data table</h5>
      </div>
      <div class="widget-content nopadding">
        <table id="task-table" class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Application Reference Number</th>
              <th>Action</th>
              <th>Employee Name</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if (is_array($approvals) || is_object($approvals)): ?>
             <?php foreach ($approvals as $action): ?>
              <tr>
              <td><?= $action->referenceNum ?></td>
              <td><?= $action->type ?></td>
              <td><?= $action->staff ?></td>
              <td><?= date('M d, Y', strtotime($action->createdAt)) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--     <div class="block center-block">
    	<label for="">Test Noty</label>
    	<button class="btn btn-primary" id="btn-test-noty">Noty</button>
    </div> -->
  </div>
  <?php if ($this->session->flashdata('message')): ?>
    <script>
      alert('<?= $this->session->flashdata('message') ?>');
    </script>
  <?php endif ?>

 <!--  <script>
    $(document).ready(function() {
    $('#task-table').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
  </script> -->

  <!--Footer-part-->

<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<!--end-Footer-part-->