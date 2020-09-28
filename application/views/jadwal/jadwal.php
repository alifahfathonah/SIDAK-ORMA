<section id="topbar">
  <p style="text-align: center; margin:0px;"><?= $organisasi[0]['nama_organisasi'] ?></p>
</section>
<div class="container mt-3 mb-3">
  <div class="row">
    <div class="col-md-8" style="align-self: center;">
      <h5 class="font-weight-bold">Jadwal Organisasi</h5>
    </div>
    <?php if ($this->session->userdata('level') == 1) { ?>
      <div class="col-md-4" style="align-self: center;">
        <div class="text-right">
          <button data-toggle="modal" data-target="#addData" class="btn btn-sm btn-info col-md-6">&plus; Tambah Jadwal Baru</button>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<form method="get">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <div class="form-group">
          <label>Tanggal Kegiatan</label>
          <?php if ($this->session->flashdata('tanggal')) { ?>
            <input name="tanggal" type="date" value="<?= $this->session->flashdata('tanggal'); ?>" class="form-control" placeholder="01-Januari-2020">
          <?php } else { ?>
            <input name="tanggal" type="date" class="form-control" placeholder="01-Januari-2020">
          <?php } ?>
        </div>
      </div>
      <div class="col-md-5 col-sm-12">
        <div class="form-group">
          <label>Nama Kegiatan</label>
          <?php if ($this->session->flashdata('nama')) { ?>
            <input name="nama" type="text" class="form-control" placeholder="Kata Kunci Nama Kegiatan" value="<?= $this->session->flashdata('nama'); ?>">
          <?php } else { ?>
            <input name="nama" type="text" class="form-control" placeholder="Kata Kunci Nama Kegiatan">
          <?php } ?>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <label class="text-white"> Lakukan Pencarian </label><br>
        <?php
        if ($this->session->flashdata('search')) {
        ?>
          <button type="submit" class="btn btn-success mr-2">Cari Kegiatan</button>
          <a type="submit" href="<?= base_url(); ?>manage/clear/jadwal" onclick="window.location.reload()" class="btn btn-danger">Hapus Pencarian</a>
        <?php
        } else {
        ?>
          <button type="submit" href="" class="btn btn-success w-100 ">Cari Kegiatan</button>
        <?php } ?>
      </div>
    </div>
  </div>
</form>
<div class="container table-responsive mt-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Kegiatan</th>
        <th>Organisasi</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <?php if ($this->session->userdata('level') == 1) { ?>
          <th>Action</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($jadwal as $j) { ?>
        <?php if ($j['date'] >= date('yy-m-d')) { ?>
          <tr>
            <td><?= $j['kegiatan']; ?></td>
            <td style="width: 250px;"><?= $j['nama_organisasi']; ?></td>
            <td><?php
                $originalDate = date_create($j['date']);
                echo date_format($originalDate, 'd F Y'); ?></td>
            <td><?= $j['tempat']; ?></td>
            <?php if ($this->session->userdata('level') == 1) { ?>
              <?php if ($j['id_org'] == $organisasi[0]['id']) { ?>
                <td>
                  <a href="#" class="btn btn-info left-margin" data-toggle="modal" data-target="#editData" onclick="getData(<?= $j['id'] ?>, '<?= $j['kegiatan']; ?>', '<?= $j['date'] ?>', '<?= $j['tempat']; ?>')">
                    <span class='glyphicon glyphicon-edit'></span>Edit
                  </a>
                  <a class="btn btn-danger delete-object" data-toggle="modal" data-target="#deleteData" href="#" onclick="getId(<?= $j['id'] ?>, '<?= $j['kegiatan']; ?>')">
                    <span class='glyphicon glyphicon-remove'></span>Delete
                  </a>
                </td>
              <?php } else { ?>
                <td>
                  <a class="btn btn-dark text-white"><span class='glyphicon glyphicon-edit'></span>Events</a>
                </td>
              <?php } ?>
            <?php } ?>
          </tr>
        <?php } ?>
      <?php }
      $this->load->view('jadwal/jadwal_edit');
      $this->load->view('jadwal/jadwal_delete');

      ?>
      <script>
        function getData(id, keg, tgl, lok) {
          document.getElementById("id").value = id;
          document.getElementById("nama").value = keg;
          document.getElementById("tanggal").value = tgl;
          document.getElementById("lokasi").value = lok;
        }

        function getId(id, kegiatan) {
          document.getElementById("idDelete").value = id;
          document.getElementById("confirmation").innerHTML = "Apakah anda ingin menghapus '" + kegiatan + "' ?";
        }
      </script>
    </tbody>
</div>