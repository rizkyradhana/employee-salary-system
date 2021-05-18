<?php
error_reporting(0);
include "koneksi.php";
session_start();

if (empty($_SESSION['username'])) {
    header('location:../index.html');
} else {
    include "../koneksi.php";
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Gaji Pegawai">
    <meta name="author" content="PT SINERGI ANTAR BENUA">

    <title>Sistem Informasi Gaji Pegawai</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);
function waktu() {
	var tanggal = new Date();
	setTimeout("waktu()",1000);
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>

  </head>
  <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Sistem Informasi Gaji Pegawai </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Data Karyawan</a></li>
            <li><a href="tampilgajiaja.php"><i class="fa fa-bar-chart-o"></i> Data Gaji Karyawan</a></li>
            <li><a href="tampilgaji.php"><i class="fa fa-desktop"></i> Cetak Slip Gaji Karyawan</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
              <?php
echo $_SESSION['username'];
    ?>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li><a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar Sistem</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php
$timeout = 10; // Set timeout minutes
    $logout_redirect_url = "../index.html"; // Set logout URL

    $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
        $elapsed_time = time() - $_SESSION['start_time'];
        if ($elapsed_time >= $timeout) {
            session_destroy();
            echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
        }
    }
    $_SESSION['start_time'] = time();
    ?>
<?php }?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Halaman Utama</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Halaman Utama </li>
            </ol>
            <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td>
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
            <br />
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Selamat Datang Di Halaman Utama.. Untuk Hitung Lembur Karyawan Silahkan Klik Nama Karyawan..
          </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan </h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">
                    <?php
$tampil = mysqli_query($conn, "select * from karyawan order by kary_id desc");
?>
                  <table class="table table-bordered table-hover table-striped tablesorter">

                      <tr>
                        <th>ID Karyawan <i class="fa fa-sort"></i></th>
                        <th>Nama <i class="fa fa-sort"></i></th>
												<th>Alamat <i class="fa fa-sort"></i></th>
												<th>No HP <i class="fa fa-sort"></i></th>
												<th>Jabatan <i class="fa fa-sort"></i></th>
                        <th>Nama Bank <i class="fa fa-sort"></i></th>
                        <th>No Rek <i class="fa fa-sort"></i></th>
                        <th>Gaji <i class="fa fa-sort"></i></th>
                        <!-- <th>Kode Gaji <i class="fa fa-sort"></i></th> -->
                        <th>Aksi <i class="fa fa-sort"></i></th>
                      </tr>
                     <?php while ($data = mysqli_fetch_array($tampil)) {?>
                    <tr>
                    <td><?php echo $data['kary_id']; ?></td>
                    <td><a href="gaji.php?hal=edit&kd=<?php echo $data['kary_id']; ?>"><i class="fa fa-user"></i> <?php echo $data[nama_kar]; ?></a></td>
										<td><?php echo $data[alamat_kar]; ?></td>
										<td><?php echo $data[nohp_kar]; ?></td>
										<td><?php echo $data['jabatan_kar']; ?></td>
										<td><?php echo $data['bank_kar']; ?></td>
										<td><?php echo $data[no_rek]; ?></td>
                    <td>Rp.<?php echo number_format($data['gaji_utama'], 2, ",", "."); ?></td>
                    <!-- <td><?php// echo $data[gol_kar];?></td> -->
                    <td><a class="btn btn-sm btn-primary" href="edit.php?hal=edit&kd=<?php echo $data['kary_id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="hapus.php?hal=hapus&kd=<?php echo $data['kary_id']; ?>"><i class="fa fa-wrench"></i> Hapus</a></td></tr>
                 <?php
}
?>
                   </tbody>
                   </table>
                   </div>
                <div class="text-right">
                  <a href="tambah.php" class="btn btn-sm btn-warning">Tambah Data Karyawan <i class="fa fa-arrow-circle-right"></i></a>

                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
