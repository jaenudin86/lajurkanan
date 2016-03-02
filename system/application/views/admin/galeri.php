 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Geleri
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">Geleri</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               	<div class="box-header">
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahfoto"><button type="submit" claas="btn btn-default btn-lg">
 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Photo</button></a>
               </div><!-- /.box-header -->
                <div class="box-body">
<div class="row">
           		<div class="col-xs-6"> 
  				<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanalbum"> 
 				<form role="form"> 
				<table id="example2" class="table table-bordered table-hover">
		 		<label>Album</label>
    				<div class="input-group">
      				<span class="input-group-btn">
       				 <button class="btn btn-default" type="submit">Tambah Album</button>
     				 </span>
     				 <input type="text" class="form-control" name="nama" placeholder="Input Album" >
   	 				</div><!-- /input-group -->
 				</table>
 				</form>
 				</div>
				</div>
               
 <table border="1" id="example2" class="table table-bordered table-hover">
 <tr bgcolor="#FFF" align="center"><td width="2%"><strong>Nomor</strong></td><td><strong>Nama Album Galeri</strong></td><td width="9%" colspan="2"><strong>Aksi</strong></td></tr>
	<?php 
$no = 1+$page;
foreach($album->result_array() as $artikel){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $artikel['nama_album']; ?></td>
<?php
echo"<td>
	<a href='".base_url()."index.php/adminweb/editalbum/".$artikel['id_album']."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td><td><a href='".base_url()."index.php/adminweb/hapusalbum/".$artikel['id_album']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
?>
</tr>
<?php 
$no++;
 }
  
?>
</table><br />
<?php echo $paginator;?>
<!-- Batas content bawah -->
</div>						
</div>
							</div>
	  					</div>

                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->