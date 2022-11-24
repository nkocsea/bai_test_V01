
<?php
include '../include.php';
//check if its an ajax request, exit if not
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
{
    die();
}else{
}  


if (isset($_POST['protocol'])) {
	$protocol=$_POST['protocol'];
	
	if ($protocol!="") {
		switch ($protocol) {
			case 'autogetmaso':
				$kq = $classthongtinkhachhang->getSoThuTuLonNhatTrongNgay();
				
				echo $kq;
			break;
			case 'deletecustomer':
				if (isset($_POST['maso'])) {
					$maso=$_POST['maso'];
					// echo "\\".$maso."||";
					$kq = $classthongtinkhachhang->DeleteCustomer($maso);
					echo $kq;
				}else{
					echo "delete_04";//maso trong
				}
				
			break;
			case 'save':
				if (isset($_POST['maso'])&&isset($_POST['hoten'])&&isset($_POST['namsinh'])) {
					$maso=$_POST['maso'];
					$hoten=$_POST['hoten'];
					$namsinh=$_POST['namsinh'];
					$kq = $classthongtinkhachhang->InsertCustomer($maso,$hoten,$namsinh);
					echo $kq;
				}else{
					echo "save_01";//dữ liệu gửi qua trống
				}
			break;
			case 'fix':
				if (isset($_POST['id'])&&isset($_POST['hoten'])&&isset($_POST['namsinh'])) {
					$id=$_POST['id'];
					$hoten=$_POST['hoten'];
					$namsinh=$_POST['namsinh'];
					$kq = $classthongtinkhachhang->updateCustomer($id,$hoten,$namsinh);
					echo $kq;
				}else{
					echo "fix_01";//dữ liệu gửi qua trống
				}
			break;
			default:
				# code...
				break;
		}
	}else{
		echo "Tu khoa trong";
	}
}

?>
