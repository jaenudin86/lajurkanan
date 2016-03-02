 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Agenda
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">Agenda</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               		<div class="box-header">
                		<a href="<?php echo base_url(); ?>index.php/adminweb/tambahagenda"><button type="button" claas="btn btn-default btn-lg">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Agenda</button></a>
               		</div><!-- /.box-header -->
                <div class="box-body">
               
      <table border="1" id="example2" class="table table-bordered table-hover">
	<?php
echo "<thread><tr><td with='10'><strong>No</strong></td><td><strong>Judul Agenda</strong></td><td><strong>Tanggal Posting</strong></td><td><strong>Tempat</strong></td><td align='center' colspan='2' width='10'><strong>Aksi Data</strong></td></tr></thread>";
$no=$page+1;
foreach($berita->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['tema_agenda']."</td><td>".$s['tgl_posting']."</td><td>".$s['tempat']."</td><td>
	<a href='".base_url()."index.php/adminweb/editagenda/".$s['id_agenda']."'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a></a></td><td><a href='".base_url()."index.php/adminweb/hapusagenda/".$s['id_agenda']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td></tr>";
	$no++;
}
?>
<table align="center" width="100%"><tr><td><?php echo $paginator; ?></td></tr></table>
</table>						
</div>
							</div>
	  					</div>

                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->