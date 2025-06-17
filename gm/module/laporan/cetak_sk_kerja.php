<?php 
include "head.php";
?>
          <section class="content">
            <div class="text-center">
			<h3><img src="inc/logo-disdik-minahasa.png" style="width:240px"/></h3>
			Jl. Gunung Agung Rinegetan Telp/Faks. (0431) 321045 Kode Pos 95617<br/>
			Tondano, Sulawesi Utara
			</div><br/>
             
            <div class="box box-default" style="box-shadow:none;">
              <div class="box-header">
                <h3 class="box-title center">Data SK Pegawai</h3>
				<span class="pull-right">
				Padang, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
                <table  class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th>No. SK</th>
		<th>NIP</th>
		<th>Nama Pegawai</th> 
		<th>Tgl. SK</th> 
		<th>Lokasi</th> 
		<th>Unit Kerja</th> 
		<th>Jabatan</th>		
		<th>Gaji (Rp)</th> 
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM sk_krj a, pegawai b, jabatan c, pangkat d, unit_krj e, lokasi_krj f where a.nip=b.nip and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_krj=e.id_unit_krj and a.id_lokasi=f.id_lokasi and a.status_sk='aktif' order by f.nm_lokasi and a.tgl_sk";
$tampil = mysql_query($sql);
$no=1;
while ($k = mysql_fetch_array($tampil)) { 
$Kode = $k['no_sk'];
$msk=IndonesiaTgl($k['tgl_msk']);
?>

	<tr>	
	<td><?php echo $k['no_sk']; ?></a></td>
	<td><?php echo $k['nip']; ?></td>
	<td><?php echo $k['nm_pegawai']; ?></td>
	<td><?php echo IndonesiaTgl($k['tgl_sk']); ?></td>	
	<td><?php echo $k['nm_lokasi']; ?></td>
	<td><?php echo $k['nm_unit_krj']; ?></td>
	<td><?php echo $k['nm_jabatan']; ?></td>
	<td><?php echo format_angka($k['gaji']); ?></td>
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
include "tail.php";?>