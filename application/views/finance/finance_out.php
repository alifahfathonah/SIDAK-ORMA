<section id="topbar">
    <p style="text-align: center; margin:0px;"><?= $organisasi[0]['nama_organisasi'] ?></p>
</section>

<div class="container mt-4 mb-2">
    <div class="row">
        <div class="col-sm-12 col-md-3 mt-2">
            <h5>Data Pengeluaran</h5>
        </div>
        <div class="col-sm-12 col-md-6">
            <form method="GET">
                <div class="input-group mb-3">
                    <?php if ($this->session->flashdata('search')) { ?>
                        <input value="<?= $this->session->flashdata('search') ?>" type="text" name="search" class="form-control" placeholder="Masukan Nama Pengeluaran" aria-label="Nama Pengeluaran" aria-describedby="basic-addon2">
                    <?php } else { ?>
                        <input type="text" name="search" class="form-control" placeholder="Masukan Nama Pengeluaran" aria-label="Nama Pengeluaran" aria-describedby="basic-addon2">
                    <?php } ?>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        <?php if ($this->session->flashdata('search')) { ?>
                            <a class="btn btn-danger" href="<?= base_url(); ?>manage/clear/outcome" onclick="window.location.reload()">&times;</a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
        <?php if ($this->session->userdata('level') == 1) { ?>
            <div class="col-sm-12 col-md-3">
                <div class="text-right">
                    <button data-toggle="modal" data-target="#addData" class="btn btn-info col-md-12">&plus; Tambah Pengeluaran</button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php if ($this->session->flashdata('error')) { ?>
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error : </strong> <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php } ?>
<div class="container table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Tangal Keluar</th>
                <th style="width:250px;">Keterangan</th>
                <th>Bukti</th>
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($allPengeluaran as $ap) { ?>
                <tr class="text-center">
                    <td class="text-center"><?= $no; ?></td>
                    <td><?= $ap['deskripsi']; ?></td>
                    <td class="text-danger text-center">- <?= $ap['jml_keluar']; ?></td>
                    <td><?php
                        $originalDate = date_create($ap['tgl_keluar']);
                        echo date_format($originalDate, 'd F Y') ?></td>
                    <td><?= $ap['keterangan']; ?></td>
                    <td>
                        <?php if ($ap['bukti_pengeluaran'] != null) { ?>
                            <a href="<?= base_url(); ?>uploads/keuangan/<?= $ap['bukti_pengeluaran']; ?>" download="bukti-pembayaran-<?= $ap['id_transaksi']; ?>">Lihat</a>
                        <?php } else { ?>
                            Tidak Ada Bukti
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($this->session->userdata('level') == 1) { ?>
                            <a class="btn btn-success left-margin text-white" data-toggle="modal" data-target="#editData" onclick="getData(<?= $ap['id_transaksi']; ?>,'<?= $ap['deskripsi']; ?>','<?= $ap['jml_keluar']; ?>','<?= $ap['tgl_keluar'] ?>','<?= $ap['keterangan']; ?>');"><span class='glyphicon glyphicon-edit'></span>Edit</a>
                            <a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteData" onclick="getId(<?= $ap['id_transaksi']; ?>, '<?= $ap['deskripsi']; ?>')"><span class='glyphicon glyphicon-remove'></span>Delete</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php $no++;
                $this->load->view('finance/edit_out');
                $this->load->view('finance/delete_out');
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