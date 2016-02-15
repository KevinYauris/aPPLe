<?php
	/*if(session_status()!==2)session_start();//>=php 5.4
	if(!isset($_SESSION['SES_LOGIN'])){
		header('location:../home');
	 }*/
	require_once "dbconnect/dbconnect.php";
	require_once "functions.php";
	opendb();

	$kode =buatKode("peminjaman","");

	if(isset($_POST['tambahPeminjaman'])){
		
		$idAlat = trim($_POST['idAlat']);	
		
		//cari data item barang
		$qri = "SELECT * FROM alat WHERE id_alat='$idAlat'";
		$res = querydb($qri);
		$rek = arraydb($res);
		
		$namaAlat = $rek['nama_alat'];
	}
?>   
   
<div class="panel panel-primary alert alert-dissmisable alert-info" id="panelBarangTambah">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;TAMBAH DATA PEMINJAMAN
		<div type="button" class="close" data-dismiss="alert">&times;</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post" name="formPeminjaman" id="formPeminjaman" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="idPeminjaman" class="col-sm-3 control-label pad-right-zero">Kode :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $kode?>" id="idPeminjaman" name="idPeminjaman" readonly="readonly">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="idAlat" class="col-sm-3 control-label pad-right-zero">ID Alat :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" value="<?php echo $idAlat?>" id="idAlat" name="idAlat" readonly="readonly">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="nama alat" class="col-sm-3 control-label pad-right-zero">Nama Alat :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" value="<?php echo $namaAlat?>" id="namaAlat" name="namaAlat" readonly="readonly">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="no identitas" class="col-sm-3 control-label pad-right-zero">No. Identitas :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="noIdentitas" id="noIdentitas" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="nama peminjam" class="col-sm-3 control-label pad-right-zero">Nama Peminjam :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="namaPeminjam" id="namaPeminjam" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kategori peminjam" class="col-sm-3 control-label pad-right-zero">Kategori Peminjam :</label>
				<div class="col-sm-5">
					<select class="form-control" name="kategoriPeminjam" id="kategoriPeminjam" required>
						<option value="">---Pilih---</option>
						<option value="Mahasiswa">Mahasiswa</option>
						<option value="Dosen">Dosen</option>
						<option value="Lain-lain">Lain-lain</option>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kegiatan" class="col-sm-3 control-label pad-right-zero">Kegiatan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="kegiatan" id="kegiatan" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="waktu peminjaman" class="col-sm-3 control-label pad-right-zero">Waktu Peminjaman :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="waktuPeminjaman" id="waktuPeminjaman" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="durasi" class="col-sm-3 control-label pad-right-zero">Durasi :</label>
				<div class="col-sm-9">
					<input type="number" step="1" class="form-control input-sm" name="durasi" id="durasi" value="" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 6 jam" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="status" class="col-sm-3 control-label pad-right-zero">Status :</label>
				<div class="col-sm-5">
					<select class="form-control" name="status" id="status" required>
						<option value="">---Pilih---</option>
						<option value="Y">Sudah Dikembalikan</option>
						<option value="-">Sudah Dibooking</option>
						<option value="T">Sedang Dipinjam</option>
					</select>
				</div>
			</div>
			
		   
			<div class="col-sm-2 col-sm-offset-3"><input type="submit" name="btnSimpanPeminjaman" id="btnSimpanPeminjaman" value=" Simpan " class="btn btn-primary btn-sm" data-id="1" /> </div>
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
