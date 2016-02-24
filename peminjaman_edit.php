<?php
require_once "dbconnect/dbconnect.php";

opendb();

//data:{ubahBarang:'',kdBarang:kdBarang},

if(isset($_GET['idPeminjaman'])){
	
	$idPeminjaman = $_GET['idPeminjaman'];	
	
	//cari data item barang
	$qri = "SELECT * FROM peminjaman WHERE id_peminjaman='$idPeminjaman'";
	$res = querydb($qri);
	$rek = arraydb($res);
	
	$idPeminjaman = $rek['id_peminjaman'];
	$idAlat = $rek['id_alat'];
	$noIdentitas = $rek['no_identitas'];
	$namaPeminjam = $rek['nama_peminjam'];
	$kategoriPeminjam = $rek['kategori_peminjam'];
	$kegiatan = $rek['kegiatan'];
	$waktuPeminjaman = $rek['waktu_peminjaman'];
	$durasi = $rek['durasi'];
	$status = $rek['status'];

	//cari data kondisi
	$qri2 = "SELECT nama_alat FROM alat WHERE id_alat='$idAlat'";
	$res2 = querydb($qri2);
	$rek2 = arraydb($res2);
	$namaAlat = $rek2['nama_alat'];

	$qri3 = "SELECT * FROM peminjaman WHERE id_alat='$idAlat'";
	$res3 = querydb($qri3);

	$qri4 = "SELECT * FROM peminjaman WHERE id_alat='$idAlat'";
	$res4 = querydb($qri4);
}

include "header.php";

?>


<div class="panel panel-primary alert alert-dissmisable alert-warning" id="panelEditPeminjaman">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;UBAH DATA PEMINJAMAN
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="peminjaman_proses.php?idPeminjaman=<?php echo $idPeminjaman ?>" method="post" name="formPeminjaman" id="formPeminjaman" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="idPeminjaman" class="col-sm-3 control-label pad-right-zero">Kode :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $idPeminjaman?>" id="idPeminjaman" name="idPeminjaman" readonly="readonly">
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
					<input type="text" class="form-control input-sm" name="noIdentitas" id="noIdentitas" value="<?php echo $noIdentitas?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="nama peminjam" class="col-sm-3 control-label pad-right-zero">Nama Peminjam :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="namaPeminjam" id="namaPeminjam" value="<?php echo $namaPeminjam?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kategori peminjam" class="col-sm-3 control-label pad-right-zero">Kategori Peminjam :</label>
				<div class="col-sm-5">
					<select class="form-control" name="kategoriPeminjam" id="kategoriPeminjam" required>
						<option value="">---Pilih---</option>
						<?php
							while($rek3=arraydb($res3)){
								if($kategoriPeminjam=='Mahasiswa') {
									echo "<option value='Mahasiswa' selected>Mahasiswa</option>";
								} else {
									echo "<option value='Mahasiswa'>Mahasiswa</option>";
								}
								if($kategoriPeminjam=='Dosen') {
									echo "<option value='Mahasiswa' selected>Mahasiswa</option>";
								} else {
									echo "<option value='Mahasiswa'>Mahasiswa</option>";
								}
								if($kategoriPeminjam=='Lain-lain') {
									echo "<option value='Lain-lain' selected>Lain-lain</option>";
								} else {
									echo "<option value='Lain-lain'>Lain-lain</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="kegiatan" class="col-sm-3 control-label pad-right-zero">Kegiatan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="kegiatan" id="kegiatan" value="<?php echo $kegiatan?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="waktu peminjaman" class="col-sm-3 control-label pad-right-zero">Waktu Peminjaman :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="waktuPeminjaman" id="waktuPeminjaman" value="<?php echo $waktuPeminjaman?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="durasi" class="col-sm-3 control-label pad-right-zero">Durasi :</label>
				<div class="col-sm-9">
					<input type="number" step="1" class="form-control input-sm" name="durasi" id="durasi" value="<?php echo $durasi?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 6 jam" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="status" class="col-sm-3 control-label pad-right-zero">Status :</label>
				<div class="col-sm-5">
					<select class="form-control" name="status" id="status" required>
						<option value="">---Pilih---</option>
						<?php
							while($rek4=arraydb($res4)){
								if($status=='Y') {
									echo "<option value='Y' selected>Sudah Dikembalikan</option>";
								} else {
									echo "<option value='Y'>Sudah Dikembalikan</option>";
								}
								if($status=='T') {
									echo "<option value='T' selected>Sedang Dipinjam</option>";
								} else {
									echo "<option value='T'>Sedang Dipinjam</option>";
								}
								if($status=='-') {
									echo "<option value='-' selected>Sudah Dibooking</option>";
								} else {
									echo "<option value='-'>Sudah Dibooking</option>";
								}
							}
						?>
					</select>
				</div>
			</div>
			
		   
			<div class="col-sm-2 col-sm-offset-3"><button id="postbutton" type="submit" class="btn btn-primary btn-sm">Simpan</button></div>
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

<?php 
	include "footer.php";
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		
	});	
</script>
