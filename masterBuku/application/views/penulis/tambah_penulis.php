<!DOCTYPE html>
<html>
<head>
	<title>Master Buku</title>
</head>
<body>
	<h4 align="center">Halaman Tambah Penulis</h4>
	<hr>
	<form action="<?php echo site_url('Master_buku_c/act_tambahPenulis'); ?>" method="post">		
	<table border="1px" align="center">
			<tr>
				<td>Nama Penulis Buku</td>
				<td><input type="text" name="nama_penulis"></td>
			</tr>
			<tr>
				<td>alamat Penulis</td>
				<td><input type="text" name="alamat_penulis"></td>
			</tr>
			<tr>
				<td>Kontak Penulis</td>
				<td><input type="text" name="kontak_penulis"></td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
				<td><a href="<?php echo site_url('master_buku_c/penulis'); ?>">Batal</a></td>
			</tr>

	</table>
	</form>

</body>
</html>