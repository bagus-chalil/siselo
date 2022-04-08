      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="bg-white p-5 shadow">
            <h3 class="mb-5">Daftar Menu Kelas Online</h3>
           
               <center>
               <!-- Section 1-->
               <a href="<?= base_url('kelas/v_kelas_online/'. $user['nisn']); ?>" style="display: inline-block; text-decoration: none;" class="col-4 col-md-6 col-lg-4">
                   <div class="card card-primary">
                       <i class="fas fa-fw fa-laptop mx-auto mt-5 mb-5 text-primary" style="font-size:75px"></i>
                   <div class="card-header">
                       <h3 class="mx-auto text-primary">Kelas Online</h3>
                   </div>
                   </div>
               </a>

               <a href="<?= base_url('ujian/list') ?>" style="display: inline-block; text-decoration: none;" class="col-4 col-md-6 col-lg-4">
                   <div class="card card-primary">
                       <i class="fas fa-fw fa-chart-line mx-auto mt-5 mb-5 text-primary" style="font-size:75px"></i>
                   <div class="card-header">
                       <h3 class="mx-auto text-primary">Ujian Online</h3>
                   </div>
                   </div>
               </a>
               <!-- Section 2-->
               <a href="chat/menu" style="display: inline-block; text-decoration: none;" class="col-4 col-md-6 col-lg-4">
                   <div class="card card-primary">
                       <i class="fas fa-fw fa-comments mx-auto mt-5 mb-5" style="font-size:75px"></i>
                   <div class="card-header">
                       <h3 class="mx-auto text-primary">Ruang Diskusi</h3>
                   </div>
                   </div>
               </a>
               
               <a href="<?= base_url('praktikum/v_alat') ?>" style="display: inline-block; text-decoration: none;" class="col-4 col-md-6 col-lg-4">
                   <div class="card card-primary">
                       <i class="fas fa-fw fa-flask mx-auto mt-5 mb-5 text-primary" style="font-size:75px"></i>
                   <div class="card-header">
                       <h3 class="mx-auto text-primary">Alat Praktikum</h3>
                   </div>
                   </div>
               </a>
               </center>
           </div>
          
          </div>
        </section>
      </div>
      