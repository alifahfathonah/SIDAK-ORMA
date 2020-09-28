<?php echo form_open('keuangan/outcomeEdit'); ?>
<div id="editData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Pengeluaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id" name="id" type="hidden" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input id="des" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Pengeluaran</label>
                        <input id="jml" name="pengeluaran" type="number" class="form-control" placeholder="Rp 0000">
                    </div>
                    <div class="form-group">
                        <label for="bukti">Masukan Bukti Pembayaran Baru</label>
                        <input type='file' name='bukti' class="form-control-file" id="bukti" accept="image/*,.pdfvalue=" abc.pdf">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input id="tgl" name="tanggal" type="date" class="form-control" placeholder="01-Januari-2020">
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