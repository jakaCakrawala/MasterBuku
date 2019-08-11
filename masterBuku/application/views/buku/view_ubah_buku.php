<!DOCTYPE html>
<html>
<head>
	<title>Master Data Buku</title>
</head>
<body>
	<h4 align="center">Ubah Data Buku</h4>
	<hr>
	<?php foreach ($buku as $data) { ?>
	<form action="<?php echo site_url('Master_buku_c/update_buku'); ?>" method="post">		
	<table border="1px" align="center">
			
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul_buku" value="<?php echo $data->judul_buku; ?>">
					<input type="hidden" name="id_buku" value="<?php echo $data->id_buku; ?>">
				</td>
			</tr>
			<tr>
				<td>Cetakan</td>
				<td><input type="text" name="cetakan" value="<?php echo $data->cetakan; ?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" name="penerbit" value="<?php echo $data->penerbit; ?>"></td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td>
					<select name="id_penulis">
						<option value="<?php echo $data->id_penulis; ?>" >--<?php echo getPenulis($data->id_penulis)->nama_penulis ; ?>--</option>
						<?php foreach ($penulis as $pen) { ?>
						<option value="<?php echo $pen->id_penulis ?>"><?php echo $pen->nama_penulis; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>
					<select name="id_kategori" required>
						<option value="<?php echo $data->id_kategori;?>">--<?php echo getKetegori($data->id_kategori)->nama_kategori;?>--</option>
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
	<?php } ?>

</body>
</html>