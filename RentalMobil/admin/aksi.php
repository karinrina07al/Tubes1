<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
//$id=$_GET['id'];
//delete data dalam database
if ($module=='mobil' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from mobil where
		id_mobil='$_GET[id]'");
	header('location:server.php?module=mobil');
}
//bagian user
elseif ($module=='mobil' and $act=='input'){
	$set = true;
	$msg = "";
//tentukan variabel file yg diupload dan tipe file
	$tipe_file	= $_FILES['foto']['type'];
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file	= $_FILES['foto']['name'];
	$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

	if(empty($lokasi_file)){
		$set=false;
		$msg= $msg.'Upload gagal, Anda Lupa Mengambil Gambar..';
	}else{
//tentukan tipe file harus image 
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png"){

			$set=false;
			$msg= $msg. 'Upload gagal, tipe file harus image..';
		}else{
			isset($save_file);
		}
//replace di server 
		if($save_file){
			chmod("images/$nama_file", 0777);
		}else{
			$msg = $msg.'Upload Image gagal..';
			$set =	false;
		}
	}if($set){
		$nama =$_POST['nama_mobil'];
		$har =$_POST['harga_sewa'];
		$tuj =$_POST['tujuan'];

		$sql=mysqli_query($koneksi,"insert into mobil(foto_mobil,nama_mobil,harga_sewa,tujuan)values('$nama_file','$nama','$har','$tuj')");
		$msg= $msg.'Upload Images Sukses..';
		print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=mobil\">";
	}
	echo "$msg";
}

//Update galeri
elseif ($module=='mobil' and $act=='update'){
	$set = true;
	$msg = "";

//tentukan variabel file yg diupload dan tipe file
	$tipe_file	= $_FILES['foto']['type'];
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file	= $_FILES['foto']['name'];
	$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

	if(empty($lokasi_file)){
		isset($set);
	}else{
//tentukan tipe file harus image 
		if ($tipe_file != "image/gif" and
			$tipe_file != "image/jpeg" and
			$tipe_file != "image/jpg" and
			$tipe_file != "image/pjpeg" and
			$tipe_file != "image/png"){
				
				$set=false;
				$msg= $msg. 'Upload gagal, tipe file harus image..';
				}else{

					$unlink=mysqli_query($koneksi, "select * from mobil where id_mobil='$_POST[id]'");
					$CekLink=mysqli_fetch_array($unlink); 
						if(!empty($CekLink['foto_mobil']));
						{
							unlink("images/$CekLink[foto_mobil]");
						}
							isset($save_file);
						}

//replace di server 
					if($save_file)
						{
						chmod("images/$nama_file", 0777);
					}else{
						$msg = $msg.'Upload Image gagal..';
						$set =	false;
					}
				}
				if($set){
					$id =$_POST['id_mobil'];
					$nama =$_POST['nama_mobil'];
					$har =$_POST['harga_sewa'];
					$tuj =$_POST['tujuan'];

					if(empty($lokasi_file)){
						mysqli_query($koneksi, "update mobil set nama_mobil='$nama', harga_sewa='$har', tujuan='$tuj' where id_mobil='$id'");}
					else{mysqli_query($koneksi, "update mobil set foto_mobil='$nama_file',nama_mobil='$nama', harga_sewa='$har', tujuan='$tuj' where id_mobil='$id'");
			}
			$msg= $msg.'Update Images Sukses..';
			print "<meta http-equiv=\"refresh\"content=\"1;URL=server.php?module=mobil\">";
		}
		echo "$msg";
	}
?>