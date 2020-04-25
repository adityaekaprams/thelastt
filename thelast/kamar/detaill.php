<?php  
include '../aset/headerr.php';
include '../koneksi.php';

$id_buku = $_GET['id_kamar'];

$sql = "SELECT * FROM kamar WHERE id_kamar=$id_buku";
$res = mysqli_query($kon, $sql);
$detail = mysqli_fetch_assoc($res);
// var_dump($detail);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Kamar</title>
</head>
<body>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<h2>Detail Kamar</h2>
			<hr class="bg-ligth">
			<table class="table table-bordered">
				<tr>
					<td><strong>kamar</strong></td>
					<td><?=$detail['kamar'];?></td>
				</tr>
				<tr>
					<td><strong>fasilitas kamar</strong></td>
					<td><?=$detail['fasilitas_kamar'];?></td>
				</tr>
				<tr>
					<td><strong>preview kamar</strong></td>
					<td><img src="<?=$detail['gambar'];?>" style="width: 25%"></td>
				</tr>
				<tr>
					<td><strong>ruang tersedia</strong></td>
					<td><?=$detail['ruang_tersedia'];?></td>
				</tr>
				<tr>
					<td><strong>Kategori</strong></td>
					<td><?=$detail['id_kategori'];?></td>
				</tr>
				<tr>
					<td class="text-rigth" colspan="2">
						<a href="http://localhost/thelast/kamar/view.php" class="btn btn-info"><i class="fas fa-angle-double-left"></i>Kembali</a>

					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<?php  
include '../aset/footer.php';
?>