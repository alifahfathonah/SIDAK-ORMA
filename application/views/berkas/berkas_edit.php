<?php echo form_open_multipart('berkas/editData'); ?>
<div id="editData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Old Berkas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <input name="id" id="id" type="hidden" class="form-control" placeholder="ID">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi" id="des">
                    </div>
                    <div class="form-group">
                        <label>Jenis Berkas</label>
                        <select name="jenis" id="selectJen" class="form-control">
                            <?php
                            foreach ($jenis as $j) { ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input name="tanggal" id="tgl" value="<?= date("Y-m-d"); ?>" type="date" class="form-control" placeholder="01-Januari-2020" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lampiran">Masukan Lampiran Baru</label>
                        <input type='file' name='lampiran' class="form-control-file" id="lampiran" accept="doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
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