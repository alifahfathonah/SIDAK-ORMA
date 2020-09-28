  <section id="topbar">
    <p style="text-align: center; margin:0px;"><?= $organisasi[0]['nama_organisasi'] ?></p>
  </section>

  <div class="container mt-3 mb-2">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <h5 class="font-weight-bold">Data Keuangan</h5>
      </div>
    </div>
  </div>

  <div class="container mt-2 mb-4">
    <div class="row text-center">
      <?php foreach ($pemasukan as $inDashboard) { ?>
        <div class="col-sm-3 col-md-4 col-6 mb-3">
          <h5>Pemasukan</h5>
          <p class="text-primary">Rp. <?php echo number_format($inDashboard['jml_masuk'], 2, ',', '.') ?></p>
          <?php if ($this->session->userdata('level') == 1) { ?>
            <a href="keuangan/pemasukan" class="btn btn-primary btn-sm">Atur Pemasukan</a>
          <?php } else { ?>
            <a href="keuangan/pemasukan" class="btn btn-primary btn-sm">Lihat Data Pemasukan</a>
          <?php } ?>
        </div>
      <?php } ?>
      <?php foreach ($pengeluaran as $outDashboard) { ?>
        <div class="col-sm-3 col-md-4 col-6 mb-3">
          <h5>Pengeluaran</h5>
          <p class="text-warning">Rp. <?php echo number_format($outDashboard['jml_keluar'], 2, ',', '.') ?></p>
          <?php if ($this->session->userdata('level') == 1) { ?>
            <a href="keuangan/pengeluaran" class="btn btn-warning btn-sm">Atur Pengeluaran</a>
          <?php } else { ?>
            <a href="keuangan/pengeluaran" class="btn btn-warning btn-sm">Lihat Data Pengeluaran</a>
          <?php } ?>
        </div>
      <?php } ?>
      <?php foreach ($keuangan as $KeuDashboard) { ?>
        <div class="col-sm-3 col-md-4 col-12">
          <h5>Total Keuangan</h5>
          <p>Rp. <?php echo number_format($KeuDashboard['total_uang'], 2, ',', '.') ?></p>
        </div>
      <?php } ?>
    </div>
  </div>

  <hr>

  <?php if ($this->session->userdata('level') == 1) { ?>
    <div class="container mt-2 mb-1">
      <div class="row">
        <div class="col-6">
          <h5>Aktivitas Terakhir</h5>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6> Log Pemasukan Keuangan </h6>
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Tgl Masuk</th>
                <th>Pemasukan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($logPemasukan as $lp) { ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $lp['keterangan']; ?></td>
                  <td><?= $lp['tgl_masuk']; ?></td>
                  <td class="text-success text-center">+ <?= $lp['jml_masuk']; ?></td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6> Log Pengeluaran Keuangan </h6>
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Tgl Keluar</th>
                <th>Pengeluaran</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($logPengeluaran as $lp) { ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $lp['keterangan']; ?></td>
                  <td><?= $lp['tgl_keluar']; ?></td>
                  <td class="text-danger text-center">- <?= $lp['jml_keluar']; ?></td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php } ?>