<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';

$id_sewa = $_POST['id_sewa'];
$tgl_checkin = $_POST['tgl_checkin'];
$tgl_checkout = $_POST['tgl_checkout'];
$tgl_checkoutt = NULL;
$denda = NULL;
if(isset($_POST['tgl_keluar'])){
	$tgl_checkout = $_POST['tgl_keluar'];
	mysqli_query($kon, "UPDATE detail_sewa SET tgl_keluar='$tgl_checkoutt' WHERE id_sewa=$id_sewa");
	mysqli_query($kon, "UPDATE sewakamar SET tgl_sewa='$tgl_sewa' WHERE id_sewa=$id_sewa");	 
}else{
	mysqli_query($kon, "UPDATE sewakamar SET tgl_checkin='$tgl_checkin' WHERE id_sewa=$id_sewa");	 
}
$count = mysqli_affected_rows($kon);

if($count == 1){
	$denda = hitungDenda($kon, $id_sewa, $tgl_checkoutt);
	echo $denda;
	$sql = "UPDATE sewakamar SET denda=$denda WHERE id_sewa=$id_sewa";
	$res = mysqli_query($kon, $sql);
	echo "
			<script>
			alert('Data berhasil Di edit !!!');
			document.location.href='index.php';
			</script>
		";
}else{
	header("Location: index.php");
}