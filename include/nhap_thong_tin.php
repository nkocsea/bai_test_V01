<link rel="preload" href="css/nhap_thong_tin.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/nhap_thong_tin.css"></noscript>
<div class="row dieuhuong">
	<div class="md-12">
		<div class="md-1">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
			    	<span class="input-group-text" id="nhapthongtin_span_maso">Mã số</span>
			  	</div>
			  	<input type="text" class="form-control" value="" id="nhapthongtin_maso" readonly>
			  	<div class="input-group-prepend">
			    	<span class="input-group-text" id="nhapthongtin_span_hoten">Họ tên</span>
			  	</div>
			  	<input type="text" class="form-control" aria-label="" placeholder="Nhập họ tên"  id="nhapthongtin_hoten" autofocus>
			   	<div class="input-group-prepend" id="nhapthongtin_span_namsinh">
			    	<span class="input-group-text" >Năm sinh</span>
			  	</div>
			  	<input type="date" class="form-control"  id="nhapthongtin_namsinh">
			</div>
		</div>
		
	</div>
</div>
<div class="row dieuhuong">
	<div class="md-12" style="margin-left: 3%;">
		<div class="row">

			<button type="button" id = "nhapthongtin_btn_luu" class="btn btn_loaddata btn-sm">Lưu</button>
			<!-- <button type="button" id="video_export" class="btn btn_exportexcell btn-sm">Export Excell</button> -->
			<!-- <a href="" type="button" class="btn btn_refestpage btn-sm">Refestpage</a> -->
		</div>
		
	</div>

	
	
</div>
<div class="row hienthinoidung">
<div class="" id="nhapthongtin" style="min-height:50vh; width: 50%;">zsdszdfdfd</div>

 

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="input-group input-group-md">
	      	<div class="input-group-prepend">
				   	<span class="input-group-text" id="">ID</span>
				  </div>
				  	<input type="text" class="form-control" value="" id="chinhsua_id" readonly>
			  </div>
			  <div class="input-group input-group-md">
	      	<div class="input-group-prepend">
				    	<span class="input-group-text" id="">Mã số</span>
				  	</div>
				  	<input type="text" class="form-control" value="" id="chinhsua_maso" readonly>
        </div>
				<div class="input-group input-group-md">
			  	<div class="input-group-prepend">
			    	<span class="input-group-text" id="">Họ tên</span>
			  	</div>
			  	<input type="text" class="form-control" aria-label="" placeholder="Nhập họ tên"  id="chinhsua_hoten" autofocus>
			  </div>
			  <div class="input-group input-group-md">
			   	<div class="input-group-prepend" id="">
			    	<span class="input-group-text" >Năm sinh</span>
			  	</div>
			  	<input type="date" class="form-control"  id="chinhsua_namsinh">
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="chinhSuaSave()" >Save changes</button>
      </div>
    </div>
  </div>
</div>