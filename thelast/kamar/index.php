<?php

include '../koneksi.php';

$sql="SELECT * FROM kamar ORDER BY kamar";
    $res = mysqli_query($kon,$sql);

    $pinjam = array();

    while($data = mysqli_fetch_assoc($res)){
        $pinjam[]=$data;
    }
include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
<div class="card">
<div class="card-header">
<center>
<!-- <img src="buku.png" class="img" width="90px"> -->
<h1 class="card-title"><i class="far fa-edit"></i>data kamar</h1>
</center>
  <div class="card-header">
  <a href="tambah.php"><button type="button" class="btn btn-outline-info" style="width:100%; height:45px">+Tambah Kamar</button></a>
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

   
<a href="detail.php?id_kamar=<?= $p["id_kamar"];?>" class="badge badge-success">detail</a>
<a href="edit.php?id_kamar=<?= $p["id_kamar"];?>" class="badge badge-danger">edit</a>
<a href="hapuskamar.php?id_kamar=<?= $p["id_kamar"];?>" class="badge badge-warning">hapus</a>

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
