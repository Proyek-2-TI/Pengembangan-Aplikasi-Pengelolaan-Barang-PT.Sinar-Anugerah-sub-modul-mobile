<html lang="en">
<head>
    <title><?php echo $title?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap-responsive.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css')?>"/>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"/>
        <link rel="stylesheet" href="<?php echo base_url('asset/new/bootstrap/css/bootstrap.min.css')?>"/>
        <link rel="stylesheet" href="<?php echo base_url('asset/new/font-awesome/css/font-awesome.min.css')?>"/>
        <link rel="stylesheet" href="<?php echo base_url('asset/new/css/form-elements.css')?>"/>
        <link rel="stylesheet" href="<?php echo base_url('asset/new/css/style.css')?>">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>PT Sinar Anugerah</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                                <?php
                                $message = $this->session->flashdata('notif');
                                if($message){
                                echo '<p class="alert alert-danger text-center">'.$message .'</p>';
                                 }?>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login </h3>
                                    <p>Masukan Username dan Password:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?= site_url('Login_Controller/cek_login')?>" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>