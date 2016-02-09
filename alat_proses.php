<?php
require_once "dbconnect/dbconnect.php";
require_once "functions.php";
opendb();


if(isset($_POST['addAlat'])){
	# BACA DATA DALAM FORM, masukkan datake variabel
	$errMsg = "";
	$idAlat=secure(trim($_POST['idAlat']));	
	$namaAlat=strtoupper(secure(trim($_POST['namaAlat'])));
	$lokasi=secure(trim($_POST['lokasi']));
	$kategori=secure(trim($_POST['kategori']));
	$kondisi=secure(trim($_POST['kondisi']));
	$ketersediaan=secure(trim($_POST['ketersediaan']));
		
	
		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		//$kodeBaru	= buatKode("ma_barang", "");
		//$txtPassword2 = MD5($password);
		
		//Periksa apakah nM barang sudah ada atau belum ?
		$qri ="SELECT * FROM alat WHERE nama_alat='$namaAlat'";
		$res = querydb($qri);
		$row = numrows($res);
		
		if($row<1){
			//nama barang belum ada -> insert
			$sql  = "INSERT INTO alat (id_alat, nama_alat, lokasi,kategori,kondisi,ketersediaan)
					VALUES ('$idAlat', '$namaAlat','$lokasi','$kategori','$kondisi','$ketersediaan')";
			$res = querydb($sql);
			if($res){
				
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
		}else{

			$errMsg .= "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">";
			$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
			$errMsg .= "Barang dengan nama <b>$inpNama</b> sudah ada dalam database, gunakan nama yang lain !!!";
			$errMsg .= "</div>"; 
		}
				
	//$errMsg = $inpNama;
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
}	

IF(isset($_POST['ubahAlat'])){
	# BACA DATA DALAM FORM, masukkan datake variabel
	$errMsg = "";
	$idAlat=secure(trim($_POST['idAlat']));	
	$namaAlat=strtoupper(secure(trim($_POST['namaAlat'])));
	$lokasi=secure(trim($_POST['lokasi']));
	$kategori=secure(trim($_POST['kategori']));
	$kondisi=secure(trim($_POST['kondisi']));
	$ketersediaan=secure(trim($_POST['ketersediaan']));

		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		//$kodeBaru	= buatKode("ma_user", "UID");
		//$txtPassword2 = MD5($inpPassword);
		
		$qry="UPDATE alat SET nama_alat='$namaAlat',lokasi='$lokasi',kategori='$kategori',kondisi='$kondisi',ketersediaan='$ketersediaan'
			 WHERE id_alat='$idAlat'";
		$hsl = querydb($qry);
		if($hsl){			
			
			$errMsg .= "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						SUKSES !!! Data Sudah Dirubah !
					</div>
				";
			
			//echo "<script>window.location.replace('page.php?open=data_master/barang_data.php');</script>";
			//header("location:./page.php");		
		}
		else{
				
			$errMsg .="
					<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
						GAGAL !!! Data Tidak Bisa Dirubah, harap ulang input data!
					</div>
				";	
		}	
	
	
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
}	

if(isset($_POST['hapusBarang'])){

	$errMsg = "";
	
	$idAlat=$_POST['idAlat'];
	
	$qri="DELETE FROM alat WHERE id_alat='".$idAlat."'";	
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
