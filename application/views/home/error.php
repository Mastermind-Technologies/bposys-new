<body>

  <link href="<?php echo base_url(); ?>assets/landing-page/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/sb_admin2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <div class="container-fluid" style="height: 600px; margin-top: 100px">
    <div class="col-md-12">
      <div class="error_ex"  style="color: #666; text-align: center">
        <?php
          if($type == "404")
          {
            ?>
            <i style='color: #da4f49; font-size: 140px;' class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <h1 style='color: #da4f49; font-size: 140px; font-weight: bold'>404</h1>
            <h3>Opps, You're lost.</h3>
            <p>We can not find the page you're looking for.</p>
            <a class='btn btn-danger btn-big'  href='<?php echo base_url(); ?>dashboard'>Back to Home</a>
          <?php
          }
          else if($type == "403")
          {
            ?>
            <i style='color: #da4f49; font-size: 140px;' class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <h1 style='color: #da4f49; font-size: 140px; font-weight: bold'>403</h1>
            <h3>Opps, You're lost.</h3>
            <p>Access to this page is forbidden.</p>
            <a class='btn btn-danger btn-big'  href='<?php echo base_url(); ?>dashboard'>Back to Home</a>
            <?php
          }

          else if($type == "403b")
          {
            ?>
            <i style='color: #da4f49; font-size: 140px;' class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <h1 style='color: #da4f49; font-size: 140px; font-weight: bold'>403</h1>
            <h3>Opps, You're lost.</h3>
            <p>Access to this page is forbidden.</p>
            <a class='btn btn-danger btn-big'  href='<?php echo base_url(); ?>home'>Back to Home</a>
            <?php
          }

        ?>

      </div>
    </div>
  </div>

</body>

<?php if($this->session->flashdata('success')): ?>
  <script>
      alert("<?= $this->session->flashdata('success'); ?>");
  </script>
<?php endif; ?>

<?php if($this->session->flashdata('failed')): ?>
  <script>
      alert("<?= $this->session->flashdata('failed'); ?>");
  </script>
<?php endif; ?>

<script src="<?php echo base_url(); ?>assets/landing-page/js/bootstrap.min.js"></script>
