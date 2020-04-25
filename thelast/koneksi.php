<?php
$kon = mysqli_connect("localhost","root","","hotel");

if(mysqli_connect_error()) {
    echo"koneksi database gagal : " . mysqli_connect_error();
}
