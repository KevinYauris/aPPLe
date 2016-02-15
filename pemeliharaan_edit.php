<?php
require_once "dbconnect/dbconnect.php";

opendb();

//data:{ubahBarang:'',kdBarang:kdBarang},

if(isset($_GET['idPemeliharaan'])){
	
	$idPemeliharaan = $_GET['idPemeliharaan'];	
	
	//cari data item barang
	$qri = "SELECT * FROM pemeliharaan WHERE id_kerusakan='$idPemeliharaan'";
	$res = querydb($qri);
	$rek = arraydb($res);
	
	$idAlat = $rek['id_alat'];
	$startBroken = $rek['start_broken'];
	$startRepair = $rek['start_repair'];
	$finishRepair = $rek['finish_repair'];
	

	//cari data alat
	$qri2 = "SELECT nama_alat FROM alat WHERE id_alat='$idAlat'";
	$res2 = querydb($qri2);
	$rek2 = arraydb($res2);
	$namaAlat = $rek2['nama_alat'];
}

include "header.php";

?>


<div class="panel panel-primary alert alert-dissmisable alert-warning" id="panelEditPeminjaman">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;UBAH DATA PEMELIHARAAN
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="pemeliharaan_proses.php?idPemeliharaan=<?php echo $idPemeliharaan ?>" method="post" name="formPemeliharaan" id="formPemeliharaan" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="id pemeliharaan" class="col-sm-3 control-label pad-right-zero">Kode :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $idPemeliharaan?>" id="idPemeliharaan" name="idPemeliharaan" readonly="readonly">
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
				<label for="start broken" class="col-sm-3 control-label pad-right-zero">Mulai Rusak :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="startBroken" id="startBroken" value="<?php echo $startBroken?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="start repair" class="col-sm-3 control-label pad-right-zero">Mulai Perbaikan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="startRepair" id="startRepair" value="<?php echo $startRepair?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="finish repair" class="col-sm-3 control-label pad-right-zero">Selesai Perbaikan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="finishRepair" id="finishRepair" value="<?php echo $finishRepair?>" maxlength="50" data-toggle="tooltip" data-placement="left" title="Maksimum 50 character" required autofocus>
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
