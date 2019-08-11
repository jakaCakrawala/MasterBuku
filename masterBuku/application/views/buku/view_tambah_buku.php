<!DOCTYPE html>
<html>
<head>
	<title>Master Data Buku</title>
</head>
<body>
	<h4 align="center">Tambah Data Buku</h4>
	<hr>
	<form action="<?php echo site_url('Master_buku_c/create_buku'); ?>" method="post">		
	<table border="1px" align="center">
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul_buku"></td>
			</tr>
			<tr>
				<td>Cetakan</td>
				<td><input type="text" name="cetakan"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" name="penerbit"></td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td>
					<select name="id_penulis">
						<option>Pilih Penulis</option>
						<?php foreach ($penulis as $val) { ?>
						<option value="<?php echo $val->id_penulis ?>"><?php echo $val->nama_penulis; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>
					<select name="id_kategori" required>
						<option>Pilih Kategori buku</option>
						<?php foreach ($ketegori as $val) { ?>
						<option value="<?php echo $val->id_ketegori ?>"><?php echo $val->nama_kategori; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
				<td><a href="<?php echo site_url('master_buku_c'); ?>">Batal</a></td>
			</tr>

	</table>
	</form>

</body>
</html>