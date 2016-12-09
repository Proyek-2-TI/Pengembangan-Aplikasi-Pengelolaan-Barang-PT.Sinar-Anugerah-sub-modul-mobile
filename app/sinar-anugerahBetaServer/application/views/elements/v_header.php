<!DOCTYPE html>
<head>
    <title><?php echo $title ?></title>
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/css/main.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/css/theme.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/css/MoneAdmin.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/plugins/Font-Awesome/css/font-awesome.css')?>" />

    <!-- DataTables STYLES -->
    <link href="<?php echo base_url('assets/adminTemplates/plugins/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet" />
    <!-- FilesUpload STYLES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/css/bootstrap-fileupload.min.css')?>" />
    <!-- PAGE FormValidation LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo base_url('assets/adminTemplates/plugins/validationengine/css/validationEngine.jquery.css')?>" />
    <!-- Page Choosen Level Styles -->
    <link href="<?php echo base_url('assets/choosen/css/chosen.css')?>" rel="stylesheet"/>
    <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }
    </style>
    <script type="text/javascript" src="<?php echo base_url('assets/choosen/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/choosen/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/choosen/js/chosen.jquery.js');?>"></script>
    <script type="text/javascript">
        $(function(){
            $('.chzn-select').chosen();
            $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        });
    </script>

</head>

    <?php if ($this->session->userdata('LEVEL') == '1'){ ?>

<body class="padTop53 " >
    <div id="wrap">
        <div id="top">
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
<!-- 
                    <img src="<?php echo base_url('assets/adminTemplates/img/logo.png')?>" alt="" /></a>
 -->
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
                    <!--ADMIN SETTINGS SECTIONS -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>
                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
        <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url('uploads/AldyMUldani.png')?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Nama user</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel <?php echo $dashboard ?>">
                    <a href="<?php echo site_url('Dashboard_controller')?>" >
                        <i class="icon-table"></i> Dashboard
                    </a>                   
                </li>
                <li li class="panel <?php echo $barang ?>">
                    <a href="<?php echo site_url('Barang_Controller')?>">
                        <i class="icon-film"></i> Barang 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Pegawai_Controller')?>">
                        <i class="icon-table"></i> Pegawai 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Customer_Controller')?>">
                        <i class="icon-map-marker"></i> Customer 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Supplier_Controller')?>">
                        <i class="icon-columns"></i> Supplier 
                    </a>
                </li>
                <li li class="panel <?php echo $penjualan ?>">
                    <a href="<?php echo site_url('Penjualan_Controller')?>">
                        <i class="icon-signin"></i> Penjualan 
                    </a>
                </li>
                <li><a href="<?php echo site_url('Login_Controller/logout')?>">
                        <i class="icon-signin"></i> Logout 
                    </a>
                </li>
            </ul>
        </div>
        <!--END MENU SECTION -->

    <?php } else { 
        if ($this->session->userdata('LEVEL') == '2'){?>

<body class="padTop53 " >
    <div id="wrap">
        <div id="top">
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
<!-- 
                    <img src="<?php echo base_url('assets/adminTemplates/img/logo.png')?>" alt="" /></a>
 -->
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
                    <!--ADMIN SETTINGS SECTIONS -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>
                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
        <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url('uploads/AldyMUldani.png')?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Penjualan</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel <?php echo $dashboard ?>">
                    <a href="<?php echo site_url('Dashboard_controller')?>" >
                        <i class="icon-table"></i> Dashboard
                    </a>                   
                </li>
                <li li class="panel <?php echo $barang ?>">
                    <a href="<?php echo site_url('Barang_Controller')?>">
                        <i class="icon-film"></i> Barang 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Pegawai_Controller')?>">
                        <i class="icon-table"></i> Pegawai 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Customer_Controller')?>">
                        <i class="icon-map-marker"></i> Customer 
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Supplier_Controller')?>">
                        <i class="icon-columns"></i> Supplier 
                    </a>
                </li>
                <li li class="panel <?php echo $penjualan ?>">
                    <a href="<?php echo site_url('Penjualan_Controller')?>">
                        <i class="icon-signin"></i> Penjualan 
                    </a>
                </li>
                <li><a href="<?php echo site_url('Login_Controller/logout')?>">
                        <i class="icon-signin"></i> Logout 
                    </a>
                </li>
            </ul>
        </div>
        <!--END MENU SECTION -->

    <?php } else { 
        if ($this->session->userdata('LEVEL') == '3'){?> 

<body class="padTop53 " >
    <div id="wrap">
        <div id="top">
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
<!-- 
                    <img src="<?php echo base_url('assets/adminTemplates/img/logo.png')?>" alt="" /></a>
 -->
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
                    <!--ADMIN SETTINGS SECTIONS -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>
                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
        <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url('uploads/AldyMUldani.png')?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Pergudangan</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel <?php echo $dashboard ?>">
                    <a href="<?php echo site_url('Dashboard_controller')?>" >
                        <i class="icon-table"></i> Dashboard
                    </a>                   
                </li>
                <li li class="panel <?php echo $barang ?>">
                    <a href="<?php echo site_url('Barang_Controller')?>">
                        <i class="icon-film"></i> Barang 
                    </a>
                </li>
                <li><a href="<?php echo site_url('Pegawai_Controller')?>"><i class="icon-table"></i> Pegawai </a></li>
                <li><a href="<?php echo site_url('Customer_Controller')?>"><i class="icon-map-marker"></i> Customer </a></li>
                <li><a href="<?php echo site_url('Supplier_Controller')?>"><i class="icon-columns"></i> Supplier </a></li>
                <li><a href="<?php echo site_url('Penjualan_Controller')?>"><i class="icon-signin"></i> Penjualan </a></li>
                <li><a href="<?php echo site_url('Login_Controller/logout')?>"><i class="icon-signin"></i> Logout </a></li>
            </ul>
        </div>
        <!--END MENU SECTION -->

    <?php } else { ?>          
    <?php }
        }
    } ?>                 