<!-- ===========================================    Tambah Pemesanan     ======================================= -->
<!-- ===========================================         sec 2           ======================================= -->
<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>
    <center>
    <div class="panel-body">
        <div class="row-fluid">
            <div class="col-lg-6">
                <div class="control-group">
                    <label class="control-label">Kode Pemesanan</label>
                    <div class="controls">
                        <input class="form-control" name="kd_pemesanan" type="text" value="<?php echo $row->kd_pemesanan; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <input class="form-control" name="nm_barang" type="text" value="<?php echo $row->nm_barang; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jumlah Pemesanan</label>
                    <div class="controls">
                        <input class="form-control" name="qty" type="text" class="" placeholder="Jumlah Pemesanan" required>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
    <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
</center>
    <?php
    }
}
?>