<?php
include '../koneksi.php';

$sql = "SELECT * FROM sewakamar INNER JOIN pengunjung ON sewakamar.id_pengunjung=pengunjung.id_pengunjung INNER JOIN detail_sewa dp USING(id_sewa) INNER JOIN petugas ON sewakamar.id_petugas=petugas.id_petugas ORDER BY sewakamar.tgl_checkin";

$res = mysqli_query($kon, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
	$pinjam[] = $data;
}

?>
<?php
include '../aset/header.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md">
			<div class="card">
				<div class="card-header">
				<center>
				<!-- <img src="money.png" class="img" width="100px"> -->
					<h2 class="card-title"><i class="fas fa-edit"></i> Data Transaksi <a href="form-transaksi.php"></a>
					</h2>
					</center>
				<div class="card-header">
                <a href="form-transaksi.php"><button type="button" class="btn btn-outline-info" style="width:100%; height:45px">+Tambah Transaksi</button></a>
                <div class="card-header">
				<div class="ser">
                <div class="card-body">
						<table class="table table-light">
							<thead class="thead-light">
								<tr>
									<th scope="col">no</th>
									<th scope="col">Nama Pengunjung</th>
									<th scope="col">Tanggal check-in</th>
									<th scope="col">Tanggal check-out</th>
									<th scope="col">Petugas</th>
								
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<?php
							$no = 1;
							foreach ($pinjam as $p) { ?>
								<tr>
									<th scope="row"><?= $no ?></th>
									<td><?= $p['nama'] ?></td>
									<td><?= date('d F Y', strtotime($p['tgl_checkin'])) ?></td>
									<td><?= date('d F Y', strtotime($p['tgl_checkout'])) ?></td>
									<td><?= $p['nama_petugas'] ?></td>
									
									<td>
										<a href="detail.php?id_sewa=<?= $p['id_sewa'] ?>" class="badge badge-success">Detail</a>
										<a href="form-edit.php?id_sewa=<?= $p['id_sewa'] ?>" class="badge badge-warning">Edit</a>
										<a href="hapus.php?id_sewa=<?= $p['id_sewa'] ?>" class="badge badge-danger">Hapus</a>
									</td>
								</tr>
							<?php
								$no++;
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="search.js"></script>
</div>


<?php
include '../aset/footer.php';
?>