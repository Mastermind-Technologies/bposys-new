<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    </div>
    <!--End-breadcrumbs-->
  </div>



  <div class="container-fluid">
    <h1><?= "(".$user->get_middleName().") ". $user->get_lastName() . ", " . $user->get_firstName() ?></h1>
    <input type="hidden" id="notif-count" value="<?= count($notifications) ?>">
    <hr>
    <h3>Department: <?= $this->encryption->decrypt($this->session->userdata['userdata']['role']) ?></h3>
    <!--Action boxes-->
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
       <li class="bg_db"> <a href="<?php echo base_url(); ?>dashboard/incoming_applications"> <i class="fa fa-share fa-2x" aria-hidden="true"></i>
         <span class="label label-success badge-incoming"><?= $incoming > 0 ? $incoming : '' ?></span><br>Incoming Applicants</a> </li>
         <li class="bg_ly"> <a href="<?php echo base_url(); ?>dashboard/on_process_applications"> <i class="fa fa-circle-o-notch fa-2x" aria-hidden="true"></i>
           <span class="label label-important"><?= $on_process > 0 ? $on_process : '' ?></span><br><span>On Process</span> </a> </li>
           <li class="bg_c"> <a href="dashboard/issued_applications"> <i class="fa fa-check-square fa-2x" aria-hidden="true"></i>
             <span class="label label-info"><?= $issued > 0 ? $issued : '' ?></span><br>Issued</a> </li>
        <!-- <li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>
        <li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li> -->
       <!--  <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> -->
      </ul>
    </div>

    <div class="quick-actions_homepage">
      <ul class="quick-actions">
      <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-bar-chart-o fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
      </ul>
    </div>
    <!-- <div class="row-fluid">
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>Browser statistics</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Browser</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Chrome</td>
                  <td>8850</td>
                </tr>
                <tr>
                  <td>Firefox</td>
                  <td>5670</td>
                </tr>
                <tr>
                  <td>Internet Explorer</td>
                  <td>4130</td>
                </tr>
                <tr>
                  <td>Opera</td>
                  <td>1574</td>
                </tr>
                <tr>
                  <td>Safari</td>
                  <td>1044</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-arrow-right"></i> </span>
            <h5>Website statistics</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Site</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Themeforest.com</a></td>
                  <td>12444</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>10455</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>8455</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>4456</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>2210</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Visited Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Page</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Freebies</a></td>
                  <td>8550</td>
                </tr>
                <tr>
                  <td><a href="#">Blog</a></td>
                  <td>7550</td>
                </tr>
                <tr>
                  <td><a href="#">Work</a></td>
                  <td>5247</td>
                </tr>
                <tr>
                  <td><a href="#">site template</a></td>
                  <td>4880</td>
                </tr>
                <tr>
                  <td><a href="#">All categories</a></td>
                  <td>4801</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</div>

<?php if($this->session->flashdata('message')): ?>
  <script>
    alert("<?= $this->session->flashdata('message'); ?>");
  </script>
<?php endif; ?>


<!--Footer-part-->

<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div> -->

<!--end-Footer-part-->
