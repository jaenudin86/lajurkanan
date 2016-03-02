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
                        <li class="active">Edit Agenda</li>
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
<?php
foreach($detail->result_array() as $e){

$mulai=$e["tgl_mulai"];
$selsai=$e["tgl_selesai"];
$judul=$e["tema_agenda"];
$isi=$e["isi"];
$tempat=$e["tempat"];
$waktu=$e["jam"];
$keterangan=$e["keterangan"];
$id=$e["id_agenda"];
}
?>
		 	<label>Tema</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="judul"  aria-describedby="basic-addon1"value="<?php echo $judul; ?>" readonly="readonly">
			</div>
			<label>Isi</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="4" id="comment" name="isi"  ><?php echo $isi; ?></textarea>
 		 	</div>
			<div class="form-group">
			<label>Start Date - End Date</label>
			 <div class="input-group input-daterange" data-provide="datepicker">
				<input type="text" class="form-control" name="mulai" placeholder="Start" value="<?php echo $mulai; ?>" />
				<span class="input-group-addon  ">to</span>
				<input type="text" class="form-control" name="selesai" placeholder="End" value="<?php echo $selsai; ?>" />
			</div>
			</div>
			<label>Tempat</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="tempat"  aria-describedby="basic-addon1" value="<?php echo $tempat; ?>">
			</div>
			<label>Waktu Kegiatan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control" name="jam"  aria-describedby="basic-addon1" value="<?php echo $waktu; ?>">
			</div>
			<label>Keterangan</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<textarea class="form-control" rows="4" id="keterangan" name="isi" ><?php echo $keterangan;?></textarea>
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