<body>

    <!-- Header -->
    <div class="intro-header" >
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <img src="<?php echo base_url(); ?>assets/landing-page/img/bposys-logo-white-solo.png" width="45%"/>
                        <h3>Start your business in Biñan now!</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <!-- <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li> -->
                            <li>
                                <a href="#about-us" class="btn btn-default btn-lg"> <span class="network-name">Learn More</span></a>
                            </li>
                            <li>
                            <!--     <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>

    <div class="content-section-b" id="about-us">
      <div class="container" style="display: block; margin: auto;">
        <div class="row">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-8" style="text-align:center">
            <h2 class="section-heading">What is BPOSys?</h2>
            <hr class="section-heading-spacer" style="margin-top: 0px; width: 100%">
            <p class="lead">A web application that provides the business venturers in the City of Biñan a faster and easier way of applying and managing their business permit applications. </p>
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/landing-page/img/manage-applications-online.png" alt="" width="100%" style="margin: auto;">

          </div>
          <div class="col-lg-2">
          </div>

        </div>
      </div>
    </div>

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">No more repetitive filling up of forms</h2>
                    <p class="lead">Apply online now using the unified form. Single fill up for all 6 major requirements in acquiring or renewing a business permit. Renewals? No problem, you can reuse your previous information for a much faster application!</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/landing-page/img/unified-form-resize.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Monitor your application online</h2>
                    <p class="lead">Using the website, you can monitor the current status of your business permit application. View all requirements you need in order to finish your application! Already have a registered application? Never miss your payment deadlines by viewing your billing information online!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/landing-page/img/track-application-resize.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Paperless transaction on the go!</h2>
                    <p class="lead">You don't have to pile up application forms inside your envelope. Store all your information online for your today's application and for the years to come. Less papers, save trees!</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/landing-page/img/paperless-resize.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner" id="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Contact us now:</h2>
                </div>
                <div class="col-lg-6" style="text-align: right">

                    <h5>Address: 7 St Francis, San Antonio, Biñan, Laguna inside Biñan City Hall</h5>
                    <br />
                    <h5>Telephone Number: 09989898989</h5>
                    <h5>09189898989</h5>
                    <br />
                    <h5>Email: bplo2017@binan.gov.ph</h5>
                    <!-- <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul> -->
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

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
