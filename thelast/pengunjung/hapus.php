<?php

include '../koneksi.php';

$id=$_GET['id_pengunjung'];
$query = mysqli_query($kon, "DELETE FROM pengunjung WHERE pengunjung.id_pengunjung='$id'");

if($query>0);
{
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}


?>