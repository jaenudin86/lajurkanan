 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        News
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">News</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               		<div class="box-header">
                		<a href="<?php echo base_url(); ?>index.php/adminweb/tambahberita"><button type="button" claas="btn btn-default btn-lg">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Berita</button></a>
               		</div><!-- /.box-header -->
                <div class="box-body">
               
      <table id="example2" class="table table-bordered table-hover">
	<?php

	echo "<thread><tr align='center' bgcolor='#0099FF' ><td><strong>Nomor</strong></td><td><strong>Judul Berita</strong></td><td><strong>Tanggal</strong></td><td><strong>Jam</strong></td><td><strong>Author</strong></td><td><strong>Status</strong></td><td><strong>kawasan</strong></td></td><td colspan='3' width='30'><strong>Aksi Data</strong></td></tr><thread>";
	$no=$page+1;
	foreach($berita->result_array() as $s)
	{
	if($s['status_app']=='02'){
		$approval="Setuju";
	} else{
		$approval="Tidak setuju";
	}

	
	echo "<tr><td>".$no."</td><td>".$s['judul_berita']."</td><td>".$s['tanggal']."</td><td>".$s['waktu']."</td><td>".$s['author']."</td><td>".$approval."</td><td>".$s['kawasan']."</td>

	<td><a href='".base_url()."index.php/adminweb/editberita/".$s['id_berita']."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></a></td>
	<td><a href='".base_url()."index.php/adminweb/hapusberita/".$s['id_berita']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></a></td></tr>";
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