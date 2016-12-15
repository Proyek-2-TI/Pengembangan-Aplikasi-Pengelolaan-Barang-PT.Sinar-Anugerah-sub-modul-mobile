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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Faktur Pembelian</th>
                                        <th>Jumlah</th>
                                        <th>
                                            <a href="<?php echo site_url('Barang_Masuk_Controller/select_supplier')?>" " type="button" class="btn btn-primary">
                                                Tambah
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($data_barang_masuk)){
                                    foreach($data_barang_masuk as $row){
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date("d M Y",strtotime($row->TGL_BARANG_MASUK)); ?></td>
                                        <td><?php echo $row->ID_BARANG_MASUK; ?></td>
                                        <td><?php echo $row->JUMLAH; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Penjualan_controller/detail_penjualan/'.$row->ID_BARANG_MASUK);?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Detail</a>
                                            <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('Barang_controller/hapus_barang/'.$row->ID_BARANG_MASUK);?>"> 
                                            <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
                                        </td>
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
</div>                                            