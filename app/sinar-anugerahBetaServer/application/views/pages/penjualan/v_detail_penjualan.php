<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $headerPage ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $headerPanel ?>
                    </div>
                    <div class="panel-body">
                        <?php if(isset($data_penjualan)){
                            foreach($data_penjualan as $row){
                                ?>
                            <div class="col-lg-4">
                                <dl class="dl-horizontal">
                                    <dt>Kode Penjualan :</dt>
                                    <dd><?php echo $row->ID_PENJUALAN?></dd>
                                    <br/>
                                    <dt>Tanggal Penjualan :</dt>
                                    <dd><?php echo date("d M Y",strtotime($row->TGL_PENJUALAN));?></dd>
                                    <br/>
                                    <dt>Total Harga :</dt>
                                    <dd><strong><u><?= currency_format($row->TOTAL_PENJUALAN); ?></u></strong></dd>
                                    <br/>
                                    <dt>Pegawai :</dt>
                                    <dd><?php echo $row->NM_PEGAWAI?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl class="dl-horizontal">
                                    <dt>Pelanggan :</dt>
                                    <dd><?php echo $row->NM_CUSTOMER ?></dd>
                                    <br/>
                                    <dt>Alamat :</dt>
                                    <dd><?php echo $row->ALMT_CUSTOMER?></dd>
                                    <br/>
                                    <dt>Telp / Email :</dt>
                                    <dd><?php echo $row->EMAIL_CUSTOMER ?></dd>
                                </dl>
                            </div>
                        <?php }
                            }
                        ?>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detail Barang
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($detail_penjualan)){
                                    foreach($detail_penjualan as $row){
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->ID_BARANG; ?></td>
                                        <td><?php echo $row->NM_BARANG; ?></td>
                                        <td><?php echo $row->QTY; ?></td>
                                        <td><?php echo currency_format($row->HARGA_BARANG);?></td>
                                    </tr>
                                <?php }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="<?php echo site_url('penjualan')?>" type="button" class="btn btn-outline btn-primary">
                            <i class="fa fa-mail-reply-all fa-fw"></i> Back
                        </a>
                        <?php if(isset($data_penjualan)){
                            foreach($data_penjualan as $row){
                                ?>
                        <a type="button"  class="btn btn-outline btn-warning btnPrint" href="<?php echo site_url('Penjualan_Controller/print_penjualan/'.$row->ID_PENJUALAN)?>">
                            <i class="fa fa-print fa-fw"></i> Print
                        </a>
                        <?php }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    