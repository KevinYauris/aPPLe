// JavaScript Document
$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		


		////////////// DATA ALAT ////////////////
		$("#btnBarangTambah").click(function(){
			$.ajax({url:'alat_add.php',
				success:function(html){
					$("#dataTambahUbah").hide();	
					$("#dataTambahUbah").html(html)
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			}); 
		}); 
		//tambah & ubah data alat
		$(document).on('click',"#btnBarangSimpan",function () {
			$("#formBarang").submit(function(e){return false;});
			var id = $(this).data('id');
			if(id==1){
				var idAlat = $('#idAlat').val();
				var namaAlat = $('#txtNama').val();
				var lokasi = $('#txtLokasi').val();
				var kategori = $('#txtKategori').val();
				var kondisi = $('#txtKondisi').val();
				var ketersediaan = $('#txtKetersediaan').val();
				var data={addAlat:'',idAlat:idAlat,namaAlat:namaAlat,lokasi:lokasi,kategori:kategori,kondisi:kondisi,ketersediaan:ketersediaan};
			}else if(id==2){
				var idAlat = $('#idAlat').val();
				var namaAlat = $('#txtNama').val();
				var lokasi = $('#txtLokasi').val();
				var kategori = $('#txtKategori').val();
				var kondisi = $('#txtKondisi').val();
				var ketersediaan = $('#txtKetersediaan').val();
				var data={ubahAlat:'',idAlat:idAlat,namaAlat:namaAlat,lokasi:lokasi,kategori:kategori,kondisi:kondisi,ketersediaan:ketersediaan};
			}	
			if(namaAlat.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Alat Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(lokasi.length<=0){$('#txtLokasi').focus();$('.modal-body').html('<p>Lokasi Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kategori.length<=0){$('#txtKategori').focus();$('.modal-body').html('<p>Kategori Barang Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kondisi.length<=0){$('#txtKondisi').focus();$('.modal-body').html('<p>Kondisi Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(ketersediaan.length<=0){$('#txtKetersediaan').focus();$('.modal-body').html('<p>Ketersediaan Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'alat_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			
			//alert('id : '+id);	
		});
		//tampilkan form ubah data alat
		$(".btnBarangUbah").click(function(){
			var idAlat = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"alat_edit.php",
				data:{ubahAlat:'',idAlat:idAlat},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
		});	
		//Hapus data alat
		$(".btnBarangHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var idAlat = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'alat_proses.php',
					data:{hapusBarang:'',idAlat:idAlat},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kdRow);
			};
		});

////////////////////////////////////////////// DATA PEMINJAMAN /////////////////////////////////////////////////////////
		$(".btnTambahPeminjaman").click(function(){
			var idAlat = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"peminjaman_add.php",
				data:{tambahPeminjaman:'',idAlat:idAlat},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
		});	
		//tambah & ubah data peminjaman
		$(document).on('click',"#btnSimpanPeminjaman",function () {
			$("#formPeminjaman").submit(function(e){return false;});
			var id = $(this).data('id');
			var idPeminjaman = $('#idPeminjaman').val();
			var idAlat = $('#idAlat').val();
			var namaAlat = $('#namaAlat').val();
			var noIdentitas = $('#noIdentitas').val();
			var namaPeminjam = $('#namaPeminjam').val();
			var kategoriPeminjam = $('#kategoriPeminjam').val();
			var kegiatan = $('#kegiatan').val();
			var waktuPeminjaman = $('#waktuPeminjaman').val();
			var durasi = $('#durasi').val();
			var status = $('#status').val();
			var data={tambahPeminjaman:'',idPeminjaman:idPeminjaman,idAlat:idAlat,namaAlat:namaAlat,noIdentitas:noIdentitas,namaPeminjam:namaPeminjam,kategoriPeminjam:kategoriPeminjam,kegiatan:kegiatan,waktuPeminjaman:waktuPeminjaman,durasi:durasi,status:status};

			if(noIdentitas.length<=0){$('#noIdentitas').focus();$('.modal-body').html('<p>Nomor Identitas Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(namaPeminjam.length<=0){$('#namaPeminjam').focus();$('.modal-body').html('<p>Nama Peminjam Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kategoriPeminjam.length<=0){$('#kategoriPeminjam').focus();$('.modal-body').html('<p>Kategori Peminjam Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kegiatan.length<=0){$('#kegiatan').focus();$('.modal-body').html('<p>Kegiatan Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(waktuPeminjaman.length<=0){$('#waktuPeminjaman').focus();$('.modal-body').html('<p>Waktu Peminjaman Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(durasi.length<=0){$('#durasi').focus();$('.modal-body').html('<p>Durasi Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(status.length<=0){$('#status').focus();$('.modal-body').html('<p>Status Peminjaman Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'peminjaman_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			
			//alert('id : '+id);	
		});
		//Hapus data alat
		$(".btnHapusPeminjaman").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var idPeminjaman = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'peminjaman_proses.php',
					data:{hapusPeminjaman:'',idPeminjaman:idPeminjaman},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kdRow);
			};
		});


////////////////////////////////////////////// DATA PEMELIHARAAN /////////////////////////////////////////////////////////

		$(".btnTambahPemeliharaan").click(function(){
			var idAlat = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"pemeliharaan_add.php",
				data:{tambahPemeliharaan:'',idAlat:idAlat},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
		});	
		//tambah & ubah data peminjaman
		$(document).on('click',"#btnSimpanPemeliharaan",function () {
			$("#formPemeliharaan").submit(function(e){return false;});
			var id = $(this).data('id');
			var idPeminjaman = $('#idPeminjaman').val();
			var idAlat = $('#idAlat').val();
			var namaAlat = $('#namaAlat').val();
			var noIdentitas = $('#noIdentitas').val();
			var namaPeminjam = $('#namaPeminjam').val();
			var kategoriPeminjam = $('#kategoriPeminjam').val();
			var kegiatan = $('#kegiatan').val();
			var waktuPeminjaman = $('#waktuPeminjaman').val();
			var durasi = $('#durasi').val();
			var status = $('#status').val();
			var data={tambahPeminjaman:'',idPeminjaman:idPeminjaman,idAlat:idAlat,namaAlat:namaAlat,noIdentitas:noIdentitas,namaPeminjam:namaPeminjam,kategoriPeminjam:kategoriPeminjam,kegiatan:kegiatan,waktuPeminjaman:waktuPeminjaman,durasi:durasi,status:status};
		
			if(noIdentitas.length<=0){$('#noIdentitas').focus();$('.modal-body').html('<p>Nomor Identitas Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(namaPeminjam.length<=0){$('#namaPeminjam').focus();$('.modal-body').html('<p>Nama Peminjam Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kategoriPeminjam.length<=0){$('#kategoriPeminjam').focus();$('.modal-body').html('<p>Kategori Peminjam Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kegiatan.length<=0){$('#kegiatan').focus();$('.modal-body').html('<p>Kegiatan Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(waktuPeminjaman.length<=0){$('#waktuPeminjaman').focus();$('.modal-body').html('<p>Waktu Peminjaman Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(durasi.length<=0){$('#durasi').focus();$('.modal-body').html('<p>Durasi Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(status.length<=0){$('#status').focus();$('.modal-body').html('<p>Status Peminjaman Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'peminjaman_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			
			//alert('id : '+id);	
		});
		//Hapus data alat
		$(".btnHapusPeminjaman").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var idPeminjaman = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'peminjaman_proses.php',
					data:{hapusPeminjaman:'',idPeminjaman:idPeminjaman},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kdRow);
			};
		});
	
});	


	