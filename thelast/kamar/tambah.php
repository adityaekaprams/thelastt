<?php
    include '../koneksi.php';
    include '../aset/header.php';

    $query = mysqli_query($kon, "SELECT * FROM kategori");
    ?>
     <!DOCTYPE html>
     <html>
     <head>
        <title>tambah data buku</title>
        </head>
        <body>
<div class="container">
    <div class="row mt-4">
        <div class="col-md">
            <center>
            <div class="card" style="width: 100%;">
                <div class="card-header" style="width: 100%">
                    <h2 class="card-title"><i class="fas fas fa-bedroom"></i> tambah data kamar</h2>
                    </div>
                    <div class="card-body">
                    <form action="proses_tambah.php" method="post">
                    <table class="table">
                        <tr>
                            <td>kamar</td>
                            <td><input type="text" name="kamar"></td>
                        </tr>
                        <tr>
                            <td>fasilitas kamar</td>
                            <td>
                                <textarea name="fasilitas_kamar">
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>review</td>
                            <td><input type="file" name="gambar"></td>
                        </tr>
                        <tr>
                            <td>ruang tersedia</td>
                            <td><input type="number" name="ruang_tersedia"></td>                                   
                        </tr>
                        <tr>
                            <td>kategori</td>
                            <td><select style="width: 200px" name="id_kategori">
                                <option value="">-- pilih kategori --</option>
                                <?php
                                    while($kategori = mysqli_fetch_assoc($query)):
                                ?>
                                <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                    <?php
                                       endwhile;
                                    ?>
                                </select>
                                </td>
                                </tr>
                        </tr>
                        <tr>
                            <th></th>
                            <th><input type="submit" name="simpan" value="simpan"></th>
                        </tr>
                    </table>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
            </body>
        <html>
        <?php
    include '../aset/footer.php';
    ?>

