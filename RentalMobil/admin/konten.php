<?php
include "../include/koneksi.php";
//bagian home admin
if ($_GET['module']=='home') {
	echo "<h2>Halaman Utama</h2><br
	<p class=welcome>Selamat Datang admin,
		silahkan klik menu pilihan disebelah kiri untuk mengelola konten rental mobil.<br> Terima Kasih</p>";
		}
//bagian user
		elseif ($_GET['module']=='mobil') {
			include "modul/mobil.php";
		}
// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b></p>";
		}
		?>
		<a class="navbar-brand"><img src="../Jazz.png"></a>