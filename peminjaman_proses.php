<?php
require_once "dbconnect/dbconnect.php";
require_once "functions.php";
opendb();

function RedirectToPeminjaman($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

if(isset($_POST['tambahPeminjaman'])){
	# BACA DATA DALAM FORM, masukkan datake variabel
	$errMsg = "";
	$idPeminjaman=secure(trim($_POST['idPeminjaman']));
	$idAlat=secure(trim($_POST['idAlat']));	
	$noIdentitas=secure(trim($_POST['noIdentitas']));
	$namaPeminjam=secure(trim($_POST['namaPeminjam']));
	$kategoriPeminjam=secure(trim($_POST['kategoriPeminjam']));
	$kegiatan=secure(trim($_POST['kegiatan']));
	$waktuPeminjaman=secure(trim($_POST['waktuPeminjaman']));
	$durasi=secure(trim($_POST['durasi']));
	$status=secure(trim($_POST['status']));
		
	
		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		//$kodeBaru	= buatKode("ma_barang", "");
		//$txtPassword2 = MD5($password);
		
		$sql  = "INSERT INTO peminjaman (id_peminjaman, id_alat, no_identitas, nama_peminjam,kategori_peminjam,kegiatan, waktu_peminjaman, durasi, status)
				VALUES ('$idPeminjaman','$idAlat', '$noIdentitas','$namaPeminjam','$kategoriPeminjam','$kegiatan','$waktuPeminjaman','$durasi','$status')";
		$res = querydb($sql);
		/*if ($status == 'Y') {
			$ketersediaan = 'Y';
		} else {
			$ketersediaan = 'T';
		}
		$qry ="UPDATE alat SET ketersediaan='$ketersediaan' WHERE id_alat='$idAlat'";
		$hsl = querydb($qry);*/
		if($res){
			if($status == 'Y') {
				$qry2="UPDATE alat SET ketersediaan='Y'
			 	WHERE id_alat='$idAlat'";
			 	$hsl2 = querydb($qry2);
			} else {
				$qry2="UPDATE alat SET ketersediaan='T'
			 	WHERE id_alat='$idAlat'";
			 	$hsl2 = querydb($qry2);
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
				
	//$errMsg = $inpNama;
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
	//RedirectToPeminjaman('peminjaman.php', false);
}	
//EDIT PEMINJAMAN
IF(isset($_GET['idPeminjaman'])){
	$errMsg = "";
	$idPeminjaman=$_GET['idPeminjaman'];
	$idAlat=htmlspecialchars($_POST['idAlat']);	
	$noIdentitas=htmlspecialchars($_POST['noIdentitas']);
	$namaPeminjam=htmlspecialchars($_POST['namaPeminjam']);
	$kategoriPeminjam=htmlspecialchars($_POST['kategoriPeminjam']);
	$kegiatan=htmlspecialchars($_POST['kegiatan']);
	$waktuPeminjaman=htmlspecialchars($_POST['waktuPeminjaman']);
	$durasi=htmlspecialchars($_POST['durasi']);
	$status=htmlspecialchars($_POST['status']);

		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		//$kodeBaru	= buatKode("ma_user", "UID");
		//$txtPassword2 = MD5($inpPassword);
		
		$qry="UPDATE peminjaman SET no_identitas='$noIdentitas', nama_peminjam='$namaPeminjam',kategori_peminjam='$kategoriPeminjam',kegiatan='$kegiatan', waktu_peminjaman='$waktuPeminjaman', durasi='$durasi', status='$status'
			 WHERE id_Peminjaman='$idPeminjaman'";
		$hsl = querydb($qry);

		if($status == 'Y') {
			$qry2="UPDATE alat SET ketersediaan='Y'
		 	WHERE id_alat='$idAlat'";
		 	$hsl2 = querydb($qry2);
		} else {
			$qry2="UPDATE alat SET ketersediaan='T'
		 	WHERE id_alat='$idAlat'";
		 	$hsl2 = querydb($qry2);
		}
	
	
	RedirectToPeminjaman('peminjaman.php', false);
}	

if(isset($_POST['hapusPeminjaman'])){

	$errMsg = "";
	
	$idPeminjaman=$_POST['idPeminjaman'];
	
	$qri="DELETE FROM peminjaman WHERE id_peminjaman='".$idPeminjaman."'";	
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
