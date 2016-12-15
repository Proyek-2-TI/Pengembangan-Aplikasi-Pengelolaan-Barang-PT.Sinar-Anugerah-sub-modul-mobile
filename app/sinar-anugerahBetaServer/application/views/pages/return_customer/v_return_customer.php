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
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Pegawai</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Jumlah Return</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($data_penjualan)){
                                    foreach($data_penjualan as $row){
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->ID_PENJUALAN; ?></td>
                                        <td><?php echo $row->NM_CUSTOMER; ?></td>
                                        <td><?php echo $row->NM_PEGAWAI; ?></td>
                                        <td><?php echo date("d M Y",strtotime($row->TGL_PENJUALAN)); ?></td>
                                        <td><?php echo $row->JUMLAH; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Return_Customer_Controller/detail_penjualan/'.$row->ID_PENJUALAN);?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Detail</a>
                                            <a type="button" class="btn btn-outline btn-info" href="<?php echo site_url('Return_Customer_Controller/pilihPenjualan/'.$row->ID_PENJUALAN);?>" >
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
</div>                        