<!DOCTYPE html>
<html>
<head>
	<title>Master Buku</title>
</head>
<body>
	<h4 align="center">Halaman Tambah Kategori</h4>
	<hr>
	<form action="<?php echo site_url('Master_buku_c/act_tambahKategori'); ?>" method="post">		
	<table border="1px" align="center">
			<tr>
				<td>Nama Kategori</td>
				<td><input type="text" name="nama_kategori"></td>
			</tr>
			<tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
				<td><a href="<?php echo site_url('master_buku_c/kategori'); ?>">Batal</a></td>
			</tr>

	</table>
	</form>

</body>
</html>