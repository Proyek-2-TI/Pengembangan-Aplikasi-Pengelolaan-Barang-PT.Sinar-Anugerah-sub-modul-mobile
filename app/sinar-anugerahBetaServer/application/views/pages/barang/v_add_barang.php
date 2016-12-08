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
                        <form  method="post" enctype= "multipart/form-data" action="<?php echo site_url('Barang_Controller/proses_tambah_barang')?>" class="form-horizontal" id="popup-validation">
                            <input type="hidden" name="id_barang" value="<?php echo $ID_BARANG?>">
                            <div class="form-group">
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url('assets/adminTemplates/img/demoUpload.jpg')?>" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">                                            
                                        </div>
                                        <div>
                                            <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                            <input type="file" name="userfile" /></span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Barang </label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="nm_barang" id="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Supplier</label>
                                <div class="col-lg-4">
                                    <select id="id_supplier" name="id_supplier" class="validate[required] form-control">
                                        <option value="">Pilih Supplier</option>
                                        <?php
                                        if (isset($data_supplier)){
                                            foreach($data_supplier as $row){
                                            ?>
                                        <option value="<?php echo $row->ID_SUPPLIER?>"><?php echo $row->NM_SUPPLIER?></option>
                                        <?php }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Jenis</label>
                                <div class="col-lg-4">
                                    <select id="id_jenis_barang" name="id_jenis_barang" class="validate[required] form-control">
                                        <option value="">Pilih Jenis Barang</option>
                                        <?php
                                        if (isset($jenis_barang)){
                                            foreach($jenis_barang as $row){
                                            ?>
                                        <option value="<?php echo $row->ID_JENIS_BARANG?>"><?php echo $row->JENIS_BARANG?></option>
                                        <?php }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Stok</label>
                                <div class=" col-lg-4">
                                    <input class="validate[required,custom[number]] form-control" type="text" name="stok_barang" id="stok_barang" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Rusak</label>
                                <div class=" col-lg-4">
                                    <input class="validate[required,custom[number]] form-control" type="text" name="rusak_barang" id="rusak_barang" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Harga</label>
                                <div class=" col-lg-4">
                                    <input class="validate[required,custom[number]] form-control" type="text" name="harga_barang" id="harga_barang" />
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