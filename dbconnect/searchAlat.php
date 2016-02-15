<?php
	include("header.php");
	require_once "dbconnect/dbconnect.php";
	opendb();

	//Menentukan batas, cek halaman dan posisi data
	$batas= 7;//Jumlah tampilan record per halaman minimum
	if(isset($_GET['halaman']))$halaman = $_GET['halaman'];
	if (empty($halaman)){$posisi=0; $halaman=1;} else {$posisi=($halaman-1) * $batas;} 

	$qry ="SELECT * FROM alat";
	$hsl = querydb($qry);
	$jml_data = numrows($hsl);

	$jml_hal = ceil($jml_data/$batas);
	if ($jml_hal>20) {$jml_hal=20 AND $batas=ceil($jml_data/$jml_hal);$posisi=($halaman-1) * $batas;}
	$file="page.php?open=alat";
?>


<?php
$key = $POST['key'];
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "apple";

$mysqli = new mysqli($myHost,$myUser,$myPass,$myDbs);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", $mysqli->connect_error());
    exit();
}

$sql = "SELECT * FROM 'alat' WHERE nama_alat = $key;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID alat: " . $row["id_alat"]. " - Nama Alat: " . $row["nama_alat"]. " " . $row["lokasi"]. $row["kondisi"]. $row["kategori"].$row["ketersediaan"]. "<br>";
    }
} else {
    echo "0 results";
}
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
							$qri = "SELECT * FROM 'alat' WHERE nama_alat = $key;
							$hsl = querydb($qri);
							while(($rek = arraydb($hsl)) && ($c <= 7)){
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



?>