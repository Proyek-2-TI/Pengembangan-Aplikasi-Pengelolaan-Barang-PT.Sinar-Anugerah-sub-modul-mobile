<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Data Pegawai</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                Tabel Data Pegawai
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pegawai</th>
                                <th>User ID</th>
                                <th>Nama Pegawai</th>
                                <th>Level</th>
                                <th>
                                    <a data-target="#modalAddPegawai"type="button" class="btn btn-outline btn-info" data-toggle="modal">
                                        <i class="fa fa-plus fa-fw"></i> Tambah Data
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        if(isset($data_pegawai)){
                            foreach($data_pegawai as $row){
                                ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->kd_pegawai; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->level; ?></td>
                                <td>
                                    <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('master/edit_data_pegawai/'.$row->kd_pegawai);?>"> 
                                        <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                    <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('master/hapus_pegawai/'.$row->kd_pegawai);?>"
                                    onclick="return confirm('Anda yakin?')"> 
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
<!-- ============ MODAL ADD PEGAWAI =============== -->
 <div class="modal fade" id="modalAddPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pegawai</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_pegawai')?>">
            <div class="modal-body">
                <div class="control-group">
                <label class="control-label">Kode Pegawai</label>
                    <div class="controls">
                    <input class="form-control" name="kd_pegawai" type="text" value="<?php echo $kd_pegawai; ?>" readonly>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" >Username</label>
                    <div class="controls">
                    <input class="form-control" name="username" type="text" placeholder="Input username..."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"> Password </label>
                    <div class="controls">
                    <input class="form-control" name="password" type="text" placeholder="Input Password..."required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">Nama Pegawai</label>
                    <div class="controls">
                    <input class="form-control" name="nama" type="text" placeholder="Input Nama Pegawai. . ."required>
                </div>
                <div class="control-group">
                <label class="control-label">Level</label>
                    <div class="controls">
                    <select class="form-control"name="level" id="level">
                        <option value=""> = Pilih Level Akses = </option>
                        <option value="admin">Admin</option>
                        <option value="pegawai">Pegawai Sales</option>
                        <option value="gudang">Pegawai Pergudangan</option>
                    </select>
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