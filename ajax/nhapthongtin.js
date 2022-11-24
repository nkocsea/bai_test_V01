var nhapthongtin_xuly= '/ajax/nhapthongtin_xuly.php';
var myWindow;var grid; var alert;

$(document).ready(function()
{ 
	

	function Loading_maso(){
		var datasent = 'protocol=autogetmaso&data=null';
		 $.ajax({
					url:nhapthongtin_xuly,
					method:"POST",
					// dataType: "json",		
					data:datasent,
					success:function(data){
						data = $.trim(String(data));
						console.log(data);
			        	if (data!=0) {
								document.getElementById("nhapthongtin_maso").value = data;
			        	}else{
			        		
			        		show_alert("Lấy Mã số: data trả về trống!","top-right",5000,"dhx_message--error");
			        	}
			        },
			        error: function (jqXhr, textStatus, errorMessage) { // error callback 
				        
				        show_alert("Lấy Mã số: "+errorMessage,"top-right",3000,"dhx_message--error");
				        
				    },
				    complete: function(XMLHttpRequest, status){
				    	
				    	console.log("Lấy mã số: Done");
				    	
					}
				});
	}
	
	function Loading_data(){
		
		if (grid) {
			grid.destructor();
		}
		
		var events = [
			"afterEditEnd","cellDblClick","cellMouseOver"
		];		
				
	            $.ajax({
					url:"/ajax/nhapthongtin_load.php",
					method:"POST",
					// dataType: "json",		
					// data:datasent,
					success:function(data){
						data = $.trim(String(data));
						// console.log(data);
			        	if (data!=0) {
								
								var obj_noidung = $.parseJSON(data);
								// console.log(obj_noidung);
								
								var html="<table class='table'><thead><tr><th scope='col'>STT</th><th scope='col'>Mã số</th><th scope='col'>Họ tên</th><th scope='col'>Năm sinh</th><th scope='col'></th></tr></thead><tbody>";
								obj_noidung.forEach(laynoidung);
								function laynoidung(item, index, array){
									// console.log(item);
									  html = html + "<tr class='dong_"+item.maso+"' onmousemove='showAllEvent_"+item.maso+"()' onmouseout='clearCoor_"+item.maso+"()'><th scope='row'>"+item.sothutu+"</th><td >"+item.maso+"</td><td>"+item.hoten+"</td><td>"+item.namsinh+"</td><td class='hidden' id='button_"+item.maso+"'><button type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModalCenter' onclick='openModalFix(\""+item.id+"\",\""+item.maso+"\",\""+item.hoten+"\",\""+item.namsinh+"\")'>Sửa</button><button type='button' class='btn btn-sm btn-danger' onclick='xoa_dong_"+item.maso+"("+item.id+")'>Xóa</button></td></tr><script type='text/javascript'>function clearCoor_"+item.maso+"(){$('#button_"+item.maso+"').attr('class', 'hidden'); }function showAllEvent_"+item.maso+"() {$('#button_"+item.maso+"').attr('class', 'show');}function xoa_dong_"+item.maso+"(e){thucHienXoaKhach(e);}</script>";

								}

								html = html+"</tbody></table>";
								// console.log(html);
								$("#nhapthongtin").html(html);

			        	}else{
			        		
			        		show_alert("Data trả về trống!","top-right",5000,"dhx_message--error");
			        	}
			        },
			        error: function (jqXhr, textStatus, errorMessage) { // error callback 
				        
				        show_alert("Error: "+errorMessage,"top-right",3000,"dhx_message--error");
				        
				    },
				    complete: function(XMLHttpRequest, status){
				    	
				    	show_alert("Loading completed.","top-right",3000,"dhx_message--success");
				    	
					}
				});
			
		return false;
	}
	
	


	$('#video_btn_addmovie').click(function() {
	    var url = '/include/movie/add_movie.php';
		openWebsiteNewTab(url, "Add Movie");
		
	});
	$('#nhapthongtin_btn_luu').click(function() {
	   	var maso = $('#nhapthongtin_maso').val();
		var hoten = $('#nhapthongtin_hoten').val();
		var namsinh = $('#nhapthongtin_namsinh').val();
		console.log("namsinh:"+namsinh);
		if (isEmpty(hoten)) {
			show_alert("Lưu Khách: Bạn chưa nhập họ tên","top-right",3000,"dhx_message--error");
		}else if (isEmpty(namsinh)) {
			show_alert("Lưu Khách: Bạn chưa nhập ngày sinh","top-right",3000,"dhx_message--error");
		}else{
			var key="maso="+maso+"&hoten="+hoten+"&namsinh="+namsinh;
			var datasent = 'protocol=save&'+key;
			$.ajax({
						url:nhapthongtin_xuly,
						method:"POST",
						// dataType: "json",		
						data:datasent,
						success:function(data){
							data = $.trim(String(data));
							console.log(data);
				        	if (data!=0) {
								
					        	switch(data) {
									case "save_00":
										show_alert('Đã lưu',"top-right",2000,"dhx_message--success");
										Loading_data();
										Loading_maso();
										document.getElementById("nhapthongtin_hoten").value = '';
										document.getElementById("nhapthongtin_namsinh").value = '';
										document.getElementById("nhapthongtin_hoten").focus();
										break;
									case "save_01":
										show_alert('Save không thành công: Dữ liệu trống',"top-right",5000,"dhx_message--error");
										break;
									case "save_02":
										show_alert('Thêm không thành công, lỗi SQL',"top-right",5000,"dhx_message--error");
										break;
									case "save_03":
										show_alert('Save không thành công: Dữ liệu trống',"top-right",5000,"dhx_message--error");
										break;
									default:
									break;
								}	
				        	}else{
				        		
				        		show_alert("Lưu Khách: data trả về trống!","top-right",5000,"dhx_message--error");
				        	}
				        },
				        error: function (jqXhr, textStatus, errorMessage) { // error callback 
					        
					        show_alert("Lưu Khách: "+errorMessage,"top-right",3000,"dhx_message--error");
					        
					    },
					    complete: function(XMLHttpRequest, status){
					    	
					    	console.log("Lưu Khách: Done");
					    	
						}
					});
		}
		
		
	});



	
	
	function openWebsite(url, title, w, h) {
		if (myWindow) {
			myWindow.close();   // Closes the new window
		}
	  var left = (screen.width/2)-(w/2);
	  var top = (screen.height/2)-(h/2);
	  myWindow = window.open(url, 'title="'+title+'"', 'toolbar=no, location=yes, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	}
	function openWebsiteNewTab(url, title) {
		
	  window.open(url, 'title="'+title+'"');
	}

	
	

Loading_data();	
Loading_maso();

});
// ***********************
function isEmpty(value) {
            if (typeof value === "undefined" || value === null || value === "null" || value === "") {
                return true;
            } else {
                return false;
            }
        }

function thucHienXoaKhach(maso){
	// console.log(maso+"|");
	var confirmation = confirm("Bạn muốn xóa record đang chọn?");
	if (confirmation) {

		var datasent = 'protocol=deletecustomer&maso='+maso;
		 $.ajax({
					url:nhapthongtin_xuly,
					method:'POST',		
					data:datasent,
					success:function(data){
						data = $.trim(String(data));
						console.log(data);
						switch(data) {
									case 'delete_00':
										show_alert('Đã xóa','top-right',2000,'dhx_message--success');
										location.reload();
										break;
									case 'delete_02':
										show_alert('Xóa không thành công: Mã số không tồn tại','top-right',5000,'dhx_message--error');
										break;
									case 'delete_01':
										show_alert('Thêm không thành công, lỗi SQL','top-right',5000,'dhx_message--error');
										break;
									case 'delete_03':
										show_alert('Xóa không thành công: Dữ liệu trống','top-right',5000,'dhx_message--error');
										break;
									default:
									break;
								}	
			        	
			        },
			        error: function (jqXhr, textStatus, errorMessage) { // error callback 
				        
				        show_alert('Xóa: '+errorMessage,'top-right',3000,'dhx_message--error');
				        
				    },
				    complete: function(XMLHttpRequest, status){
				    	
				    	console.log('Xóa: Done');
				    	
					}
				});
	}
	
}
function show_alert(texts,positions,expires,csss) {
		var config = {
				text: texts,
				icon: "dxi dxi-close",
				expire:expires,
				css: csss,
				position:positions
			};
	    alert = new dhx.message(config);
	}
function openModalFix(id,maso,hoten,namsinh){
	console.log('modal:'+id+"|"+hoten+"|"+namsinh);
	document.getElementById("chinhsua_id").value = id;
	document.getElementById("chinhsua_maso").value = maso;
	document.getElementById("chinhsua_hoten").value = hoten;
	document.getElementById("chinhsua_namsinh").value = namsinh;


}
function chinhSuaSave(){
	var id = $('#chinhsua_id').val();
		var hoten = $('#chinhsua_hoten').val();
		var namsinh = $('#chinhsua_namsinh').val();
		// console.log("namsinh:"+namsinh);
		if (isEmpty(hoten)) {
			show_alert("Họ tên không được để trống","top-right",3000,"dhx_message--error");
		}else if (isEmpty(namsinh)) {
			show_alert("Ngày sinh không được để trống","top-right",3000,"dhx_message--error");
		}else{
			var key="hoten="+hoten+"&namsinh="+namsinh+"&id="+id;
			var datasent = 'protocol=fix&'+key;
			$.ajax({
						url:nhapthongtin_xuly,
						method:"POST",
						// dataType: "json",		
						data:datasent,
						success:function(data){
							data = $.trim(String(data));
							console.log(data);
				        	if (data!=0) {
								
					        	switch(data) {
									case "fix_00":
										show_alert('Đã lưu',"top-right",2000,"dhx_message--success");
										location.reload();
										
										break;
									case "fix_01":
										show_alert('Save không thành công: Dữ liệu trống',"top-right",5000,"dhx_message--error");
										break;
									case "fix_02":
										show_alert('Thêm không thành công, lỗi SQL',"top-right",5000,"dhx_message--error");
										break;
									case "fix_03":
										show_alert('Save không thành công: Dữ liệu trống',"top-right",5000,"dhx_message--error");
										break;
									default:
									break;
								}	
				        	}else{
				        		
				        		show_alert("Lưu Khách: data trả về trống!","top-right",5000,"dhx_message--error");
				        	}
				        },
				        error: function (jqXhr, textStatus, errorMessage) { // error callback 
					        
					        show_alert("Lưu Khách: "+errorMessage,"top-right",3000,"dhx_message--error");
					        
					    },
					    complete: function(XMLHttpRequest, status){
					    	
					    	console.log("Lưu Khách: Done");
					    	
						}
					});
		}
}