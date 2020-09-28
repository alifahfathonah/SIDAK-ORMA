  <section id="topbar">
    <p style="text-align: center; margin:0px;"><?= $organisasi[0]['nama_organisasi'] ?></p>
  </section>

  <div class="container mt-4 mb-2">
    <div class="row">
      <div class="col-sm-12 col-md-3 mt-2">
        <h5>Data Pemasukan</h5>
      </div>
      <div class="col-sm-12 col-md-6">
        <form method="GET">
          <div class="input-group mb-3">
            <?php if ($this->session->flashdata('search')) { ?>
              <input value="<?= $this->session->flashdata('search') ?>" type="text" name="search" class="form-control" placeholder="Masukan Nama Pemasukan" aria-label="Nama Pengeluaran" aria-describedby="basic-addon2">
            <?php } else { ?>
              <input type="text" name="search" class="form-control" placeholder="Masukan Nama Pemasukan" aria-label="Nama Pengeluaran" aria-describedby="basic-addon2">
            <?php } ?>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
              <?php if ($this->session->flashdata('search')) { ?>
                <a class="btn btn-danger" href="<?= base_url(); ?>manage/clear/income" onclick="window.location.reload()">&times;</a>
              <?php } ?>
            </div>
          </div>
        </form>
      </div>
      <?php if ($this->session->userdata('level') == 1) { ?>
        <div class="col-sm-12 col-md-3">
          <div class="text-right">
            <button data-toggle="modal" data-target="#addData" class="btn btn-info col-md-12">&plus; Tambah Pemasukan</button>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="container table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Deskripsi</th>
          <th>Nominal Masuk</th>
          <th>Tangal Masuk</th>
          <th>Keterangan</th>
          <?php if ($this->session->userdata('level') == 1) { ?>
            <th>Action</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($allPemasukan as $ap) { ?>
          <tr class="text-center">
            <td class="text-center"><?= $ap['id_transaksi']; ?></td>
            <td><?= $ap['deskripsi']; ?></td>
            <td class="text-success text-center">+ <?= $ap['jml_masuk']; ?></td>
            <td><?php
                $originalDate = date_create($ap['tgl_masuk']);
                echo date_format($originalDate, 'd F Y') ?></td>
            <td><?= $ap['keterangan']; ?></td>
            <td>
              <?php if ($this->session->userdata('level') == 1) { ?>
                <a class="btn btn-success left-margin text-white" data-toggle="modal" data-target="#editData" onclick="getData(<?= $ap['id_transaksi']; ?>,'<?= $ap['deskripsi']; ?>','<?= $ap['jml_masuk']; ?>','<?= $ap['tgl_masuk'] ?>','<?= $ap['keterangan']; ?>');"><span class='glyphicon glyphicon-edit'></span>Edit</a>
                <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteData" onclick="getId(<?= $ap['id_transaksi']; ?>, '<?= $ap['deskripsi']; ?>')"><span class='glyphicon glyphicon-remove'></span>Delete</a>
              <?php } ?>
            </td>
          </tr>
          <?php $no++;
          $this->load->view('finance/edit_in');
          $this->load->view('finance/delete_in');
          ?>
          <script>
            function getData(id, des, jml, tgl, ket) {
              document.getElementById("id").value = id;
              document.getElementById("des").value = des;
              document.getElementById("jml").value = jml;
              document.getElementById("tgl").value = tgl;
              document.getElementById("ket").value = ket;
            }

            function getId(id, deskripsi) {
              document.getElementById("idDelete").value = id;
              document.getElementById("confirmation").innerHTML = "Apakah anda ingin menghapus data '" + deskripsi + "' ?";
            }
          </script>
        <?php } ?>
      </tbody>
  </div>