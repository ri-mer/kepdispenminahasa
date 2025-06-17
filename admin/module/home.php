<?php
include ("../inc/koneksi.php"); 
include ("../inc/fungsi_hdt");  ?>

<section class="content-header">
          <h1 style="font-size:30px;color:#777;"><i class="fa fa-home"></i> Dashboard</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-time"></i><?php echo Indonesia2Tgl(date('Y-m-d'));?> </a></li>
          </ol>
        </section>
<br>
<div class="box box-danger">
</div>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Selamat datang <?php echo $_SESSION['nama']; ?>! Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</p>
</div> 
<div class="box box-solid box-danger">
<div class="box-header">
<b>Hak Akses sebagai Admin</b>
</div>
<div class="box-body">
<ol class="info-hak">
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola data User</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola data master lokasi kerja</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola data master unit kerja</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola data master jabatan</li>
<li><i class="fa fa-check-circle" style="color:#00a65a"></i> Mengelola data master pangkat</li>
</ol>
</div>
</div><!-- /.row -->

 