<?php  
include '../aset/header.php';
include '../koneksi.php';

$id_sewa = $_GET['id_sewa'];
$id_kamar = $_GET['id_kamar'];

$sql = "SELECT kamar FROM kamar WHERE id_kamar=$id_kamar";
$res = mysqli_query($kon, $sql);
$data = mysqli_fetch_assoc($res);
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-6">
			<div class="card">
				<h5 class="card-header">Form Pengembalian</h5>
				<div class="card-body">
					<form method="post" action="proses-kembali.php">
						<div class="form-group">
							<label for="kamar">kamar</label>
							<input class="form-control" type="text" disabled value="<?=$data['kamar']?>">
						</div>
						<div class="form-group">
							<label for="tgl_checkout">Tanggal Check-out</label>
							<input type="date" class="form-control" name="tgl_Checkout">
						</div>
						<input type="hidden" name="id_sewa" value="<?=$id_sewa?>">
						<input type="hidden" name="id_kamar" value="<?=$id_kamar?>">
						<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
include '../aset/footer.php';
?>