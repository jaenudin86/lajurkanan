 <?php echo form_open_multipart('kreasiuser/updatekreasipuisi');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Puisi
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Puisi</a></li>
                        <li class="active">Edit Puisi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               		<div class="box-header">
                		  
               		</div><!-- /.box-header -->
     <div class="box-body">
         <div class="row">
           		<div class="col-xs-6"> 
 <?php echo form_open_multipart('kreasiuser/updatekreasipuisi');?>
 <form role="form">  
 <?php
	foreach($detail->result_array() as $d)
	{
		$id = $d["id_kreasi"];
		$judul = $d["judul_kreasi"];
		$isi = $d["isi_kreasi"];
		$gambar = $d['gambar_kreasi'];
		$app = $d['status_app'];
	}
?>       
		<table id="example2" class="table table-bordered table-hover">
		<label>Id Puisi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="id_kreasi"  aria-describedby="basic-addon1"  value="<?php echo $id; ?>" readonly="readonly">
			</div>
		 	<label>Judul Puisi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="judul_kreasi"  aria-describedby="basic-addon1" value="<?php echo $judul; ?>">
			</div>
			<label>Isi Content</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="comment" name="isi_kreasi" <?php echo $isi; ?>></textarea>
			</div>
			</div>
			<label>Image</label>
			<div class="input-group">
			<img src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $gambar; ?>"
 		 	<input type="file"  name="name" size="40"  aria-describedby="basic-addon1">
			</div>
			</br>
			<div class="input-group">
			
 <button type="submit"class="btn btn-danger btn-lg">Submit</button>		
			</div>
		</table>
		</form>
		</br>
		</br>
		</br>
		</br>

				</div>
		</div>					
		</div>					
	</div>
								<!--box-body-->
							</div>
	  					</div>

                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->