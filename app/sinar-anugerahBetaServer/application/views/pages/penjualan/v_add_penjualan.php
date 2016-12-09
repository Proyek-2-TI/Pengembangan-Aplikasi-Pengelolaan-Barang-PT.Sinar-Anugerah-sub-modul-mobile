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
                        <?php echo $headerPanel ?> dengan faktur
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data barang yand akan di jual 
                                </div>
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="example">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Customer</th>
                                                <th>Customer</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>
                                                    <div style="text-align: center;">
                                                    <a data-target="#formModal"type="button" class="btn btn-block btn-outline btn-info btn-xs" data-toggle="modal">
                                                        <i class="fa fa-plus fa-fw"></i> Tambah Barang
                                                    </a>
                                                    </div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Total Harga 
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="disabled" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <select id="id_customer" class="chzn-select" name="ID_CUSTOMER">
                                        <option value="">Pilih Customer</option>
                                        <?php
                                        if (isset($data_customer)){
                                            foreach($data_customer as $row){
                                            ?>
                                        <option value="<?php echo $row->ID_CUSTOMER?>"><?php echo $row->NM_CUSTOMER?></option>
                                        <?php }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="panel-body">
                                    <div id="detail_customer"></div>
                                </div><!-- /.panel-body -->
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    <button  type="submit" class="btn btn-outline btn-primary">
                        <i class="fa fa-save fa-fw"></i> Simpan
                    </button>
                    <a href="<?php echo site_url('Penjualan_controller')?>" type="button" class="btn btn-outline btn-warning">
                        <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal add barang -->

<div class="col-lg-12">
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="H2">Tambah barang yang akan di jual</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                    <div class="form-group">
                        <label>Text Input</label>
                        <input class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Text Input with Placeholder</label>
                        <input class="form-control" placeholder="Enter text" />
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===========================================                               ======================================= -->
<!-- ===========================================              js               ========================================= -->

            <script type="text/javascript">
                $(document).ready(function() {

                    $("#id_customer").change(function(){
                        var ID_CUSTOMER = $("#id_customer").val();
                        $.ajax({
                            type: "POST",
                            url : "<?php echo base_url('Penjualan_Controller/get_detail_customer'); ?>",
                            data: "id_customer="+ID_CUSTOMER,
                            cache:false,
                            success: function(data){
                                $('#detail_customer').html(data);
                            }
                        });
                    });


                    $("#id_customer").change(function(){
                        var kd_barang = $("#kd_barang").val();
                        $.ajax({
                            type: "POST",
                            url : "<?php echo base_url('Penjualan_controller/get_detail_customer'); ?>",
                            data: "kd_barang="+kd_barang,
                            cache:false,
                            success: function(data){
                                $('#detail_barang').html(data);
                                document.frm.add.disabled=false;
                            }
                        });
                    });

                    $(".delbutton").click(function(){
                        var element = $(this);
                        var del_id = element.attr("id");
                        var info = del_id;
                        if(confirm("Anda yakin akan menghapus?"))
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                                data: "kode="+info,
                                cache: false,
                                success: function(){
                                }
                            });
                            $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
                        }
                        return false;
                    });

                })
            </script>