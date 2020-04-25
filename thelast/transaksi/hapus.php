<?php 
include '../koneksi.php';
$id=$_GET["id_sewa"];
$query=mysqli_query($kon,"DELETE FROM detail_sewa where id_sewa='$id'");
$query=mysqli_query($kon,"DELETE FROM sewakamar where id_sewa='$id'");
if(isset($query)){
    echo "
			<script>
			alert('Data Berhasil Di hapus !!!');
			document.location.href='index.php';
			</script>
			";
}
else{
    header("location : index.php");
    exit;
}
?>