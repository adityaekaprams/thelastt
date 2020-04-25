<?php  
include '../aset/header.php';
include '../koneksi.php';
include 'fungsi-transaksi.php';
$id_sewa = $_GET['id_sewa'];

$sql = "SELECT * FROM sewakamar p INNER JOIN detail_sewa dp ON p.id_sewa=dp.id_sewa INNER JOIN kamar b ON b.id_kamar=dp.id_kamar where p.id_sewa='$id_sewa'";
$res = mysqli_query($kon, $sql);
$detail = mysqli_fetch_assoc($res);
$tgl_checkout=$detail["tgl_keluar"];
if($tgl_checkout==null){
	$tgl_checkout=date("Y-m-d");
}
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<h2>Detail Transaksi</h2>
			<hr class="bg-ligth">
			<table class="table table-bordered">
				<tr>
					<td><strong>Kamar</strong></td>
					<td><?=$detail['kamar']?></td>
				</tr>
				<tr>
					<td><strong>Tanggal Check-in</strong></td>
					<td><?=date('d F Y', strtotime($detail['tgl_checkin']))?></td>
				</tr>
				<tr>
					<td><strong>Tanggal Check-out</strong></td>
					<td><?=date('d F Y', strtotime($detail['tgl_checkout']))?></td>
				</tr>
				<tr>
					<td><strong>Tanggal Keluar</strong></td>
					<td>
						<?php  
						if($detail['tgl_checkout']==NULL){
							echo '-';
						}else{
							echo date('d F Y', strtotime($detail['tgl_checkout']));
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="text-rigth" colspan="2">
						<a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
						
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php  
include '../aset/footer.php';
?>