    <!-- ===========================================        view data        ======================================= -->
    <!-- ===========================================          sec 1          ======================================= -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Pemesanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-bank fa-fw"></i> Daftar Pemesanan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Faktur Pemesanan</th>
                                        <th>Jumlah pemesanan</th>
                                        <th>
                                        <a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('pemesanan/barang_pemesanan')?>"><i class="fa fa-plus fa-fw"></i>Tambah Pemesanan</a>                                             
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_pemesanan)){
                                        foreach($data_pemesanan as $row){
                                            ?>
                                            <tr class="gradeX">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date("d M Y",strtotime($row->tanggal_pemesanan)); ?></td>
                                                <td><?php echo $row->kd_barang; ?></td>
                                                <td><?php echo $row->jumlah; ?> Items</td>
                                                <td>
                                                    <a class="btn btn-outline btn-primary " href="<?php echo site_url('pemesanan/detail_pemesanan/'.$row->kd_pemesanan)?>">
                                                         <i class="fa fa-eye fa-fw"></i> View</a>
                                                    <a class="btn btn-outline btn-danger " href="<?php echo site_url('pemesanan/hapus/'.$row->kd_pemesanan)?>"
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



