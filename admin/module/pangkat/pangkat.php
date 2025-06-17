<?php
$aksi="module/pangkat/pangkat_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER pangkat ------------------------- ----->			
	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="fa fa-street-view"></i>
		Data Pangkat </h3>
		<a class="btn btn-success btn-social pull-right"href="?module=pangkat&aksi=tambah">
		<i class="fa fa-plus"></i> Tambah Data</a>		
		</div>	
	<div class="box-body">
	
	
	
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th class="col-sm-1">No</th> 
		<th>Pangkat</th> 
		<th>Gaji</th> 
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM pangkat";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_pangkat'];

?>

	<tr>
	<td align="center"><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_pangkat']; ?></td> 
	<td>Rp. <?php echo format_angka($tampilkan['gaji']) ; ?></td> 
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=pangkat&aksi=edit&id_pangkat=<?php echo $tampilkan['id_pangkat'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=pangkat&aksi=hapus&id_pangkat=<?php echo $tampilkan['id_pangkat'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
 
$sql ="SELECT max(id_pangkat) as terakhir from pangkat";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "PKT".sprintf("%03s",$nextNoUrut);
?> 
<h3 class="box-title margin text-center">Tambah Data Pangkat</h3>
<center> <div class="batas"> </div></center>
<hr/>
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=pangkat&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID pangkat</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="id_pangkat" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Pangkat</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_pangkat" placeholder="Nama pangkat">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Gaji</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" required="required" name="gaji" placeholder="Gaji">
    </div>
  </div><div class="form-group">
    <label class="col-sm-2"></label>
    <div class="col-sm-9">

      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i>Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->








<!----- ------------------------- END TAMBAH DATA MASTER pangkat ------------------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from pangkat where id_pangkat='$_GET[id_pangkat]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER pangkat ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Pangkat "<?php echo $_GET['id_pangkat']; ?>"</h3>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=pangkat&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-2 control-label">ID Pangkat </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" readonly name="id_pangkat" value="<?php echo $edit['id_pangkat']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pangkat</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required="required" name="nm_pangkat"value="<?php echo $edit['nm_pangkat']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Gaji</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" required="required" name="gaji"value="<?php echo $edit['gaji']; ?>">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-2"></label>
    <div class="col-sm-9">
	
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=pangkat">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER pangkat ------------------------- ----->
<?php
break;
}
?>
