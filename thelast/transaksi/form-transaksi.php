<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';

$kamar 		    = ambilKamar($kon);
$pengunjung 	= ambilPengunjung($kon);

include '../aset/header.php';

?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3>Form Tambah Transaksi</h3>
				</div>
				<div class="card-body">
					<form method="post" action="proses-transaksi.php">
						<div class="form-group">
							<label for="pengunjung">Nama Pengunjung</label>
							<select name="id_pengunjung" class="form-control">
								<?php  
								foreach ($pengunjung as $a) { ?>
									<option value="<?=$a['id_pengunjung']?>"><?=$a['nama']?></option>
								<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="kamar">Nama Kamar</label>
							<select name="id_kamar" class="form-control">
								<?php  
								foreach ($kamar as $b) {?>
									<option value="<?=$b['id_kamar']?>"><?=$b['kamar']?></option>
								<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="datepicker">Tanggal Check-in</label>
							<input type="date" name="tgl_checkin" class="form-control" require>
						</div>

						    <div class="form-group">
							<label for="datepicker">Tanggal Check-out</label>
							<input type="date" name="tgl_checkout" class="form-control" require>
						</div>

						<div class="form-group">
							<button type="submit" name="btnSewa" class="btn btn-primary mr-auto">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
include '../aset/footer.php';
?>