<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>
          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>
            <h2 class="section-title">Hi, <?= $user['name'] ?>!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Profile</h4>
                  </div>
                  <div class="col-6 col-sm-3 col-lg-3 mx-auto mb-4 mb-md-0">
                        <div class="avatar-item">
                          <img alt="image" src="<?= base_url('assets/images/faces/'). $user['image']; ?>" width="85%" class="rounded-circle" data-toggle="tooltip" title="<?= $user['name']; ?>">
                          <div class="avatar-badge mx-5"> <a href="" class="btn"><i class="fas fa-pencil-alt"></i></a></div>
                        </div>
                      </div>
                  <form action="<?= base_url('Profil/edit_profile/') ?>" method="POST" class="needs-validation" novalidate="">
                    <div class="card-body">
                      <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label> Full Name</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $user['id']; ?>" required="">
                            <input type="text" class="form-control" name="name" value="<?= $user['name']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" value="<?= $user['nisn']; ?>" required="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" readonly value="<?= $user['email']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="telephone" value="<?= $user['telephone']; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Guru Wali</label>
                            <input type="text" class="form-control" name="wali_kelas" value="<?= $user['wali_kelas']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Kelas</label>
                            <input type="number" class="form-control" name="kelas" readonly value="<?= $user['kelas']; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea class="form-control summernote-simple" value="<?= $user['alamat']?>" name="alamat"><?= $user['alamat']; ?></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>