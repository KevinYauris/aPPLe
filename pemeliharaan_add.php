<?php
	/*if(session_status()!==2)session_start();//>=php 5.4
	if(!isset($_SESSION['SES_LOGIN'])){
		header('location:../home');
	 }*/
	require_once "dbconnect/dbconnect.php";
	require_once "functions.php";
	opendb();

	$kode =buatKode("pemeliharaan","");

	if(isset($_POST['tambahPemeliharaan'])){
		
		$idAlat = trim($_POST['idAlat']);	
		
		//cari data item barang
		$qri = "SELECT * FROM alat WHERE id_alat='$idAlat'";
		$res = querydb($qri);
		$rek = arraydb($res);
		
		$namaAlat = $rek['nama_alat'];
	}
?>   
   
<div class="panel panel-primary alert alert-dissmisable alert-info" id="panelBarangTambah">
	<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;TAMBAH DATA PEMELIHARAAN
		<div type="button" class="close" data-dismiss="alert">&times;</div>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post" name="formPemeliharaan" id="formPemeliharaan" target="" enctype="multipart/form-data" >
			<div class="form-group form-group-sm">
				<label for="id pemeliharaan" class="col-sm-3 control-label pad-right-zero">Kode :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control input-sm" value="<?php echo $kode?>" id="idPemeliharaan" name="idPemeliharaan" readonly="readonly">
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
				<label for="mulai rusak" class="col-sm-3 control-label pad-right-zero">Mulai Rusak :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="startBroken" id="datepicker" value="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Masukkan tanggal yang valid" required autofocus>
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="mulai perbaikan" class="col-sm-3 control-label pad-right-zero">Mulai Perbaikan :</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" name="startRepair" id="datepicker">
				</div>
			</div>
			<div class="form-group form-group-sm">
				<label for="selesai perbaikan" class="col-sm-3 control-label pad-right-zero">Selesai Perbaikan :</label>
				<div class="col-sm-9">
					<input type="text" id="datepicker" class="form-control input-sm" name="finishRepair">
				</div>
			</div>

			<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
		   
			<div class="col-sm-2 col-sm-offset-3"><input type="submit" name="btnSimpanPemeliharaan" id="btnSimpanPemeliharaan" value=" Simpan " class="btn btn-primary btn-sm" data-id="1" /> </div>
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
