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
                        <form  method="post" enctype= "multipart/form-data" action="<?php echo site_url('Pegawai_controller/proses_edit_pegawai')?>" class="form-horizontal" id="popup-validation">
                            <?php
                            if (isset($data_pegawai)){
                                foreach($data_pegawai as $row){
                            ?>
                            <input type="hidden" name="id_pegawai" value="<?php echo $row->ID_PEGAWAI;?>">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Username </label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="username" id="username" value="<?php echo $row->USERNAME; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-lg-4">Password</label>
                                <div class=" col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="password" id="password" value="<?php echo $row->PASSWORD;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Nama Pegawai</label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="nm_pegawai" id="nm_pegawai"  value="<?php echo $row->NM_PEGAWAI;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-4">level Akses</label>
                                <div class="col-lg-4">
                                    <input type="text" class="validate[required] form-control" name="id_lvl_akses" id="id_lvl_akses"  value="<?php echo $row->ID_LVL_AKSES;?>">
                                </div>
                            </div>
                            <?php }
                                }
                            ?>
                            <div style="text-align:center" class="form-actions no-margin-bottom">
                                <button type ="submit" class="btn btn-default btn-round">Submit</button>
                                <a href="<?php echo site_url('Customer_Controller')?>" class="btn btn-default btn-round">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>