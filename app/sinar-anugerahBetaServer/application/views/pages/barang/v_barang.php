        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Barang</th>
                                        <th>Stok</th>
                                        <th>Rusak</th>
                                        <th>Harga</th>
                                        <th>Jenis Barang</th>
                                        <th>Supplier</th>
                                        <th>
                                            <a data-target="#modalAddPelanggan"type="button" class="btn btn-outline btn-info" data-toggle="modal">
                                                <i class="fa fa-plus fa-fw"></i> Tambah Data
                                            </a>
                                        </th>
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
                                                <td><?php echo $row->ID_BARANG; ?></td>
                                                <td><?php echo $row->NM_BARANG; ?></td>
                                                <td><?php echo $row->STOK_BARANG; ?></td>
                                                <td><?php echo $row->RUSAK_BARANG; ?></td>
                                                <td><?php echo currency_format($row->HARGA_BARANG);?></td>
                                                <td><?php echo $row->JENIS_BARANG; ?></td>
                                                <td><?php echo $row->NM_SUPPLIER; ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Barang_controller/edit_data_barang/'.$row->ID_BARANG);?>"> 
                                                    <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                                    <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('Barang_controller/hapus_barang/'.$row->ID_BARANG);?>"
                                                       onclick="return confirm('Anda yakin?')"> 
                                                    <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
                                                </td>
                                            </tr>

                                        <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>