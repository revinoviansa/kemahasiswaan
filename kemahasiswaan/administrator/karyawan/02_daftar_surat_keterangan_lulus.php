<?php 
	include"01_nav.php";
	error_reporting(0);
	include"../config/class_paging.php";
?>
<aside class="right-side">
    <section class="content-header">
    	<div class="container-fluid" style="margin:10px;">	
    		<table width="100%">
	    		<tr class="info">
            		<td colspan="6"><b><h4>Daftar Surat Penelitian</b></h4></td>   
	        	</tr>
	            <tr>
	                <td width="20%"><label>Pencarian Berdasarkan</label></td>               
	                    <form method="post" action="" enctype="multipart/form-data">                    
	                        <td width="25%">
	                            <select name="cariid" class="form-control">
	                                <option value="nim_mahasiswa">NIM</option>
	                                <option value="nama_mahasiswa">Nama Mahasiswa</option>
	                            </select>
	                        </td>
	                        <td width="5%"></td>
	                        <td>
	                            <div class="form-group input-group" style="margin-top:15px;">
	                            <span class="input-group-btn">
	                                <input type="text" name="cari" placeholder="Cari" class="form-control">
	                                <button class="btn btn-default" type="submit" name="submit"><i class="fa fa-search"></i></button>
	                            </span>
	                            </div>  
	                        </td>
	                        <td width="5%">
	                        </td>   
	                    </form>
	                
		                <td>
		                    <a href="02_daftar_surat_keterangan_lulus.php" class="btn btn-info">ALL</a>
		                </td>                   
	            </tr>
	            <tr>
	                <td colspan="6"><a href="02_tambah_surat_keterangan_lulus.php" class="btn btn-primary">Tambah data + </a>
					<a class="btn btn-info" > <i class="fa fa-cloud fa-sm"></i> | Jumlah : <?php
			                                                        require_once("../config/koneksi.php");
			                                                        $query = mysqli_query ($kon, "SELECT * from tb_surat_keterangan_lulus");
			                                                        $jumlah = mysqli_num_rows ($query); ?>
			                                                        <?php echo $jumlah; ?> </a>
			        <a class="btn btn-success" > <i class="fa fa-spinner fa-sm"></i> | Belum Di Proses : <?php
			                                                        require_once("../config/koneksi.php");
			                                                        $query = mysqli_query ($kon, "SELECT * from tb_surat_keterangan_lulus where status='Belum Dicetak' ");
			                                                        $jumlah = mysqli_num_rows ($query); ?>
			                                                        <?php echo $jumlah; ?> </a>

			        <a class="btn btn-danger" > <i class="fa fa-spinner fa-sm"></i> | Sudah Di Proses : <?php
			                                                        require_once("../config/koneksi.php");
			                                                        $query = mysqli_query ($kon, "SELECT * from tb_surat_keterangan_lulus where status='Sudah Dicetak' ");
			                                                        $jumlah = mysqli_num_rows ($query); ?>
			                                                        <?php echo $jumlah; ?> </a>
			                                                        </td></td>
	            </tr>
	            <tr>
	                <td>&nbsp;</td>
	            </tr>
	        </table>

        <table style="width:100%;" class="table table-bordered">    
            <tr class="info">
							<th>No.</th><th>Nama Mahasiswa</th><th>NIM</th><th>Jurusan</th><th>Tempat</th><th>Tgl Lahir</th><th>Status</th><th width="10%">Aksi</th>
						</tr>
            <?php 
            	include "../config/koneksi.php";
                if(isset($_POST['submit'])){
                    $cariid = $_POST['cariid'];
                    $cari = $_POST['cari'];
                    $query=mysqli_query($kon, "SELECT * from tb_surat_keterangan_lulus where $cariid = '$cari' or $cariid = '0' "); 
                    $i = $posisi+1;      
                while($a=mysqli_fetch_array($query)){
            echo"
                <tr>
                    <td>$i</td>
							<td>$a[nama_mahasiswa]</td>
							<td>$a[nim_mahasiswa]</td>
							<td>$a[jurusan]</td>
							<td>$a[tempat_lahir]</td>
							<td>$a[tanggal_lahir]</td>      
                    <td>";
										if($a['status'] == 'Belum Dicetak')
											{
											echo "<a href='02_proses_cetak.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]'>
												  <button type='button' class='btn btn-danger btn-xs'>
												  <i class='glyphicon glyphicon-ok'></i></button>
						            			 ";
											}
										elseif($a['status'] == 'Sudah Dicetak')
						          			{
								            echo "<button type='button' class='btn btn-info  btn-xs'><i class='glyphicon glyphicon-ok'></i></button>
								            ";
								          	}
										echo"</td>";


											echo"<td>
						<a href='02_cetak_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' class='btn btn-info btn-xs'>
							<span class='glyphicon glyphicon-print' aria-hidden='true'></span>
						</a>
						<a href='02_edit_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' class='btn btn-success btn-xs'>
							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
						</a> 
						<a href='02_delete_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' onclick='return confirm(\"Anda yakin akan menghapus $a[nama_mahasiswa] ?\")' class='btn btn-danger btn-xs'>
							<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
						</a>
                    </td>
                </tr>";
                $i++;
            }
                }
                elseif(!empty($_GET['id_surat_keterangan_lulus'])){
                    $query=mysqli_query($kon, "SELECT * from tb_surat_keterangan_lulus where id_surat_keterangan_lulus='$_GET[id_surat_keterangan_lulus]'"); 
                    $i = $posisi+1;      
                while($a=mysqli_fetch_array($query)){
            echo"
                <tr>    
                    <td>$i</td>
							<td>$a[nama_mahasiswa]</td>
							<td>$a[nim_mahasiswa]</td>
							<td>$a[jurusan]</td>
							<td>$a[tempat_lahir]</td>
							<td>$a[tanggal_lahir]</td>      
                    <td>";
										
										if($a['status'] == 'Belum Dicetak')
											{
											echo "<a href='02_proses_cetak.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]'>
												  <button type='button' class='btn btn-danger btn-xs'>
												  <i class='glyphicon glyphicon-ok'></i></button>
						            			 ";
											}
										elseif($a['status'] == 'Sudah Dicetak')
						          			{
								            echo "<button type='button' class='btn btn-info  btn-xs'><i class='glyphicon glyphicon-ok'></i></button>
								            ";
								          	}
										echo"</td>";


											echo"<td>   
                        <a href='02_cetak_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' class='btn btn-info btn-xs'>
							<span class='glyphicon glyphicon-print' aria-hidden='true'></span>
						</a>
						<a href='02_edit_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' class='btn btn-success btn-xs'>
							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
						</a> 
						<a href='02_delete_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]' onclick='return confirm(\"Anda yakin akan menghapus $a[nama_mahasiswa] ?\")' class='btn btn-danger btn-xs'>
							<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
						</a> 
                    </td>
                </tr>";
                $i++;
                }
                }

                else{
                    $p      = new Paging;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);               
                    $query=mysqli_query($kon, "SELECT * from tb_surat_keterangan_lulus order by id_surat_keterangan_lulus desc LIMIT $posisi,$batas");
                
                    $i = $posisi+1;     
                while($a=mysqli_fetch_array($query)){

                echo"
                <tr>
                    <td>$i</td>
							<td>$a[nama_mahasiswa]</td>
							<td>$a[nim_mahasiswa]</td>
							<td>$a[jurusan]</td>
							<td>$a[tempat_lahir]</td>
							<td>$a[tanggal_lahir]</td>      
                    <td>";
										
										if($a['status'] == 'Belum Dicetak')
											{
											echo "<a href='02_proses_cetak.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]&halaman=$_GET[halaman]'>
												  <button type='button' class='btn btn-danger btn-xs'>
												  <i class='glyphicon glyphicon-ok'></i></button>
						            			 ";
											}
										elseif($a['status'] == 'Sudah Dicetak')
						          			{
								            echo "<button type='button' class='btn btn-info  btn-xs'><i class='glyphicon glyphicon-ok'></i></button>
								            ";
								          	}
										echo"</td>";


											echo"<td>
                        <a href='02_cetak_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]&halaman=$_GET[halaman]' class='btn btn-info btn-xs'>
							<span class='glyphicon glyphicon-print' aria-hidden='true'></span>
						</a>
						<a href='02_edit_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]&halaman=$_GET[halaman]' class='btn btn-success btn-xs'>
							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
						</a> 
						<a href='02_delete_surat_keterangan_lulus.php?id_surat_keterangan_lulus=$a[id_surat_keterangan_lulus]&halaman=$_GET[halaman]' onclick='return confirm(\"Anda yakin akan menghapus $a[nama_mahasiswa] ?\")' class='btn btn-danger btn-xs'>
							<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
						</a>
                    </td>
                </tr>";
                $i++;
            }
            

    $jmldata = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM tb_surat_keterangan_lulus "));
      
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "</table><div class=\"paginationw\">$linkHalaman</div>";
}
            ?>




