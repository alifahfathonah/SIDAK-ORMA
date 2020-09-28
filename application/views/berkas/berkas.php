<section id="topbar">
  <p style="text-align: center; margin:0px;"><?= $organisasi[0]['nama_organisasi'] ?></p>
</section>
<div class="container">
  <div class="row mb-2 mt-2">
    <div class="col-md-8">
      <h5 class="mt-2 font-weight-bold"> Managemen Berkas </h5>
    </div>
    <?php if ($this->session->userdata('level') == 1) { ?>
      <div class="col-md-4" style="align-self: center;">
        <div class="text-right">
          <button data-toggle="modal" data-target="#addData" class="btn btn-sm btn-info col-md-7">&plus; Tambah Berkas</button>
        </div>
      </div>
    <?php } ?>
  </div>
  <form method="get">
    <div class="input-group">
      <?php if ($this->session->flashdata('search')) { ?>
        <input value="<?= $this->session->flashdata('search') ?>" type="text" name="search" class="form-control" placeholder="Masukan Nama Berkas" aria-label="Nama Berkas" aria-describedby="basic-addon2">
      <?php } else { ?>
        <input type="text" name="search" class="form-control" placeholder="Masukan Nama Berkas" aria-label="Nama Berkas" aria-describedby="basic-addon2">
      <?php } ?>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
        <?php if ($this->session->flashdata('search')) { ?>
          <a class="btn btn-danger" href="<?= base_url(); ?>manage/clear/berkas" onclick="window.location.reload()">&times;</a>
        <?php } ?>
      </div>
    </div>
  </form>
</div>

<?php if ($this->session->flashdata('error')) { ?>
  <div class="container mt-3">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Error : </strong> <?= $this->session->flashdata('error'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php } ?>

<hr class="mt-3 mb-3">
<section class="counts" style="padding-top: 0;">
  <div class="container">
    <?php $tanggalSebelumnya = null;
    foreach ($allBerkas as $ab) { ?>
      <div class="row">
        <div class=" col-lg-12 col-md-12" style="width:100%; display: inline-block;">
          <div class="col-12">
            <?php
            if ($tanggalSebelumnya != $ab['tgl_dibuat']) {
            ?>
              <h6> <?php
                    $originalDate = date_create($ab['tgl_dibuat']);
                    echo date_format($originalDate, 'd F Y');
                    $tanggalSebelumnya = $ab['tgl_dibuat']; ?> </h6>
              <hr>
            <?php } ?>
          </div>
          <div class="count-box">
            <div class="row">
              <div class="col-8" style="align-self: center;">
                <h6> <b> <?= $ab['nama_berkas'] ?> </b> </h6>
                <p> Jenis surat : <?= $ab['jenis'] ?> </p>
              </div>
              <br>
              <div class="col-4" style="align-self: center; text-align:right;">
                <a href="<?= base_url() ?>uploads/berkas/<?= $ab['file']; ?>" download="berkas-<?= $ab['id'] ?>">
                  <img src="<?= base_url(); ?>assets/img/download.png" style="margin-right: 12px;" alt="Image" height="30" width="30">
                </a>
                <?php if ($this->session->userdata('level') == 1) { ?>
                  <a href="#" data-toggle="modal" data-target="#editData" onclick="getData(<?= $ab['id'] ?>, '<?= $ab['id_jenis'] ?>', '<?= $ab['nama_berkas'] ?>', '<?= $ab['tgl_dibuat'] ?>')">
                    <img src="<?= base_url(); ?>assets/img/edit.png" style="margin-right: 6px;" alt="Image" height="30" width="30">
                  </a>
                  <a href="#" data-toggle="modal" data-target="#deleteData" onclick="getId(<?= $ab['id'] ?>, '<?= $ab['nama_berkas'] ?>')">
                    <img src="<?= base_url(); ?>assets/img/delete.png" alt="Image" height="35" width="35">
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      </script>
    <?php } ?>
  </div>
  <?php $this->load->view('berkas/berkas_edit'); ?>
  <?php $this->load->view('berkas/berkas_delete'); ?>
  <script>
    function getData(id, jen, des, tgl) {
      document.getElementById("id").value = id;
      document.getElementById("selectJen").value = jen;
      document.getElementById("des").value = des;
      document.getElementById("tgl").value = tgl;
    }

    function getId(id, deskripsi) {
      document.getElementById("idDelete").value = id;
      document.getElementById("confirmation").innerHTML = "Apakah anda ingin menghapus data '" + deskripsi + "' ?";
    }
  </script>
</section>