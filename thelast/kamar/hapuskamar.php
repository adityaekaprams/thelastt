<?php

include '../koneksi.php';

$id=$_GET['id_kamar'];
$query = mysqli_query($kon, "DELETE FROM kamar WHERE kamar.id_kamar='$id'");

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