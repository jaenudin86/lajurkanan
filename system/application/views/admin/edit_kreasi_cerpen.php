 <?php echo form_open_multipart('kreasi/updatekreasicerpen');?>
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
 <?php echo form_open_multipart('kreasi/updatekreasicerpen');?>
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
 		 		<input type="text" name="id_kreasi" class="form-control"   aria-describedby="basic-addon1"  value="<?php echo $id; ?>" >
			</div>
		 	<label>Judul Cerpen</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" name="judul_kreasi" class="form-control"   aria-describedby="basic-addon1" value="<?php echo $judul; ?>">
			</div>
			<label>Isi Content</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="comment" name="isi_kreasi" <?php echo $isi; ?>></textarea>
			</div>
			<div class="form-group">
			  <label for="sel1">Status Approval</label>
			  <select class="form-control" name="status_app" id="sel1" <?php echo $app; ?>>
			    <option value="02">Setuju</option>
			    <option value="01">Tidak Setuju</option>
			  </select>
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