  <!-- ======= About Lists Section ======= -->
  <section class="about-lists">
    <div class="container">

      <div class="row no-gutters">
        <?php foreach ($organisasi as $or) { ?>
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" style="width:100%; display: inline-block; text-align: center;">
            <a href="<?= base_url() ?>organisasi/key/<?= $or['id'] ?>" style="display: inline-block; text-align:center;">
              <img src="<?= base_url() ?>assets/<?= $or['logo'] ?>" style="width: 150px; height: 150px; object-fit:contain;">
              <h4><?= $or['inisial'] ?></h4>
              <p><?= $or['nama_organisasi'] ?></p>
            </a>
          </div>
        <?php } ?>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-akutansi.png">
          <h4>HMJ AKUTANSI</h4>
          <p>Himpunan Mahasiswa Jurusan Akutansi</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="600">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-admin.jpg">
          <h4>HMJ ADMINISTRASI NIAGA</h4>
          <p>Himpunan Mahasiswa Jurusan Adminitasi Niaga</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="700">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-sipil.png">
          <h4>HMJ SIPIL</h4>
          <p>Himpunan Mahasiswa Jurusan Sipil/p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="800">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-kimia.png">
          <h4>HMJ KIMIA</h4>
          <p>Himpunan Mahasiswa Jurusan Kimia</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="900">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-bkm.png">
          <h4>UKM BKM</h4>
          <p>Unit Kegiatan Mahasiswa Bhakti Karya Mahasiswa</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1000">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-pasti.png">
          <h4>UKM PASTI</h4>
          <p>Unit Kegiatan Mahasiswa Bhakti Pasukan Anti Narkotika</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1100">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-pers.png">
          <h4>UKM PERS</h4>
          <p>Unit Kegiatan Mahasiswa Bhakti LMP Kompen PERS</p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1200">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-pp.jpg">
          <h4>UKM PP</h4>
          <p>Unit Kegiatan Mahasiswa Bhakti Pendidikan dan Penalaran </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1300">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-satmenwa.jpg">
          <h4>UKM SATMENWA</h4>
          <p>Unit Kegiatan Mahasiswa SATMENWA </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1400">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-plfm.jpg">
          <h4>UKM PLFM</h4>
          <p>Unit Kegiatan Mahasiswa PLFM </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1500">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-pa.png">
          <h4>UKM PA</h4>
          <p>Unit Kegiatan Mahasiswa Pencinta Alam </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1600">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-olahraga.jpg">
          <h4>UKM SPORTIFO</h4>
          <p>Unit Kegiatan Mahasiswa Bidang Olahraga </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1700">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-seni.jpg">
          <h4>UKM SENI</h4>
          <p>Unit Kegiatan Mahasiswa Seni Theatrisic </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1800">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-rispol.jpg">
          <h4>UKM RISPOL</h4>
          <p>Unit Kegiatan Mahasiswa PRSIPOL </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1900">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-taliakum.jpg">
          <h4>UKM TALI TAKUM</h4>
          <p>Unit Kegiatan Mahasiswa Kristen Tali Takum </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="2000">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-kmk.png">
          <h4>UKM KMK ST YOHANES</h4>
          <p>Unit Kegiatan Mahasiswa KMK ST YOHANES </p>
        </div>

        <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="1200">
          <img src="<?= base_url() ?>assets/img/organisasi/logo-usma.jpg">
          <h4>UKM USMA</h4>
          <p>Unit Kegiatan Mahasiswa Usaha Mahasiswa </p>
        </div>

      </div>

    </div>
  </section><!-- End About Lists Section -->