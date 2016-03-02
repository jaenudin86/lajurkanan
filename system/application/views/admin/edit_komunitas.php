   <?php echo form_open_multipart('adminweb/updatekomunitas');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Komunitas
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Komunitas</a></li>
                        <li class="active">Edit Komunitas</li>
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
		$id = $d["id_komunitas"];
		$nama = $d["nama"];
		$photo = $d["photo"];
		$keterangan = $d['keterangan'];
		$kegiatan = $d['kegiatan'];
		$wilayah = $d['wilayah'];
	}
?>       
		<table id="example2" class="table table-bordered table-hover">

		<label>Id Komunitas</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"  aria-describedby="basic-addon1"  value="<?php echo $id; ?>" name="id_komunitas" readonly="readonly">
			</div>
			 	<label>Nama Komunitas</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"   aria-describedby="basic-addon1" value="<?php echo $nama; ?>" name="nama">
			</div>
			 <label>Keterangan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"   aria-describedby="basic-addon1" value="<?php echo $keterangan; ?>" name="judul_berita">
			</div>
			<label>Kegiatan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="comment"  <?php echo $kegiatan; ?> name="keterangan"></textarea>
			</div>
		<div class="form-group">
			  <label >Wilayah</label>
			    <select name="wilayah" class="form-control">
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
			<img src="<?php echo base_url(); ?>system/application/views/main-web/berita/<?php echo $photo; ?>"
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