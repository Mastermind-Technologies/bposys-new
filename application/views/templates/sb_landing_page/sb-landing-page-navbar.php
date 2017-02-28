<!-- Navigation -->
<title>BPOSys | <?= $title ?></title>
<nav class="navbar-default topnav" role="navigation"  style="background-color: #212121">
  <div class="container topnav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo base_url(); ?>home"  style="color: #FFF">Home</a>
        </li>
        <li class="<?= $selected=='howto' ? 'active' : '' ?>">
          <a href="<?php echo base_url(); ?>home/guide"  style="color: #FFF">How to</a>
        </li>
        <li class="<?= $selected=='contact' ? 'active' : '' ?>">
          <a href="<?php echo base_url(); ?>home#banner"  style="color: #FFF">Contact Us</a>
        </li>
        <li class="<?= $selected=='register' ? 'active' : '' ?>">
          <a href="<?php echo base_url(); ?>register" style="color: #FFF">Register</a>
        </li>
        <li class="<?= $selected=='login' ? 'active' : '' ?>">
          <a href="#" data-toggle="modal" data-target="#modalLogin" style="color: #FFF">Login</a>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>

<!-- Modal -->
<div id="modalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url(); ?>auth/login" method="post">
          <div class="row">
            <div class="col-sm-12">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" value="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Login">
          </div>
        </div>

        <hr>

      </form>

    </div>

  </div>
</div>
