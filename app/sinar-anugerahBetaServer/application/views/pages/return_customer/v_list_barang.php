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
                                        <th>Barang</th>
                                        <th>Jumlah Penjualan</th>
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
                                        <td><?php echo $row->NM_BARANG; ?></td>
                                        <td><?php echo $row->QTY; ?></td>
                                        <td>
                                        <form method="post" action=""> 
                                            <input type="hidden" name="statusPost" value="inputRB">
                                            <input type="hidden" name="id_barang" value="<?php echo $row->ID_BARANG ?>;">   
                                            <input class="form-control" type="number" name="qty_rusak" required="" placeholder="Masukan jumlah return barang">
                                            <Button type="submit" class="btn btn-outline btn-primary" href="<?php echo site_url('Return_Customer_Controller/submit');?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Submit</Button>
                                       </form>
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