<?php
	/*if(session_status()!==2)session_start();//>=php 5.4
	if(!isset($_SESSION['SES_LOGIN'])){
		header('location:../home');
	 }*/
	require_once "dbconnect/dbconnect.php";
	require_once "functions.php";
	opendb();

	$kode =buatKode("alat","A");
?>   
   
<div class="panel panel-primary alert alert-dissmisable alert-info" id="panelBarangTambah">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;TAMBAH DATA ALAT
		<div type="button" class="close" data-dismiss="alert">&times;</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post" name="formBarang" id="formBarang" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="idAlat" class="col-sm-3 control-label pad-right-zero">Kode :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $kode?>" id="idAlat" name="idAlat" readonly="readonly">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="nama alat" class="col-sm-3 control-label pad-right-zero">Nama Alat :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="txtNama" id="txtNama" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="lokasi barang" class="col-sm-3 control-label pad-right-zero">Lokasi :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="txtLokasi" id="txtLokasi" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kategori" class="col-sm-3 control-label pad-right-zero">Kategori :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKategori" id="txtKategori" required>
						<option value="">---Pilih---</option>
						<option value="Laptop">LAPTOP</option>
						<option value="Sound">SOUND</option>
						<option value="Proyektor">PROYEKTOR</option>
						<option value="Kabel">KABEL</option>
						<option value="Lain-lain">LAIN-LAIN</option>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kondisi" class="col-sm-3 control-label pad-right-zero">Kondisi :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKondisi" id="txtKondisi" required>
						<option value="">---Pilih---</option>
						<option value="Baik">BAIK</option>
						<option value="Rusak">RUSAK</option>
						<option value="Hilang">HILANG</option>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="ketersediaan" class="col-sm-3 control-label pad-right-zero">Ketersediaan :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKetersediaan" id="txtKetersediaan" required>
						<option value="">---Pilih---</option>
						<option value="Y">Tersedia</option>
						<option value="T">Tidak Tersedia</option>
					</select>
				</div>
			</div>
			
		   
			<div class="col-sm-2 col-sm-offset-3"><input type="submit" name="btnBarangSimpan" id="btnBarangSimpan" value=" Simpan " class="btn btn-primary btn-sm" data-id="1" /> </div>
		</form>
	</div><!-- /panel body -->	
</div><!-- /panel -->

<div class="modal fade" id="modalUser">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="modal-header">
		<!--button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button-->
		<!--h4 class="modal-title">Modal title</h4-->
	  </div>
	  <div class="modal-body">
		<p></p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<!--button type="button" class="btn btn-primary">Save changes</button-->
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		
	});	
</script>		
