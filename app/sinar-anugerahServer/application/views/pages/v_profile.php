        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Profile Perusahaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Profile Perusahaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_profile')?>">
                                    <?php
                                    if (isset($dt_contact)){
                                        foreach($dt_contact as $row){
                                    ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Nama Perusahaan</td>
                                        <td><input class="form-control" name="nama" type="text" value="<?php echo $row->nama;?>" readonly></td>
                                    </tr>
                                        <td>Alamat</td>
                                        <td><input class="form-control" name="nama" type="text" value="<?php echo $row->alamat;?>" readonly></td>
                                    <tr>

                                        <td>Deskripsi</td>
                                        <td><input class="form-control" name="username" type="text" value="<?php echo $row->desc;?>"></td>
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
    