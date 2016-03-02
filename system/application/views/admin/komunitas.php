 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Komunitas
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">Komunitas</li>
                    </ol>
                </section>

                <!-- Main content -->	
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               		<div class="box-header">
                		<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkomunitas"><button type="button" claas="btn btn-default btn-lg">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Komunitas</button></a>
               		</div><!-- /.box-header -->
                <div class="box-body">
               
      <table id="example2" class="table table-bordered table-hover">
	<?php

	echo "<thread><tr align='center' bgcolor='#0099FF' ><td><strong>Nomor</strong></td><td><strong>Nama komunitas</strong></td><td><strong>Keterangan</strong></td><td><strong>Kegiatan</strong></td><td><strong>wilayah</strong></td><td colspan='3' width='30'><strong>Aksi Data</strong></td></tr><thread>";
	$no=$page+1;
	foreach($berita->result_array() as $s)
	{
	echo "<tr><td>".$no."</td><td>".$s['nama']."</td><td>".$s['keterangan']."</td><td>".$s['kegiatan']."</td><td>".$s['wilayah']."</td>
	<td><a href='".base_url()."index.php/adminweb/editkomunitas/".$s['id_komunitas']."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></a></td>
	<td><a href='".base_url()."index.php/adminweb/hapuskomunitas/".$s['id_komunitas']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></a></td></tr>";
	$no++;

}
?>

</table>
<?php echo $paginator; ?>		
</div>
							</div>
	  					</div>

                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->