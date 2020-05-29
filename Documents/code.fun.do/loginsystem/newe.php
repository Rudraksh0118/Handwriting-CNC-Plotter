<?php
session_start();
?>
<html>
<head>
     <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="1/img/apple-icon.png">
    <link rel="icon" type="image/png" href="1/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="1/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="1/css/demo.css" rel="stylesheet" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-kit" />
    <!--  Social tags      -->
    <meta name="keywords" content="bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, now ui, now ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit">
    <meta name="description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Now UI Kit by Creative Tim">
    <meta itemprop="description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Now UI Kit by Creative Tim">
    <meta name="twitter:description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg">
    <meta name="twitter:data1" content="Now UI Kit by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="Free">
    <meta name="twitter:label2" content="Price">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Now UI Kit by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/now-ui-kit/index.html" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/56/original/opt_nuk_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a beautiful Bootstrap 4 UI kit. It is yours Free." />
    <meta property="og:site_name" content="Creative Tim" />
</head>
<body>
	<?php 
    if (isset($_SESSION['message']) AND !empty($_SESSION['message']))
    {
      echo $_SESSION['message'];
    }
    ?>
</body>
</html>
