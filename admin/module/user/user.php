<?php
$aksi="module/user/user_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA User ------------------------- ----->			

	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="fa fa-user-secret"></i>
		Data User </h3>
		<a class="btn btn-success btn-social pull-right"href="?module=user&aksi=tambah">
		<i class="fa fa-plus"></i> Tambah Data</a>		
		</div>
<br>		
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th class="col-sm-1">ID user</th>
		<th>Nama</th>
		<th class="col-sm-2">Username</th>
		<th class="col-sm-2">Level</th> 
		<th class="col-sm-2">No Hp</th> 
		<th class="col-sm-1">Status</th> 
		<th class="col-sm-1">Aksi</th> 
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM user";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_user'];
$blokir = $tampilkan['blokir'];?>

	<tr>
	<td><?php echo $tampilkan['id_user']; ?></td>
	<td><?php echo $tampilkan['nama']; ?></td>
	<td><?php echo $tampilkan['user']; ?></td>
	<td><?php echo $tampilkan['level']; ?></td>
	<td><?php echo $tampilkan['no_hp']; ?></td>
	<td align="center"><?php if  ( $blokir== 'Y' ) {
				echo "<a class='btn btn-xs btn-warning' disabled >NonAktif</a>";}
				else {echo "<a class='btn btn-xs btn-success' disabled>Aktif</a>"; }   ?></td>
	<td align="center">
	<?php if ( $blokir== 'N' ) { ?>
	<a class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Blokir User" href="<?php echo $aksi ?>?module=user&aksi=yes&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Blokir <?php echo $tampilkan['user']; ?> ?')"><i class="glyphicon glyphicon-ok"></i></a>
	<?php }
	else { ?>
	<a class="btn btn-xs btn-success" data-toggle="tooltip" title="Un Blokir User" href="<?php echo $aksi ?>?module=user&aksi=no&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah Anda Yakin Un Blokir <?php echo $tampilkan['user']; ?>?')"><i class="glyphicon glyphicon-remove"></i></a>
	<?php } ?>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA User ------------------------- ----->



<?php 
break;
 case "tambah": 
//ID
$sql ="SELECT max(id_user) as terakhir from user";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "USR".sprintf("%03s",$nextNoUrut);
?>
<!----- ------------------------- TAMBAH DATA User ------------------------- ----->
<h3 class="box-title margin text-center">Tambah Data User</h3>
<center> <div class="batas"> </div></center>
<hr/>

<form class="form-horizontal" action="<?php echo $aksi?>?module=user&aksi=tambah" role="form" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">ID user </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="id_user" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" placeholder="Nama user">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_hp" value="+62">
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Level </label>
    <div class="col-sm-5">
      <select name="level" class="form-control">
<option value=" "> -- Pilih Level -- </option>
<option value="admin">Admin</option>
<option value="hrd">HRD</option>
<option value="gm">Pimpinan</option>
</select>
    </div>
  </div>
<hr/>
<div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="user" placeholder="username">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" required="required" name="pass" minlength="5"value="12345">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i><i>Reset</i></button>
    </div>
  </div> 
</form> 
<!----- ------------------------- END TAMBAH DATA User ------------------------- ----->
<?php	
break;
}
?>
