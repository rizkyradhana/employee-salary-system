<?php
include "../koneksi.php";
$gaji_id           = $_POST['gaji_id'];
$kary_id           = $_POST['kary_id'];

$jam_lembur 	   = $_POST['jam_lembur'];
$uang_lembur 	   = $_POST['uang_lembur'];
$total_gaji 	   = $_POST['total_gaji'];
$bulan_transfer	   = $_POST['bulan_transfer'];
$tahun_transfer 	= $_POST['tahun_transfer'];


$query = mysqli_query($conn, "INSERT INTO tb_gaji (gaji_id, kary_id, jam_lembur, uang_lembur, total_gaji, bulan_transfer, tahun_transfer) VALUES ('$gaji_id', '$kary_id', '$jam_lembur', '$uang_lembur', '$total_gaji', '$bulan_transfer', '$tahun_transfer')");
if ($query){
	echo "<script>alert('Data Gaji Karyawan Berhasil dimasukan!'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Data Gaji Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";
}
?>
