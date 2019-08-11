<!DOCTYPE html>
<html>
<head>
	<title>Master Buku</title>
</head>
<body>
	<h4 align="center">Halaman Ubah Kategori</h4>
	<hr>
	<?php foreach ($kategori as $value) {?>
	<form action="<?php echo site_url('Master_buku_c/act_ubahKategori/'.$value->id_ketegori); ?>" method="post">		
	<table border="1px" align="center">
			<tr>
				<td>Nama Penulis Buku</td>
				<td><input type="text" name="nama_kategori" value="<?php echo $value->nama_kategori; ?>"></td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
				<td><a href="<?php echo site_url('master_buku_c/kategori'); ?>">Batal</a></td>
			</tr>

	</table>
	</form>
	<?php } ?>

</body>
</html>