<?php  
include '../koneksi.php';
include '../aset/header.php';

$id_kamar = $_GET['id_kamar'];
$query = mysqli_query($kon, "SELECT * FROM kamar WHERE id_kamar=$id_kamar");
$query1 = mysqli_query($kon, "SELECT * FROM kategori");

if (isset($_POST['simpan']))
{
    $kamar           =$_POST['kamar'];
    $fasilitas       =$_POST['fasilitas_kamar'];
    $gambar          =$_POST['gambar'];
    $ruang           =$_POST['ruang_tersedia'];
    $kategori        =$_POST['id_kategori'];
    
    $sql="UPDATE kamar SET kamar='$kamar',
                           fasilitas_kamar='$fasilitas',
                           gambar='$gambar',
                           ruang_tersedia='$ruang',
                           id_kategori='$kategori'
                           WHERE id_kamar = '$id_kamar'
                           ";                            

    $res = mysqli_query($kon, $sql);
    $count = mysqli_affected_rows($kon);
    var_dump($count);
    
    if ($count>0){
        echo "
        <script>
            alert('data berhasil diedit');
            document.location.href='index.php';
            </script>
            ";
    }
}
    ?>
    <div class="container">
    <div class="row mt-4">
    <div class="col-md-9">
    <div class="card">
    <div class="card-header">
        <h2><i class="fas fa-user-plus"></i>Edit Data Buku</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            
                            <?php while($edit = mysqli_fetch_assoc($query)): ?>
                                <div class="form-group">
                                <label for="kamar">kamar</label>
                                <input type="text" class="form-control" name="kamar" id="kamar" value="<?= $edit['kamar']?>">
                            </div>

                                <div class="form-group">
                                <label for="kamar">fasilitas kamar</label>
                                <textarea name="fasilitas_kamar" id="fasilitas_kamar" class="form-control" placeholder="<?= $edit['fasilitas_kamar']?>"></textarea>
                            </div>
                            
                                <div class="form-group">
                                <label for="kamar">gambar</label>
                                <input type="file" name="gambar" id="gambar" value="<?= $edit['gambar']?>">
                            </div>
                            
                                <div class="form-group">
                                <label for="kamar">ruang tersedia</label>
                                <input type="number" class="form-control" name="ruang_tersedia" id="ruang_tersedia" value="<?= $edit['ruang_tersedia']?>">
                            </div>

                            <?php
                                endwhile;
                                ?>
                                    <div class="form-group">
                                    <label for="kamar">kategori</label>
                                    <select style="width: 200px" name="id_kategori" class="form-control" id="id_kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php  
                                            while ($kategori = mysqli_fetch_assoc($query1)):
                                        ?>
                                        <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                        <?php  
                                            endwhile;
                                        ?>
                                    </select>
                                </div>
                                <button type="submit"class="btn btn-primary" name="simpan">simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


