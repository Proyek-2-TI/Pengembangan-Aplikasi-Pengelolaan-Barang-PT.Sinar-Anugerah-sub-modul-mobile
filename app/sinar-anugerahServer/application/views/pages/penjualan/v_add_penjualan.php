
<!-- ===========================================        Tambah Penjualan       ======================================= -->
<!-- ===========================================             sec 2             ======================================= -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Tambah Sales Barang</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="well">
    <fieldset>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="panel-body">
                <p class="text-muted">Faktur Penjualan</p>
                <input class="form-control" id="disabledInput" type="text" value="<?php echo $kd_penjualan; ?>" disabled>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data barang yang akan di jual
                    </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>penjualan</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddPenjualanBarang">
                                    <i class="fa fa-plus fa-fw"></i> Tambah Barang
                            </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; $no=1;?>
                        <?php foreach($this->cart->contents() as $items): ?>
                            <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                            <tr class="gradeX">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $items['id']; ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td><?php echo $items['qty']; ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                <td>
                                    <a class="btn btn-mini btn-danger btn-block delbutton" href="#" class="delbutton"
                                       id="<?php echo 'tambah/'.$items['rowid'].'/'.$kd_penjualan.'/'.$items['id'].'/'.$items['qty']; ?>">
                                    <i class="fa fa-trash-o fa-fw"></i> Hapus Barang</a>
                                </td>
                            </tr>
                            <?php $i++; $no++;?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <form id ="default" action="<?php echo site_url('penjualan/simpan_penjualan') ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Harga Penjualan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <input type="text" id="disabledInput" class="form-control"
                                value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>"disabled>
                            <input type="hidden" name="kd_penjualan" value="<?= $kd_penjualan; ?>" readonly>
                            <input type="hidden" name="total_harga" value="<?= $this->cart->total()?>">
                            <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" data-date-format="dd-mm-yyyy" 
                                value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <select id="kd_pelanggan" tabindex="5" class="chzn-select" name="kd_pelanggan" data-placeholder="Pilih Pelanggan">
                                <option value=""></option>
                                <?php
                                if(isset($data_pelanggan)){
                                    foreach($data_pelanggan as $row){
                                        ?>
                                    <option value="<?php echo $row->kd_pelanggan?>"><?php echo $row->nm_pelanggan?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>                            
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                                <div id="detail_pelanggan"></div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-6 -->
            </div>
            <div class="panel-footer">
            <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
            <a href="<?php echo site_url('penjualan')?>" type="button" class="btn btn-outline btn-warning">
                <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
            </a>
            </div>
        </form>
    </fieldset>
</div>

<!-- ===========================================             sec 3             ======================================= -->
<!-- ===========================================  MODAL ADD PENJUALAN BARANG   ========================================= -->

<div class="modal fade" id="modalAddPenjualanBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Barang fikri</h4>
            </div>
            <div class="modal-body" style="min-height: 200px">
                <div class="control-group">
                    <label class="control-label">Daftar Barang</label>
                        <div class="controls">
                        <select id="kd_barang" class="chzn-select" name="kd_barang" data-placeholder="Pilih Barang">
                            <option value=""></option>
                            <?php
                            if(isset($data_barang)){
                                foreach($data_barang as $row){
                                    ?>
                                <option value="<?php echo $row->kd_barang?>"><?php echo $row->nm_barang?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div id="detail_barang"> 
                    </div>
                </div>
            <div class="modal-footer">
                <center>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">Silahkan pilih barang yang akan di jual</label>
                    </div>
                </div>
                </center>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ===========================================                               ======================================= -->
<!-- ===========================================              js               ========================================= -->

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#kd_barang").change(function(){
                        var kd_barang = $("#kd_barang").val();
                        $.ajax({
                            type: "POST",
                            url : "<?php echo base_url('penjualan/get_detail_barang'); ?>",
                            data: "kd_barang="+kd_barang,
                            cache:false,
                            success: function(data){
                                $('#detail_barang').html(data);
                                document.frm.add.disabled=false;
                            }
                        });
                    });

                    $("#kd_pelanggan").change(function(){
                        var kd_pelanggan = $("#kd_pelanggan").val();
                        $.ajax({
                            type: "POST",
                            url : "<?php echo base_url('penjualan/get_detail_pelanggan'); ?>",
                            data: "kd_pelanggan="+kd_pelanggan,
                            cache:false,
                            success: function(data){
                                $('#detail_pelanggan').html(data);
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

    <!--========================= Script Validation ==============================-->
<script type="text/javascript">
$(document).ready(function() {
    $('#default').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            kd_pelanggan: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Pelanggan Harus dipilih'
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