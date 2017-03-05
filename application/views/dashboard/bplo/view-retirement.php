<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url(); ?>dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
      <?php if ($application->get_status() == "For Retirement" || $application->get_status() == "Closed"): ?>
        <a href="<?php echo base_url(); ?>dashboard/retirements">Retirements</a>
      <?php endif ?>

      <a href="#" class="current">View</a>
    </div>
    <!--End-breadcrumbs-->
    <h1>Business Name: <strong><?= $application->get_businessName() ?></strong></h1>
    <h4 style="padding-left: 20px;">Status: <span class="text-warning"><?= $application->get_status() ?></span></h4>
    <hr>
  </div>

  <div class="container-fluid">

    <div class="widget-box">
      <div class="widget-title">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab1">Retirement Form</a></li>
          <li><a data-toggle="tab" onclick="initMap()" href="#tab3">Business Location</a></li>
        </ul>
      </div>
      <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active">
          <table class="table table-bordered">
            <tr>
              <td>
                <label for="">Business Name</label>
                <h5><?= $application->get_businessName() ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Business Address</label>
                <h5><?=$application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province()?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Owner Name</label>
                <h5><?= $application->get_firstName()." ".$application->get_middleName()." ".$application->get_lastName() ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Owner Address</label>
                <h5> <?=$application->get_ownerbldgName() . " " . $application->get_ownerhouseBldgNo() . " " . $application->get_ownerunitNum() . " " . $application->get_ownerstreet() . ", " . $application->get_ownerSubdivision() . ", " . $application->get_ownerbarangay() . ", " . $application->get_ownercityMunicipality() . ", " . $application->get_ownerprovince()?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Reason for Closure/Retirement</label>
                <h5> <?= $retirement[0]->reason ?></h5>
              </td>
            </tr>
          </table>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class='text-center'>Line of Business</th>
                <th class='text-center'>Last Capital/Gross Declared</th>
                <th class='text-center'>Gross Sales/Receipts</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($application->get_businessactivities() as $key => $activity): ?>
                <tr>
                  <td>
                    <?= $activity->lineOfBusiness ?>
                    <input type="hidden" name="activity-id[]" required value="<?= $activity->activityId ?>">  
                  </td>
                  <td>
                    <span class="pull-right"><?= number_format($application->get_applicationType() == "New" ? $activity->capitalization : $activity->previousGross[1]->essentials + $activity->previousGross[1]->nonEssentials, 2) ?></span>
                  </td>
                  <td class='text-center'><?= number_format($activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials, 2) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <?php if ($application->get_status() == "For Retirement"): ?>
            <div class="form-action">
              <div class="row text-center">
                <a href="<?php echo base_url(); ?>dashboard/approve_retirement/<?= str_replace(['/','+','='], ['-','_','='],  $application->get_referenceNum()) ?>" class="btn btn-success btn-process">Approve Retirement</a>
              </div>
            </div>
          <?php endif ?>
        </div>
        <div id="tab3" class='tab-pane'>
          <div id="gmaps" style="width:100%; height:500px; background-color: gray"></div>
        </div>
      </div>
    </div>
    <!-- End Container Fluid -->
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLMOtCdi62jLDT9JFcUh8vN3WYPakFMY8"
async defer></script>
<script>
  var map;
  var loaded = false;
  function initMap(){
    if(loaded == false)
    {
      loaded = true;
      latlang = new google.maps.LatLng(<?= $application->get_lat() ?>,<?= $application->get_lng() ?>);
      map = new google.maps.Map(document.getElementById('gmaps'), {
        center: latlang,
        zoom: 15

      });
      var marker = new google.maps.Marker({
        position: latlang,
      });

      marker.setMap(map);
    }
  }
</script>
