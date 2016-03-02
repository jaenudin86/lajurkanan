
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Galeri
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Galeri</a></li>
                        <li class="active">Photo</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               		<div class="box-header">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Input Poto</a></li>
  <li><a data-toggle="tab" href="#menu1">List Poto</a></li>
</ul>
<div class="box-body">

<div class="tab-content">
 <div id="home" class="tab-pane fade in active">
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahfoto"><button type="button" claas="btn btn-default btn-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Album Photo</button></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahfoto"><button type="button" claas="btn btn-default btn-lg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Photo Kegiatan</button></a>  
<br />
<br/>		 
		<div class="row">
			<div class="col-xs-6">
				<div class="panel panel-primary">
  				<div class="panel-heading">Input Photo</div>
  					<div class="panel-body"> 
  					<form role="form" method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanfoto" 					enctype="multipart/form-data">
						         
						<table id="example2" class="table table-bordered table-hover">
						<div class="form-group">
							<label>
							Album
							</label>
							<select name="album" class="form-control" >
							<?php
							foreach($album->result_array() as $a)
							{
							echo "<option value='".$a['id_album']."'>".$a['nama_album']."</option>";
							}
							?>
							</select>
						</div>
						<label>Image</label>
						<div class="input-group">
			 		 	<input type="file"  name="userfile" size="40"  aria-describedby="basic-addon1">
						</div>
<br/>
<button type="submit" claas="btn btn-primary btn-lg"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>Upload</button><p></p>   
<button type="resset" claas="btn btn-primary btn-lg"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Reset </button>
						</table>
						</form>
						  			
  					</div>
  				</div>
  			</div>
  		</div>
             </div><!-- /.box-header -->



  <div id="menu1" class="tab-pane fade">
<div class="row">
      <div class="col-xs-12">
 		<table id="example2" class="table table-bordered table-hover">
			<tr align="center"><td><strong>Nomor</strong></td><td><strong>Nama Album Galeri</strong></td><td><strong>Nama File</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
			<?php 
			$no = 1+$page;
			foreach($foto->result_array() as $artikel){ ?>
				
			<td><?php echo $no; ?></td>
			<td><?php echo $artikel['nama_album']; ?></td>
			<td align="center"><img class="img-responsive" src="<?php echo base_url(); ?>system/application/views/main-web/galeri/<?php echo $artikel['foto_besar'];?>"width="100 height="100" border="5"></td>
			
			<?php
echo"<td align='center'><a href='".base_url()."index.php/adminweb/hapusfoto/".$artikel['id_foto']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
			?>
			</tr>
			<?php 
			$no++;
			 }
			  
			?>
			</table><br />
<?php echo $paginator;?>
		</div>	
	</div>
  </div>
    </div>
</div>
</div>
<br/>

   
</div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

