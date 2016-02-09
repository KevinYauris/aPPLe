// JavaScript Document
$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		
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
		
		
	
});	


	