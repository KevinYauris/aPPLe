<?php
	require_once "dbconnect/dbconnect.php";
	require_once "functions.php";
	opendb();

	$kode =buatKode("pemeliharaan","");
	//Menentukan batas, cek halaman dan posisi data
	$batas= 7;//Jumlah tampilan record per halaman minimum
	if(isset($_GET['halaman']))$halaman = $_GET['halaman'];
	if (empty($halaman)){$posisi=0; $halaman=1;} else {$posisi=($halaman-1) * $batas;} 

	if(isset($_GET['kategori']))$kategori = $_GET['kategori'];
	if (empty($kategori)) {
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	} else if ($kategori == '1'){
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' AND kategori='Laptop' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	} else if ($kategori == '2'){
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' AND kategori='Sound' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	} else if ($kategori == '3'){
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' AND kategori='Kabel' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	} else if ($kategori == '4'){
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' AND kategori='Proyektor' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	} else {
		$qri = "SELECT * FROM alat WHERE kondisi='Baik' AND ketersediaan='Y' AND kategori='Lain-lain' ORDER BY id_alat ASC LIMIT $posisi, $batas";
		$hsl = querydb($qri);
	}
	$hsl = querydb($qri);
	$jml_data = numrows($hsl);

	$jml_hal = ceil($jml_data/$batas);
	if ($jml_hal>20) {$jml_hal=20 AND $batas=ceil($jml_data/$jml_hal);$posisi=($halaman-1) * $batas;}
	$file="pagecontrol.php?open=pemeliharaan_addpage";

	include "header.php";
?>   
   
<div class="row">
	<div class="col-sm-5 col-md-4 col-sm-push-7 col-md-push-8">
		<span id="alertMsg"></span>
		<span id="dataTambahUbah"></span>
	</div><!-- /column -->
	<div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
		<a class="btn btn-danger btn-sm" id="btnBack" href="pemeliharaan.php">Kembali</a>
		<br>
		<div class="panel panel-primary">
			<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;DATA ALAT</div>
			<div class="panel-body">
				<p><a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php">Semua</a>
				<a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php?kategori=1">Laptop</a>
				<a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php?kategori=2">Sound</a>
				<a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php?kategori=3">Kabel</a>
				<a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php?kategori=4">Proyektor</a>
				<a class="btn btn-default btn-sm" id="btnPeminjamanTambah" href="pemeliharaan_addpage.php?kategori=5">Lain-lain</a></p>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<tr>
							<th>No.</th>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Kategori</th>
							<th>Kondisi</th>
							<th>Status</th>
							<th></th>
						</tr>
						<?php
							$c=1;
							while(($rek = arraydb($hsl)) && ($c <= 7)){
								if($rek['ketersediaan']=="Y"){$klsBaris="";$stat="<span class='label label-info'>Available</span>";}else{$klsBaris="danger";$stat="<span class='label label-danger'>Not Available</span>";}
							 	echo "<tr class=\"$klsBaris\">";
							 	echo "<td align='center'>".$c."</td>";
							 	echo "<td align='center'>".$rek['id_alat']."</td>";
							 	echo "<td align='left'>".$rek['nama_alat']."</td>";
								echo "<td align='center'>".$rek['kategori']."</td>";
								echo "<td align='center'>".$rek['kondisi']."</td>";
								echo "<td align='center'>".$stat."</td>";
								echo "<td align='center'><button class=\"btn btn-danger btn-xs btnTambahPemeliharaan\" data-val=\"$rek[id_alat]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tambah Alat Rusak\"><span class=\"glyphicon glyphicon-list-alt\"></span></button></td>";
								echo "<tr>";
								$c++;
							}
						?>
					</table>
				</div><!-- /class responsive -->
				<!-- pagination -->
				<nav><ul class="pagination pagination-sm">
					<?php
					if($halaman >1){$prev=$halaman-1; echo "<li><a href=$file&halaman=1>&laquo;</a><a href=$file&halaman=$prev>&lt;</a></li>";}
					else {echo "<li class='disabled'><a href='#'>&laquo;</a><a href='#'>&lt;</a></li>";} 
					for ($i=1; $i<=$jml_hal; $i++)
					if ($i!=$halaman){echo "<li><a href=$file&halaman=$i>$i</a></li>";} 
					else {echo"&nbsp;<li class='active'><a href='#'>$i</a></li>";};
					if($halaman < $jml_hal) {$next=$halaman+1; echo "<li><a href=$file&halaman=$next>&gt;</a>  <a href=$file&halaman=$jml_hal>&raquo;</a></li>";}
					else {echo "<li class='disabled'><a href='#'>&gt;</a>  <a href='#'>&raquo;</a></li>";}
					?>
				</ul></nav>
				<!-- /pagination -->
			</div><!-- /panel body -->
		</div><!-- /panel -->
		
	</div><!-- /column -->
	
</div><!-- /row -->	
<script>
	$('li:disabled').prop('disabled',true);
</script>		

<?php
	include "footer.php";
?>