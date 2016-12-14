<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi pengelolaan barang sinar anugerah dengan CI & Bootstrap">
    <meta name="author" content="Djava-ui">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/choosen/css/bootstrap.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/choosen/css/bootstrap-responsive.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/choosen/css/style.css')?>"/>
    <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }
    </style>

    <!-- Fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url('asset/img/favicon.ico')?>">


</head>

<body>
<div class="container">

    <style type="text/css">
        body{
            background-color: #ffffff;
        }
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 5px;
        }
        .span {
            width: 220px;
        }
        .sign{
            height: 100px;
            border-bottom: 1px solid #000000;
        }
        .text-center{
            text-align: center
        }

    </style>
    <div align="left">
        <?php if(isset($data_contact)){foreach($data_contact as $row){?>
            <strong style="font-size: x-large; float: left; color: #3a87ad;"><?php echo $row->NM_CONTACT?></strong> <br/><br/>
            <strong style="font-size: large; float: left; color: #3a87ad;"><?php echo $row->DESC_CONTACT?></strong> <br/>
        <?php }} ?>
        <hr/>
        <table>
            <tr>
                <?php if(isset($dt_contact)){foreach($data_contact as $row){?>
                    <td width="70%"><strong>Alamat : </strong> <?php echo $row->ALMT_CONTACT?></td>
                <?php }} ?>
                <?php if(isset($dt_contact)){foreach($data_contact as $row){?>
                    <td width="70%"><strong>Telp : </strong> <?php echo $row->TLPN_CONTACT?> </td>
                <?php }}?>
            </tr>
        </table>
    </div>
    <br/>

    <div align="center">
        <h3 style="border: 1px solid #333;">Faktur Penjualan Barang</h3>
        <br/>
        <div align="left">
            <table>
                <?php if(isset($data_penjualan)){ foreach($data_penjualan as $row) { ?>
                    <tr>
                        <td width="65%"><strong>ID Penjualan : </strong> <?php echo $row->ID_PENJUALAN; ?></td>
                        <td style="float: right"><strong>Pelanggan : </strong> <?php echo $row->NM_CUSTOMER; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Tanggal Penjualan : </strong> <?php echo date("d M Y",strtotime($row->TGL_PENJUALAN));?></td>
                        <td style="float: right"><strong>Alamat : </strong> <?php echo $row->ALMT_CUSTOMER; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Pegawai : </strong> <?php echo $row->NM_CUSTOMER; ?></td>
                        <td style="float: right"><strong>Email : </strong> <?php echo $row->EMAIL_CUSTOMER; ?></td>
                    </tr>

                <?php } } ?>
            </table>

        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
            </thead>
            <?php
            $no=1;
            if(isset($detail_penjualan)){
            foreach($detail_penjualan as $row){
            ?>
            <tbody>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->NM_BARANG; ?></td>
                <td><?php echo $row->QTY ?></td>
                <td><?php echo currency_format($row->HARGA_BARANG)?></td>
            </tr>
            <?php }
            }
            ?>
            </tbody>
        </table>
        <?php if(isset($data_penjualan)){ foreach($data_penjualan as $row) { ?>
            <h5 style="float:right;">
                Total : <?php echo currency_format($row->TOTAL_PENJUALAN)?>
            </h5>
        <?php }}?>
    </div>
    <br/>
    <hr/>

    <div class="span center">
        <?php
        if(isset($data_penjualan)){
            foreach($data_penjualan as $row) { ?>
                <h5 class="text-center">Tanda Terima</h5>
                <div class="sign"></div>
                <h6 class="text-center"><?php echo $row->NM_CUSTOMER?></h6>
            <?php }
        }
        ?>
    </div>
    <div class="span center" style="float: right">
        <?php
        if(isset($data_contact)){
            foreach($data_contact as $row) { ?>
                <h5 class="text-center"><?php echo $row->NM_CONTACT?></h5>
                <div class="sign"></div>
                <h6 class="text-center">Direktur : <?php echo $row->OWNER_CONTACT?></h6>
            <?php }
        }
        ?>
    </div>

    <script type="text/javascript" src="<?php echo base_url('assets/choosen/js/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script>

</div>
</body>

