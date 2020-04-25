<?php

include '../koneksi.php';

$sql="SELECT * FROM kamar ORDER BY kamar";
    $res = mysqli_query($kon,$sql);

    $pinjam = array();

    while($data = mysqli_fetch_assoc($res)){
        $pinjam[]=$data;
    }
include '../aset/headerr.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
<div class="card">
<div class="card-header">
<center>
<!-- <img src="buku.png" class="img" width="90px"> -->
<h1 class="card-title"><i class="far fa-edit"></i>Kamar yang masih tersedia</h1>
</center>
  <div class="card-header">
  <center>
  <a href="http://localhost/coba/indexx.php"><button type="button" class="btn btn-outline-info" style="width:20%; height:45px">KEMBALI</button></a>
  </center>
  <div class="card-header">
  <div class="ser">
  <div class="card-body">
  <table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th scope="col">no</th>
      <th scope="col">kamar</th>
      <th scope="col">gambar</th>
      <th scope="col">ruang tersedia</th>
      <th scope="col">kategori</th>
      <th scope="col">aksi</th>
    </tr>
    
    <?php
        $no=1;
        foreach($pinjam as $p){?>

        </tr>
            <td scope="row"><?=$no?></td>
            <td><?=$p['kamar']?></th>
            <td><?=$p['gambar']?></th>
            <td><?=$p['ruang_tersedia']?></th>
            <td><?=$p['id_kategori']?></th>
            <td>

   
<a href="detaill.php?id_kamar=<?= $p["id_kamar"];?>" class="badge badge-info">detail</a>

        </td>
        
        </tr>
        <?php
            $no++;
    }
    ?>
  </thead>
   

    
  </div>
</div>
</div>
<?php
include '../aset/footer.php';
?>
