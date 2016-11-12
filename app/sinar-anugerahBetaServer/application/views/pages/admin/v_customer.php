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
                                    if(isset($data_customer)){
                                        foreach($data_customer as $row){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->ID_CUSTOMER; ?></td>
                                                <td><?php echo $row->NM_CUSTOMER; ?></td>
                                                <td><?php echo $row->ALMT_CUSTOMER; ?></td>
                                                <td><?php echo $row->EMAIL_CUSTOMER; ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Customer_controller/edit_data_customer/'.$row->ID_CUSTOMER);?>"> 
                                                    <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                                    <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('Customer_controller/hapus_customer/'.$row->ID_CUSTOMER);?>"
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
            <form class="form-horizontal" method="post" action="<?php echo site_url('Customer_controller/tambah_customer')?>">
            <div class="modal-body">
                <div class="control-group">
                <label class="control-label">ID Customer</label>
                    <div class="controls">
                    <input class="form-control" name="id_customer" type="text" value="<?php echo $ID_CUSTOMER; ?>" readonly>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" >Nama Customer</label>
                    <div class="controls">
                    <input class="form-control" name="nm_customer" type="text" placeholder="Input Nama Customer.."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"> Alamat </label>
                    <div class="controls">
                    <input class="form-control" name="almt_customer" type="text" placeholder="Input Alamat..."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">Email</label>
                    <div class="controls">
                    <input class="form-control" name="email_customer" type="text" placeholder="Input Email..."required>
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