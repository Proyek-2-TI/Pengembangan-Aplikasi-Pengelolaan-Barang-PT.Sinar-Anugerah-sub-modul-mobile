    <!-- ===========================================        view data        ======================================= -->
    <!-- ===========================================          sec 1          ======================================= -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Penjualan Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Penjualan Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Faktur Penjualan</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th><a type="button" class="btn btn-outline btn-info " href="<?php echo site_url('penjualan/pages_tambah_penjualan')?>">
                                            <i class="fa fa-plus fa-fw"></i> Tambah Data
                                        </a></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1;
                                        if(isset($data_penjualan)){
                                            foreach($data_penjualan as $row){
                                                ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo date("d M Y",strtotime($row->tanggal_penjualan)); ?></td>
                                                    <td><?php echo $row->kd_penjualan; ?></td>
                                                    <td><?php echo $row->jumlah; ?> Items</td>
                                                    <td><?php echo currency_format($row->total_harga); ?></td>
                                                    <td>
                                                        <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->kd_penjualan)?>">
                                                            <i class="fa fa-eye fa-fw"></i> View</a>
                                                        <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('penjualan/hapus/'.$row->kd_penjualan)?>"
                                                           onclick="return confirm('Anda Yakin ?');">
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