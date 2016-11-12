        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Pelanggan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_pelanggan')?>">
                                    <?php
                                    if (isset($data)){
                                        foreach($data as $row){
                                    ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Kode Customer</td>
                                        <td><input class="form-control" name="kd_pelanggan" type="text" value="<?php echo $row->kd_pelanggan;?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Customer</td>
                                        <td><input class="form-control" name="nm_pelanggan" type="text" value="<?php echo $row->nm_pelanggan;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><input class="form-control" name="alamat" type="text" value="<?php echo $row->alamat;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input class="form-control" name="email" type="text" value="<?php echo $row->email;?>"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button  type="submit" class="btn btn-outline btn-primary">
                                    <i class="fa fa-save fa-fw"></i> Simpan
                                </button>
                                <a href="<?php echo site_url('master/pelanggan_data')?>" type="button" class="btn btn-outline btn-warning">
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
    