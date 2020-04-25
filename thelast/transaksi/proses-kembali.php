<?php
include '../koneksi.php';
include 'fungsi-transaksi.php';

if (isset($_POST['simpan'])) {
	$id_sewa = $_POST['id_sewa'];
	$id_kamar = $_POST['id_kamar'];
	$tgl_checkout = $_POST['tgl_checkout'];
	// var_dump($tgl_kembali);die;
	if ($tgl_checkout == null) {
		$count = mysqli_affected_rows($kon);
	} else {

		$sql = "UPDATE detail_sewa SET tgl_checkout='$tgl_checkout', status='checkout' WHERE id_sewa=$id_sewa";
		$res = mysqli_query($kon, $sql);
		$count = mysqli_affected_rows($kon);
	}
	$ruang_update = ambilRuang($kon, $id_sewa) + 1;

    if ($count == 1) {
		updateStok($kon, $id_kamar, $ruang_update);
		$denda = hitungDenda($kon, $id_sewa, $tgl_checkout);

		$sql = "UPDATE sewakamar SET denda=$denda WHERE id_sewa=$id_sewa";
		$res = mysqli_query($kon, $sql);

		header("Location: detail.php?id_sewa=$id_sewa");
		exit;
	}
	else{
		header("Location: detail.php?id_sewa=$id_sewa");
	}
} else {
	header("Location:index.php");
}