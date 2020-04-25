<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';
session_start();
if(isset($_POST['btnSewa'])){
	$id_pengunjung = $_POST['id_pengunjung'];
	$id_kamar = $_POST['id_kamar'];
	$tgl_checkin = $_POST['tgl_checkin'];
	$tgl_checkout = $_POST['tgl_checkout'];
	$id_petugas = 1;
	$sql = $ruang = ambilRuang($kon, $id_kamar);

	if(cekSewa($kon, $id_pengunjung) && $ruang > 0){
		$res = mysqli_query($kon, "INSERT INTO sewakamar(id_pengunjung, tgl_checkin, tgl_checkout, id_petugas) VALUES('$id_pengunjung', '$tgl_checkin', '$tgl_checkout', '$id_petugas')");
		
		$querp=mysqli_query($kon,"SELECT id_sewa FROM sewakamar WHERE tgl_checkin='$tgl_checkin' AND id_pengunjung='$id_pengunjung' AND tgl_checkout='$tgl_checkout' AND id_petugas='$id_petugas' ");
		$wd=mysqli_fetch_assoc($querp);
		$idp=$wd["id_sewa"];
		$sql1 = mysqli_query($kon,"INSERT INTO detail_sewa (id_sewa,id_kamar) values('$idp','$id_kamar')");
		$count = mysqli_affected_rows($kon);
		$ruang_update = $ruang - 1;
		if($sql1>0){
			updateStok($kon, $id_kamar, $ruang_update);
			header("Location:index.php");
			
		}
	  
	}
	if(cekSewa($kon, $id_pengunjung)==false){
		updateStok($kon, $id_kamar, $ruang_update);
		header("Location:index.php");
	}
}else{
	header("Location:form-transaksi.php");
}
?>