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
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penjualan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pembelian</th>
                            <th>Jumlah return</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                        <?php
                        $no=1;
                        if (isset($dt)){
                        foreach($dt as $row){
                        ?>
                            <td><?php echo $no++; ?></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->kd_penjualan;?>" readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->nm_barang;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->qty;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->rusak;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->ket;?>"readonly></td>
                                <?php if($row->status == 'proses'){?>
                            <td><a type="button" class="btn btn-block btn-warning" href="<?php echo site_url('verifikasi_gudang/select_verifikasi/'.$row->id);?>">
                                <i class="fa fa-gear fa-fw"></i>Proses</a></td>
                                <?php }else{ 
                                 if($row->status == 'diterima'){?>
                            <td><button type="button" class="btn btn-block btn-success disabled">
                                <i class="fa fa-check fa-fw"></i>Diterima</button></td>
                                <?php }else{ ?>
                            <td><button type="button" class="btn btn-block btn-danger disabled">
                                <i class="fa fa-times fa-fw"></i>Ditolak</button></td>                                
                                <?php }
                                    }
                                ?>
                        </tr>
                            <?php }
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>