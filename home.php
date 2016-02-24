<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Labiryn</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#"><img class="img-responsive" src="img/screen65.png" ></a>
			  <div class="navbar-title hidden-xs">
				<a href="#" class="nama-app">LAB-INVENTORY MANAGEMENT</a>
				<p class="alamat">Unit Dukungan Teknis,&nbsp;</p>
				<p class="alamat">Gd. Benny Subianto (Labtek V)&nbsp;&nbsp;ITB</p>
			  </div>
			</div><!-- /navbar header -->
			
			 <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
			  
			   <ul class="nav navbar-nav navbar-right">
			   <li><a href="home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
				<?php if (isset($_COOKIE["LOGEE"])) { ?>
				<li><a href="peminjaman.php"><span class="glyphicon glyphicon-eject"></span>&nbsp;Peminjaman</a></li>
				<li><a href="pemeliharaan.php"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Pemeliharaan</a></li>
				<li><a href="alat.php"><span class="glyphicon glyphicon-hdd"></span>&nbsp;Data Alat</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-duplicate"></span>&nbsp;Statistik <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="?open=lap_pembelian"><span class="glyphicon glyphicon-file"></span>&nbsp;Berdasarkan Kategori Peminjam</a></li>
					<li><a href="?open=lap_penjualan"><span class="glyphicon glyphicon-file"></span>&nbsp;Berdasarkan Barang Rusak</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="?open=lap_stock"><span class="glyphicon glyphicon-file"></span>&nbsp;Statistik Umum</a></li>
				  </ul>
				</li>				
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
				<?php } else { ?> 
					<li><a href="login_form.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Login</a></li>
				<?php } ?>
			  </ul>
			</div><!-- /.navbar-collapse -->
		</div><!--- /continer -->
	</nav><!-- /navbar -->
	<div class="container-fluid">	
<center>
<h4>Petunjuk:</h4>
<ul>
<li>Lakukan login sebagai Admin
<li>Menu akan bertambah setelah melakukan login sebagai Admin.
<li>Untuk melihat atau mengubah data alat silahkan pilih menu Data Alat pada menu navigasi
<li>Untuk memasukkan data peminjaman silahkan pilih menu Peminjaman pada menu navigasi
<li>Untuk memasukkan data pemeliharaan silahkan pilih menu Pemeliharaan pada menu navigasi
<li>Untuk meelihat statisik peminjaman dan kerusakan silahkan pilih menu Statistik pada menu navigasi
<li>Untuk melakukan logout silahkan pilih menu Logout pada menu navigasi
</ul>
</center>

<?php
	include("footer.php");
?>