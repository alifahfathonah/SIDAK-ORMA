<?php echo form_open('jadwal/addData'); ?>
<div id="addData" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input name="tanggal" value="<?= date("Y-m-d"); ?>" type="date" class="form-control" placeholder="01-Januari-2020">
                    </div>
                    <div class="form-group">
                        <label>Lokasi Kegiatan</label>
                        <input name="lokasi" type="text" class="form-control" placeholder="Lokasi Kegiatan">
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