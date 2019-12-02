<?php
  require('libs/db.php');
  session_start();
  error_reporting(E_ALL);
  $mod='';
?>
<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Index</title>
  <link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
  <link href="css/owl.theme.default.min.css" type="text/css" rel="stylesheet">
  <link href="css/style.min.css" type="text/css" rel="stylesheet">
  <?php
    if (isset($_GET['mod'])) {
      $mod=$_GET['mod'];
    }
    if($mod==''){
      $mod='home';
    }
    elseif($mod=='detail'){
      echo '<link href="css/style-detail.css" type="text/css" rel="stylesheet">';
    }
    elseif($mod=='booking'){
      echo '<link href="css/style-detail.css" type="text/css" rel="stylesheet">';
    }
  ?>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/owl.carousel.js" type="text/javascript"></script>
  <script src="js/jwplayer.js"></script>
</head>
<style type="text/css" media="screen">
    .owl-theme .owl-controls .owl-page {
      display: inline-block;
    }
    .owl-theme .owl-controls .owl-page span {
      background: none repeat scroll 0 0 #869791;
      border-radius: 20px;
      display: block;
      height: 12px;
      margin: 5px 7px;
      opacity: 0.5;
      width: 12px;
    }
</style>
<style media="screen" type="text/css">
  .owl-theme .owl-controls .owl-page {
    display: inline-block;
  }
  .owl-theme .owl-controls .owl-page span {
    background: none repeat scroll 0 0 #869791;
    border-radius: 20px;
    display: block;
    height: 12px;
    margin: 5px 7px;
    opacity: 0.5;
    width: 12px;
  }

  .owl-theme .owl-controls .active span {
    background-color: white !important;
  }

  .owl-theme .owl-pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
</style>
<body>
  <div id="wrapper">
    <?php
      include("header.php");
    ?>
    <div id="body-wrap" class="container">
      <?php
        include("movie-hot.php");
      ?>
      <?php
        if (isset($_GET['mod'])) {
          $mod=$_GET['mod'];
        }
        if($mod=='')$mod='home';
        $mod=str_replace('../','',$mod);
        if(is_file("{$mod}.php"))
          include("{$mod}.php");
        else
          echo 'Invalid URL';
      ?>
      <?php
        include("sidebar.php");
      ?>
    </div>
    <?php
      include("footer.php");
    ?>
  </div>
</html>
