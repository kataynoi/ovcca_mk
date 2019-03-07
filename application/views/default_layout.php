<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo version();?></title>
    <script src="<?php echo base_url()?>assets/vendor/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/js/jquery.blockUI.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/sb-admin-2.min.css" rel="stylesheet">
    <!--Set Color Page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-cyan.css">
    <!--
        https://www.w3schools.com/w3css/w3css_color_themes.asp
    -->
    <!-- theme Color-->

    <!-- Alert Css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> <link href="<?php echo base_url()?>assets/vendor/css/freeow.css" rel="stylesheet">

    <!-- Alert Css-->

    <!-- Custom Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Kanit');
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
<style>
    body {
        font-family: 'Kanit', sans-serif;
        font-size: 90%;
    };
    .badge {
        padding: 1px 9px 2px;
        font-size: 12.025px;
        font-weight: bold;
        white-space: nowrap;
        color: #ffffff;
        background-color: #999999;
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;
    }
    .badge:hover {
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
    }
    .badge-error {
        background-color: #b94a48;
    }
    .badge-error:hover {
        background-color: #953b39;
    }
    .badge-warning {
        background-color: #f89406;
    }
    .badge-warning:hover {
        background-color: #c67605;
    }
    .badge-success {
        background-color: #468847;
    }
    .badge-success:hover {
        background-color: #356635;
    }
    .badge-info {
        background-color: #3a87ad;
    }
    .badge-info:hover {
        background-color: #2d6987;
    }
    .badge-inverse {
        background-color: #333333;
    }
    .badge-inverse:hover {
        background-color: #1a1a1a;
    }
</style>
<!-- Custom Fonts -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url()?>assets/vendor/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url()?>assets/vendor/js/sb-admin-2.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/js/underscore.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/js/jquery.cookie.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.freeow.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.numeric.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/numeral.min.js"></script>
<link href="<?php echo base_url()?>assets/vendor/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap-datepicker-custom.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url()?>assets/apps/js/apps.js"></script>
<script type="text/javascript" charset="utf-8">
    var site_url = '<?php echo site_url()?>';
    var base_url = '<?php echo base_url()?>';
    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<body >

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top w3-theme" role="navigation" style="margin-bottom: 0">
        <div >
            <?php echo $header_for_layout?>
        </div>
        <!-- /.navbar-static-side -->
        <div id="left_menu">
            <?php echo $left_for_layout?>
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div>
        <div id="page-wrapper">
            <?php echo $content_for_layout?>
        </div>
    </div>
    <div>
        <?php echo $footer_for_layout?>
    </div>

    <!-- /#page-wrapper -->

</div>
<div id="freeow" class="freeow freeow-bottom-right"></div>
</body>

</html>
