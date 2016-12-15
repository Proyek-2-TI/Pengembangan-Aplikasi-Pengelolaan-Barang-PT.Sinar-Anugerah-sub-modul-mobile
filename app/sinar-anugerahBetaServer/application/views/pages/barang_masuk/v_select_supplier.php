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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
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
                                        <td><?php echo $row->NM_SUPPLIER; ?></td>
                                        <td><?php echo $row->ALMT_SUPPLIER; ?></td>
                                        <td><?php echo $row->EMAIL_SUPPLIER; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Barang_Masuk_Controller/view_barang/'.$row->ID_SUPPLIER);?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Lihat Barang</a>
                                            <a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('Barang_Masuk_Controller/pages_tambah_barang_masuk/'.$row->ID_SUPPLIER);?>"> 
                                            <i class="fa fa-trash-o fa-fw"></i> Pilih</a>
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
        </div>
    </div>
</div>                                            