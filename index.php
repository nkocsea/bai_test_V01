<?php
  include('include.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!--  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript>
    <!-- Bootstrap CSS -->
    <link rel="preload" href="/bootstrap_4/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/bootstrap_4/css/bootstrap.min.css"></noscript>

    <link rel="icon" href="/image/logo/favicon.ico" type="image/ico">

    <title>Bài Test</title>

    
    <link rel="preload" href="css/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/index.css"></noscript>

    <script  src="/jquery/jquery-1.11.0.min.js"></script>
    <script async src="/ajax/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="dhtmlx/grid/grid.js"></script> -->
    <!-- <link rel="stylesheet" href="dhtmlx/grid/grid.css"> -->
    <script type="text/javascript" src="dhtmlx/suites/suite.js"></script>
    <link rel="stylesheet" href="dhtmlx/suites/suite.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   
  </head>

  <body>

    <div class="container-fluid index_mybody">
      <?php
      if (isset($_GET['page'])&&$_GET['page']!='') {
          $page = $_GET['page'];
        }

        switch ($page) {
          case 'insert':
            include 'include/nhap_thong_tin.php';
            break;
          
          
          default:
            include 'include/nhap_thong_tin.php';
            break;
        }
        ?>
    </div><!-- end body -->
  
    <!-- Optional JavaScript -->
    <!-- <script src="/bootstrap_4/js/popper.min.js" crossorigin="anonymous"></script> -->
    <script async src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script async src="/bootstrap_4/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="/ajax/nhapthongtin.js"></script>

  </body>
</html>
