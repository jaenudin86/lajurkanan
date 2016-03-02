   <?php echo form_open_multipart('adminweb/simpanagenda');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Agenda
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Agenda</a></li>
                        <li class="active">input Agenda</li>
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
		<table id="example2" class="table table-bordered table-hover">
		 	<label>Tema</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="judul"  aria-describedby="basic-addon1">
			</div>
			<label>Isi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="4" id="comment" name="isi"></textarea>
 		 	</div>
			<div class="form-group">
			<label>Start Date - End Date</label>
			 <div class="input-group input-daterange" data-provide="datepicker">
				<input type="text" class="form-control" name="mulai" placeholder="Start" />
				<span class="input-group-addon  ">to</span>
				<input type="text" class="form-control" name="selesai" placeholder="End" />
			</div>
			</div>
			<label>Tempat</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="tempat"  aria-describedby="basic-addon1">
			</div>
			<label>Waktu Kegiatan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="jam"  aria-describedby="basic-addon1">
			</div>
			<label>Keterangan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="4" id="keterangan" name="keterangan"></textarea>
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
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
		</br>
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
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
</script>