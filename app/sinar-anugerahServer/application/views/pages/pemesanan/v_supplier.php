<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header"> Tambah Pemesanan Barang</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <i class="fa fa-bank fa-fw"></i> Daftar Supplier
                </div><!-- /.panel-heading -->
            <div class="panel-body">
                 <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        if(isset($data_supplier)){
                            foreach($data_supplier as $row){
                                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->nm_supplier; ?></td>
                            <td><?php echo $row->alamat; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td>
                                <a class="btn btn-outline btn-primary" href="<?php echo site_url('pemesanan/detail_barang_supplier/'.$row->kd_supplier)?>">
                                    <i class="fa fa-eye fa-fw"></i> View Barang
                                </a>                            
                                <a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('pemesanan/pages_tambah_pemesanan/'.$row->kd_supplier);?>"> 
                                    <i class="fa fa-plus fa-fw"></i> Pilih
                                </a>
                             </td>
                        </tr>
                        <?php }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="<?php echo site_url('barang_masuk')?>" type="button" class="btn btn-outline btn-primary">
        <i class="fa fa-mail-reply-all fa-fw"></i> Back
    </a>    
</div>