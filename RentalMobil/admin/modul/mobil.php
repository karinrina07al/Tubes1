<?php
switch(@$_GET[act]){
//tampil user
	default:
	echo "<h2>Rental Mobil</h2>
	
	<table class='table'>
		<tr>
			<th scope='col'>No</th><th scope='col'>Foto</th><th scope='col'>Nama</th><th scope='col'>Harga Sewa</th><th scope='col'>Tujuan</th><th scope='col'>Aksi</th>
		</tr>";
		$tampil=mysqli_query($koneksi,"select * from mobil order by id_mobil asc");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
			<td>$no</td>
			<td><img width='50' height='50' src ='images/$r[foto_mobil]'></td>
			<td>$r[nama_mobil]</td>
			<td>$r[harga_sewa]</td>
			<td>$r[tujuan]</td>
			<td><a class='btn btn-primary' href=?module=mobil&act=editmobil&id=$r[id_mobil]>Edit</a>
				<a class='btn btn-danger' href=\"aksi.php?module=mobil&act=hapus&id=$r[id_mobil]\" onClick=\"return confirm('apakah anda benar akan menghapus data mobil $r[id_mobil]?')\">Hapus</a>
			</td></tr>";
			$no++;
		}
		echo "</table><form method=post action='?module=mobil&act=tambahmobil'>
	

		<input type=submit class='btn btn-primary' value='Tambah Mobil'>
	</form>"
		;
		break;
//tambah user
					case "tambahmobil":
					echo "<h2>Tambah Mobil</h2>
					<form method=post action='aksi.php?module=mobil&act=input' enctype='multipart/form-data'>
					<div>
			  				<div class='form-group'>
			    				<input class='form-control' name='nama_mobil' type='text' id='id_mobil' placeholder= 'Nama Mobil'>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control' name='harga_sewa' type='no' id='id_mobil' placeholder= 'Harga Sewa'>
			  				</div>
			  				<div class='form-group'>
			    				<textarea class='form-control' name='tujuan' type='text' id='mytextarea'></textarea>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control'type='file' name='foto' >
			  				</div>

			  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;

//edit user
					case "editmobil":
					$edit=mysqli_query($koneksi,"select * from mobil where
						id_mobil='$_GET[id]'");
					$r=mysqli_fetch_array($edit);
					echo "<h2>Edit Mobil</h2>
					<form method=post action='aksi.php?module=mobil&act=update' enctype='multipart/form-data'>
					<div>
					<input class='form-control' name='id_mobil' type='hidden' id='nama_mobil' placeholder='Nama Mobil' >
			  				<div class='form-group'>
			    				<input class='form-control' name='nama_mobil' type='text' id='nama_mobil' placeholder='Nama Mobil'>
			  				</div>
			  				<div class='form-group'>
			    				<input name='harga_sewa' type='no' id='id_mobil' placeholder='Harga Sewa'>
			  				</div>
			  				<div class='form-group'>
			    				<textarea class='mytextarea' name='tujuan' type='text' id='mytextarea' placeholder='Tujuan'></textarea>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control'type='file' name='foto' >
			  				</div>
			  				<br>
			  				<input type='submit' class='btn btn-primary' name='submit' value='Update'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;
							}
	?> 
	<script type="text/javascript" src="../tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>