    <!-- ===========================================        view data        ======================================= -->
    <!-- ===========================================          sec 1          ======================================= -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Return Pelanggan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-hand-o-left fa-fw"></i> Daftar Return Pelanggan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Nomor</th>
                                        <th>Faktur Penjualan</th>
                                        <th>Jumlah Return</th>
                                        <th><a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('return_customer/data_return_c')?>"><i class="fa fa-plus fa-fw"></i>Tambah Barang Return</a></th>
                                        </tr>
                                  </thead>
                                        <tbody>
                                                <div align="center">
                                                  <?php
                                        $no=1;
                                        if(isset($data_penjualan)){
                                            foreach($data_penjualan as $row){
                                                ?>
                                                </div>
                                                <tr class="gradeX">
                                                    <td><div align="center"><?php echo $no++; ?></div></td>
                                                    <td><div align="center"><?php echo $row->kd_penjualan; ?></div></td>
                                                    <td><div align="center"><?php echo $row->jumlah; ?> Items</div></td>
                                                    <td><div align="center">
                                                        <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('return_customer/detail_return_customer/'.$row->kd_penjualan)?>">
                                                            <i class="fa fa-eye fa-fw"></i> View
                                                        </a>
                                                        <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('return_customer/hapus/'.$row->kd_penjualan)?>"
                                                           onclick="return confirm('Anda Yakin ?');">
                                                            <i class="fa fa-trash-o fa-fw"></i> Hapus
                                                        </a>                                                    
                                                    </td>
                                                </tr>
                                                <div align="center">
                                                  <?php }
                                                    }
                                                    ?>
                                                </div>
                                        </tbody>
                                </table>


