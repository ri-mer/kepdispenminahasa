<?php
include 'head.php';

$tgl_bet = $_POST['tanggal'];
$a=substr ($tgl_bet, 0,2);
$b=substr ($tgl_bet, 3,2);
$c=substr ($tgl_bet, 6,4);
$d= $c."-".$a."-".$b;
$e=substr ($tgl_bet, 13,2);
$f=substr ($tgl_bet, 16,2);
$g=substr ($tgl_bet, 19,4);
$h= $g."-".$e."-".$f;
#echo $h."     ".$d;
?>

          <section class="content">
            <div class="text-center">
			<h3><img src="inc/logo-disdik-minahasa.png" style="width:240px"/></h3>
			Jl. Gunung Agung Rinegetan Telp/Faks. (0431) 321045 Kode Pos 95617<br/>
			Tondano, Sulawesi Utara
			</div><br/>
             
            <div class="box box-default" style="box-shadow:none;">
              <div class="box-header">
                <h3 class="box-title center">Data Prestasi Pegawai</h3>
				<span class="pull-right">
				Padang, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
                <table  class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th class="col-xs-1">No </th>
		<th class="col-sm-2">No. Prestasi</th>
		<th class="col-sm-2">NIP</th>
		<th class="col-sm-3">Nama Pegawai</th> 
		<th>Tanggal</th> 
		<th>Prestasi</th> 		 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM prestasi a, pegawai b where a.nip=b.nip and tgl_prestasi between '".$d."' and '".$h."' ";
$tampil = mysql_query($sql);
$no=1;
while ($k = mysql_fetch_array($tampil)) { ?>

	<tr>	
	<td align="center"><?php echo $no++; ?></td>
	<td><?php echo $k['id_prestasi']; ?></td>
	<td><?php echo $k['nip']; ?></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo Indonesia2Tgl($k['tgl_prestasi']); ?></td>
	<td><?php echo $k['nm_prestasi']; ?></td>	
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
              </div><!-- /.box-body -->
            </div>
          </section><!-- /.content -->

<?php
include "tail.php";
?>