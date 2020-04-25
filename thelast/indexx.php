<?php 
    include 'koneksi.php';
    include 'aset/header.php';

    //menghitung jumlah data dari masing masing tabel buku, anggota, peminjaman
    $query_buku    = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM kamar");
    $query_anggota = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM pengunjung");
    $query_pinjam  = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM detail_sewa");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>LOGINSIPERPUS</title>
        <link rel="stylesheet" href="styl.css">
        </head>
        <body>
<div class="container">
    <div class="row mt-4">
        <div class="col-mcd">
            </div>
            </div>

            <div class="row">
                <div class="col-md-4">

            </div>

                <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            </div>

            </div>

            <div class="container">
                <div class="row mt-4">
                    <div class="col-md">
                   
                    <div class="card bg-info" style="width: 240px">
                    <div class="card-body text-white">
                    <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
                   
</div>
</div>
<hr class="card bg-info">

            </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="card bg-info" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH KAMAR</h5>
                <?php while($buku = mysqli_fetch_array($query_buku)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$buku['jumlah']?></p>
                <?php endwhile;?>
                <a href="detailbuku.php" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-left"></i></a>
                </div>
                </div>

            </div>
                <div class="col-md-4">
                <div class="card bg-info" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH PENGUNJUNG</h5>
                <?php while($anggota = mysqli_fetch_array($query_anggota)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$anggota['jumlah']?></p>
                <?php endwhile;?>
                <a href="#" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-left"></i></a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-4">
                <div class="card bg-info" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH TRANSAKSI</h5>
                <?php while($pinjam = mysqli_fetch_array($query_pinjam)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$pinjam['jumlah']?></p>
                <?php endwhile;?>
                <a href="transaksi/index.php" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-left"></i></a>
                </div>
                </div>
            </div>
            </div>
            </div>
            </body>
            </html>


<?php 
    include 'aset/footer.php';
?>