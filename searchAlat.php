<?php
	include("header.php");
	require_once "dbconnect/dbconnect.php";
	opendb();
	$key = $_POST["key"];
	$keys = $key . "%";
?>

<div class="table-responsive">

					<table class="table table-striped table-bordered table-condensed table-hover">
						<tr>
							<th>No.</th>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Lokasi</th>
							<th>Kondisi</th>
							<th>Kategori</th>
							<th>Status</th>
							<th colspan="2" align="center">Pilihan</th>
						</tr>
						<?php
							$c=1;
							$qri = "SELECT * FROM alat WHERE nama_alat LIKE '". $keys. "'";
							$hsl = querydb($qri);
							while($rek = arraydb($hsl)){
								if($rek['ketersediaan']=="Y"){$klsBaris="";$stat="<span class='label label-info'>Available</span>";}else{$klsBaris="danger";$stat="<span class='label label-danger'>Not Available</span>";}
							 echo "<tr class=\"$klsBaris\">";
							 echo "<td align='center'>".$c."</td>";
							 echo "<td align='center'>".$rek['id_alat']."</td>";
							 echo "<td align='left'>".$rek['nama_alat']."</td>";
							 echo "<td align='center'>".$rek['lokasi']."</td>";
							 echo "<td align='center'>".$rek['kondisi']."</td>";
							 echo "<td align='center'>".$rek['kategori']."</td>";
							 echo "<td align='center'>".$stat."</td>";
							 echo "<td align='center'><button class=\"btn btn-warning btn-xs btnBarangUbah\" data-val=\"$rek[id_alat]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit Data\"><span class=\"glyphicon glyphicon-pencil\"></span></button></td>";
							 echo "<td align='center'><button class=\"btn btn-danger btn-xs btnBarangHapus\" data-val=\"$rek[id_alat]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Hapus Data\" ><span class=\"glyphicon glyphicon-remove\"></span></button></td>";
							 echo "<tr>";
							 $c++;
							}
						?>
					</table>
				</div><!-- /class responsive -->
			</div><!-- /panel body -->
		</div><!-- /panel -->
		
	</div><!-- /column -->
	
</div><!-- /row -->	