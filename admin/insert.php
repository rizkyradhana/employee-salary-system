<?php
include "../koneksi.php";
$kary_id            = $_POST['kary_id'];

$nama_kar 		    = $_POST['nama_kar'];
$alamat_kar 	    = $_POST['alamat_kar'];
$nohp_kar					= $_POST['nohp_kar'];
$jabatan_kar			= $_POST['jabatan_kar'];
$bank_kar					= $_POST['bank_kar'];
$no_rek 	        = $_POST['no_rek'];
$gaji_utama 	    = $_POST['gaji_utama'];

echo  $_POST['kary_id'];
echo  $_POST['nama_kar'];
echo  $_POST['alamat_kar'];
echo  $_POST['nohp_kar'];
echo  $_POST['jabatan_kar'];
echo  $_POST['bank_kar'];
echo  $_POST['no_rek'];
echo  $_POST['gaji_utama'];


$perintah = "INSERT INTO karyawan (kary_id, nama_kar, alamat_kar, nohp_kar, jabatan_kar, bank_kar, no_rek, gaji_utama)VALUES('$kary_id', '$nama_kar','$alamat_kar', '$nohp_kar', '$jabatan_kar', '$bank_kar', '$no_rek', '$gaji_utama')";
$query = mysqli_query($conn, $perintah);
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";
}
?>
