<?php
include "../koneksi.php";
$kary_id    = $_POST['kary_id'];

$nama_kar   = $_POST['nama_kar'];
$alamat_kar = $_POST['alamat_kar'];
$nohp_kar		= $_POST['nohp_kar'];
$jabatan_kar = $_POST['jabatan_kar'];
$bank_kar		= $_POST['bank_kar'];
$no_rek     = $_POST['no_rek'];
$gaji_utama = $_POST['gaji_utama'];


$query = mysqli_query($conn, "UPDATE karyawan SET nama_kar='$nama_kar', alamat_kar='$alamat_kar', nohp_kar='$nohp_kar', jabatan_kar='$jabatan_kar', bank_kar='$bank_kar', no_rek='$no_rek', gaji_utama='$gaji_utama'
 WHERE kary_id='$kary_id'");
if ($query){
header('location:index.php');}

?>
