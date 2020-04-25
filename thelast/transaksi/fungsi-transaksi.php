<?php  
function ambilKamar($koneksi){
	$sql = "SELECT id_kamar, kamar FROM kamar";
	$res = mysqli_query($koneksi, $sql);

	$data_kamar = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_kamar[] = $data;
	}
	return $data_kamar;
}
?>

<?php  
function ambilPengunjung($koneksi){
	$sql = "SELECT id_pengunjung, nama FROM pengunjung";
	$res = mysqli_query($koneksi, $sql);

	$data_pengunjung = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_pengunjung[] = $data;
	}
	return $data_pengunjung;
}
?>

<?php  
function ambilSewakamar($koneksi, $id_sewa){
	$sql = "SELECT * FROM sewakamar p INNER JOIN pengunjung a ON p.id_pengunjung=a.id_pengunjung INNER JOIN detail_sewa dp USING(id_sewa) INNER JOIN kamar b ON dp.id_kamar=b.id_kamar where id_sewa='$id_sewa'" ;
	$res = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_assoc($res);

	return $data;
}
?>

<?php  
function ambilRuang($koneksi, $id_kamar){
	$sql = "SELECT ruang_tersedia FROM kamar WHERE id_kamar=$id_kamar";
	$res = mysqli_query($koneksi, $sql);

	$data = mysqli_fetch_assoc($res);
	return $data['ruang_tersedia'];
}
?>

<?php  
function cekSewa($koneksi, $id_pengunjung){
	$sql = "SELECT * FROM sewakamar inner join detail_sewa using(id_sewa)  WHERE id_pengunjung=$id_pengunjung AND status='checkin'";
	$res = mysqli_query($koneksi, $sql);

	$sewa = mysqli_affected_rows($koneksi);

	if($sewa == 0){
		return true;
	}else{
		return false;
	}
}
?>

<?php  
function updateStok($koneksi, $id_kamar, $ruang_update){
	$sql = "UPDATE kamar SET ruang_tersedia=$ruang_update WHERE id_kamar=$id_kamar";
	$res = mysqli_query($koneksi, $sql);
}
?>

<?php  
function hitungDenda($koneksi, $id_sewa, $tgl_checkout){
	$denda=0;

	$sql = "SELECT tgl_checkout FROM sewakamar WHERE id_sewa=$id_sewa";
	$res = mysqli_query($koneksi, $sql);

	$data = mysqli_fetch_assoc($res);
	$tgl_checkout = $data['tgl_checkout'];

	$hari_denda = (strtotime($tgl_checkout)-strtotime($tgl_checkout))/60/60/24;

	if($hari_denda >= 0){
		$denda = $hari_denda*1000;
	}

	return $denda;
}
?> 