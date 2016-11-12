<!--========================= Content Wrapper ==============================-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Return Pelanggan</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">            
            <?php if(isset($dt_penjualan)){
            foreach($dt_penjualan as $row){
            ?>
                <div class="panel-heading">
                Data barang penjualan barang kepada <strong><?php echo $row->nm_pelanggan?></strong> dengan faktur penjaulan <strong><?php echo $row->kd_penjualan?></strong>
                </div>

            <?php }
                }
            ?>
                <div class="panel-body">
<!--========================= Table 1 ==============================-->
                    <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah return</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                        <?php
                        $no=1;
                        if (isset($data)){
                        foreach($data as $row){
                        ?>
                            <td><?php echo $no++; ?></td>
                                <?php if($row->status == 'proses'){?>
                            <td><button type="button" class="btn btn-block btn-warning">Proses</button></td>
                                <?php }else{ 
                                 if($row->status == 'diterima'){?>
                            <td><button type="button" class="btn btn-block btn-success">Diterima</button></td>
                                <?php }else{ ?>
                            <td><button type="button" class="btn btn-block btn-danger">Ditolak</button></td>                                
                                <?php }
                                    }
                                ?>
                            <td><input class="form-control" type="text" value="<?php echo $row->kd_barang;?>" readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->nm_barang;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->rusak;?>"readonly></td>
                            <td><input class="form-control" type="text" value="<?php echo $row->ket;?>"readonly></td>
                        </tr>
                            <?php }
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
<!--========================= Table 2 ==============================-->
                 <form action="<?php echo site_url('verifikasi_gudang/update_return_c') ?>" method="post">
                        <?php
                        $no=1;
                        if (isset($dt_penjualan)){
                        foreach($dt_penjualan as $row){
                        ?>
                        <input type="hidden" name="kd_penjualan" value="<?php echo $row->kd_penjualan?>" readonly>
                        <input type="hidden" name="dt_return" value="yes" readonly>
                        <input type="hidden" name="return_dt" value="yes" readonly>
                        <input type="hidden" name="status" value="proses" readonly>
                            <?php }
                                }
                            ?>
                        <div class="control-group">
                        <label class="control-label">proses barang return</label>
                            <div class="controls">
                            <select id="kd_barang" class="chzn-select" name="kd_barang" data-placeholder="Pilih Barang">
                            <option value=""></option>
                            <?php
                            if(isset($data_return)){
                            foreach($data_return as $row){
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
                </div><!--== End Panel Body ==-->
                <div class="panel-footer">
                <button type="submit" class="btn btn-outline btn-primary">
                    <i class="fa fa-check fa-fw"></i> Confirm
                </button>
                <a href="<?php echo site_url('return_customer')?>" type="button" class="btn btn-outline btn-warning">
                    <i class="fa fa-mail-reply-all fa-fw"></i> Cancel
                </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ===========================================               sec 3           ========================================= -->
<!-- ===========================================         java script ajax      ========================================= -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#kd_barang").change(function(){
            var kd_barang = $("#kd_barang").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('return_customer/detail_barang_return'); ?>",
                data: "kd_barang="+kd_barang,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                        document.frm.add.disabled=false;
                 }
            });
        });
    })
</script>