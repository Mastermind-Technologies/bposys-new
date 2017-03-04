<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Custom CSS -->
  <link href="<?php echo base_url(); ?>assets/matrix/css/custom.css" rel="stylesheet">

  <!-- CSS -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/uniform.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/select2.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/bootstrap-responsive.min.css" />

  <!--!! <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/fullcalendar.css" /> -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/matrix-style.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/matrix-media.css" />
  <link href="<?php echo base_url(); ?>assets/matrix/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />

  <!--!! <link rel="stylesheet" href="<?php echo base_url(); ?>assets/matrix/css/jquery.gritter.css" /> -->

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

  <!-- JAVASCRIPT -->

  <script src="<?php echo base_url(); ?>assets/matrix/js/excanvas.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  -->
  <script src="<?php echo base_url(); ?>assets/js/noty/packaged/jquery.noty.packaged.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/js/noty/themes/relax.js"></script> -->

  <?php if ($this->encryption->decrypt($this->session->userdata['userdata']['role']) != "Master Admin"): ?>
    <script src="<?php echo base_url(); ?>assets/js/dept-dashboard.js"></script>
  <?php endif ?>
  
  <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.ui.custom.js"></script>
  <script src="<?php echo base_url(); ?>assets/matrix/js/bootstrap.min.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.flot.min.js"></script>   -->
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.flot.resize.min.js"></script>   -->

  <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.peity.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/fullcalendar.min.js"></script>  -->
  <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.js"></script>

  <!--!! <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.dashboard.js"></script>  -->
  <!--!! <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.gritter.min.js"></script>  -->

  <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.interface.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.charts.js"></script>  -->

  <!--!! <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.calendar.js"></script> -->

  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.validate.js"></script>  -->
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.form_validation.js"></script>  -->
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.wizard.js"></script>  -->
  <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.uniform.js"></script>
  <script src="<?php echo base_url(); ?>assets/matrix/js/select2.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.popover.js"></script>  -->
  <script src="<?php echo base_url(); ?>assets/matrix/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/matrix/js/matrix.tables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.canvasjs.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script> -->

  <script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
            resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
        }
      }

// resets the menu selection upon entry to this page:
function resetMenu() {
 document.gomenu.selector.selectedIndex = 2;
}
</script>
</head>
