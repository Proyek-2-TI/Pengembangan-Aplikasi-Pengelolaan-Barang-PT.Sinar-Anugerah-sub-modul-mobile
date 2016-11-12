<!--========================= Content Wrapper ==============================-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Verifikasi Return Pelanggan</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                Daftar return barang konsumen
                </div>
                <form id ="defaultForm" action="<?php echo site_url('verifikasi_gudang/update_return_c') ?>" method="post">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>Kode Penjualan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah return</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                        <?php
                        if (isset($dt)){
                        foreach($dt as $row){
                        ?>
                            <td><input class="form-control" name = "kd_penjualan" type="text" value="<?php echo $row->kd_penjualan;?>" readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->nm_barang;?>"readonly></td>
                            <td><input class="form-control" name = "d_rusak" type="text" value="<?php echo $row->rusak;?>"readonly></td>
                            <td><input class="form-control" name = "ket" type="text" value="<?php echo $row->ket;?>"readonly></td>
                            <td>
                            <select class="form-control" name="status" required>
                                <option class="form-control" value="">Pilih</option>                            
                                <option class="form-control" value="diterima">Terima</option>
                                <option class="form-control" value="ditolak">Tolak</option>
                            </select>
                            </td>
                        </tr>
                            <input class="form-control" name = "kd_barang" type="hidden" value="<?php echo $row->kd_barang;?>">
                            <?php }
                                }
                            ?>
                        </tbody>
                    </table>
                <button type="submit" class="btn btn-outline btn-primary">
                    <i class="fa fa-check fa-fw"></i> Simpan
                </button>
                <a href="<?php echo site_url('verifikasi_gudang')?>" type="button" class="btn btn-outline btn-primary">
                    <i class="fa fa-mail-reply-all fa-fw"></i> Back
                </a>
                    </div>
                </div>
                </form>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>