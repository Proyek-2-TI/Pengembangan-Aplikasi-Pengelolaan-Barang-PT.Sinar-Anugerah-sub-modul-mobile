        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Barang Rusak</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Table Data Barang Rusak
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Supplier</th>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Rusak</th>
                                        <th>Return</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_barang)){
                                    foreach($data_barang as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->kd_barang; ?></td>
                                        <td><?php echo $row->nm_supplier; ?></td>
                                        <td><?php echo $row->jenis_barang; ?></td>
                                        <td><?php echo $row->nm_barang; ?></td>
                                        <td><?php echo $row->stok; ?></td>
                                        <td><?php echo $row->rusak; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('return_supplier/confirm_rusak/'.$row->kd_barang);?>"> 
                                            <i class="fa fa-hand-o-right fa-fw"></i> Confirm</a>
                                        </td>
                                    </tr>

                                    <?php }
                                    }
                                    ?>

                                    </tbody>
                                </table>