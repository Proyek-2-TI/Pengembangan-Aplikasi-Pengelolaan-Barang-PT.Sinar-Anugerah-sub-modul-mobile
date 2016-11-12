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
                    <label class="control-label">Kode Barang</label>
                    <div class="controls">
                        <input class="form-control" name="kd_barang" type="text" value="<?php echo $row->kd_barang; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <input class="form-control" name="nm_barang" type="text" value="<?php echo $row->nm_barang; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jumlah Barang Masuk</label>
                    <div class="controls">
                        <input class="form-control" name="qty" type="text" class="" placeholder="Jumlah Barang Masuk" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="control-group ">
                    <label class="control-label">Harga</label>
                    <div class="controls ">
                        <input class="form-control" type="text" value="<?php echo $row->harga; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Ready Stok</label>
                    <div class="controls">
                        <input class="form-control" id="stok" name="stok" type="text" value="<?php echo $row->stok; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Rusak</label>
                    <div class="controls ">
                        <input class="form-control" name="d_rusak" type="text" required>
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