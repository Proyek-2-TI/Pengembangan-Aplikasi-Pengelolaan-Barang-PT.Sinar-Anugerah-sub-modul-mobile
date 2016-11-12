<!--========================= Content Wrapper ==============================-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Detail Pemesanan</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tujuan dan Keterangan
                </div>
                <div class="panel-body">
                <?php if(isset($dt_pemesanan)){
                    foreach($dt_pemesanan as $row){
                        ?>
                    <div class="col-lg-4">
                        <dl class="dl-horizontal">
                            <dt>Faktur Pemesanan :</dt>
                            <dd><?php echo $row->kd_pemesanan?></dd>
                            <br/>
                            <dt>Tanggal pemesanan :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tanggal_pemesanan));?></dd>
                            <br/>
                            <dt>Pegawai :</dt>
                            <dd><?php echo $row->nama?></dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">                            
                            <dt>Supplier :</dt>
                            <dd><?php echo $row->nm_supplier?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
                            <dt>Email :</dt>
                            <dd><?php echo $row->email?></dd>
                        </dl>
                    </div>
                <?php }
                    }
                ?>
                </div>
            </div>
        </div>   
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Pemesanan
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                         if(isset($pemesanan)){
                            foreach($pemesanan as $row ){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->kd_barang?></td>
                                <td><?php echo $row->nm_barang?></td>
                                <td><?php echo $row->qty?></td>
                            </tr>
                        <?php }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-actions">
        <a href="<?php echo site_url('pemesanan')?>" type="button" class="btn btn-outline btn-primary">
            <i class="fa fa-mail-reply-all fa-fw"></i> Back
        </a>
        <?php if(isset($dt_pemesanan)){
            foreach($dt_pemesanan as $row){
            ?>
        <a class="btn btn-outline btn-warning btnPrint" href="<?php echo site_url('cetak/print_pemesanan/'.$row->kd_pemesanan)?>">
            <i class="fa fa-print fa-fw"></i> Print
        </a>
        <?php }
            }
        ?>
        </div>
    </div>
</div>