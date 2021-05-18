<?php
error_reporting(0);
//include "../koneksi.php";
session_start();
if (empty($_SESSION['username'])) {
    echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";
} else {
    include "../koneksi.php";
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Penggajian Karyawan">
    <meta name="author" content="Hakko Bio Richard">

    <title>Sistem Informasi Gaji Pegawai </title>

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
          <a class="navbar-brand" href="index.html">Sistem Informasi Gaji Pegawai </a>
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
session_start();
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
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
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
             Silahkan ubah data yang perlu diganti..
          </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Edit Data Karyawan </h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">

                  <?php
$query = mysqli_query($conn, "SELECT * FROM karyawan WHERE kary_id='$_GET[kd]'");
$data = mysqli_fetch_array($query);
?>
    <form action="update.php" method="post">
    <table class="table table-condensed">
    <tr>
        <td><label for="kary_id">ID Karyawan</label></td>
        <td><input name="kary_id" type="text" class="form-control" id="kary_id" value="<?php echo $data['kary_id']; ?>" readonly="readonly"/></td>
      </tr>

      <tr>
        <td><label for="nama_kar">Nama Karyawan</label></td>
        <td><input name="nama_kar" type="text" class="form-control" id="nama_kar" value="<?php echo $data['nama_kar']; ?>" required/></td>
      </tr>
      <tr>
        <td><label for="alamat_kar">Alamat Karyawan</label></td>
        <td><input name="alamat_kar" type="text" class="form-control" id="alamat_kar" value="<?php echo $data['alamat_kar']; ?>" required/></td>
      </tr>
			<tr>
				<td><label for="jabatan_kar">Jabatan Karyawan</label></td>
				<td><input name="jabatan_kar" type="text" class="form-control" id="jabatan_kar" value="<?php echo $data['jabatan_kar']; ?>" required/></td>
			</tr>
			<tr>
				<td><label for="nohp_kar">No HP Karyawan</label></td>
				<td><input name="nohp_kar" type="text" class="form-control" id="nohp_kar" value="<?php echo $data['nohp_kar']; ?>" required/></td>
			</tr>
			<tr>
				<td><label for="bank_kar">Nama Bank</label></td>
				<td><input name="bank_kar" type="text" class="form-control" id="no_rek" value="<?php echo $data['bank_kar']; ?>" required/></td>
			</tr>
      <tr>
        <td><label for="no_rek">No Rekening</label></td>
        <td><input name="no_rek" type="text" class="form-control" id="no_rek" value="<?php echo $data['no_rek']; ?>" required/></td>
      </tr>
      <tr>
        <td><label for="gaji_utama">Gaji Utama</label></td>
        <td><input name="gaji_utama" type="text" class="form-control" id="gaji_utama" value="<?php echo $data['gaji_utama']; ?>" required/></td>
      </tr>

      <tr>
        <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
    </table>
    </form>
                   </div>
                <!-- <div class="text-right">
                  <a href="#"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>

                </div> -->
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
