<!--========================= Content Wrapper ==============================-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Return Pelanggan</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">            
            <?php if(isset($dt_penjualan)){
            foreach($dt_penjualan as $row){
            ?>

                <div class="panel-heading">
                Data barang return dari <strong><?php echo $row->nm_pelanggan?></strong> dengan faktur penjaulan <strong><?php echo $row->kd_penjualan?></strong>
                </div>

            <?php }
                }
            ?>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pembelian</th>
                            <th>Jumlah return</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                        <?php
                        $no=1;
                        if (isset($data_return)){
                        foreach($data_return as $row){
                        ?>
                            <td><?php echo $no++; ?></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->kd_barang;?>" readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->nm_barang;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->qty;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->rusak;?>"readonly></td>
                                <?php if($row->status == 'proses'){?>
                            <td><button type="button" class="btn btn-block btn-warning disabled">
                                <i class="fa fa-gear fa-fw"></i>Proses</button></td>
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
    <a href="<?php echo site_url('return_customer')?>" type="button" class="btn btn-outline btn-primary">
        <i class="fa fa-mail-reply-all fa-fw"></i> Back
    </a>
    <?php if(isset($dt_penjualan)){
    foreach($dt_penjualan as $row){
    ?>
    <a type="button" class="btn btn-outline btn-warning btnPrint" href="<?php echo site_url('cetak/print_return_customer/'.$row->kd_penjualan)?>">
        <i class="fa fa-print fa-fw"></i> Print
    </a>
    <?php }
        }
    ?>
</div>
