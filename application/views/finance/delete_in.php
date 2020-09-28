<?php echo form_open('keuangan/incomeDelete'); ?>
<div id="deleteData" class="modal fade">
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Menghapus Data Pemasukan?</h4>
                </div>
                <div class="modal-body">
                    <input id="idDelete" name="id" type="hidden" value="">
                    <p class="mb-0" id="confirmation"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger text-white" type="submit">Hapus</a>
                </div>
            </div>
        </div>
    </form>
</div>