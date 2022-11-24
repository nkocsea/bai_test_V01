<?php 

	class ClassThongTinKhachHang
	{

		public $id, $maso, $hoten, $namsinh, $status, $datetime;

		private $result;
		
		
		function setID($id)
		{
			$this->id=$id;
		}
		function getID(){
			return $this->id;
		}
		function setMaSo($maso)
		{
			$this->maso=$maso;
		}
		function getMaSo(){
			return $this->maso;
		}
		function setHoTen($hoten)
		{
			$this->hoten=$hoten;
		}
		function getHoTen(){
			return $this->hoten;
		}
		function setNamSinh($namsinh)
		{
			$this->namsinh=$namsinh;
		}
		function getNamSinh(){
			return $this->namsinh;
		}
		function setStatus($status)
		{
			$this->status=$status;
		}
		function getStatus(){
			return $this->status;
		}
		function setDateTime($datetime)
		{
			$this->datetime=$datetime;
		}
		function getDateTime(){
			return $this->datetime;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from `thongtinkhachhang`';
        	ClassUser::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        } 
        public function layDuLieu(){
        	$sql='select * from `thongtinkhachhang`';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassThongTinKhachHang;
	        		$tk->setID($row->id);
					$tk->setMaSo($row->maso);
					$tk->setHoTen($row->hoten);
					$tk->setNamSinh($row->namsinh);
					$tk->setDateTime($row->datetime);
					$tk->setStatus($row->status);
					$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }

	 	public function getSoThuTuLonNhatTrongNgay(){
        	$sql="SELECT * FROM `thongtinkhachhang` WHERE `datetime` like ('%".date('Y-m-d')."%')";
        	 //echo $sql;
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	$row=mysqli_num_rows($result);
	        	if ($row<=0) {
					$maso=date('ymdHms').str_pad(1, 4, '0', STR_PAD_LEFT);
				}else{
					$maso=date('ymdHms'). str_pad($row+1, 4, '0', STR_PAD_LEFT);
				}
	        return $maso;
	               	
        }
	    public function ktTonTai($maso){
        	if ($maso!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from `thongtinkhachhang` where `maso`= "'.$maso.'"';

		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktTonTaiID($id){
        	if ($id!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from `thongtinkhachhang` where `id`= "'.$id.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function getCustomersWithQuery($sql){

        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassThongTinKhachHang;
	        		$tk->setID($row->id);
					$tk->setMaSo($row->maso);
					$tk->setHoTen($row->hoten);
					$tk->setNamSinh($row->namsinh);
					$tk->setDateTime($row->datetime);
					$tk->setStatus($row->status);
					$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }
         public function InsertCustomer($maso,$hoten,$namsinh){
	    	if ($maso!= "" && $namsinh!= "" && $hoten != "")  {
	    		if (ClassThongTinKhachHang::ktTonTai($maso)==1) {
	    			$maso = ClassThongTinKhachHang::getSoThuTuLonNhatTrongNgay();
	    		}
	    		$c = ClassConnect::Connect();
	    		$query = " INSERT INTO `thongtinkhachhang` (`maso`, `hoten`, `namsinh`, `datetime`, `status`) VALUES ('".$maso."','".$hoten."','".$namsinh."',now(),'1')";
	    		// echo $query;
	    		$kq = mysqli_query($c,$query);
				if($kq){
					return "save_00"; // save thanh cong
				}else{
				   	return "save_02"; //'- Thêm không thành công, lỗi SQL </br>';
				}
	    	}else{
	    		return "save_03"; //"Tagline,post_title,post_name trong"
	    	}	
	    }
	    public function updateCustomer($id,$hoten,$namsinh){
	    	if ($id!= "" && $namsinh!= "" && $hoten != "")  {
	    		if (ClassThongTinKhachHang::ktTonTaiID($id)==1) {
	    			$c = ClassConnect::Connect();
		    		$query = "UPDATE `thongtinkhachhang` SET `hoten`='".$hoten."',`namsinh`='".$namsinh."',`datetime`=now() WHERE `id`='".$id."'";
		    		// echo $query;
		    		$kq = mysqli_query($c,$query);
					if($kq){
						return "fix_00"; // save thanh cong
					}else{
					   	return "fix_02"; //'- Thêm không thành công, lỗi SQL </br>';
					}
	    		}else{
	    			return "fix_04"; //id khong ton tai
	    		}
	    		
	    	}else{
	    		return "fix_03"; //"Tagline,post_title,post_name trong"
	    	}	
	    }
	    public function DeleteCustomer($id){
	    	// echo "id:".$id;
        	if(ClassThongTinKhachHang::ktTonTaiID($id)==1){
        		$c = ClassConnect::Connect();
        		$sql='DELETE FROM `thongtinkhachhang` WHERE `id` = "'.$id.'"';

        		$kq = mysqli_multi_query($c,$sql);
			    if($kq){
			    	return "delete_00";//xoa thanh cong
			    }else{
			    	return "delete_01"; //' - Xóa không thành công, lỗi SQL</br>';
			    }
        	}else{
        		return "delete_02"; //'' -  không tồn tại trong hệ thống</br>';
        	}
        }
	    public function getAllCustomers(){
        	$sql='select `id`,`maso`, `hoten`, `namsinh` from `thongtinkhachhang` ORDER BY `datetime` DESC';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassThongTinKhachHang;
	        		$tk->setID($row->id);
	        		$tk->setMaSo($row->maso);
					$tk->setHoTen($row->hoten);
					$tk->setNamSinh($row->namsinh);
					$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }

	}
 ?>
 <?php

?>