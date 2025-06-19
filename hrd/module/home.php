<?php
include ("../koneksi.php");  ?>


<section class="content-header">
          <h1 style="font-size:30px;color:#777;"><i class="fa fa-home"></i> Dashboard</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-time"></i><?php echo Indonesia2Tgl(date('Y-m-d'));?> </a></li>
          </ol>
        </section>
<br>
<div class="box box-primary">
</div>


<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-info"></i>
Selamat datang <?php echo $_SESSION['nama']; ?>! Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</h4>
</div>
<!-- <div class="">
<?php 
$data=mysql_query("SELECT * FROM lokasi_krj");
while ($k = mysql_fetch_array($data)) { 
?>

<div class="col-xs-1 text-center">
  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
  <div class="knob-label"><?php echo $k['nm_lokasi']; ?></div>
</div> 
<?php } ?>
</div><!-- /.row -->
<div class="box box-solid box-primary">
<div class="box-header">
<b>Hak Akses sebagai HRD</b></div>
<div class="box-body">
<ol class="info-hak">
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola Data Pegawai</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola Data SK Kerja</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola Data Prestasi Pegawai</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola Data Hukuman Pegawai</li>
</ol>
</div>
</div><!-- /.row --
