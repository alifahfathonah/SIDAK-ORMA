<?php echo form_open_multipart('berkas/addData'); ?>
<div id="addData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Berkas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Jenis Berkas</label>
                        <select name="jenis" class="form-control">
                            <?php
                            foreach ($jenis as $j) { ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input name="tanggal" value="<?= date("Y-m-d"); ?>" type="date" class="form-control" placeholder="01-Januari-2020" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lampiran">Lampiran</label>
                        <input type='file' name='lampiran' class="form-control-file" id="lampiran" accept="doc,.docx,.pdf">
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