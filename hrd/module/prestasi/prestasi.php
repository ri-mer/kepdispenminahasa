<?php
$aksi="module/prestasi/prestasi_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER prestasi ------------------------- ----->			

	
	
	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Prestasi Pegawai</h3>
		<a class="btn btn-success btn-social pull-right"href="?module=prestasi&aksi=list_pegawai">
		<i class="fa fa-plus"></i> Tambah Data</a>		
		</div>	
	<div class="box-body">
	
	
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr style="background:#3c8dbc;color:#fff;">
		<th class="col-sm-1">No. Prestasi</th>
		<th class="col-sm-2">NIP</th>
		<th class="col-sm-3">Nama Pegawai</th> 
		<th>Tanggal</th> 
		<th>Nama Prestasi</th> 
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM prestasi a, pegawai b where a.nip=b.nip ";
$tampil = mysql_query($sql);
$no=1;
while ($k = mysql_fetch_array($tampil)) { 
$Kode = $k['id_prestasi'];?>

	<tr>	
	<td><?php echo $k['id_prestasi']; ?></a></td>
	<td><a target="blank"href="?module=pegawai&aksi=detail_pegawai&nip=<?php echo $k['nip'];?>"><?php echo $k['nip']; ?></a></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo Indonesia2Tgl($k['tgl_prestasi']); ?></td>
	<td><?php echo $k['nm_prestasi']; ?></td>
	<td align="center">
	<a  class="btn btn-xs btn-info" href="?module=prestasi&aksi=edit&id_prestasi=<?php echo $k['id_prestasi'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger" href="<?php echo $aksi ?>?module=prestasi&aksi=hapus&id_prestasi=<?php echo $k['id_prestasi'];?>"  alt="Delete Data" onclick="return confirm('Anda Yakin Ingin Menghapus Data <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA MASTER prestasi ------------------------- ----->
<?php 
break;
case "list_pegawai": 
?>

	<div class="box box-solid" style="box-shadow:none;">
		<div class="box-header">
		<h3 class="btn btn disabled box-title" style="font-size:30px;color:#111;">
		<i class="fa fa-book"></i>
		Tambah Data Prestasi Pegawai</h3>	
		</div>	
	<div class="box-body">
	
	
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr style="background:#3c8dbc;color:#fff;">
		<th class="col-sm-1">NIP</th>
		<th class="col-sm-3">Nama pegawai</th>
		<th class="col-sm-1">Kelamin</th> 
		<th class="col-sm-1">UnitKerja</th> 
		<th>Jabatan/Pangkat</th> 
		<th class="col-sm-1">Lokasi_Kerja</th> 
		<th class="col-sm-2">Alamat</th>
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "select * from pegawai z, sk_krj s, unit_krj u, lokasi_krj l, pangkat x, jabatan j where s.id_jabatan=j.id_jabatan and s.id_lokasi=l.id_lokasi and s.id_pangkat=x.id_pangkat and s.id_unit_krj=u.id_unit_krj and z.nip=s.nip and s.status_sk='aktif'";
$tampil = mysql_query($sql);
$no=1;
while ($data = mysql_fetch_array($tampil)) { 
$Kode = $data['nip'];?>

	<tr>
	<td><a href="?module=pegawai&aksi=detail_pegawai&nip=<?php echo $data['nip'];?>"><?php echo $data['nip']; ?></a></td>
	<td><?php echo $data['nm_pegawai']; ?></td>
	<td><?php echo $data['jk']; ?></td>
	<td><?php echo $data['nm_unit_krj']; ?></td>
	<td><?php echo $data['nm_jabatan']; echo " / ".$data['nm_pangkat'];  ?></td>
	<td><?php echo $data['nm_lokasi']; ?></td>
	<td><?php echo $data['alamat']; ?></td>
	<td align="center">
	<a class="btn btn-xs btn-success" href="?module=prestasi&aksi=tambah&nip=<?php echo $data['nip'];?>"    onclick="return confirm('Pilih Pegawai <?php echo $data['nip']; ?>?')"> <i class="fa fa-book"></i> Pilih</a>
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
?>
<!----- ------------------------- TAMBAH DATA MASTER prestasi ------------------------- ----->
<?php
  $hasil = mysql_query("SELECT max(id_prestasi) as terakhir from prestasi"); $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir']; $lastNoUrut = substr($lastID,13, 20); $nextNoUrut = $lastNoUrut + 1;
  $nextID = "PRE/ZT/".date('m/y')."/".sprintf("%04s",$nextNoUrut);
?>
<h3 class="box-title margin text-center">Tambah Data Prestasi Baru</h3>
<hr/>

	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=prestasi&aksi=tambah" role="form" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">No. Prestasi / Tanggal</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" required="required" name="id_prestasi" value="<?php echo $nextID;?>">	  
    </div>
	<div class="col-sm-2">
	  <div class="input-group">
	<div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tgl_prestasi">
	</div><!-- /.input group -->
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIP</label>
    <div class="col-sm-5">
      <input type="hidden" class="form-control" name="nip" value="<?php echo $_GET['nip'];?>" >
	  <input type="text" class="form-control" required="required" disabled value="<?php echo $_GET['nip'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-5">
	<?php 
	$s=mysql_fetch_array(mysql_query("select nm_pegawai from pegawai where nip='$_GET[nip]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nm_pegawai'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Prestasi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_prestasi" placeholder="Nama prestasi">
    </div>
  </div>     

  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	
      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
<a href="javascript:history.back()" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>			 
    </div>
  </div> 
</form>
</div> 
<!----- ------------------------- END TAMBAH DATA MASTER prestasi ------------------------- ----->
<?php	
break;
case "edit" :

$data=mysql_query("select * from prestasi where id_prestasi='$_GET[id_prestasi]'");
$edit=mysql_fetch_array($data);

?>
<!----- ------------------------- EDIT DATA MASTER prestasi ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Prestasi "<?php echo $_GET['id_prestasi']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=prestasi&aksi=edit" role="form" method="post">             

 <div class="form-group">
    <label class="col-sm-4 control-label">No. Prestasi / Tanggal</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_prestasi" value="<?php echo $edit['id_prestasi'];?>">	  
    </div>
	<div class="col-sm-2">
	  <div class="input-group">
	<div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" value="<?php echo $edit['tgl_prestasi'];?>" name="tgl_prestasi">
	</div><!-- /.input group -->
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIP</label>
    <div class="col-sm-5">
	  <input type="text" class="form-control" required="required" disabled value="<?php echo $edit['nip'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pegawai</label>
    <div class="col-sm-5">
	<?php 
	$s=mysql_fetch_array(mysql_query("select nm_pegawai from pegawai where nip='$edit[nip]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nm_pegawai'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Prestasi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_prestasi" value="<?php echo $edit['nm_prestasi'];?>" >
    </div>
  </div>  
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">

      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=cancel">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Cancel</button></a>	
 
    </div>
  </div>   
</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER prestasi ------------------------- ----->
<?php
break;
}
?>