<?php
session_start();
ob_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);


 include "class/ClassConnect.php";
 $classconnect = new ClassConnect;
 include "class/ClassThongTinKhachHang.php";
 $classthongtinkhachhang = new ClassThongTinKhachHang;
 ?>
 