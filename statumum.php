<?php
	include ("header.php");
	include "/libchart/libchart/classes/libchart.php";	
	require_once "dbconnect/dbconnect.php";	
	opendb();
	//Menentukan batas, cek halaman dan posisi data

			$count = arraydb(querydb("
			select * from (

			(select count(*) as nlaptop from alat natural join peminjaman 

			where lower(kategori)='laptop') a

			join

			(select count(*) as nsound from alat natural join peminjaman 

			where lower(kategori)='sound') as b

			join

			(select count(*) as nproyektor from alat natural join peminjaman 

			where lower(kategori)='proyektor') as c

			join

			(select count(*) as nlain from alat natural join peminjaman) as d
			)						
			"));

			$chart = new PieChart();	
			$nlain = $count['nlain']-$count['nlaptop']-$count['nproyektor']-$count['nsound'];
			$dataSet = new XYDataSet();
			$dataSet->addPoint(new Point("Sound (". $count['nsound'] . ")", $count['nsound']));
			$dataSet->addPoint(new Point("Proyektor (". $count['nproyektor'] . ")", $count['nproyektor']));
			$dataSet->addPoint(new Point("Laptop (". $count['nlaptop'] . ")", $count['nlaptop']));
			$dataSet->addPoint(new Point("Misc (". $nlain . ")", $nlain));
			$chart->setDataSet($dataSet);	
			
			$chart->setTitle("Statistik Umum Peminjaman Barang");
			$chart->render("generated/Peminjaman.png");	
			?>
			<center><img alt="Pie chart"  src="generated/Peminjaman.png" style="border: 1px solid gray;"/></center>

		

	
<script>
	$('li:disabled').prop('disabled',true);
</script>

<?php
	include("footer.php");

?>
