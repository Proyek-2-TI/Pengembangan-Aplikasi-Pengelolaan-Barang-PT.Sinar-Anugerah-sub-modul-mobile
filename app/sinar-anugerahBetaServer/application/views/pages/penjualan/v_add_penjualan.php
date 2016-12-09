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
                        <?php echo $headerPanel ?> dengan faktur <?php echo $kd_penjualan; ?>
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
                                                    <th>ID</th>
                                                    <th>Namar</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Sub Total</th>
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
                                                            <a class="btn btn-mini btn-danger btn-block delbutton  btn-xs" href="#" class="delbutton"
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
                        <div class="col-lg-6">
                            <form id ="default" action="<?php echo site_url('Penjualan_Controller/simpan_penjualan') ?>" method="post">
                            <input type="hidden" name="id_penjualan" value="<?= $kd_penjualan; ?>" readonly>
                            <input type="hidden" name="total_penjualan" value="<?= $this->cart->total()?>">
                            <input id="tgl_penjualan" type="hidden" name="tgl_penjualan" data-date-format="dd-mm-yyyy" 
                                value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
         
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Total Harga 
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="disabled" value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>" />
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
                            <button  type="submit" class="btn btn-outline btn-primary">
                                <i class="fa fa-save fa-fw"></i> Simpan
                            </button>
                            <a href="<?php echo site_url('Penjualan_controller')?>" type="button" class="btn btn-outline btn-warning">
                                <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
                            </a>
                        </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                    </div>
                    </form>
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
                    <select id="id_barang" class="chzn-select" name="id_barang" data-placeholder="Pilih Barang">
                        <option value=""></option>
                        <?php
                        if(isset($data_barang)){
                            foreach($data_barang as $row){
                        ?>
                        <option value="<?php echo $row->ID_BARANG?>"><?php echo $row->NM_BARANG?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <div id="detail_barang"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <div style  align="center">
                        Silahkan pilih barang yang akan di jual
                    </div>
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
            var id_customer = $("#id_customer").val();
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('Penjualan_Controller/get_detail_customer'); ?>",
                data: "id_customer="+id_customer,
                cache:false,
                success: function(data){
                    $('#detail_customer').html(data);
                }
            });
        });

        $("#id_barang").change(function(){
            var id_barang = $("#id_barang").val();
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('Penjualan_Controller/get_detail_barang'); ?>",
                data: "id_barang="+id_barang,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
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