<?php 
	class ClassConnect
	{	
		function Connect(){

		$servername = 'localhost';
 
		 // $username = 'root'; 
		$username = 'root';
 
		 // $password = '';
		 $password = '';
 
		 $dbname = 'bai_test_v01';
		 
		 $con = mysqli_connect($servername,$username,$password,$dbname);
		 mysqli_set_charset($con, 'UTF8');
		if(!$con){
		 
		   die('Ket noi that bai:'.mysqli_connect_error());
		 
		}else{
		

		    return $con;
		 
		}	
		}  
	}
 ?>
