 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Agenda
                        <small>lajur kanan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <li class="active">Agenda</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
          		<div class="row">
           		<div class="col-xs-12">
              	<div class="box">
               	<div class="box-header">
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahfoto"><button type="submit" claas="btn btn-default btn-lg">
 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Tambah Photo</button></a>
               </div><!-- /.box-header -->
                <div class="box-body">
				<div class="row">
           		<div class="col-xs-6"> 
  				<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanalbum"> 
 				<form role="form"> 
				<table id="example2" class="table table-bordered table-hover">
				<?php
				foreach($detail->result_array() as $a)
				{
				$id=$a['id_album'];
				$nama=$a['nama_album'];
				}
				?>
		 		<label>Album</label>
    				<div class="input-group">
      				<span class="input-group-btn">
       				 <button class="btn btn-default" type="submit">Tambah Album</button>
     				 </span>
     				 <input type="text" class="form-control" name="nama" placeholder="Input Album"value="<?php echo $nama; ?>" >
   	 				</div><!-- /input-group -->
 				</table>
 				</form>
 				</div>
				</div>
               

<!-- Batas content bawah -->
</div>						
</div>
							</div>
	  					</div>

                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->