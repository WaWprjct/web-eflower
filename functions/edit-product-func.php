<?php
include 'data-connect.php';
session_start();

$idproduk = $_GET['id-produk'];

$nama = $_POST['product'];

if($_POST['category'] == 'other'){
    $kategori = $_POST['otherValue'];
}else{
    $kategori = $_POST['category'];
}

$harga = $_POST['price'];
$stok = $_POST['stock'];
$slug_data = $_POST['slug'];
$desc = $_POST['description'];
$img = $_POST['image'];



if($img != NULL){
    $img = $_POST['image'];
    $targetDir = "assets/img/product/";
    $fileName = basename($_FILES[$img]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $upFile = '../' . $targetDir . $fileName;
    $fileType = $_FILES[$img]['type'];
    $file_size = $_FILES[$img]['size'];
    move_uploaded_file($_FILES[$img]["tmp_name"], $upFile);
    $send = mysqli_query($connection, "UPDATE produk SET nama_produk='$nama', kategori='$kategori', harga='$harga', qty='$stok', slug='$slug_data', deskripsi='$desc', gamabar='$targetFilePath', di_edit = NOW() WHERE id_produk='$idproduk'");
    header("location: ../manage.php?success");
}else{
    $send = mysqli_query($connection, "UPDATE produk SET nama_produk='$nama', kategori='$kategori', harga='$harga', qty='$stok', slug='$slug_data', deskripsi='$desc', di_edit = NOW() WHERE id_produk='$idproduk'");
    header("location: ../manage.php?success");
}

?>