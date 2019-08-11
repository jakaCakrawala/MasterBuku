<!DOCTYPE html>
<html>
<head>
	<title>Master Buku</title>
</head>
<body>

	<a href="<?php echo site_url('master_buku_c'); ?>">Kembali</a> ||
	<a href="<?php echo site_url('master_buku_c/tambahKategori'); ?>">Tambah Kategori</a>  ||
	<hr>

	<table border="1px" align="center">
		<caption>---- Data Kategori ----</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; foreach ($kategori as $key) {$i++; ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $key->nama_kategori; ?></td>
				<td><a href="<?php echo site_url('master_buku_c/UbahKategori/'.$key->id_ketegori); ?>">Ubah</a> || <a href="<?php echo site_url('master_buku_c/hapusKategori/'.$key->id_ketegori); ?>">Hapus</a></td>
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
