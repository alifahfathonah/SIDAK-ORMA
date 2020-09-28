<?php echo form_open_multipart('keuangan/outcomeUpload'); ?>
<div id="addData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Total Pengeluaran</label>
                        <input name="pengeluaran" type="number" class="form-control" placeholder="Rp 0000">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input name="tanggal" type="date" class="form-control" placeholder="01-Januari-2020">
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <input type='file' name='bukti' class="form-control-file" id="bukti" accept="image/*,.pdf">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="2"></textarea>
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