<body>
  <?php if($this->session->flashdata('message')): ?>
    <script>
      alert("<?= $this->session->flashdata('message'); ?>");
    </script>
  <?php endif; ?>

  <div class="container-fluid container-register"  style="margin-bottom: 14px">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"> <!--bootstrap error div-->
            <?=$this->session->flashdata('error')?>
          </div>
        <?php endif; ?>
        <h1>Register</h1>
        <hr>

        <form class="form-group" action="<?php echo base_url();?>auth/register_user" data-parsley-validate="" method="post">
          <div class="row">
            <div class="col-sm-6">
              <label for="fname">First Name</label>
              <input type="text" name="fname" required class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" required class="form-control" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label for="mname">Middle Name</label>
              <input type="text" name="mname" class="form-control" value="">
            </div>
            <div class="col-sm-3">
              <label for="suffix">Suffix (Optional)</label>
              <input type="text" name="suffix" class="form-control" placeholder="Jr., Sr., III, etc." value="">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"><p>
              <label for="gender">Gender</label>
              <div class="btn-group" style="margin-top:-10px;" role="group" aria-label="gender">
                <button type="button" class="btn btn-default active" id="btn-male">Male</button>
                <button type="button" class="btn btn-default" id="btn-female">Female</button>
                <input type="hidden" name="gender" id="hidden-gender" value="male">
              </div>
            </p>
          </div>
          <div class="col-sm-6 col-sm-offset-2">
            <label for="">Birth date</label>
            <div class="row">
              <div class="col-md-12">
               <div class="form-group">
                 <div class="input-group date">
                 <input type="text" id="datetimepicker1" name="birth-date" required class="form-control" data="DateTimePicker" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                </div>
              </div>
            </div>
          </div>
          <script>
            $(document).ready(function(){
              $('#datetimepicker1').datetimepicker({
                format: 'MM/DD/YYYY',
                viewMode: 'years'
              });
            });
          </script>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="col-sm-12" style="padding:0">
            <label for="civil-staus">Civil Status</label>
            <div class="form-group">
              <select class="form-control" required name="civil-status" id="civil-status">
                <option selected disabled select>Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
                <option value="Annulled">Annulled</option>
                <option value="Widower">Widower</option>
                <option value="Single Parent">Single Parent</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" required name="email" value="">
        </div>
        <div class="col-sm-6">
          <label for="contact-number">Contact Number</label>
          <input type="text" class="form-control" required name='contact-number'>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" required name="password" id='password' value="">
        </div>
        <div class="col-sm-6">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" class="form-control" required data-parsley-equalto="#password" name="confirm-password" value="">
        </div>
      </div>

      <hr>
      <div class="col-sm-6 col-sm-offset-3">
        <input type="submit" class="btn btn-primary btn-block" name="name" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


</body>
