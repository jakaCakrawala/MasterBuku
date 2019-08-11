<!DOCTYPE html>
<html>
<head>
	<title>Master Data Buku</title>
</head>
<body>
	<h4 align="center"><?php echo $hasil; ?></h4>
	<a href="<?php echo site_url('master_buku_c/cari_buku'); ?>">Kembali</a>||
	<hr>
	<table border="1px" cellpadding="5px" align="center">
		<caption></caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Cetakan</th>
				<th>Penerbit</th>
				<th>Nama Penulis</th>
				<th>Nama Kaetegori</th>
			</tr>
		</thead>
		<tbody>
			<?php if (is_array($buku) || is_object($Buku)){ ?>
			<?php $i=0; foreach ($buku as $value) { $i++; ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value->judul_buku; ?></td>
				<td><?php echo $value->cetakan; ?></td>
				<td><?php echo $value->penerbit; ?></td>
				<td><?php echo $value->nama_penulis; ?></td>
				<td><?php echo $value->nama_kategori; ?></td>
			</tr>
		    <?php } ?>
		    <?php } ?>
		</tbody>
	</table>

</body>
</html>