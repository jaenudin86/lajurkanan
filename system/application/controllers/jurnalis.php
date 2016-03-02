<?php

class Jurnalis extends Controller {

	function Jurnalis()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		$this->load->plugin();
		$this->load->model(array('Web_model', 'jurnalis_model'));
		session_start();
	}
	function index()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->load->view('jurnalis/bg_atas',$data);
			//$this->load->view('jurnalis/isi_index',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function datastatis()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Data_Statis();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/data_statis',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahdatastatis()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_data_statis',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function image_list() 
	{
		$menu_id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$menu_id='';
		}
		else
		{
    			$menu_id = $this->uri->segment(3);
		}
		$imglist=$this->jurnalis_model->getDataGambar();	
		$js= 'var tinyMCEImageList = new Array(';
		foreach($imglist -> result_array() as $row) {
			$js.= '["'.$row['title'].'", "'.base_url().$row['image_url'].'"],';		
		}
		$js .= ');';
		echo str_replace(',);',');',$js);
	}
	
	function simpandatastatis() 
	{
		$data=array();
		$data["data_id"]=$this->input->post('data_id');
		$content=$this->input->post('content');
		$data["content"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
		if(empty($content))
		{
			echo "Data Masih Kosong";
		}
		else{
			$this->jurnalis_model->Simpan_Data_Statis($data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/datastatis'>";
		}
	}
	
	function uploadfile()
	{
		$title = $this->input->post('title');
		$filesize = $this->input->post('file_size');
		$description = $this->input->post('description');
		$filetype = $this->input->post('filetype');
		$tujuan = $this->input->post('tujuan');
		if ($_FILES['imagefile']['type'] == "application/pdf")
			$ori_src="media/pdf/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
		else
			$ori_src="media/image/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
			
		if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
		{
			chmod("$ori_src",0777);
		}else{
			echo "Gagal melakukan proses upload file.Hal ini biasanya disebabkan ukuran file yang terlalu besar atau koneksi jaringan anda sedang bermasalah";
			exit;
		}
		
		if ($_FILES['imagefile']['type'] == "application/pdf"){
			$thumb_src="media/pdf/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
		} 
		else
		{
			$thumb_src="media/image/imgthumb/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
			
			switch($filesize) {
				case "72x48":
					$n_width = 72;
					$n_height = 48;
				break;
				case "144x96":
					$n_width = 144;
					$n_height = 96;
				break;
				case "230x160":
					$n_width = 230;
					$n_height = 160;
				break;
				case "460x320":
					$n_width = 460;
					$n_height = 320;
				break;
				case "original_size":
					$n_width = 0;
					$n_height = 0;
				break;
			}
		
			if(($_FILES['imagefile']['type']=="image/jpeg") ||
				($_FILES['imagefile']['type']=="image/png") ||
				($_FILES['imagefile']['type']=="image/gif"))
			{
				$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
				$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
				$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
				$im = false; // If image is not JPEG, PNG, or GIF
				
				//$im=ImageCreateFromJPEG($ori_src); 
				$width=ImageSx($im);              // Original picture width is stored
				$height=ImageSy($im);             // Original picture height is stored
				if(($n_height==0) && ($n_width==0)) {
					$n_height = $height;
					$n_width = $width;
				}	
 
				if(!$im) {
					echo '<p>Gagal membuat thumnail</p>';
					exit;
				}
				else {				
					$newimage=@imagecreatetruecolor($n_width,$n_height);                 
					@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
					@ImageJpeg($newimage,$thumb_src);
					chmod("$thumb_src",0777);
				}
			}
		}
		
		$data = array();
		$data["uploaded_date"] = date("Y-m-d H:m:s");
		$data["title"] = $title;
		$data["image_description"] = $description;
		$data["file_type"] = $filetype;
		$data["image_url"] = $thumb_src;
		$data["image_size"] = $filesize;
		$this->jurnalis_model->Simpan_Gambar($data);
		$this->reloadPage($tujuan);
	}
	
	
	function hapusmedia() 
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$imgdb=  $this->jurnalis_model->getDataGambar();
		
		foreach($imgdb->result_array() as $row){
			$filename = $row['image_url'];
			$filetype = $row['file_type'];
		}
		if(file_exists($filename))
		{
			if(@unlink($filename)) 
			{
				if($filetype=="image") 
					@unlink(str_replace('imgthumb','imgoriginal',$filename));
			}
	   } 
	   $this->jurnalis_model->Hapus_Media($id);
	   ?>
	   <script type="text/javascript">
	   	alert("Berhasil menghapus media/file...!!!");
	   </script>
	   <?php
	   echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/'>";
	}
	
	function editdatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_data","id_data=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_data_statis',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatedatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$data2 = array();
		$data2["data_id"] = $this->input->post('data_id');
		$data2["content"] = $this->input->post('content');
		$data2["id_data"] = $this->input->post('id_data');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Update_Content("tbl_data",$data2,"id_data");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/datastatis'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusdatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_data","tbl_data");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/datastatis'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function berita()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$user = $data["username"];
			$data["berita"] = $this->jurnalis_model->Berita($offset,$limit,$user);
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_berita",$user);
			//$status_app['status'] = $this->jurnalis_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/berita/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/berita',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["wilayah"]=$this->jurnalis_model->Tampil_Data_Wilayah();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_berita","id_berita=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_berita',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function edit_appberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
			$id=$id;
		}
		else
		{
			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["status"]=$pecah[2];
			$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$data["statis"] = $this->jurnalis_model->Menu_Statis();
				$data["imglist"]=$this->jurnalis_model->getDataGambar();
				$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_berita","id_berita=".$id."");
				$this->load->view('jurnalis/bg_atas',$data);
				$this->load->view('jurnalis/edit_berita',$data);
				//$this->load->view('jurnalis/bg_bawah');
			}
			else{
				?>
				<script type="text/javascript" language="javascript">
				alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
				}
			}
			else{
				?>
				<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
				}
		}
	function app_statusberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
			$id=$id;
		}
		else
		{
			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["username"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["status"]=$pecah[2];
			$data['scriptmce'] = $this->scripttiny_mce();
	
			if($data["status"]=="jurnalis"){
				$data["status_app"] = "02";
				$this->jurnalis_model->Update_Status_app("tbl_berita",$data,"id_berita");
				$this->jurnalis_model->Delete_Content($id,"id_berita","tbl_berita");
				?>
					<script type="text/javascript" language="javascript">
					alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/berita'>";
				}
				else{
					?>
					<script type="text/javascript" language="javascript">
					alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
					}
				}
				else{
					?>
					<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
					}
			}
	function updateberita()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_berita"]=$this->input->post('judul_berita');
				$data2["isi"]=$this->input->post('isi');
				$data2["id_berita"]=$this->input->post('id_berita');
				$data2["status_app"]=$this->input->post('status');
				$data2["kawasan"]=$this->input->post('kawasan');
					$this->jurnalis_model->Update_Content("tbl_berita",$data2,"id_berita");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalis/berita'>";

			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_berita"]=$this->input->post('judul_berita');
				$data2["isi"]=$this->input->post('isi');
				$data2["id_berita"]=$this->input->post('id_berita');
				$data2["gambar"]=$_FILES['userfile']['name'];
				$data2["status_app"]=$this->input->post('status');
				$this->jurnalis_model->Update_Content("tbl_berita",$data2,"id_berita");
								?>
					<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\2...!!!");
				</script>
				<?php
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalis/berita'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahberita()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
		$data["wilayah"]=$this->jurnalis_model->Tampil_Data_Wilayah();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_berita',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanberita() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('content');
			
			$data2["judul_berita"]=$this->input->post('judul');
			$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal"] = mdate($tgl,$time);
			$data2["waktu"] = mdate($jam,$time);
			$data2["author"] = $data["username"];
			$data2["counter"] = "1";
			$data2["status_app"]=$this->input->post('Status');
			$data2["kawasan"]=$this->input->post('kawasan');
				if(empty($content) && empty($data2["judul"]))
				{	
				  $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
					echo "Data Masih Kosong";
				}
				else{
					$config['upload_path'] = './system/application/views/main-web/berita/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '10000';
					$config['max_width'] = '4000';
					$config['max_height'] = '4000';						
					$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
					$data2["gambar"]= "welcome.jpg";
					$this->jurnalis_model->Simpan_Artikel("tbl_berita",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalis/berita'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar"]=$_FILES['userfile']['name'];
						$this->jurnalis_model->Simpan_Artikel("tbl_berita",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalis/berita'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_berita","tbl_berita");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/berita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function pengumuman()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->jurnalis_model->Pengumuman($offset,$limit);
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_pengumuman");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/pengumuman/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/pengumuman',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahpengumuman()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_pengumuman',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanpengumuman() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = " %Y-%m-%d";
			$time = time();
			$content=$this->input->post('content');
			$data2["judul_pengumuman"]=$this->input->post('judul');
			$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal"] = mdate($tgl,$time);
			$data2["penulis"] = $data["username"];
				if(empty($content) && empty($data["judul"]))
				{
					echo "Data Masih Kosong";
				}
				else
				{
					$this->jurnalis_model->Simpan_Artikel("tbl_pengumuman",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/pengumuman'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editpengumuman()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_pengumuman","id_pengumuman=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_pengumuman',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatepengumuman()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$content=$this->input->post('content');
				$data2["judul_pengumuman"]=$this->input->post('judul');
				$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
				$data2["id_pengumuman"]=$this->input->post('id_pengumuman');
				$this->jurnalis_model->Update_Content("tbl_pengumuman",$data2,"id_pengumuman");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuspengumuman()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_pengumuman","tbl_pengumuman");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function agenda()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->jurnalis_model->Agenda($offset,$limit);
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_agenda");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/agenda/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/agenda',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahagenda()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_agenda',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanagenda() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["tgl_posting"] = mdate($tgl,$time);
				$in["tema_agenda"]=$this->input->post('judul');
				$in["isi"]=strip_tags($this->input->post('isi'));
				$in["tgl_mulai"]=$this->input->post('mulai');
				$in["tgl_selesai"]=$this->input->post('selesai');
				$in["tempat"]=$this->input->post('tempat');
				$in["jam"]=$this->input->post('jam');
				$in["keterangan"]=strip_tags($this->input->post('keterangan'));
				$this->jurnalis_model->Simpan_Artikel("tbl_agenda",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editagenda()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_agenda","id_agenda=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_agenda',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateagenda()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_agenda"]=$this->input->post('id_agenda');
				$in["tema_agenda"]=$this->input->post('judul');
				$in["isi"]=strip_tags($this->input->post('isi'));
				$t_mulai=$this->input->post('tgl_mulai');
				$b_mulai=$this->input->post('bln_mulai');
				$y_mulai=$this->input->post('thn_mulai');
				$in["tgl_mulai"]="".$y_mulai."-".$b_mulai."-".$t_mulai."";
				$t_selesai=$this->input->post('tgl_selesai');
				$b_selesai=$this->input->post('bln_selesai');
				$y_selesai=$this->input->post('thn_selesai');
				$in["tgl_selesai"]="".$y_selesai."-".$b_selesai."-".$t_selesai."";
				$in["tempat"]=$this->input->post('tempat');
				$in["jam"]=$this->input->post('jam');
				$in["keterangan"]=strip_tags($this->input->post('keterangan'));
				$this->jurnalis_model->Update_Content("tbl_agenda",$in,"id_agenda");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusagenda()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_agenda","tbl_agenda");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function siswa()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["kelas"] = $this->jurnalis_model->Siswa_Kelas();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/siswa',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahkelas()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_kelas',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpankelas() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["nama_kelas"]=$this->input->post('nama');
				$in["tahun_ajaran"]=$this->input->post('tahun');
				if($in["nama_kelas"]=="" || $in["tahun_ajaran"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Artikel("tbl_kelas",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/siswa'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuskelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_kelas","tbl_kelas");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/siswa'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editkelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_kelas","id_kelas=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_kelas',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatekelas()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_kelas"]=$this->input->post('id');
				$in["nama_kelas"]=$this->input->post('nama');
				$in["tahun_ajaran"]=$this->input->post('tahun');
				$this->jurnalis_model->Update_Content("tbl_kelas",$in,"id_kelas");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/siswa'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function siswaperkelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["kelas"] = $this->jurnalis_model->Siswa_Per_Kelas($id);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/siswa_per_kelas',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahsiswa()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["kelas"]=$this->jurnalis_model->Siswa_Kelas();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_siswa',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpansiswa() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["id_kelas"]=$this->input->post('kelas');
				$in["nis"]=$this->input->post('no_induk');
				$in["nama_siswa"]=$this->input->post('nama');
				if($in["nama_siswa"]=="" || $in["nis"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Artikel("tbl_siswa",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/siswa'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapussiswa()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_siswa","tbl_siswa");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editsiswa()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["kelas"]=$this->jurnalis_model->Siswa_Kelas();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_siswa","id_siswa=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_siswa',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatesiswa()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_kelas"]=$this->input->post('kelas');
				$in["id_siswa"]=$this->input->post('id_siswa');
				$in["nama_siswa"]=$this->input->post('nama');
				$in["nis"]=$this->input->post('no_induk');
				$this->jurnalis_model->Update_Content("tbl_siswa",$in,"id_siswa");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/siswaperkelas/".$in["id_kelas"]."'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function kepegawaian()
	{
		
		$page=$this->uri->segment(3);
      	$limit=9;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_kepegawaian");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/kepegawaian/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["pegawai"] = $this->jurnalis_model->Daftar_Pegawai($offset,$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/kepegawaian',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahkepegawaian()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_kepegawaian',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpankepegawaian() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["nip"]=$this->input->post('nip');
				$in["nama_pegawai"]=$this->input->post('nama_pegawai');
				$in["kelahiran"]=$this->input->post('kelahiran');
				$in["matpel"]=$this->input->post('matpel');
				$in["jk"]=$this->input->post('jk');
				$in["status"]=$this->input->post('status');
				$in["username"]=$this->input->post('username');
				$in["password"]=$this->input->post('password');
				if($in["nip"]=="" || $in["nama_pegawai"]=="" || $in["kelahiran"]=="" || $in["matpel"]=="" || $in["username"]=="" || $in["password"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Pegawai($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/kepegawaian'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editkepegawaian()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["kelas"]=$this->jurnalis_model->Siswa_Kelas();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_kepegawaian","id_kepegawaian=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_kepegawaian',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatekepegawaian()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			
				$pass=$this->input->post('password');
				if($pass!="")
				{
					$in["nip"]=$this->input->post('nip');
					$in["nama_pegawai"]=$this->input->post('nama_pegawai');
					$in["kelahiran"]=$this->input->post('kelahiran');
					$in["matpel"]=$this->input->post('matpel');
					$in["jk"]=$this->input->post('jk');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$pass=$this->input->post('password');
					$in["id_kepegawaian"]=$this->input->post('id');
					$this->jurnalis_model->Update_Content("tbl_kepegawaian",$in,"id_kepegawaian");
					$this->jurnalis_model->Update_Password($pass,$in["id_kepegawaian"]);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/kepegawaian'>";
				}
				else{
					$in["nip"]=$this->input->post('nip');
					$in["nama_pegawai"]=$this->input->post('nama_pegawai');
					$in["kelahiran"]=$this->input->post('kelahiran');
					$in["matpel"]=$this->input->post('matpel');
					$in["jk"]=$this->input->post('jk');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$in["id_kepegawaian"]=$this->input->post('id');
					$this->jurnalis_model->Update_Content("tbl_kepegawaian",$in,"id_kepegawaian");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/kepegawaian'>";
				
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuskepegawaian()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_kepegawaian","tbl_kepegawaian");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function polling()
	{
		$page=$this->uri->segment(3);
      	$limit=9;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_soalpolling");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/polling/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["detail"] = $this->jurnalis_model->Daftar_Polling($offset,$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/polling',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahsoalpoll()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["kelas"]=$this->jurnalis_model->Siswa_Kelas();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_soal_poll',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpansoalpoll() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["soal_poll"]=$this->input->post('soal');
				$in["status"]=$this->input->post('status');
				if($in["soal_poll"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Artikel("tbl_soalpolling",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/polling'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editsoalpolling()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_soalpolling","id_soal_poll=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_soal_poll',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatesoalpoll()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_soal_poll"]=$this->input->post('id');
				$in["soal_poll"]=$this->input->post('soal');
				$in["status"]=$this->input->post('status');
				$this->jurnalis_model->Update_Content("tbl_soalpolling",$in,"id_soal_poll");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/polling'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapussoalpolling()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_soal_poll","tbl_soalpolling");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahjwbpoll()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_jawabanpoll");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/tambahjwbpoll/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["soal_poll"]=$this->jurnalis_model->Tampil_Data("tbl_soalpolling","id_soal_poll");
			$data["jwb_poll"]=$this->jurnalis_model->Tampil_Data_Terbatas("tbl_jawabanpoll","id_jawaban_poll","left join tbl_soalpolling on 
			tbl_jawabanpoll.id_soal_poll=tbl_soalpolling.id_soal_poll",$offset,$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_jwb_poll',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanjwbpoll() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["id_soal_poll"]=$this->input->post('pertanyaan');
				$in["jawaban"]=$this->input->post('jawaban');
				$in["counter"]="1";
				if($in["jawaban"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Artikel("tbl_jawabanpoll",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/tambahjwbpoll'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editjwbpoll()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["soal_poll"]=$this->jurnalis_model->Tampil_Data("tbl_soalpolling","id_soal_poll");
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_jawabanpoll","id_jawaban_poll=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_jwb_poll',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatejwbpoll()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_jawaban_poll"]=$this->input->post('id');
				$in["id_soal_poll"]=$this->input->post('pertanyaan');
				$in["jawaban"]=$this->input->post('jawaban');
				$in["counter"]=$this->input->post('counter');
				$this->jurnalis_model->Update_Content("tbl_jawabanpoll",$in,"id_jawaban_poll");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/tambahjwbpoll'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusjwbpoll()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_jawaban_poll","tbl_jawabanpoll");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function galeri()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_jawabanpoll");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/tambahjwbpoll/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["album"]=$this->jurnalis_model->Tampil_Data_Terbatas("tbl_album_galeri","id_album","",$offset,$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/galeri',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
		
	function simpanalbum() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["nama_album"]=$this->input->post('nama');
				if($in["nama_album"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->jurnalis_model->Simpan_Artikel("tbl_album_galeri",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/galeri'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editalbum()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_album_galeri","id_album=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_album',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatealbum()
	{
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$in["id_album"]=$this->input->post('id');
				$in["nama_album"]=$this->input->post('nama');
				$this->jurnalis_model->Update_Content("tbl_album_galeri",$in,"id_album");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/galeri'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusalbum()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_album","tbl_album_galeri");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahfoto()
	{
		$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_galeri");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/tambahfoto/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["album"]=$this->jurnalis_model->Tampil_Data("tbl_album_galeri","id_album");
			$data["foto"]=$this->jurnalis_model->Tampil_Data_Terbatas("tbl_galeri","id_foto","left join tbl_album_galeri on tbl_galeri.id_album=tbl_album_galeri.id_album",$offset,
			$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_foto',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanfoto() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$acak=rand(00000000000,99999999999);
					$bersih=$_FILES['userfile']['name'];
					$nm=str_replace(" ","_","$bersih");
					$pisah=explode(".",$nm);
					$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
					$nama_murni=strtolower($nama_murni_lama);
					$ekstensi_kotor = $pisah[1];
					
					$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
					$file_type_baru = strtolower($file_type);
					
					$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
					$n_baru = $ubah.'.'.$file_type_baru;
					$ori_src="system/application/views/main-web/galeri/".strtolower( str_replace(' ','_',$n_baru) );
					$thumb_src="system/application/views/main-web/galeri/thumb/".strtolower( str_replace(' ','_','kecil-'.$n_baru) );
						if(move_uploaded_file ($_FILES['userfile']['tmp_name'],$ori_src))
						{
							chmod("$ori_src",0777);
						}else{
							echo "Gagal melakukan proses upload file.Hal ini biasanya disebabkan ukuran file yang terlalu besar atau koneksi jaringan anda sedang bermasalah";
							exit;
						}
						list($width, $height) = getimagesize($ori_src) ;
						if($height > $width)
							{
								$x_height= 480; 
								$diff = $height / $x_height;
								$x_width = $width / $diff;
								
								$n_height= 98; 
								$diff = $height / $n_height;
								$n_width = $width / $diff;
							}
						else
							{
								$x_width= 640; 
								$diff = $width / $x_width;
								$x_height = $height / $diff;
								
								$n_width= 130; 
								$diff = $width / $n_width;
								$n_height = $height / $diff;
							}
						if(($_FILES['userfile']['type']=="image/jpeg") || ($_FILES['userfile']['type']=="image/png") || ($_FILES['userfile']['type']=="image/gif"))
							{
								$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
								$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
								$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
								$im = false; // If image is not JPEG, PNG, or GIF
								//$im=ImageCreateFromJPEG($ori_src); 
		
			
								if(!$im) 
								{
									echo '<p>Gagal membuat thumnail</p>';
									exit;
								}
								else 
								{	
									$newimage2=@imagecreatetruecolor($x_width,$x_height);                 
									@imageCopyResized($newimage2,$im,0,0,0,0,$x_width,$x_height,$width,$height);
									@ImageJpeg($newimage2,$ori_src);
									chmod("$ori_src",0777);
											
									$newimage=@imagecreatetruecolor($n_width,$n_height);                 
									@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
									@ImageJpeg($newimage,$thumb_src);
									chmod("$thumb_src",0777);
								}
							}
						
		//---------------------------------------------------------------------------------------------------
					$data2['foto_besar'] = $n_baru;
					$data2['foto_kecil'] = 'kecil-'.$n_baru;
					$data2['id_album'] = $this->input->post('album');
				$this->jurnalis_model->Simpan_Artikel("tbl_galeri",$data2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/tambahfoto'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusfoto()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_foto","tbl_galeri");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function upload()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_download");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/upload/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["download"]=$this->jurnalis_model->Tampil_Data("tbl_download","id_download");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/upload',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanupload() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$in["tgl_posting"] = mdate($tgl,$time);
				$in["judul_file"]=$this->input->post('judul');
				$in["author"]=$data["username"];
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in["nama_file"]=$acak.$nm;
				$config['upload_path'] = './download/';
				$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
				$config['max_size'] = '50000';
				$config['max_width'] = '1200';
				$config['max_height'] = '1200';						
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload())
				{
				 echo $this->upload->display_errors();
				}
				else {
				$this->jurnalis_model->Simpan_Artikel("tbl_download",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/upload'>";
				}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editupload()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["download"]=$this->jurnalis_model->Tampil_Data_Terseleksi("tbl_download","id_download",$id);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_upload',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateupload()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$config['upload_path'] = './download/';
				$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
				$config['max_size'] = '10000';
				$config['max_width'] = '400';
				$config['max_height'] = '300';
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in2["nama_file"]=$acak.$nm;					
				$this->load->library('upload', $config);
		
				if(empty($_FILES['userfile']['name'])){
					$in["judul_file"]=$this->input->post('judul');
					$in["id_download"]=$this->input->post('id_download');
					$this->jurnalis_model->Update_Content("tbl_download",$in,"id_download");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/upload'>";
					
				}
				else{
					if(!$this->upload->do_upload())
					{
					 echo $this->upload->display_errors();
					}
					else {
					$in2["judul_file"]=$this->input->post('judul');
					$in2["id_download"]=$this->input->post('id_download');
					$this->jurnalis_model->Update_Content("tbl_download",$in2,"id_download");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/upload'>";
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function absensi()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["kls"]=$this->jurnalis_model->Tampil_Data("tbl_kelas","id_kelas");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/absensi',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function inputabsensi()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["tgl"]=$this->input->post('tgl');
		$data["bln"]=$this->input->post('bln');
		$data["thn"]=$this->input->post('thn');
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["id_kls"]=$this->input->post('kls');
			$data["kls"]=$this->jurnalis_model->Tampil_Data("tbl_kelas","id_kelas");
			$data["nama_siswa"] = $this->jurnalis_model->Tampil_Data_Terseleksi_Join("tbl_siswa","tbl_siswa.id_kelas",$data["id_kls"],"left join tbl_kelas on 
			tbl_siswa.id_kelas=tbl_kelas.id_kelas");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/input_absensi',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpaninput()
	{
		$data = array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$simpan=$this->input->post('simpan');
				$pecah1=explode("|",$simpan);
				$datadetail=array();
				$data=array();
				$data["tgl"]=$this->input->post('tgl');
				$data["bln"]=$this->input->post('bln');
				$data["thn"]=$this->input->post('thn');
				$kelas=$this->input->post('kelas');
				$jumlah=count($pecah1);
				$sis = $this->jurnalis_model->Tampil_Data_Terseleksi_Join("tbl_siswa","tbl_siswa.id_kelas",$kelas,"left join tbl_kelas on 
				tbl_siswa.id_kelas=tbl_kelas.id_kelas");
				$jum = $sis->num_rows();
				for($i=0;$i<count($pecah1);$i++)
				{
				$pecah2=explode("_",$pecah1[$i]);
				$datadetail['id_siswa'][]=$pecah2[0];
				$datadetail['id_kelas'][]=$pecah2[1];
				$datadetail['absen'][]=$pecah2[2];
				}
				$string="insert into tbl_absensi (id_siswa,id_kelas,absen,tanggal,bulan,tahun) values";
				$akhir="";
				for($i=0;$i<$jum;$i++)
				{	
					if($akhir==""){
					$akhir="(".$datadetail['id_siswa'][$i].",".$datadetail['id_kelas'][$i].",'".$datadetail['absen'][$i]."','".$data['tgl']."','".$data['bln']."','".$data['thn'].
					"')";
					}
					else{
					$akhir.=",(".$datadetail['id_siswa'][$i].",".$datadetail['id_kelas'][$i].",'".$datadetail['absen'][$i]."','".$data['tgl']."','".$data['bln']."','".$data['thn']
					."')";
					}
				}
				
				if($jumlah<$jum)
				{
				?>
				<style>
				body{
				background-color:#fff;
				color:#fff;
				}
				</style>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/absensi'>";
					?>
					<script type="text/javascript">
						alert("ERROR...!!! Mohon centang semua absen...!!!");
						javascript:history.go(-1);
					</script>
					<?php
				}
				else{
				$query = $string.$akhir.';';
				$this->jurnalis_model->Simpan_Data($query);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/absensi'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function cekabsen()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["tgl"]=$this->input->post('tgl');
		$data["bln"]=$this->input->post('bln');
		$data["thn"]=$this->input->post('thn');
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["id_kls"]=$this->input->post('kls');
			$data["kls"]=$this->jurnalis_model->Tampil_Data("tbl_kelas","id_kelas");
			$data["absen"] = $this->jurnalis_model->Tampil_Cek_Absen($data["id_kls"],$data["tgl"],$data["bln"],$data["thn"]);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/cek_absen',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editabsen()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["detail"]=$this->jurnalis_model->Edit_Absen($id);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_absen',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateabsen()
	{
		$data = array();
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data2["id_absensi"] = $this->input->post('id');
			$data2["absen"] = $this->input->post('absensi');
			$data2["tanggal"] = $this->input->post('tgl');
			$data2["bulan"] = $this->input->post('bln');
			$data2["tahun"] = $this->input->post('thn');
			$this->jurnalis_model->Update_Content("tbl_absensi",$data2,"id_absensi");
			?>
			<script type="text/javascript">
			javascript:history.go(-2);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hubungi()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["page"]=$page;
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_pesan");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/hubungi/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["pesan"]=$this->jurnalis_model->Tampil_Data_Terbatas("tbl_pesan","id_pesan","",$offset,$limit);
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/hubungi',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function edithubungi()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_pesan","id_pesan=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_hubungi',$data);
			$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatehubungi()
	{
		$data = array();
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data2["id_pesan"] = $this->input->post('id');
			$data2["nama"] = $this->input->post('nama');
			$data2["email"] = $this->input->post('email');
			$data2["pesan"] = $this->input->post('pesan');
			$data2["status"] = $this->input->post('status');
			$this->jurnalis_model->Update_Content("tbl_pesan",$data2,"id_pesan");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/hubungi'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapushubungi()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_pesan","tbl_pesan");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/hubungi'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function wilayah()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["wilayah"] = $this->jurnalis_model->wilayah($offset,$limit);
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_pengumuman");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/wilayah/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/wilayah',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahwilayah()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_wilayah',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanwilayah() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = " %Y-%m-%d";
			$time = time();
			$data2["wilayah"]=$this->input->post('wilayah');
				if(empty($data2["wilayah"]))
				{
					echo "Data Masih Kosong";
				}
				else
				{
					$this->jurnalis_model->Simpan_Artikel("tbl_wilayah",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/wilayah'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editwilayah()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_wilayah","id_wialayah=".$id."");
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_wilayah',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatewilayah()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
				$data2["wilayah"]=$this->input->post('wilayah');
				$this->jurnalis_model->Update_Content("tbl_wilayah",$data2,"id_wilayah");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/wilayah'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuswilayah()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_wilayah","tbl_wilayah");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/wilayah'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function komunitas()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$user = $data["username"];
			$data["berita"] = $this->jurnalis_model->Komunitas($offset,$limit);
			$tot_hal = $this->jurnalis_model->Total_Artikel("tbl_komunitas",$user);
			//$status_app['status'] = $this->jurnalis_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/jurnalisweb/komunitas/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/komunitas',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editkomunitas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["wilayah"]=$this->jurnalis_model->Tampil_Data_Wilayah();
		$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["statis"] = $this->jurnalis_model->Menu_Statis();
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			
			$data["detail"]=$this->jurnalis_model->Edit_Content("tbl_komunitas","id_komunitas=".$id."");
			$data["wilayah"]=$this->jurnalis_model->Tampil_Data_Wilayah();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/edit_komunitas',$data);
			//$this->load->view('jurnalis/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function updatekomunitas()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '400';
			$config['max_height'] = '400';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_berita"]=$this->input->post('judul_berita');
				$data2["isi"]=$this->input->post('isi');
				$data2["id_berita"]=$this->input->post('id_berita');
				$data2["status_app"]=$this->input->post('status');
					$this->jurnalis_model->Update_Content("tbl_berita",$data2,"id_berita");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/berita'>";

			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_berita"]=$this->input->post('judul_berita');
				$data2["isi"]=$this->input->post('isi');
				$data2["id_berita"]=$this->input->post('id_berita');
				$data2["gambar"]=$_FILES['userfile']['name'];
				$data2["status_app"]=$this->input->post('status');
				$this->jurnalis_model->Update_Content("tbl_berita",$data2,"id_berita");
								?>
					<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\2...!!!");
				</script>
				<?php
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/berita'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahkomunitas()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	    $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$data["imglist"]=$this->jurnalis_model->getDataGambar();
			$data["wilayah"]=$this->jurnalis_model->Tampil_Data_Wilayah();
			$this->load->view('jurnalis/bg_atas',$data);
			$this->load->view('jurnalis/tambah_komunitas',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpankomunitas() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('kegiatan');
			$data2["nama"]=$this->input->post('nama');
			$data2["kegiatan"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["keterangan"] = $this->input->post('keterangan');
			$data2["wilayah"] = $this->input->post('wilayah');
				if(empty($content) && empty($data2["nama"]))
				{	
			
					echo "Data Masih Kosong";
				}
				else{
					$config['upload_path'] = './system/application/views/main-web/berita/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '1000';
					$config['max_width'] = '400';
					$config['max_height'] = '400';						
					$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
					$data2["photo"]= "welcome.jpg";
					$this->jurnalis_model->Simpan_Artikel("tbl_komunitas",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/komunitas'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["photo"]=$_FILES['userfile']['name'];
						$this->jurnalis_model->Simpan_Artikel("tbl_komunitas",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/komunitas'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuskomunitas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	  $data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="jurnalis"){
			$this->jurnalis_model->Delete_Content($id,"id_komunitas","tbl_komunitas");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalisweb/komunitas'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel jurnalis...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	
	
//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/jurnalisweb/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	}
	
	
	
	private function reloadPage($reloadURL)
	{
		echo 
			'<html>
			<head>
			</head>
			<body>
			<script languange="javascript">
			document.location = \''.base_url().'index.php/jurnalisweb/'.$reloadURL.'\'
			</script>
			</body>
			</html>';
	} 	
}









?>
