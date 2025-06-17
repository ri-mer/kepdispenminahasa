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
                <h3 class="box-title center">Data Pegawai</h3>
				<span class="pull-right">
				Tondano, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
			  
<table class="table table-bordered table-striped">
<thead>
	<tr style="background:#dd4b39;color:#fff;">
		<th align="center" class="col-xs-1">No</th>
		<th align="center" class="col-sm-1">NIP</th>
		<th align="center" class="col-sm-3">Nama pegawai</th>
		<th align="center" class="col-sm-1">JK</th> 
		<th align="center" >Tempat/Tgl. Lahir</th> 
		<th align="center" class="col-sm-1">No. HP</th> 
		<th align="center" class="col-sm-1">Email</th>
		<th align="center" class="col-sm-1">Tgl. Masuk</th>		
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM pegawai";
$tampil = mysql_query($sql);
$no=1;
while ($data = mysql_fetch_array($tampil)) { ?>

	<tr>
	<td align="center"><?php echo $no++; ?></td>
	<td><?php echo $data['nip']; ?></td>
	<td><?php echo $data['nm_pegawai']; ?></td>
	<td><?php echo $data['jk']; ?></td>
	<td><?php echo $data['tpt_lhr'] .", ". IndonesiaTgl($data['tgl_lhr']); ?></td>
	<td><?php echo $data['no_hp']; ?></td>
	<td><?php echo $data['email']; ?></td>	
	<td><?php echo IndonesiaTgl($data['tgl_msk']); ?></td>
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