<!DOCTYPE html>
<html>
<head>
	<title>Master Buku</title>
</head>
<body>

	<a href="<?php echo site_url('master_buku_c'); ?>">Kembali</a> ||
	<a href="<?php echo site_url('master_buku_c/tambahPenulis'); ?>">Tambah Penulis</a>  ||
	<hr>
	<table border="1px" align="center">
		<caption>---- Data Penulis ----</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama penulis</th>
				<th>Alamat penulis</th>
				<th>Kontak penulis</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; foreach ($penulis as $key) {$i++; ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $key->nama_penulis; ?></td>
				<td><?php echo $key->alamat_penulis; ?></td>
				<td><?php echo $key->kontak_penulis; ?></td>
				<td><a href="<?php echo site_url('master_buku_c/UbahPenulis/'.$key->id_penulis); ?>">Ubah</a> || <a href="<?php echo site_url('master_buku_c/hapusPenulis/'.$key->id_penulis); ?>">Hapus</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<?php if ($this->session->flashdata('tambah_s')) { ?>
			<script type="text/javascript">
				alert("Berhasil!");
			</script>
	<?php }elseif ($this->session->flashdata('error_id_null_s')) { ?>
			<script type="text/javascript">
				alert("Kesalahan gagal memproses data!");
			</script>
	<?php }elseif ($this->session->flashdata('peringatan_s')) { ?>
			<script type="text/javascript">
				alert("Terjadi Kesalahan!");
			</script>
	<?php }elseif ($this->session->flashdata('ubah_s')) { ?>
			<script type="text/javascript">
				alert("Berhasil ubah data!");
			</script>
	<?php }elseif ($this->session->flashdata('error_id_use_s')) { ?>
			<script type="text/javascript">
				alert("Data sedang digunakan!");
			</script>
	<?php }elseif ($this->session->flashdata('berhasil_s')) { ?>
			<script type="text/javascript">
				alert("Data berhasil dihapus!");
			</script>
	<?php } ?>


</body>
</html>
