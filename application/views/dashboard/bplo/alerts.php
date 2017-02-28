<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <a href="<?php echo base_url(); ?>alerts" class="current">Send Alerts</a>
    </div>
    <h1>Create Alerts</h1>
    <hr style="margin:10">
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid container-alert" style="min-height: 100vh">

    <div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Registered Businesses</h5>
			</div>
      <div class="row-fluid" style="padding: 10px">
       <div class="span4">
         <div class="control-group">
           <label class="control-label">Select Alert Type</label>
           <div class="controls">
           <abbr class="select2-search-choice-close" style="display:none;"></abbr>
           <div>
             <b></b>
           </div>
           <div class="select2-drop select2-with-searchbox select2-drop-active select2-offscreen" style="display: block;">
             <div class="select2-search">       <input autocomplete="off" class="select2-input" tabindex="0" type="text">   </div>
               <ul class="select2-results"></ul></div>
           </div>
             <select style="display: none;">
               <option>Expired Applications</option> <!-- LOAD ALL EXPIRED APPLICATIONS -->
               <option>Due Payments</option> <!-- LOAD ALL APPLICATIONS WITH OVERDUE PAYMENTS -->
               <option>Near Due Payments</option> <!-- LOAD UNPAID FOR Q1,Q2,Q3,Q4 DEPENDING ON THE DATE -->
               <option>General/Custom Announcement</option> <!-- LOAD ALL APPLICATIONS -->
             </select>
           </div>
         </div>
         <div class="span4">
           <label class="control-label">Select Medium</label>
           <div class="controls">
             <label>
               <div class="checker" id="uniform-undefined"><span><input name="radios" style="opacity: 0;" type="checkbox"></span></div>
               SMS</label>
             <label>
               <div class="checker" id="uniform-undefined"><span><input name="radios" style="opacity: 0;" type="checkbox"></span></div>
               Email</label>
           </div>
         </div>
       </div>
       <div class="row-fluid" style="padding: 10px"> <!-- ENABLE DISPLAY KAPAG SELECTED YUNG GENERAL/CUSTOM ANNOUNCEMENT -->
         <div class="span4">
           <div class="control-group">
            <label class="control-label">Custom Message</label>
            <div class="controls">
              <textarea class="span11" disabled="disabled"></textarea>
            </div>
           </div>
         </div>
       </div>
       <!--
        MESSAGE SENDER - OFFICIAL BPLO EMAIL
        MESSAGE TITLE (IF NEEDED) Official Notice from Business Permit and Licensing Office (BPLO) of Biñan
        BODY - TBD (MAY TEMPLATE NA, PAPASAKAN NALANG NG DATA)
        RECEIVERS - DEPENDE SA SELECTED SA TABLE
      -->
       <div class="row-fluid" style="padding: 10px; margin-bottom: -15px">
         <div class="span4">
           <label class="control-label">Select Receivers</label>
         </div>
       </div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th><div class="checker" id="uniform-title-table-checkbox"><span class="checked"><input id="title-table-checkbox" name="title-table-checkbox" style="opacity: 0;" type="checkbox"></span></div></th>
              <th>Reference Number</th>
              <th>Business Name</th>
							<th>Owner Name</th>
              <th>Balance</th> <!-- REMAINING BALANCE FOR THE YEAR -->
              <th>Overdue</th> <!-- SURCHARGE + TAX -->
							<th>Application Status</th> <!-- EXPIRED OR ACTIVE ONLY (DI KASAMA YUNG IBA ANG STATUS)-->
						</tr>
					</thead>
					<tbody>
            <!-- START TESTING DATA ONLY -->
						<tr>
							<td style="text-align: center"><div class="checker" id="uniform-undefined"><span class="checked"><input style="opacity: 0;" type="checkbox"></span></div></td>
              <td>AFJEZXBUETHZS</td>
              <td>Gwapong Business 1</td>
							<td>Gwapong Business Owner 1</td>
              <td style="text-align: center">5,500</td>
              <td style="text-align: center" class="table-status-expired">5,500</td>
              <td style="text-align: left" class="table-status-expired"><p><span class="table-status-desc"> Expired</span></p></td>
						</tr>
            <tr>
              <td style="text-align: center"><div class="checker" id="uniform-undefined"><span class="checked"><input style="opacity: 0;" type="checkbox"></span></div></td>
              <td>AFJGGQWEETEAR</td>
              <td>Gwapong Business 2</td>
              <td>Gwapong Business Owner 2</td>
              <td style="text-align: center" class="">20,000</td>
              <td style="text-align: center">0</td>
              <td style="text-align: left" class="table-status-processing"><p><span class="table-status-desc"> Processing</span></p></td>
            </tr>
            <tr>
              <td style="text-align: center"><div class="checker" id="uniform-undefined"><span class="checked"><input style="opacity: 0;" type="checkbox"></span></div></td>
              <td>AFJEZXBUETEAR</td>
              <td>Gwapong Business 3</td>
              <td>Gwapong Business Owner 3</td>
              <td style="text-align: center" class="">5,000</td>
              <td style="text-align: center">0</td>
              <td style="text-align: left" class="table-status-active"><p><span class="table-status-desc"> Active</span></p></td>
            </tr>
            <!-- END TESTING DATA ONLY -->
					</tbody>
				</table>
			</div>
		</div>

  <div style="width: 100%; text-align: center">
    <button type="submit" class="btn btn-success">Send Alert</button>
  </div>

  </div>
