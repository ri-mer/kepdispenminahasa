<?php
$aksi="module/unit_krj/unit_krj_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER unit_krj ------------------------- ----->			
	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="fa fa-institution"></i>
		Data Unit Kerja </h3>
		<a class="btn btn-success btn-social pull-right"href="?module=unit_krj&aksi=tambah">
		<i class="fa fa-plus"></i> Tambah Data</a>		
		</div>	
	<div class="box-body">
	
	
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th class="col-sm-1">No</th> 
		<th>Nama Unit Kerja</th> 
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM unit_krj";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_unit_krj'];

?>

	<tr>
	<td align="center"><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_unit_krj']; ?></td> 
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=unit_krj&aksi=edit&id_unit_krj=<?php echo $tampilkan['id_unit_krj'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=unit_krj&aksi=hapus&id_unit_krj=<?php echo $tampilkan['id_unit_krj'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
$sql ="SELECT max(id_unit_krj) as terakhir from unit_krj";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "UKJ".sprintf("%03s",$nextNoUrut);
?> 

<h3 class="box-title margin text-center">Tambah Data Unit Kerja</h3>
<center> <div class="batas"> </div></center>
<hr/>

	 <form class="form-horizontal" action="<?php echo $aksi?>?module=unit_krj&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID Unit Kerja</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="id_unit_krj" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Unit Kerja</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_unit_krj" placeholder="Nama Unit Kerja">
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
</div>




<!----- ------------------------- END TAMBAH DATA MASTER unit_krj ------------------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from unit_krj where id_unit_krj='$_GET[id_unit_krj]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER unit_krj ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Unit Kerja "<?php echo $_GET['id_unit_krj']; ?>"</h3>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=unit_krj&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID Unit Kerja </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" readonly name="id_unit_krj" value="<?php echo $edit['id_unit_krj']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Unit Kerja</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_unit_krj"value="<?php echo $edit['nm_unit_krj']; ?>">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-2"></label>
    <div class="col-sm-9">

<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=unit_krj">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER unit_krj ------------------------- ----->
<?php
break;
}
?>
