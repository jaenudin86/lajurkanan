<?php
class Kreasi extends Controller {

	function Kreasi()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		$this->load->plugin();
		$this->load->model(array('Web_model', 'Kreasi_model'));
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
			if($data["status"]=="admin"){
			$this->load->view('admin/bg_atas',$data);
			//$this->load->view('admin/isi_index',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function Kreasipuisi()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["kreasi"] = $this->Kreasi_model->Kreasipuisi($offset,$limit);
			$tot_hal = $this->Kreasi_model->Total_Kreasipuisi("tbl_kreasi");
			$status_app['status'] = $this->Kreasi_model->Status_App("tbl_kreasi");
			$config['base_url'] = base_url() . '/index.php/kreasi/Kreasipuisi/';
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/kreasi_puisi',$data,$status_app);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function Kreasicerpen()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["kreasi"] = $this->Kreasi_model->Kreasicerpen($offset,$limit);
			$tot_hal = $this->Kreasi_model->Total_Kreasicerpen("tbl_kreasi");
			$status_app['status'] = $this->Kreasi_model->Status_App("tbl_kreasi");
			$config['base_url'] = base_url() . '/index.php/kreasi/Kreasipuisi/';
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/kreasi_cerpen',$data,$status_app);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkreasicerpen()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			//$data["imglist"]=$this->Kreasi_model()->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kreasi_cerpen',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankreasicerpen() 
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
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('content');
			$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
			$data2["isi_kreasi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal_kreasi"] = mdate($tgl,$time);
			$data2["waktu_kreasi"] = mdate($jam,$time);
			$data2["author"] = $data["username"];
			$data2["counter"] = "1";
			$data2["status_app"] = $this->input->post('Status');
			$data2["category_kreasi"] = "2"; // puisi
				if(empty($content) && empty($data2["judul_kreasi"]) && empty($data2["isi_kreasi"]))
				{
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
					$data2["gambar_kreasi"]= "welcome.jpg";
					$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasicerpen'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar_kreasi"]=$_FILES['userfile']['name'];
						$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasicerpen'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkreasicerpen()
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
			if($data["status"]=="admin"){
			// $data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Kreasi_model->getDataGambar();
			$data["detail"]=$this->Kreasi_model->Edit_Content("tbl_kreasi","id_kreasi=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kreasi_cerpen',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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

	function editkreasipuisi()
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
			if($data["status"]=="admin"){
			// $data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Kreasi_model->getDataGambar();
			$data["detail"]=$this->Kreasi_model->Edit_Content("tbl_kreasi","id_kreasi=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kreasi_puisi',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekreasicerpen()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Kreasi_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasicerpen'>";
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Admin_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasicerpen'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function updatekreasipuisi()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Kreasi_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasipuisi'>";
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Admin_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasipuisi'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function tambahkreasipuisi()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			//$data["imglist"]=$this->Kreasi_model()->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kreasi_puisi',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function simpankreasipuisi() 
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
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('content');
			$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
			$data2["isi_kreasi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal_kreasi"] = mdate($tgl,$time);
			$data2["waktu_kreasi"] = mdate($jam,$time);
			$data2["author"] = $data["username"];
			$data2["counter"] = "1";
			$data2["status_app"] = $this->input->post('Status');
			$data2["category_kreasi"] = "1"; // puisi
				if(empty($content) && empty($data2["judul_kreasi"]) && empty($data2["isi_kreasi"]))
				{
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
					$data2["gambar_kreasi"]= "welcome.jpg";
					$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasipuisi'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar_kreasi"]=$_FILES['userfile']['name'];
						$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasipuisi'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function hapusKreasi()
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
			if($data["status"]=="admin"){
			$this->Kreasi_model->Delete_Content($id,"id_kreasi","tbl_kreasi");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
function Kreasihoror()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["kreasi"] = $this->Kreasi_model->Kreasihoror($offset,$limit);
			$tot_hal = $this->Kreasi_model->Total_Kreasihoror("tbl_kreasi");
			$status_app['status'] = $this->Kreasi_model->Status_App("tbl_kreasi");
			$config['base_url'] = base_url() . '/index.php/kreasi/Kreasipuisi/';
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/kreasi_horor',$data,$status_app);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkreasihoror()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			//$data["imglist"]=$this->Kreasi_model()->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kreasi_horor',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankreasihoror() 
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
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('content');
			$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
			$data2["isi_kreasi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal_kreasi"] = mdate($tgl,$time);
			$data2["waktu_kreasi"] = mdate($jam,$time);
			$data2["author"] = $data["username"];
			$data2["counter"] = "1";
			$data2["status_app"] = $this->input->post('Status');
			$data2["category_kreasi"] = "3"; // puisi
				if(empty($content) && empty($data2["judul_kreasi"]) && empty($data2["isi_kreasi"]))
				{
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
					$data2["gambar_kreasi"]= "welcome.jpg";
					$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasihoror'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar_kreasi"]=$_FILES['userfile']['name'];
						$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasihoror'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkreasihoror()
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
			if($data["status"]=="admin"){
			// $data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Kreasi_model->getDataGambar();
			$data["detail"]=$this->Kreasi_model->Edit_Content("tbl_kreasi","id_kreasi=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kreasi_horor',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekreasihoror()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '4000';
			$config['max_height'] = '4000';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Kreasi_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasihoror'>";
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Admin_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasihoror'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
		
	function Kreasipantun()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["kreasi"] = $this->Kreasi_model->Kreasipantun($offset,$limit);
			$tot_hal = $this->Kreasi_model->Total_Kreasipantun("tbl_kreasi");
			$status_app['status'] = $this->Kreasi_model->Status_App("tbl_kreasi");
			$config['base_url'] = base_url() . '/index.php/kreasi/Kreasipantun/';
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/kreasi_pantun',$data,$status_app);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkreasipantun()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			//$data["imglist"]=$this->Kreasi_model()->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kreasi_pantun',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankreasipantun() 
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
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();	
			$content=$this->input->post('content');
			$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
			$data2["isi_kreasi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal_kreasi"] = mdate($tgl,$time);
			$data2["waktu_kreasi"] = mdate($jam,$time);
			$data2["author"] = $data["username"];
			$data2["counter"] = "1";
			$data2["status_app"] = $this->input->post('Status');
			$data2["category_kreasi"] = "4"; // puisi
				if(empty($content) && empty($data2["judul_kreasi"]) && empty($data2["isi_kreasi"]))
				{
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
					$data2["gambar_kreasi"]= "welcome.jpg";
					$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasipantun'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar_kreasi"]=$_FILES['userfile']['name'];
						$this->Kreasi_model->Simpan_Artikel("tbl_kreasi",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kreasi/Kreasipantun'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkreasipantun()
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
			if($data["status"]=="admin"){
			// $data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Kreasi_model->getDataGambar();
			$data["detail"]=$this->Kreasi_model->Edit_Content("tbl_kreasi","id_kreasi=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kreasi_pantun',$data);
			//$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekreasipantun()
	{
		$data2 = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$config['upload_path'] = './system/application/views/main-web/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '400';
			$config['max_height'] = '400';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Kreasi_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasipantun'>";
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_kreasi"]=$this->input->post('judul_kreasi');
				$data2["isi_kreasi"]=$this->input->post('isi_kreasi');
				$data2["id_kreasi"]=$this->input->post('id_kreasi');
				$data2["tanggal_kreasi"]=$this->input->post('tanggal_kreasi');
				$data2["status_app"]=$this->input->post('status_app');
				$this->Admin_model->Update_Content("tbl_kreasi",$data2,"id_kreasi");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kreasi/Kreasipantun'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
		external_image_list_url : "'.base_url().'index.php/adminweb/image_list/",
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
			document.location = \''.base_url().'index.php/adminweb/'.$reloadURL.'\'
			</script>
			</body>
			</html>';
	} 	
	}

	
?>