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
                                        <th></th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($data_barang)){
                                    foreach($data_barang as $row){
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <img src="<?php echo base_url('uploads/'.$row->GBR_BARANG)?>" height="50px" width="50px">                                            
                                        </td>
                                        <td><?php echo $row->NM_BARANG; ?></td>
                                        <td><?php echo $row->STOK_BARANG; ?></td>
                                        <td><?php echo $row->HARGA_BARANG; ?></td>
                                    </tr>
                                <?php }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Barang_Masuk_Controller/select_supplier');?>"> 
                        <i class="fa fa-pencil fa-fw"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                                            