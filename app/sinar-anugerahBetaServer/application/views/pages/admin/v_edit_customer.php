        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Customer
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('Customer_controller/edit_customer')?>">
                                    <?php
                                    if (isset($dt_customer)){
                                        foreach($dt_customer as $row){
                                    ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Kode Customer</td>
                                        <td><input class="form-control" name="id_customer" type="text" value="<?php echo $row->ID_CUSTOMER?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Customer</td>
                                        <td><input class="form-control" name="nm_customer" type="text" value="<?php echo $row->NM_CUSTOMER;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><input class="form-control" name="almt_customer" type="text" value="<?php echo $row->ALMT_CUSTOMER;?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input class="form-control" name="email_customer" type="text" value="<?php echo $row->EMAIL_CUSTOMER;?>"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button  type="submit" class="btn btn-outline btn-primary">
                                    <i class="fa fa-save fa-fw"></i> Simpan
                                </button>
                                <a href="<?php echo site_url('Customer_controller')?>" type="button" class="btn btn-outline btn-warning">
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
    