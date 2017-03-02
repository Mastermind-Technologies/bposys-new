<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="#" class="current">Home</a>
    </div>
    <!--End-breadcrumbs-->
  </div>



  <div class="container-fluid">
    <h1><?= $user->get_lastName() . ", " . $user->get_firstName() . "(".$user->get_middleName().") "?></h1>
    <hr>
    <h3>Department: <?= $this->encryption->decrypt($this->session->userdata['userdata']['role']) ?></h3>
    <!--Action boxes-->
    <div class="quick-actions_homepage">
      <ul class="quick-actions">

       <li class="bg_db"> <a href="<?php echo base_url(); ?>dashboard/incoming_applications"> <i class="fa fa-share fa-2x" aria-hidden="true"></i>
        <span class="label label-warning badge-incoming"><?= $incoming > 0 ? $incoming : "" ?></span><br>Incoming Applicants </a> </li>

        <li class="bg_lo"> <a href="<?php echo base_url(); ?>dashboard/on_process_applications"> <i class="fa fa-circle-o-notch fa-2x" aria-hidden="true"></i>
         <span class="label label-success badge-process"><?= $process > 0 ? $process : "" ?></span><br><span>On Process</span> </a> </li>
         <li class="bg_c"> <a href="<?php echo base_url(); ?>dashboard/completed_applications"> <i class="fa fa-th-list fa-2x" aria-hidden="true"></i>
          <span class="label label-info badge-completed"><?= $complete > 0 ? $complete : "" ?></span><br>Complete Requirements</a> </li>
        <!-- <li class="bg_ly span2"> <a href="<?php echo base_url(); ?>dashboard/finalize_applications"> <i class="fa fa-hourglass fa-2x" aria-hidden="true"></i>
        <span class="label label-important"><?= $finalization > 0 ? $finalization : "" ?></span><br><span>Finalization</span> </a> </li> -->
        <li class="bg_ls"> <a href="<?php echo base_url(); ?>dashboard/issued_applications"> <i class="fa fa-check-square fa-2x" aria-hidden="true"></i>
          <span class="label label-info badge-issued"><?= $issued > 0 ? $issued : "" ?></span><br>Issued</a> </li>
          <!-- <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li> -->


            <!-- <li class="bg_db"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
            <li class="bg_lo"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li>
            <li class="bg_db"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-signal fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
            <li class="bg_lo"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li> -->

          </ul>
        </div>
        <div class="quick-actions_homepage">
          <ul class="quick-actions">
           <li class="bg_lr"> <a href="<?php echo base_url() ?>dashboard/retirements"><span><i class="fa fa-times-rectangle fa-2x" aria-hidden="true"></i><span class="label label-info badge-retirement"><?= $retirement > 0 ? $retirement : "" ?></span> </span><br>Retirements</a> </li>
           <li class="bg_c span2"> <a href="<?php echo base_url(); ?>dashboard/payments"> <i class="fa fa-money fa-2x" aria-hidden="true"></i>
             <span class="label label-info"></span><br>Payments</a> </li>
           </ul>
         </div>
         <div class="quick-actions_homepage">
          <ul class="quick-actions">
           <li class="bg_db span3"> <a href="<?php echo base_url(); ?>reports"><span><i class="fa fa-bar-chart-o fa-2x" aria-hidden="true"></i> </span><br>View Reports</a> </li>
           <li class="bg_ly span1"> <a href="<?php echo base_url(); ?>Alerts"><span><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i> </span><br>Create Alerts</a> </li>
         </ul>
       </div>
       <!-- <div class="row-fluid">
        <div class="span4">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
              <h5><?= date('Y') ?> Reports</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <tr >
                    <td><a href="<?php echo base_url(); ?>reports">Total No. of Issued Applications</a></td>
                    <td><?= $issued ?></td>
                  </tr>
                  <tr >
                    <td><a href="<?php echo base_url(); ?>reports">Total No. of Renewed Applications</a></td>
                    <td><?= $renewed ?></td>
                  </tr>
                  <tr >
                    <td><a href="<?php echo base_url(); ?>reports">Total No. of Unrenewed Applications</a></td>
                    <td><?= $expired ?></td>
                  </tr>
                  <tr >
                    <td><a href="<?php echo base_url(); ?>reports">Total No. of Cancelled Applications</a></td>
                    <td><?= $cancelled ?></td>
                  </tr>
                  <tr >
                    <td><a href="<?php echo base_url(); ?>reports">Total No. Retired Businesses</a></td>
                    <td><?= "0"//$applications ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-arrow-right"></i> </span>
              <h5>Latest Applications On Process</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Business Name</th>
                  </tr>
                </thead>
                <tbody class="">
                  <?php if (isset($latest_applications)): ?>
                    <?php foreach ($latest_applications as $key => $application): ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>dashboard/incoming_applications"><?= $application->get_BusinessName() ?></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
              <h5>Latest Issued Applications</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Business Name</th>
                    <th>Date Issued</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($latest_issued)): ?>
                    <?php foreach ($latest_issued as $key => $application): ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>dashboard/issued_applications"><?= $application->get_BusinessName() ?></a>
                        </td>
                        <td><?= $application->get_DateIssued() ?></td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->
    </div>



    <!-- <div class="row-fluid">
          <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
              <h5>Analytics Summary</h5>
            </div>
            <div class="widget-content">
              <div class="row-fluid">
                <div class="span9">
                  <div id="line-chart" style="height: 300px; width: 100%;"><div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;">
                    <canvas class="canvasjs-chart-canvas" width="1535" height="500" style="width: 1228px; height: 300px; position: absolute;"></canvas>
                    <canvas class="canvasjs-chart-canvas" width="1535" height="500" style="width: 1228px; height: 300px; position: absolute; cursor: default;">
                    </canvas><div class="canvasjs-chart-toolbar" style="position: absolute; right: 1px; top: 1px;"></div>
                    <div class="canvasjs-chart-tooltip" style="position: absolute; height: auto; box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1); z-index: 1000; display: block; border-radius: 5px; left: 112px; bottom: -82px; transition: left 0.2s ease-out 0s, bottom 0.2s ease-out 0s;">
                    <div style="width: auto; height: auto; min-width: 50px; margin: 0px; padding: 5px; font-family: Calibri,Arial,Georgia,serif; font-weight: normal; font-style: italic; font-size: 14px; color: black; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1); text-align: left; border: 2px solid rgb(54, 158, 173); background: rgba(255, 255, 255, 0.9) none repeat scroll 0% 0%; text-indent: 0px; white-space: nowrap; border-radius: 5px; -moz-user-select: none;">
                    <span style="color:#369EAD;">New:</span>&nbsp;&nbsp;0<br>
                    <span style="color:#C24642;">Renew:</span>&nbsp;&nbsp;0<br>
                    <span style="color:#7F6084;">Expected Renewals:</span>&nbsp;&nbsp;0</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="span3">
              <ul class="site-stats">

                <li class="bg_lh"><i class="icon-warning-sign"></i> <strong>656</strong> <small>Unrenewed</small></li>
                <li class="bg_lh"><i class="icon-bar-chart"></i> <strong>9540</strong> <small>Total Applications</small></li>
                <li class="bg_lh"><i class="icon-plus-sign"></i> <strong>10</strong> <small>New Applications</small></li>
                <li class="bg_lh"><i class="icon-check"></i> <strong>8540</strong> <small>Renewals</small></li>
                <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>Total Users</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
          <div class="widget-content">
            <div class="row-fluid">
             <div class="span4">
               <div class="widget-box">
                 <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
                   <h5><?= date('Y') ?> Reports</h5>
                 </div>
                 <div class="widget-content nopadding">
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>#</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td><a href="<?php echo base_url(); ?>reports">Total No. of Issued Applications</a></td>
                         <td><?= $issued ?></td>
                       </tr>
                       <tr >
                         <td><a href="<?php echo base_url(); ?>reports">Total No. of Renewed Applications</a></td>
                         <td><?= $renewed ?></td>
                       </tr>
                       <tr >
                         <td><a href="<?php echo base_url(); ?>reports">Total No. of Unrenewed Applications</a></td>
                         <td><?= $expired ?></td>
                       </tr>
                       <tr >
                         <td><a href="<?php echo base_url(); ?>reports">Total No. of Cancelled Applications</a></td>
                         <td><?= $cancelled ?></td>
                       </tr>
                       <tr >
                         <td><a href="<?php echo base_url(); ?>reports">Total No. Retired Businesses</a></td>
                         <td><?= $retirement ?></td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             <div class="span4">
               <div class="widget-box">
                 <div class="widget-title"> <span class="icon"> <i class="icon-arrow-right"></i> </span>
                   <h5>Latest Applications On Process</h5>
                 </div>
                 <div class="widget-content nopadding">
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>Business Name</th>

                       </tr>
                     </thead>
                     <tbody class="">
                       <?php if (isset($latest_applications)): ?>
                         <?php foreach ($latest_applications as $key => $application): ?>
                           <tr>
                             <td><?= $key+1 ?></td>
                             <td>
                               <a href="<?php echo base_url(); ?>dashboard/incoming_applications"><?= $application->get_BusinessName() ?></a>
                             </td>
                           </tr>
                         <?php endforeach ?>
                       <?php endif ?>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             <div class="span4">
               <div class="widget-box">
                 <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                   <h5>Latest Issued Applications</h5>
                 </div>
                 <div class="widget-content nopadding">
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>Business Name</th>
                         <th>Date Issued</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php foreach ($latest_issued as $key => $application): ?>
                         <tr>
                           <td><?= $key+1 ?></td>
                           <td>
                             <a href="<?php echo base_url(); ?>dashboard/issued_applications"><?= $application->get_BusinessName() ?></a>
                           </td>
                           <td><?= $application->get_DateIssued() ?></td>
                         </tr>
                       <?php endforeach ?>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
            </div>
            <div class="row-fluid">
            <div class="span4">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
                  <h5><?= date('Y') - 1 ?> Top 5 Tax Payers</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Rank</th>
                        <th>Business Name</th>
                        <th>Business Owner</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">1</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">2</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">3</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">4</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">5</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="span4">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
                  <h5><?= date('Y') ?> Early birds (First 5 Applicants)</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Rank</th>
                        <th>Business Name</th>
                        <th>Business Owner</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">1</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">2</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">3</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">4</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                      <tr >
                        <td style="text-align: center"><a href="<?php echo base_url(); ?>reports">5</a></td>
                        <td>Pogi ni Billy</td>
                        <td>Pogi ni Billy</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> -->

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
