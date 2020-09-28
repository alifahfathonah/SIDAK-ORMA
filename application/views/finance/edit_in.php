<?php echo form_open('keuangan/incomeEdit'); ?>
<div id="editData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Pemasukan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Transaksi</label>
                        <input id="id" name="id" type="text" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input id="des" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Pemasukan</label>
                        <input id="jml" name="totalMasuk" type="number" class="form-control" placeholder="Rp 0000">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input id="tgl" name="tanggalMasuk" type="date" class="form-control" placeholder="01-Januari-2020">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="ket" name="keterangan" class="form-control" id="keterangan" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>