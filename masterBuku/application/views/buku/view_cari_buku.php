<!DOCTYPE html>
<html>
<head>
	<title>Master Data Buku</title>
</head>
<body>
	<h4 align="center">Pencarian Data Buku</h4>
	<a href="<?php echo site_url('master_buku_c'); ?>">Kembali</a>
	<hr>
	
	<form action="<?php echo site_url('master_buku_c/act_cari_buku') ?>" method="post">
		<div align="center"> 
			<b>Cari</b>
				<input type="tex" name="cari"><input type="submit" value="cari" required>
				<br> <i>Cari berdasarkan:</i> <br>
				<input type="radio" name="filter" value="1" required> Judul Buku
				<input type="radio" name="filter" value="2" required> Penulis
				<input type="radio" name="filter" value="3" required> Kategori
		</div>
	</form>
</body>
</html>