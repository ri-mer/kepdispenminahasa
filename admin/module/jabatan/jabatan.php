<?php
$aksi="module/jabatan/jabatan_aksi.php";
switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER jabatan ------------------------- ----->			
	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="fa fa-user-secret"></i>
		Data Jabatan </h3>
		<a class="btn btn-success btn-social pull-right"href="?module=jabatan&aksi=tambah">
		<i class="fa fa-plus"></i> Tambah Data</a>		
		</div>	
	<div class="box-body">
	
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th class="col-sm-1">No</th> 
		<th>Nama jabatan</th> 
		<th class="col-sm-1">Aksi</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM jabatan";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_jabatan'];

?>

	<tr>
	<td align="center"><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_jabatan']; ?></td> 
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=jabatan&aksi=edit&id_jabatan=<?php echo $tampilkan['id_jabatan'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=jabatan&aksi=hapus&id_jabatan=<?php echo $tampilkan['id_jabatan'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->






<?php
break;
 case "tambah": 
 
$sql ="SELECT max(id_jabatan) as terakhir from jabatan";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "JAB".sprintf("%03s",$nextNoUrut);
?>
<h3 class="box-title margin text-center">Tambah Data Jabatan</h3>
<center> <div class="batas"> </div></center>
<hr/>
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=jabatan&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID Jabatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="id_jabatan" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Jabatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_jabatan" placeholder="Nama Jabatan">
    </div>
  </div><div class="form-group">
    <label class="col-sm-2"></label>
    <div class="col-sm-9">

      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i> Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->






<!----- ------------------------- END TAMBAH DATA MASTER jabatan ------------------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from jabatan where id_jabatan='$_GET[id_jabatan]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER jabatan ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data jabatan "<?php echo $_GET['id_jabatan']; ?>"</h3>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=jabatan&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID jabatan </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" readonly name="id_jabatan" value="<?php echo $edit['id_jabatan']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Jabatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_jabatan"value="<?php echo $edit['nm_jabatan']; ?>">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-2"></label>
    <div class="col-sm-9">
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=jabatan">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER jabatan ------------------------- ----->
<?php
break;
}
?>