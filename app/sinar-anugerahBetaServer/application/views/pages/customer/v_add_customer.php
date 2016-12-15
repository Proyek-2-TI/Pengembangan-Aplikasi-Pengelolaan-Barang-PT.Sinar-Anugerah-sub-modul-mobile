<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $headerPage ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $headerPanel ?>
                    </div>
                    <div class="panel-body">
                        <form  method="post" enctype= "multipart/form-data" action="<?php echo site_url('Customer_Controller/proses_tambah_customer')?>" class="form-horizontal" id="popup-validation">
                            <input type="hidden" name="id_customer" value="<?php echo $ID_CUSTOMER?>">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Customer </label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="nm_customer" id="id_customer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Alamat </label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="almt_customer" id="almt_customer">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Email </label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="email_customer" id="email_customer">
                                </div>
                            </div>
                            <div style="text-align:center" class="form-actions no-margin-bottom">
                                <button type ="submit" class="btn btn-default btn-round">Submit</button>
                                <a href="<?php echo site_url('Barang_Controller')?>" class="btn btn-default btn-round">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>