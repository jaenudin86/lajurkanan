   <?php echo form_open_multipart('adminweb/updatewilayah');?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Wilayah
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Wilayah</a></li>
                        <li class="active">Edit Wilayah</li>
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
		$id = $d["id_wialayah"];
		$judul = $d["wilayah"];

	}
?>       
		<table id="example2" class="table table-bordered table-hover">

		<label>Id Wilayah</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"  aria-describedby="basic-addon1"  value="<?php echo $id; ?>" name="id_wialayah" readonly="readonly">
			</div>
		 	<label>Wilayah</label>
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
 		 		<input type="text" class="form-control"   aria-describedby="basic-addon1" value="<?php echo $judul; ?>" name="wilayah">
			</div>
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