<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
            <img src="<?= base_url("assets/images/logo/logo1.png") ?>" alt="logo" width="250px">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('Register'); ?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="full name">Full Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" autofocus>
                      <?= form_error('name', '<small class="text-danger pl-2">','</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="nisn">NISN</label>
                      <input id="nisn" type="text" class="form-control" name="nisn" value="<?= set_value('nisn'); ?>">
                      <?= form_error('nisn', '<small class="text-danger pl-2">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-2">','</small>'); ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <?= form_error('password', '<small class="text-danger pl-2">','</small>'); ?>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                      <?= form_error('password2', '<small class="text-danger pl-2">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-divider">
                    Your Home
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                    </button>
                  </div>
                </form>
                <div class="col-lg-12 text-center mt-5">
                    Already have an account? <a href="<?= base_url("Login"); ?>" class="text-danger">Sign In</a>
                </div>
              </div>
            </div>
            <div class="simple-footer">
            <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>