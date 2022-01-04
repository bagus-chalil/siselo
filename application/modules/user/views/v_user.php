<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
            <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Data User Level</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nisn</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>level</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                        <?php foreach ($users as $s) :?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $s['nisn']; ?></td>
                                                <td><?= $s['name']; ?></td>
                                                <td><?= $s['email']; ?></td>
                                                <td><?= $s['role']; ?></td>
                                                <td class="text-center">
                                                <?php if ($s['role_id'] == 3) { ?>
                                                    <a class="btn waves-effect waves-light btn-primary text-white" data-bs-toggle="modal" data-bs-target="#inlineForm1<?php echo $s['id']; ?>"> <i class="fa fa-pencil-alt"></i> Access Level</a>
                                                <?php }else if ($s['role_id'] == 1) { ?>
                                                <?php }else if ($s['role_id'] == 2) { ?>
                                                <?php }else { ?>
                                                <?= ($s['role_id']!=3); ?>
                                                    
                                                <?php } ?>
                                                <a class="btn waves-effect waves-light btn-success text-white" data-bs-toggle="modal" data-bs-target="#inlineForm<?php echo $s['id']; ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('user/delete_role/' .$s['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>
            </div>

            <!--Menu Edit Modal -->
            <?php 
            $i=0;
            foreach ($users as $s) : $i++;?>
            <div class="modal fade text-left" id="inlineForm<?php echo $s['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white" id="myModalLabel33">Edit User</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">X
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('user/edit_roleLevel'); ?>" method="post">
                                                            <div class="modal-body">
                                                            <div class="form-group">
                                                                    <label for="menuname">Name</label>
                                                                    <input class="form-control" type="hidden" id="id" value="<?= $s['id']; ?>" name="id">
                                                                    <input class="form-control" type="text" id="name" value="<?= $s['name']; ?>" name="name" required>
                                                                    <?php if ($s['role_id'] == 3) { ?>
                                                                        <label for="menuname">Wali Kelas</label>
                                                                        <select name="guru" id="guru" class="form-control" required>
                                                                        <option value="<?= $s['wali_kelas']?>"><?= $s['nama_guru']?></option>
                                                                        <option value="">-- Select Menu --</option>
                                                                        <?php foreach($guru as $g) : ?>
                                                                            <option value="<?= $g['id_guru'] ?>"><?= $g['nama_guru']?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                        <?php }else if ($s['role_id'] == 1) { ?>
                                                                        <?php }else if ($s['role_id'] == 2) { ?>
                                                                                <label for="menuname">Matpel </label>
                                                                                <select name="matpel" id="matpel" class="form-control" required>
                                                                                <option value="">-- Select Menu --</option>
                                                                                <?php foreach($matpel as $q) : ?>
                                                                                    <option value="<?= $q['id_matpel'] ?>"><?= $q['nama_matpel']?></option>
                                                                                <?php endforeach; ?>
                                                                                </select>
                                                                        <?php }else { ?>
                                                                        <?= ($s['role_id']!=3); ?>
                                                                    <?php } ?>
                                                                    <label for="menuname">Kelas</label>
                                                                    <select name="kelas" id="kelas" class="form-control" required>
                                                                        <option value="<?= $s['kelas_id']?>"><?= $s['nama_kelas']?></option>
                                                                        <option value="" disabled>-- Select Menu --</option>
                                                                        <?php foreach($kelas as $k) : ?>
                                                                            <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas']?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    
                                                                    <span class="text-danger" style="font-size:10px"><b>Keterangan:</b> 1=Administrators, 2=Guru, 3=Siswa</span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
            <!-- ADD Guru -->
            <?php 
            $i=0;
            foreach ($users as $s) : $i++;?>
            <div class="modal fade text-left" id="inlineForm1<?php echo $s['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white" id="myModalLabel33">Edit Access Level</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">X
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('user/add_roleLevel'); ?>" method="post">
                                                            <div class="modal-body">
                                                            <div class="form-group">
                                                                    <label for="menuname">NIP</label>
                                                                    <input class="form-control" type="hidden" id="id" value="<?= $s['id']; ?>" name="id">
                                                                    <input class="form-control" type="text" id="nisn" value="<?= $s['nisn']; ?>" name="nisn" required>
                                                                    <label for="menuname">Nama</label>
                                                                    <input class="form-control" type="text" id="name" value="<?= $s['name']; ?>" name="name" required>
                                                                    <label for="menuname">Email</label>
                                                                    <input class="form-control" readonly type="text" id="emails" value="<?= $s['email']; ?>" name="emails" required>
                                                                    <label for="menuname">Access Level</label>
                                                                    <select name="user_id" id="user_id" class="form-control" required>
                                                                        <option value="<?= $s['id']?>"><?= $s['role']?></option>
                                                                        <option value="">-- Select Menu --</option>
                                                                        <?php foreach($role as $m) : ?>
                                                                            <option value="<?= $m['id'] ?>"><?= $m['role']?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <label for="menuname">Matpel </label>
                                                                                <select name="matpel" id="matpel" class="form-control" required>
                                                                                <option value="">-- Select Menu --</option>
                                                                                <?php foreach($matpel as $q) : ?>
                                                                                    <option value="<?= $q['id_matpel'] ?>"><?= $q['nama_matpel']?></option>
                                                                                <?php endforeach; ?>
                                                                                </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
           