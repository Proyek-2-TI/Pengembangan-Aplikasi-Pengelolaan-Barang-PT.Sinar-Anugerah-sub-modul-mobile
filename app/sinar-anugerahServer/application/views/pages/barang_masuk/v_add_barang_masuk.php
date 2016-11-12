<!-- ===========================================       Tambah Barang Masuk     ======================================= -->
<!-- ===========================================             sec 2             ======================================= -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Tambah Barang Masuk</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="well">
    <fieldset>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data barang masuk
                    </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Rusak</th>
                            <th>
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddBarangMasuk">
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
                                <td><?php echo $items['price']; ?></td>
                                <td>
                                    <a class="btn btn-mini btn-danger btn-block delbutton" href="#" class="delbutton"
                                       id="<?php echo 'tambah/'.$items['rowid'].'/'.$kd_barang_masuk.'/'.$items['id'].'/'.$items['qty']; ?>">
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
    </form>
    <fieldset>
        <form id = "defaultForm"action="<?php echo site_url('barang_masuk/simpan_barang_masuk') ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Faktur Pembelian Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <input class="form-control" id="disabledInput" type="text" name="kd_barang_masuk"placeholder="Input Faktur Pembelian . . .">
                            <?php
                            if(isset($data_barang)){
                                foreach($data_barang as $row){
                                    ?>
                            <input type="hidden" name="kd_supplier" value="<?php echo $row->kd_supplier; ?>" readonly>
                            <?php
                                    }
                                }
                            ?>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>
            <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
            <a href="<?php echo site_url('barang_masuk')?>" type="button" class="btn btn-outline btn-warning">
                <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
            </a>
                <input id="tanggal_masuk" type="hidden" name="tanggal_masuk" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
            <div class="panel-footer">
            </div>
        </form>
    </fieldset>
</div>
<!-- ===========================================            sec 3             ========================================= -->
<!-- ===========================================     MODAL ADD BARANG MASUK   ========================================= -->
<div class="modal fade" id="modalAddBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Barang Masuk</h4>
            </div>
            <?php
            if(isset($data_barang)){
            foreach($data_barang as $row){
            ?>              
            <form id="frm" name="frm"  method="post" action="<?php echo site_url('barang_masuk/pages_tambah_barang_masuk/'.$row->kd_supplier)?>">
            <?php
                    }
                }
            ?>
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
            <div id="detail_barang"></div>
        </div>
        <div class="modal-footer">
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#kd_barang").change(function(){
            var kd_barang = $("#kd_barang").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('barang_masuk/get_detail_barang'); ?>",
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
                    url: "<?php echo base_url(); ?>barang_masuk/hapus_penjualan",
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
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            kd_barang_masuk: {
                message: 'field tidak valid',
                validators: {
                    notEmpty: {
                        message: 'Faktur pembelian harus di isi'
                    },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Faktur pembelian hanya bisa di isi huruf, angka, titik, dan underscore'
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