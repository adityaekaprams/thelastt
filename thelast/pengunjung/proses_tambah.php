<?php

include '../koneksi.php';

if(isset($_POST['simpan']))
{
    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id_level=3;
    
    $sql="INSERT INTO pengunjung VALUES ('','$nama','$telp','$username','$password','3')";
    $res=mysqli_query($kon,$sql);

    $count=mysqli_affected_rows($kon);

    if($count==1)
    {
        header("Location:index.php");
    }
    else
    {
        header("Location:tambah.php");
    }
}
?>