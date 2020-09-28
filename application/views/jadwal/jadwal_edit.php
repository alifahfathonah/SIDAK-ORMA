<?php echo form_open('jadwal/editData'); ?>
<div id="editData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id" name="id" type="hidden" class="form-control" placeholder="Id Kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input id="tanggal" name="tanggal" value="<?= date("Y-m-d"); ?>" type="date" class="form-control" placeholder="01-Januari-2020">
                    </div>
                    <div class="form-group">
                        <label>Lokasi Kegiatan</label>
                        <input id="lokasi" name="lokasi" type="text" class="form-control" placeholder="Lokasi Kegiatan">
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