    <!-- ===========================================        view data        ======================================= -->
    <!-- ===========================================          sec 1          ======================================= -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Barang Masuk</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-bank fa-fw"></i> Daftar Barang Masuk
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Faktur Pembelian</th>
                                        <th>Jumlah</th>
                                        <th>
                                        <a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('barang_masuk/barang_masuk_gudang')?>"><i class="fa fa-plus fa-fw"></i>Tambah Barang Masuk</a>                                             
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_barang_masuk)){
                                        foreach($data_barang_masuk as $row){
                                            ?>
                                            <tr class="gradeX">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date("d M Y",strtotime($row->tanggal_masuk)); ?></td>
                                                <td><?php echo $row->kd_barang_masuk; ?></td>
                                                <td><?php echo $row->jumlah; ?> Items</td>
                                                <td>
                                                    <a class="btn btn-outline btn-primary " href="<?php echo site_url('barang_masuk/detail_barang_masuk/'.$row->kd_barang_masuk)?>">
                                                         <i class="fa fa-eye fa-fw"></i> View</a>
                                                    <a class="btn btn-outline btn-danger " href="<?php echo site_url('barang_masuk/hapus/'.$row->kd_barang_masuk)?>"
                                                       onclick="return confirm('Anda Yakin ?');">
                                                         <i class="fa fa-trash-o fa-fw"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>

                                    </tbody>
                                </table>



