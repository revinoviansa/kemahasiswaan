
<?php 
	error_reporting(0);
	include "session.php"; 
?>
<?php
if($_POST['halaman'] == 0)
{
	
		require_once("../config/koneksi.php");
			// Untuk foto
		$nama_file = $_FILES['gambar']['name'];
		$ukuran_file = $_FILES['gambar']['size'];
		$tipe_file = $_FILES['gambar']['type'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		
		// Folder tempat menyimpan gambarnya
		$path = "assets/img/".$nama_file;
	
	if(empty($nama_file))
	{
		$date = date("Y-m-d");
		$qr = mysqli_query($kon, "update tb_surat_keterangan_lulus set id_surat_keterangan_lulus = '$_POST[id_surat_keterangan_lulus]',
														nama_mahasiswa = '$_POST[nama_mahasiswa]',
														nim_mahasiswa = '$_POST[nim_mahasiswa]',
														keperluan = '$_POST[keperluan]',
														tempat_lahir = '$_POST[tempat_lahir]',
														tanggal_lahir = '$_POST[tanggal_lahir]',
														jurusan = '$_POST[jurusan]',
														prodi = '$_POST[prodi]',
														tahun_akademik = '$_POST[tahun_akademik]',
														nomor_surat = '$_POST[nomor_surat]',
														tanggal_sk = '$_POST[tanggal_sk]',
														tanggal_wisudah = '$_POST[tanggal_wisudah]',
														tanggal_cetak = '$date'
												  where id_surat_keterangan_lulus= '$_POST[id_surat_keterangan_lulus]'");
		if($qr)
		{
			echo "<script>alert('Data berhasil diperbarui');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
		}
		else
		{
			echo "<script>alert('Mohon maaf, data gagal diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
		}
	}
	else
	{
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg")
		{
			if($ukuran_file <= 3000000)
			{
				if(move_uploaded_file($tmp_file, $path))
				{
					$date = date("Y-m-d");
					$qr = mysqli_query($kon, "update tb_surat_keterangan_lulus set id_surat_keterangan_lulus = '$_POST[id_surat_keterangan_lulus]',
														nama_mahasiswa = '$_POST[nama_mahasiswa]',
														nim_mahasiswa = '$_POST[nim_mahasiswa]',
														keperluan = '$_POST[keperluan]',
														tempat_lahir = '$_POST[tempat_lahir]',
														tanggal_lahir = '$_POST[tanggal_lahir]',
														jurusan = '$_POST[jurusan]',
														prodi = '$_POST[prodi]',
														tahun_akademik = '$_POST[tahun_akademik]',
														nomor_surat = '$_POST[nomor_surat]',
														tanggal_sk = '$_POST[tanggal_sk]',
														tanggal_wisudah = '$_POST[tanggal_wisudah]',
														tanggal_cetak = '$date'
												  where id_surat_keterangan_lulus= '$_POST[id_surat_keterangan_lulus]'");
					if($qr)
					{
						echo "<script>alert('Data berhasil diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
					}
					else
					{
						echo "<script>alert('Mohon maaf, data gagal diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
					}
				}
				else
				{
					echo "<script>alert('Mohon maaf, Gambar gagal diupload.');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
				}
			}
			else
			{
				echo "<script>alert('Mohon maaf, Gambar tidak boleh melebihi 1 Mb.');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
			}
		}
		else
		{
			echo "<script>alert('Mohon maaf, type gambar yang diperbolehkan .jpg , .jpeg , .png');window.location='02_daftar_surat_keterangan_lulus.php?username=$_POST[username]'</script>";
		}
	}
}
else
{
	
		require_once("../config/koneksi.php");
			// Untuk foto
		$nama_file = $_FILES['gambar']['name'];
		$ukuran_file = $_FILES['gambar']['size'];
		$tipe_file = $_FILES['gambar']['type'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		
		// Folder tempat menyimpan gambarnya
		$path = "assets/img/".$nama_file;
	
	if(empty($nama_file))
	{
		$date = date("Y-m-d");
		$qr = mysqli_query($kon, "update tb_surat_keterangan_lulus set id_surat_keterangan_lulus = '$_POST[id_surat_keterangan_lulus]',
														nama_mahasiswa = '$_POST[nama_mahasiswa]',
														nim_mahasiswa = '$_POST[nim_mahasiswa]',
														keperluan = '$_POST[keperluan]',
														tempat_lahir = '$_POST[tempat_lahir]',
														tanggal_lahir = '$_POST[tanggal_lahir]',
														jurusan = '$_POST[jurusan]',
														prodi = '$_POST[prodi]',
														tahun_akademik = '$_POST[tahun_akademik]',
														nomor_surat = '$_POST[nomor_surat]',
														tanggal_sk = '$_POST[tanggal_sk]',
														tanggal_wisudah = '$_POST[tanggal_wisudah]',
														tanggal_cetak = '$date'
												  where id_surat_keterangan_lulus= '$_POST[id_surat_keterangan_lulus]'");
		if($qr)
		{
			echo "<script>alert('Data berhasil diperbarui');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
		}
		else
		{
			echo "<script>alert('Mohon maaf, data gagal diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
		}
	}
	else
	{
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg")
		{
			if($ukuran_file <= 3000000)
			{
				if(move_uploaded_file($tmp_file, $path))
				{
					$date = date("Y-m-d");
					$qr = mysqli_query($kon, "update tb_surat_keterangan_lulus set id_surat_keterangan_lulus = '$_POST[id_surat_keterangan_lulus]',
														nama_mahasiswa = '$_POST[nama_mahasiswa]',
														nim_mahasiswa = '$_POST[nim_mahasiswa]',
														keperluan = '$_POST[keperluan]',
														tempat_lahir = '$_POST[tempat_lahir]',
														tanggal_lahir = '$_POST[tanggal_lahir]',
														jurusan = '$_POST[jurusan]',
														prodi = '$_POST[prodi]',
														tahun_akademik = '$_POST[tahun_akademik]',
														nomor_surat = '$_POST[nomor_surat]',
														tanggal_sk = '$_POST[tanggal_sk]',
														tanggal_wisudah = '$_POST[tanggal_wisudah]',
														tanggal_cetak = '$date'
												  where id_surat_keterangan_lulus= '$_POST[id_surat_keterangan_lulus]'");
					if($qr)
					{
						echo "<script>alert('Data berhasil diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
					}
					else
					{
						echo "<script>alert('Mohon maaf, data gagal diperbarui.');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
					}
				}
				else
				{
					echo "<script>alert('Mohon maaf, Gambar gagal diupload.');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
				}
			}
			else
			{
				echo "<script>alert('Mohon maaf, Gambar tidak boleh melebihi 1 Mb.');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
			}
		}
		else
		{
			echo "<script>alert('Mohon maaf, type gambar yang diperbolehkan .jpg , .jpeg , .png');window.location='02_daftar_surat_keterangan_lulus.php?halaman=$_POST[halaman]'</script>";
		}
	}
}
?>
