<?php
	include "../config/koneksi.php";	
	mysql_query("delete from tb_surat_keterangan_lulus where id_surat_keterangan_lulus ='$_GET[id_surat_keterangan_lulus]'");
	echo"<script>alert('Data berhasil di hapus');window.location='02_daftar_surat_keterangan_lulus.php'</script>";
?>
