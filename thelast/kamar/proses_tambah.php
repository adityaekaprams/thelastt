<?php

include '../koneksi.php';

if (isset($_POST['simpan']))
{
    $kamar           =$_POST['kamar'];
    $fasilitas       =$_POST['fasilitas_kamar'];
    $gambar          =$_POST['gambar'];
    $ruang           =$_POST['ruang_tersedia'];
    $kategori        =$_POST['id_kategori'];
    
    $query=mysqli_query($kon,"INSERT INTO kamar (kamar, fasilitas_kamar, gambar, ruang_tersedia, id_kategori)
            VALUES ('$kamar','$fasilitas','$gambar','$ruang','$kategori')");

    $kategori=mysqli_fetch_assoc($query);
    
    if ($query>0){
        echo "
        <script>
            alert('data berhasil tambahkan');
            document.location.href='index.php';
            </script>
            ";
    }
}
    ?>