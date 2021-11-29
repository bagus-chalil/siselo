<footer class="main-footer">
        <div class="footer-left">
        <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
                <div class="bullet"></div> 
                Design By <a href="https://dinus.ac.id/mahasiswa/A22.2019.02733">Mohammad Bagus Chalil A</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?= base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/index.js"></script>
  <script src="<?= base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
</body>
</html>