        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Data Barang</h1>
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
                            Data Barang dengan kode <?php echo $row->kd_barang;?>
                        </div>
                            <?php }
                            }
                        ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <center>
                            <form id="defaultForm" class="form-horizontal" method="post" action="<?php echo site_url('master/edit_barang')?>">
                            <?php
                            if (isset($data)){
                                foreach($data as $row){
                            ?>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Kode Barang</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="kd_barang" value="<?php echo $row->kd_barang;?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nama Barang</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="nm_barang" value="<?php echo $row->nm_barang;?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Stok</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="stok" value="<?php echo $row->stok;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-lg-4 control-label">Jenis Barang</label>
                                <div class="col-lg-6">
                                    <select id="id_jenis_barang" tabindex="5" class="form-control" name="id_jenis_barang" data-placeholder="Pilih Jenis Barang">
                                        <option value="<?php echo $row->id_jenis_barang?>"><?php echo $row->jenis_barang?></option>
                            <?php }
                                }
                            ?>
                                        <?php
                                        if(isset($data_jenis_barang)){
                                            foreach($data_jenis_barang as $row){
                                                ?>
                                            <option value="<?php echo $row->id_jenis_barang?>"><?php echo $row->jenis_barang?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                             </div>
                            <?php
                            if (isset($data)){
                                foreach($data as $row){
                            ?>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Harga</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="harga" value="<?php echo $row->harga;?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Supplier</label>
                                <div class="col-lg-6">
                                    <select id="kd_supplier" tabindex="5" class="form-control" name="kd_supplier" data-placeholder="Pilih Jenis Barang">
                                        <option value="<?php echo $row->kd_supplier?>"><?php echo $row->nm_supplier?></option>
                            <?php }
                                }
                            ?>
                                        <?php
                                        if(isset($data_supplier)){
                                            foreach($data_supplier as $row){
                                                ?>
                                            <option value="<?php echo $row->kd_supplier?>"><?php echo $row->nm_supplier?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
                            <a href="<?php echo site_url('master/barang_data')?>" type="button" class="btn btn-outline btn-warning">
                                <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
                            </a>
                            </form>                            
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    <!--========================= Script Validation ==============================-->
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            id_jenis_barang: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Pilih jenis barang'
                    }
                }
            },
            nm_barang: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Nama barang harus di isi'
                    }
                }
            },
            stok: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Stok harus di isi'
                    },
                    numeric: {
                      message: 'Stok harus di isi dengan angka'
                    }
                }
            },
            harga: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'harga harus di isi'
                    },
                    numeric: {
                      message: 'harga harus di isi dengan angka'
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>