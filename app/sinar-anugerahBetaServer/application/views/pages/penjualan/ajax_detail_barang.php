<form  id="defaultForm"  method="post" action="<?php echo site_url('Penjualan_Controller/tambah_penjualan_to_cart')?>">
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
                        <input class="form-control" name="id_barang" type="text" value="<?php echo $row->ID_BARANG; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <input class="form-control" name="nm_barang" type="text" value="<?php echo $row->NM_BARANG; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jumlah Penjualan</label>
                    <div class="controls">
                        <input class="form-control" name="qty" type="text" class="" placeholder="Jum Penjualan">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="control-group ">
                    <label class="control-label">Harga</label>
                    <div class="controls ">
                        <input class="form-control" name="harga_barang" type="text" value="<?php echo $row->HARGA_BARANG; ?>" readonly="readonly">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Ready Stok</label>
                    <div class="controls">
                        <input class="form-control" id="stok" name="stok" type="text" value="<?php echo $row->STOK_BARANG; ?>" readonly="readonly">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
    <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
</center>
</form>
    <?php
    }
}
?>