<?php
include '../include.php';




				$data = $classthongtinkhachhang->getAllCustomers();
				
				
					if (is_array($data)) {

						$data =json_encode($data);
						$data = json_decode($data, true);
						$sothutu=0;
						foreach ($data as $key =>$value) {
							$sothutu ++;
							$data[$key]['sothutu']=$sothutu;
							$data[$key]['maso'] = $data[$key]['maso'];//invisible, visible
						}
					$datasent = json_encode($data);
					
				
					echo $datasent;
				}else{
					echo 0;
				}
?>