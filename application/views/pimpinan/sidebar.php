<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>SI ROTI CERIA</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro"/>

  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap dashboard, bootstrap, css3 dashboard, bootstrap admin, light bootstrap dashboard, frontend, responsive bootstrap dashboard">

  <!-- <meta name="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful."-->

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">

  <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
  <!-- Twitter Card data -->

  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Light Bootstrap Dashboard PRO by Creative Tim">

  <meta name="twitter:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
  <meta name="twitter:data1" content="Light Bootstrap Dashboard PRO by Creative Tim">
  <meta name="twitter:label1" content="Product Type">
  <meta name="twitter:data2" content="$29">
  <meta name="twitter:label2" content="Price">

  <!-- Open Graph data -->
  <meta property="og:title" content="Light Bootstrap Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html" />
  <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg"/>
  <meta property="og:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful." />
  <meta property="og:site_name" content="Creative Tim" />

  <!-- Bootstrap core CSS     -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

  <!--  Light Bootstrap Dashboard core CSS    -->
  <link href="<?php echo base_url();?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url();?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url();?>assets/img/full-screen-image-3.jpg">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="logo-text">
         PIMPINAN
       </a>
     </div>
     <div class="logo logo-mini">
       <a class="logo-text">
        PPN
      </a>
    </div>

    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="<?php echo base_url();?>assets/img/default-avatar.png" />
        </div>
        
      </div>

      <ul class="nav">
        <li>
          <a href="<?php echo base_url(); ?>index.php/Welcome/login">
            <i class="pe-7s-graph"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/c_peramalan/viewHalamanPeramalan">
            <i class="pe-7s-note2"></i>
            <p>Data Peramalan</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/c_penjualan/penjualan">
            <i class="pe-7s-plugin"></i>
            <p>Penjualan</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/c_pemesanan/pemesanan_Pimpinan">
            <i class="pe-7s-gift"></i>
            <p>Pemesanan</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/c_bahanbaku/kebutuhanbahan">
            <i class="pe-7s-plugin"></i>
            <p>Kebutuhan Bahan</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/c_produk/produk">
            <i class="pe-7s-plugin"></i>
            <p>Roti</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-default">
     <div class="container-fluid">
      <div class="navbar-minimize">
       <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
        <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
        <i class="fa fa-navicon visible-on-sidebar-mini"></i>
      </button>
    </div>
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>