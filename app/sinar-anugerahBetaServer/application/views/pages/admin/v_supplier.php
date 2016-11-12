        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Customer
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Supplier</th>
                                        <th>Supplier</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>
                                            <a data-target="#modalAddSupplier"type="button" class="btn btn-outline btn-info" data-toggle="modal">
                                                <i class="fa fa-plus fa-fw"></i> Tambah Data
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_supplier)){
                                        foreach($data_supplier as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->ID_SUPPLIER; ?></td>
                                                <td><?php echo $row->NM_SUPPLIER; ?></td>
                                                <td><?php echo $row->ALMT_SUPPLIER; ?></td>
                                                <td><?php echo $row->EMAIL_SUPPLIER; ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Supplier_controller/edit_data_supplier/'.$row->ID_SUPPLIER);?>"> 
                                                    <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                                    <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('Supplier_controller/hapus_supplier/'.$row->ID_SUPPLIER);?>"
                                                       onclick="return confirm('Anda yakin?')"> 
                                                    <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
                                                </td>
                                            </tr>

                                        <?php }
                                    }
                                    ?>

                                </tbody>
                            </table>

<!-- ============ MODAL ADD SUPPLIER =============== -->
 <div class="modal fade" id="modalAddSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Supplier</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('Supplier_controller/tambah_supplier')?>">
            <div class="modal-body">
                <div class="control-group">
                <label class="control-label">ID Supplier</label>
                    <div class="controls">
                    <input class="form-control" name="id_supplier" type="text" value="<?php echo $ID_SUPPLIER; ?>" readonly>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" >Nama Supplier</label>
                    <div class="controls">
                    <input class="form-control" name="nm_supplier" type="text" placeholder="Input Nama Supplier.." required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"> Alamat Supplier </label>
                    <div class="controls">
                    <input class="form-control" name="almt_supplier" type="text" placeholder="Input Alamat..." required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">Email Supplier</label>
                    <div class="controls">
                    <input class="form-control" name="email_supplier" type="text" placeholder="Input Email..." required>
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