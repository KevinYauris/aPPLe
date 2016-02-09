<?php

opendb();
function buatKode($tabel, $inisial){
		
	//Mencari nama dan panjang kolom pertama (kode)
	$hsl1 = querydb("SELECT * FROM $tabel LIMIT 1"); 
	$klm1 = mysqli_fetch_field_direct($hsl1,0);
	//$hsl1 = $msysqli->query("SELECT * FROM $tabel LIMIT 1");
	//$klm1 = $hsl1->fetch_fields_direct(0);
	$klmNama1 = $klm1->name;
	$klmLenght1 = $klm1->length;
	
	$hsl22	= querydb("SELECT max(".$klmNama1.") FROM ".$tabel);
	//$hsl22   = querydb($qry2);
	$row	= arraydb($hsl22);
	
	if(empty($row[0])) {
		$angka=0;
	}
	else {
		$angka	= substr($row[0],strlen($inisial));
		//$angka = $row[0];;
	}
	
	$angka  = $angka + 1;
 	$angka	=strval($angka); 
	//Membuat angka 0 untuk mengisi digit yang kosong
 	$tmp	="";
 	for($i=1; $i<=($klmLenght1-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
	//return $klmLenght1;
}

function secure($inp) {

	$xss= stripslashes(strip_tags(htmlspecialchars($inp,ENT_QUOTES)));
	//$sql = mysql_real_escape_string($xss);
	$sql = mysqli_real_escape_string(opendb(),$xss);
	return $sql;}

?>