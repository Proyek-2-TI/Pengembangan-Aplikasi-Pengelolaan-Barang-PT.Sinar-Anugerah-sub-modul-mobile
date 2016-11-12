        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Konsumen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Konsumen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Customer</th>
                                        <th>Customer</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
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
                                    if(isset($data_pelanggan)){
                                        foreach($data_pelanggan as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->kd_pelanggan; ?></td>
                                                <td><?php echo $row->nm_pelanggan; ?></td>
                                                <td><?php echo $row->alamat; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('master/edit_data_pelanggan/'.$row->kd_pelanggan);?>"> 
                                                    <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                                    <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('master/hapus_pelanggan/'.$row->kd_pelanggan);?>"
                                                       onclick="return confirm('Anda yakin?')"> 
                                                    <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
                                                </td>
                                            </tr>

                                        <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>

<!-- ============ MODAL ADD PELANGGAN =============== -->
 <div class="modal fade" id="modalAddPelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Konsumen</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_pelanggan')?>">
            <div class="modal-body">
                <div class="control-group">
                <label class="control-label">Kode Pelanggan</label>
                    <div class="controls">
                    <input class="form-control" name="kd_pelanggan" type="text" value="<?php echo $kd_pelanggan; ?>" readonly>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" >Nama Pelanggan</label>
                    <div class="controls">
                    <input class="form-control" name="nm_pelanggan" type="text" placeholder="Input Nama Barang..."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"> Alamat </label>
                    <div class="controls">
                    <input class="form-control" name="alamat" type="text" placeholder="Input Stok..."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">Email</label>
                    <div class="controls">
                    <input class="form-control" name="email" type="text" placeholder="Input Harga..."required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
            <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>