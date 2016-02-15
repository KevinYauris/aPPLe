<?php
	include ("header.php");
	include "/libchart/libchart/classes/libchart.php";	
	require_once "dbconnect/dbconnect.php";	
	opendb();
	//Menentukan batas, cek halaman dan posisi data

			$count = arraydb(querydb("
			select * from (

			(select count(*) as nmahasiswa from peminjaman 

			where lower(kategori_peminjam)='mahasiswa') as a

			join

			(select count(*) as ndosen from peminjaman 

			where lower(kategori_peminjam)='dosen') as b

			join

			(select count(*) as nluar from peminjaman 

			where lower(kategori_peminjam)='luar') as c

			);		
			"));

			$chart = new PieChart();	

			$dataSet = new XYDataSet();
			$dataSet->addPoint(new Point("Dosen (". $count['ndosen'] . ")", $count['ndosen']));
			$dataSet->addPoint(new Point("Mahasiswa (". $count['nmahasiswa'] . ")", $count['nmahasiswa']));			
			$dataSet->addPoint(new Point("Luar (". $count['nluar'] . ")", $count['nluar']));
			$chart->setDataSet($dataSet);	
			
			$chart->setTitle("Statistik Umum Peminjam Barang");
			$chart->render("generated/Peminjam.png");	
			?>
			<center><img alt="Pie chart"  src="generated/Peminjam.png" style="border: 1px solid gray;"/></center>

		

	
<script>
	$('li:disabled').prop('disabled',true);
</script>

<?php
	include("footer.php");

?>
