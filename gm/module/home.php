<?php
$namaBln = array("1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", 
					 "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
include ("../inc/koneksi.php"); 
include ("../inc/fungsi_hdt");  ?>

<section class="content-header">
          <h1 style="font-size:30px;color:#777;"><i class="fa fa-home"></i> Dashboard</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-time"></i><?php echo Indonesia2Tgl(date('Y-m-d'));?> </a></li>
          </ol>
        </section>
<br>
<div class="box box-success">
</div>

<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "Pimpinan"
</p>
</div>  

 
<?php
#include ("../inc/fungsi_hdt"); 
 $sql = "SELECT jk, COUNT( nip ) AS qty FROM  `pegawai` GROUP BY jk";	
 $hasil = mysql_query($sql);
?>
 
      <!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
      <script src="http://code.highcharts.com/modules/exporting.js"></script-->
	  
    <script src="module/js/highcharts.js"></script>
    <script src="module/js/exporting.js"></script>
<div class="row">
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Pegawai</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
	<script type="text/javascript">
       $(function () {
		   
    $('#bola').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false,
        },
        title: {
            text: 'Data Pegawai berdasarkan Jenis Kelamin'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Dinas Pendidikan',
            data: [
			<?php			
			while($data=mysql_fetch_array($hasil))
			{ ?>
                ['<?php echo $data['jk']?>',   <?php echo $data['qty']?>],               
		   <?php
		   }//end while
		   ?>
            ]
        }]
    });
});   
    </script>
   <div id="bola" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>                  

</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Cluster</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Data Pegawai per Cluster '
         },
         xAxis: {
            categories: ['Cluster']
         },
         yAxis: {
            title: {
               text: 'Jumlah Pegawai'
            }
         },
              series:             
            [
            <?php 
        	include('config.php');
           $sql   = "SELECT nm_lokasi  FROM lokasi_krj";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            	$merek=$ret['nm_lokasi'];                     
                 $sql_jumlah   = "SELECT nm_lokasi, COUNT( nip ) AS qty FROM  sk_krj a, lokasi_krj b where a.id_lokasi=b.id_lokasi and status_sk='aktif' and nm_lokasi='$merek' GROUP BY nm_lokasi";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['qty'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $merek; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
<div id='container'></div>		
</div></div>
</div> 
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Prestasi</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<script type="text/javascript">
		//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'xxx', //letakan grafik di div id container
				//Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Prestasi Pegawai',
                x: -20 //center
            },
            subtitle: {
                text: 'Dinas Pendidikan',
                x: -20
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: [<?php 
				include"koneksi.php";
				$sql = mysql_query("select MONTH(tgl_prestasi) as bln from prestasi group by bln ");
while ($k = mysql_fetch_array($sql)) { 
				echo "'";echo $namaBln[$k['bln']];echo "', ";
				}?> ]
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Jumlah (per orang)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: { 
			//fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
			//akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			//series adalah data yang akan dibuatkan grafiknya,
			//saat ini mungkin anda heran, buat apa label indonesia dikanan 
			//grafik, namun fungsi label ini sangat bermanfaat jika
			//kita menggambarkan dua atau lebih grafik dalam satu chart,
			//hah, emang bisa? ya jelas bisa dong, lihat tutorial selanjutnya 
            series: [{  
                name: 'Prestasi',  
				//data yang akan ditampilkan 
                data: [<?php 				
				$sq = mysql_query("select COUNT(nip) as nip, MONTH(tgl_prestasi)as bln from prestasi group by bln ");
while ($q = mysql_fetch_array($sq)) { 
				echo $q['nip'];echo ", ";
				}?>]
            }]
        });
    });
    
});
		</script>
<div id="xxx" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</div></div>
</div>
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Hukuman</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
<script type="text/javascript">
		//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'yyy', //letakan grafik di div id container
				//Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Pelanggaran Pegawai',
                x: -20 //center
            },
            subtitle: {
                text: 'Dinas Pendidikan',
                x: -20
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: [<?php 				
				$sql = mysql_query("select month(tgl_hukuman) as bln from hukuman group by bln ");
while ($k = mysql_fetch_array($sql)) { 
				echo "'";echo $namaBln[$k['bln']];echo "', ";
				}?> ]
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Jumlah (orang)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: { 
			//fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
			//akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			//series adalah data yang akan dibuatkan grafiknya,
			//saat ini mungkin anda heran, buat apa label indonesia dikanan 
			//grafik, namun fungsi label ini sangat bermanfaat jika
			//kita menggambarkan dua atau lebih grafik dalam satu chart,
			//hah, emang bisa? ya jelas bisa dong, lihat tutorial selanjutnya 
            series: [{  
                name: 'Hukuman',  
                name: 'Hukuman',  
				//data yang akan ditampilkan 
                data: [<?php 				
				$sq = mysql_query("select COUNT(nip) as nip, month(tgl_hukuman)as bln from hukuman group by bln ");
while ($q = mysql_fetch_array($sq)) { 
				echo $q['nip'];echo ", ";
				}?>]
            }]
        });
    });
    
});
		</script>
<div id="yyy" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</div></div>
</div></div>