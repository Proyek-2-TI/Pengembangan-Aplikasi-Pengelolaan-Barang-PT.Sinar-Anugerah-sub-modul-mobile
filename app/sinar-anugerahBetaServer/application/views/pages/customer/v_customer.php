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
                                        <th>Customer</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>
                                            <a href="<?php echo site_url('Customer_Controller/tambah_customer')?>" " type="button" class="btn btn-primary">
                                                Tambah
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=1;
                                if(isset($data_customer)){
                                    foreach($data_customer as $row){
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        </td>
                                        <td><?php echo $row->ID_CUSTOMER; ?></td>
                                        <td><?php echo $row->NM_CUSTOMER; ?></td>
                                        <td><?php echo $row->ALMT_CUSTOMER; ?></td>
                                        <td><?php echo $row->EMAIL_CUSTOMER; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-outline btn-primary" href="<?php echo site_url('Customer_Controller/edit_data_customer/'.$row->ID_CUSTOMER);?>"> 
                                            <i class="fa fa-pencil fa-fw"></i> Edit</a>
                                            <a type="button" class="btn btn-outline btn-danger" href="<?php echo site_url('Customer_Controller/hapus_Customer/'.$row->ID_CUSTOMER);?>"
                                               onclick="return confirm('Anda yakin?')"> 
                                            <i class="fa fa-trash-o fa-fw"></i> Hapus</a>
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
                   <div class="col-lg-12">
                        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2">Modal Form</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form role="form">
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control" />
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input with Placeholder</label>
                                            <input class="form-control" placeholder="Enter text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Static Control</label>
                                            <p class="form-control-static">email@example.com</p>
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