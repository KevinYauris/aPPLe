<?php
	include ("header.php");
	include "/libchart/libchart/classes/libchart.php";	
	require_once "dbconnect/dbconnect.php";	
	opendb();
	//Menentukan batas, cek halaman dan posisi data

			$count = arraydb(querydb("
			select * from (

			(select count(*) as nlaptop from alat natural join pemeliharaan 

			where lower(kategori)='laptop') a

			join

			(select count(*) as nsound from alat natural join pemeliharaan 

			where lower(kategori)='sound') as b

			join

			(select count(*) as nproyektor from alat natural join pemeliharaan 

			where lower(kategori)='proyektor') as c

			join

			(select count(*) as nlain from alat natural join pemeliharaan 

			where lower(kategori)='lain') as d

			)			
			"));

			$chart = new PieChart();	

			$dataSet = new XYDataSet();
			$dataSet->addPoint(new Point("Sound (". $count['nsound'] . ")", $count['nsound']));
			$dataSet->addPoint(new Point("Proyektor (". $count['nproyektor'] . ")", $count['nproyektor']));
			$dataSet->addPoint(new Point("Laptop (". $count['nlaptop'] . ")", $count['nlaptop']));
			$dataSet->addPoint(new Point("Misc (". $count['nlain'] . ")", $count['nlain']));
			$chart->setDataSet($dataSet);	
			
			$chart->setTitle("Statistik Umum Kerusakan Barang");
			$chart->render("generated/Rusak.png");	
			?>
			<center><img alt="Pie chart"  src="generated/Rusak.png" style="border: 1px solid gray;"/></center>

		

	
<script>
	$('li:disabled').prop('disabled',true);
</script>

<?php
	include("footer.php");

?>
