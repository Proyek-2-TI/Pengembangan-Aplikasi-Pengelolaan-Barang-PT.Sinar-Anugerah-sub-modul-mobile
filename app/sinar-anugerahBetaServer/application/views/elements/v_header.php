<html lang="en">
<head>
    <title><?php echo $title?></title>

   <!-- Bootstrap Chosen CSS -->    
    <link href="<?php echo base_url('asset/choosen/css/chosen.css')?>" rel="stylesheet"/>
    <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }

    </style>
    <!-- js choosen -->
    <script type="text/javascript" src="<?php echo base_url('asset/choosen/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/choosen/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/choosen/js/chosen.jquery.js');?>"></script>
    <script type="text/javascript">
        $(function(){
            $('.chzn-select').chosen();
            $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        });
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('asset/bower_components/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url('asset/dist/css/timeline.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('asset/bower_components/morrisjs/morris.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    
    <!-- Js Validator -->
    <script type="text/javascript" src="<?php echo base_url('asset/validator/vendor/jquery/jquery-1.10.2.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/validator/dist/js/bootstrapValidator.js')?>"></script>
</head>

    <!--========================= Header + Navbar ==============================-->
    
    <?php if ($this->session->userdata('LEVEL') == '1'){ ?>
    <body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sinar Anugerah</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"> </i>  <i class="fa fa-caret-down"></i>
                    </a>                    
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('Dashboard_controller')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('penjualan')?>"><i class="fa fa-shopping-cart fa-fw"></i>Penjualan</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('barang_masuk')?>"><i class="fa fa-bank fa-fw"></i> Barang Masuk</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('return_customer')?>"><i class="fa fa-hand-o-left fa-fw"></i> Return Customer</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('verifikasi_gudang')?>"><i class="fa fa-chain fa-fw"></i> Verifikasi Gudang</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('return_supplier')?>"><i class="fa fa-hand-o-right fa-fw"></i> Return Supplier</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('Supplier_controller')?>"><i class="fa fa-group fa-fw"></i> Data Supplier</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('Barang_controller')?>"><i class="fa fa-desktop fa-fw"></i> Data Barang</a>                            
                        </li>
                         <li>
                            <a href="<?php echo site_url('Customer_controller')?>"><i class="fa fa-money fa-fw"></i> Data Customer</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('master/pegawai_data')?>"><i class="fa fa-male fa-fw"></i> Data pegawai</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    <?php } else { 
        if ($this->session->userdata('LEVEL') == '2'){?>
    <body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sinar Anugerah</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('master/barang_data_sales')?>"><i class="fa fa-desktop fa-fw"></i> Data Barang</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('penjualan')?>"><i class="fa fa-shopping-cart fa-fw"></i>Penjualan</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('return_customer')?>"><i class="fa fa-hand-o-left fa-fw"></i>Return Customer</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    <?php } else { ?>
    <body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sinar Anugerah</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('master/barang_data')?>"><i class="fa fa-desktop fa-fw"></i> Data Barang</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('barang_masuk')?>"><i class="fa fa-bank fa-fw"></i> Barang Masuk</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('verifikasi_gudang')?>"><i class="fa fa-chain fa-fw"></i> Verifikasi Gudang</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('return_supplier')?>"><i class="fa fa-hand-o-right fa-fw"></i> Return Supplier</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('Login_Controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    <?php   }
        } 
    ?>

