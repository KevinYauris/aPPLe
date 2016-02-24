<?php
/*if(session_status()!==2)session_start();//>=php 5.4
if(!isset($_SESSION['SES_LOGIN'])){
	header('location:../home');
 }*/
require_once "dbconnect/dbconnect.php";

opendb();

//data:{ubahBarang:'',kdBarang:kdBarang},

if(isset($_POST['ubahAlat'])){
	
	$idAlat = trim($_POST['idAlat']);	
	
	//cari data item barang
	$qri = "SELECT * FROM alat WHERE id_alat='$idAlat'";
	$res = querydb($qri);
	$rek = arraydb($res);
	
	$namaAlat = $rek['nama_alat'];
	$lokasi = $rek['lokasi'];
	$kategori = $rek['kategori'];
	$kondisi = $rek['kondisi'];
	$ketersediaan = $rek['ketersediaan'];

	//cari data kondisi
	$qri2 = "SELECT kondisi FROM alat WHERE id_alat='$idAlat'";
	$res2 = querydb($qri2);	

	$qri3 = "SELECT kategori FROM alat WHERE id_alat='$idAlat'";
	$res3 = querydb($qri3);	

	$qri4 = "SELECT ketersediaan FROM alat WHERE id_alat='$idAlat'";
	$res4 = querydb($qri4);
}

?>
<div class="panel panel-primary alert alert-dissmisable alert-warning" id="panelBarangTambah">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;UBAH DATA ALAT
		<div type="button" class="close" data-dismiss="alert">&times;</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post" name="formBarang" id="formBarang" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="idAlat" class="col-sm-3 control-label pad-right-zero">ID Alat :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $idAlat?>" id="idAlat" name="idAlat" readonly="readonly">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="nama alat" class="col-sm-3 control-label pad-right-zero">Nama Alat :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="txtNama" id="txtNama" value="<?php echo $namaAlat?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="lokasi barang" class="col-sm-3 control-label pad-right-zero">Lokasi :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="txtLokasi" id="txtLokasi" value="<?php echo $lokasi?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kategori" class="col-sm-3 control-label pad-right-zero">Kategori :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKategori" id="txtKategori" required>
						<option value="">---Pilih---</option>
						<?php
							while($rek3=arraydb($res3)){
								if($kategori=='Laptop') {
									echo "<option value='Laptop' selected>LAPTOP</option>";
								} else {
									echo "<option value='Laptop'>LAPTOP</option>";
								}
								if($kategori=='Sound') {
									echo "<option value='Sound' selected>SOUND</option>";
								} else {
									echo "<option value='Sound'>SOUND</option>";
								}
								if($kategori=='Proyektor') {
									echo "<option value='Proyektor' selected>PROYEKTOR</option>";
								} else {
									echo "<option value='Proyektor'>PROYEKTOR</option>";
								}
								if($kategori=='Kabel') {
									echo "<option value='Kabel' selected>KABEL</option>";
								} else {
									echo "<option value='Kabel'>KABEL</option>";
								}
								if($kategori=='Lain-lain') {
									echo "<option value='Lain-lain' selected>LAIN-LAIN</option>";
								} else {
									echo "<option value='Lain-lain'>LAIN-LAIN</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kondisi" class="col-sm-3 control-label pad-right-zero">Kondisi :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKondisi" id="txtKondisi" required>
						<option value="">---Pilih---</option>
						<?php
							while($rek2=arraydb($res2)){
								if($kondisi=='Baik') {
									echo "<option value='Baik' selected>BAIK</option>";
								} else {
									echo "<option value='Baik'>BAIK</option>";
								}
								if($kondisi=='Rusak') {
									echo "<option value='Rusak' selected>RUSAK</option>";
								} else {
									echo "<option value='Rusak'>RUSAK</option>";
								}
								if($kondisi=='Hilang') {
									echo "<option value='Hilang' selected>HILANG</option>";
								} else {
									echo "<option value='Hilang'>HILANG</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="ketersediaan" class="col-sm-3 control-label pad-right-zero">Ketersediaan :</label>
				<div class="col-sm-5">
					<select class="form-control" name="txtKetersediaan" id="txtKetersediaan" required>
						<option value="">---Pilih---</option>
						<?php
							while($rek4=arraydb($res4)){
								if($ketersediaan=='Y') {
									echo "<option value='Y' selected>Tersedia</option>";
								} else {
									echo "<option value='Y'>Tersedia</option>";
								}
								if($ketersediaan=='T') {
									echo "<option value='T' selected>Tidak Tersedia</option>";
								} else {
									echo "<option value='T'>Tidak Tersedia</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			
		   
			<div class="col-sm-2 col-sm-offset-3"><input type="submit" name="btnBarangSimpan" id="btnBarangSimpan" value=" Simpan " class="btn btn-primary btn-sm" data-id="2" /> </div>
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
