   <?php echo form_open_multipart('adminweb/simpankomunitas');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Komunitas
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Komunitas</a></li>
                        <li class="active">input Komunitas</li>
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
 <?php echo form_open_multipart('adminweb/simpankomunitas');?>
 <form role="form">         
		<table id="example2" class="table table-bordered table-hover">
		 	<label>Nama Komunitas</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="nama"  aria-describedby="basic-addon1">
			</div>
			<label>Keterangan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="keterangan"  aria-describedby="basic-addon1">
			</div>
			<label>Kegiatan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="comment" name="kegiatan"></textarea>
			</div>
			<div class="form-group">
			  <label for="sel1">Wilayah</label>
			    <select name="kawasan" class="form-control">
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
 		 	<input type="file"  name="userfile" size="40"  aria-describedby="basic-addon1">
			</div>
			</br>
			<div class="input-group">
			
 <button type="submit"class="btn btn-danger btn-lg">Submit</button>		
			</div>
		</table>
		</form>
\
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