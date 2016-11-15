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
                                            <a data-target="#modalAddBarang"type="button" class="btn btn-outline btn-info" data-toggle="modal">
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
 <div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
            </div>
            <center>
            <form id="defaultForm" class="form-horizontal" method="post" action="<?php echo site_url('Barang_controller/tambah_barang')?>">
            <input type="hidden" name="rusak_barang" value="0" readonly>
            <div class="modal-body">
                <div class="form-group">
                <label class="col-lg-4 control-label">Kode Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="id_barang" value="<?php echo $ID_BARANG;?>" readonly/>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Nama Barang</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nm_barang" placeholder="Input nama barang . ." />
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Jenis Barang</label>
                    <div class="col-lg-6">
                        <select id="id_jenis_barang" tabindex="5" class="form-control" name="id_jenis_barang" data-placeholder="Pilih Jenis Barang">
                            <option value=""></option>
                            <?php
                            if(isset($data_jenis_barang)){
                                foreach($data_jenis_barang as $row){
                                    ?>
                                <option value="<?php echo $row->ID_JENIS_BARANG?>"><?php echo $row->JENIS_BARANG?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Supplier</label>
                    <div class="col-lg-6">
                        <select id="ID_SUPPLIER" tabindex="5" class="form-control" name="id_supplier" data-placeholder="Pilih Supplier">
                            <option value=""></option>
                            <?php
                            if(isset($data_supplier)){
                                foreach($data_supplier as $row){
                                    ?>
                                <option value="<?php echo $row->ID_SUPPLIER?>"><?php echo $row->NM_SUPPLIER?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Stok</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="stok_barang" placeholder="Input stok barang . ."/>
                    </div>
                 </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Harga</label>
                <div class="col-lg-6">
                        <input type="text" class="form-control" name="harga_barang" placeholder="Input harga barang . ." />
                    </div>
                </div>
                <button type="button" data-dismiss="modal" class="btn btn-outline btn-warning"><i class="fa fa-mail-reply-all fa-fw"></i>Close</button>
                <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i>Simpan</button>
            </div>
            </center>
            <div class="modal-footer">
            </div>
            </form>
        </div>
    </div>
</div>