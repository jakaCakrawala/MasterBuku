<!DOCTYPE html>
<html>
<head>
	<title>Data Buku</title>
</head>
<body>

	<a href="<?php echo site_url('master_buku_c/view_addBuku'); ?>"><b>Tambah Buku</b></a> ||
	<a href="<?php echo site_url('master_buku_c/penulis'); ?>"><b>Kelola Penulis</b></a> ||
	<a href="<?php echo site_url('master_buku_c/kategori'); ?>"><b>Kelola Kategori</b></a> ||
	<a href="<?php echo site_url('master_buku_c/cari_buku'); ?>"><b>Cari buku</b></a> ||
	<hr>
	<table border="1px" cellpadding="5px" cellspacing="2px" align="center">
		<caption><b>Master buku</b></caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>Judul buku</th>
				<th>Cetakan</th>
				<th>Penerbit</th>
				<th>Penulis</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; foreach ($buku as $val) { $i++; ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $val->judul_buku; ?></td>
				<td><?php echo $val->cetakan; ?></td>
				<td><?php echo $val->penerbit; ?></td>
				<td><?php echo getPenulis($val->id_penulis)->nama_penulis; ?></td>
				<td><?php echo getKetegori($val->id_kategori)->nama_kategori; ?></td>
				<td><a href="<?php echo site_url('master_buku_c/view_editBuku/'.$val->id_buku) ?>">Ubah</a>|<a href="<?php echo site_url('master_buku_c/delete_buku/'.$val->id_buku); ?>">Hapus</a></td>
			</tr>
		 <?php } ?>
		</tbody>
	</table>

	<?php if ($this->session->flashdata('hasil')) { ?>
			<script type="text/javascript">
				alert("<?php echo $this->session->flashdata('hasil'); ?>");
			</script>
	<?php } ?>

</body>
</html>