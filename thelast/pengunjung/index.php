<?php

include '../koneksi.php';

$sql="SELECT * FROM pengunjung ORDER BY nama";
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
<!-- <img src="userr.png" class="img" width="100px"> -->
<h1 class="card-title"><i class="far fa-edit"></i>data pengunjung</h1>
</center>
<div class="card-header">
  <a href="tambah.php"><button type="button" class="btn btn-outline-info" style="width:100%; height:45px">+tambah pengunjung</button></a>
  <div class="card-header">
  <div class="card-body">
  <table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama</th>
      <th scope="col">telp</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">aksi</th>
    </tr>
    <?php
        $no=1;
        foreach($pinjam as $p){?>

        </tr>
            <td scope="row"><?=$no?></td>
            <td><?=$p['nama']?></th>
            <td><?=$p['telp']?></th>
            <td><?=$p['username']?></th>
            <td><?=$p['password']?></th>
            <td>

   
<a href="detail.php?id_pengunjung=<?= $p["id_pengunjung"];?>" class="badge badge-success">detail</a>
<a href="edit.php?id_pengunjung=<?= $p["id_pengunjung"];?>" class="badge badge-danger">edit</a>
<a href="hapus.php?id_pengunjung=<?= $p["id_pengunjung"];?>" class="badge badge-warning">hapus</a>

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
