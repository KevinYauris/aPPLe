<?php
require_once "dbconnect/dbconnect.php";
require_once "functions.php";
opendb();

function RedirectTo($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

if(isset($_POST['tambahPemeliharaan'])){
	# BACA DATA DALAM FORM, masukkan datake variabel
	$errMsg = "";
	$idPemeliharaan=secure(trim($_POST['idPemeliharaan']));
	$idAlat=secure(trim($_POST['idAlat']));	
	$startBroken=secure(trim($_POST['startBroken']));
	$startRepair=secure(trim($_POST['startRepair']));
	$finishRepair=secure(trim($_POST['finishRepair']));
		
	$sql  = "INSERT INTO pemeliharaan (id_kerusakan, id_alat, start_broken, start_repair, finish_repair)
			VALUES ('$idPemeliharaan','$idAlat', '$startBroken','$startRepair','$finishRepair')";
	$res = querydb($sql);
	
	if($res){
		if ($finishRepair == '0000-00-00'){
			$sql2  = "UPDATE alat SET ketersediaan='T' WHERE id_alat = '$idAlat'";
			$res2 = querydb($sql2);
		}
		
		$errMsg .= "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "SUKSESS !!! Data sudah disimpan !!!";
		$errMsg .= "</div>";
		
	}else{
		$errMsg .= "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "GAGAL !!! Data tidak bisa disimpan !!!";
		$errMsg .= "</div>";
	}
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
}	
//EDIT PEMELIHARAAN
IF(isset($_GET['idPemeliharaan'])){
	$errMsg = "";
	$idPemeliharaan=$_GET['idPemeliharaan'];
	$idAlat=htmlspecialchars($_POST['idAlat']);	
	$startBroken=htmlspecialchars($_POST['startBroken']);
	$startRepair=htmlspecialchars($_POST['startRepair']);
	$finishRepair=htmlspecialchars($_POST['finishRepair']);
		
	$qry="UPDATE pemeliharaan SET id_kerusakan='$idPemeliharaan', id_alat='$idAlat',start_broken='$startBroken',start_repair='$startRepair', finish_repair='$finishRepair'
		 WHERE id_kerusakan='$idPemeliharaan'";
	$hsl = querydb($qry);
	
	
	RedirectTo('pemeliharaan.php', false);
}	

if(isset($_POST['hapusPemeliharaan'])){

	$errMsg = "";
	
	$idPemeliharaan=$_POST['idPemeliharaan'];
	
	$qri="DELETE FROM pemeliharaan WHERE id_kerusakan='".$idPemeliharaan."'";	
	$res=querydb($qri);
	if($res){
		$errMsg .="<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "SUKSES !!! Data sudah dihapus!!!";
		$errMsg .= "</div>";
	}else{
		$errMsg .="<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "GAGAL !!! Data tidak bisa dihapus !!!";
		$errMsg .= "</div>";
	}
	
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
	
}
?>
