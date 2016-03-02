   <?php echo form_open_multipart('jurnalis/updateberita');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        News
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>News</a></li>
                        <li class="active">Edit Berita</li>
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

 <form role="form">  
 <?php
	foreach($detail->result_array() as $d)
	{
		$id = $d["id_berita"];
		$judul = $d["judul_berita"];
		$isi = $d["isi"];
		$gambar = $d['gambar'];
		$app = $d['status_app'];
		//$wilayah = $d['kawasan'];
	}
?>       
		<table id="example2" class="table table-bordered table-hover">

		<label>Id Puisi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"  aria-describedby="basic-addon1"  value="<?php echo $id; ?>" name="id_berita" readonly="readonly">
			</div>
		 	<label>Judul Berita</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"   aria-describedby="basic-addon1" value="<?php echo $judul; ?>" name="judul_berita">
			</div>
			<label>Isi Content</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="comment"  <?php echo $isi; ?> name="isi"></textarea>
			</div>
			<div class="form-group">
			  <label for="sel1">Wilayah</label>
			    <select name="kawasan" class="form-control" value="<?php echo $d['id_kawasan'];?>"><?php echo $d['kawasan'];;?>>
							<?php
							foreach($wilayah->result_array() as $a)
							{
							echo "<option value='".$a['id_wialayah']."'>".$a['wilayah']."</option>";
							}
							?>
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