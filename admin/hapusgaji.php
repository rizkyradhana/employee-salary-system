<?php
include "../koneksi.php";
$gaji_id 	= $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM tb_gaji WHERE gaji_id='$gaji_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'index.php'</script>";
}
?>
