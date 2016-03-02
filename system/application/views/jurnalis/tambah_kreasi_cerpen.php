   <?php echo form_open_multipart('kreasiuser/simpankreasicerpen');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Cerpen
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Kreasi</a></li>
                        <li class="active">input Kreasi Cerpen</li>
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
 <?php echo form_open_multipart('kreasiuser/simpankreasicerpen');?>
 <form role="form">         
		<table id="example2" class="table table-bordered table-hover">
		 	<label>Judul Cerpen</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="judul_kreasi"  aria-describedby="basic-addon1">
			</div>
			<label>Isi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="7" id="isi_kreasi" name="content"></textarea>
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