        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <?php
                            if (isset($data)){
                            foreach($data as $row){
                        ?>
                        <div class="panel-heading">
                            Data pegawai dengan kode <?php echo $row->kd_pegawai;?>
                        </div>
                            <?php }
                            }
                        ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_pegawai')?>">
                                    <?php
                                    if (isset($data)){
                                        foreach($data as $row){
                                    ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Kode Pegawai</td>
                                        <td><input class="form-control" name="kd_pegawai" type="text" value="<?php echo $row->kd_pegawai;?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>username</td>
                                        <td><input class="form-control" name="username" type="text" value="<?php echo $row->username;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input class="form-control" name="password" placeholder"masukan password baru" type="password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td><input class="form-control" name="nama" type="text" value="<?php echo $row->nama;?>"required></td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>
                                        <select class="form-control" name="level" id="level"required>
                                            <?php if($row->level == 'admin'){?>
                                                <option value="admin" selected="selected">Administrator</option>
                                                <option value="pegawai">Pegawai Sales</option>
                                                <option value="gudang">Pegawai Gudang</option>
                                            <?php }else{ 
                                                 if($row->level == 'pegawai'){?>
                                                <option value="pegawai" selected="selected">Pegawai Sales</option>
                                                <option value="admin">Administrator</option>
                                                <option value="gudang">Pegawai Gudang</option>
                                            <?php }else{ ?> 
                                                <option value="gudang" selected="selected">Pegawai Gudang</option>                                            
                                                <option value="pegawai">Pegawai Sales</option>
                                                <option value="admin">Administrator</option>
                                                <?php }}?>
                                        </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button  type="submit" class="btn btn-outline btn-primary">
                                    <i class="fa fa-save fa-fw"></i> Simpan
                                </button>
                                <a href="<?php echo site_url('master/pegawai_data')?>" type="button" class="btn btn-outline btn-warning">
                                    <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
                                </a>
                                </form>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    