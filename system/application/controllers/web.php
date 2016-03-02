<?php

class Web extends Controller {

	function Web()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','user_agent'));
		$this->load->plugin();
		$this->load->model('Web_model');
		session_start();	
	}
	function index()
	{
		$data=array();
		//$data["menu"] = $this->Web_model->Menu_Atas();
		//$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		//$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["kawasan_news"] = $this->Web_model->Kawasan_news();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["komunitas"] = $this->Web_model->Side_komunitas();
		$data["expresi"] = $this->Web_model->Side_Ekspresi();
		$data["expresifour"] = $this->Web_model->Side_Ekspresifour();
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		//$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		//$data["os"] = $this->agent->platform();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index',$data);
		$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	
		//$this->load->view('main-web/bg_bawah',$data);
	}

	function berita()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->Web_model->Berita($offset,$limit);
			$tot_hal = $this->Web_model->Total_Artikel("tbl_berita");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/berita/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_berita',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function beritadetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail_Berita($id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/berita_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
		
	
	function login()
	{
		$data=array();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjung();
		}
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Polling($id_soal);
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["menu_bawah"] = $this->Web_model->Menu_Bawah();
		$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["umum"] = $this->Web_model->Side_Pengumuman();
		$data["agenda"] = $this->Web_model->Side_Agenda();
		$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
//$this->load->view('main-web/bg_atas',$data);
		//$this->load->view('main-web/bg_kiri');
		$this->load->view('main-web/login',$data);
		//$this->load->view('main-web/bg_kanan',$data);
		//$this->load->view('main-web/bg_bawah',$data);
		
	}
	function masuklogin()
	{
		$username = $this->input->post('user');
		$pwd = $this->input->post('pass');
		$hasil = $this->Web_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama_pegawai."|".$items->status;
				$tanda=$items->status;
			}
			$_SESSION['username_belajar']=$session_username;
			if($tanda=="admin"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb'>";
			}
			else if($tanda=="Jurnalis"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/jurnalis'>";
			}
			else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Jurnalis'>";
			}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/web/login'>";
		}
	}
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}
	function puisi()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["puisi"] = $this->Web_model->Kreasipuisi($offset,$limit);
			$tot_hal = $this->Web_model->Total_Kreasipuisi("tbl_kreasi");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/puisi/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_puisi',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function puisidetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail('tbl_kreasi','id_kreasi',$id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/puisi_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function cerpen()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["cerpen"] = $this->Web_model->Kreasicerpen($offset,$limit);
			$tot_hal = $this->Web_model->Total_Kreasicerpen("tbl_kreasi");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/cerpen/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_cerpen',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function cerpendetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail('tbl_kreasi','id_kreasi',$id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/cerpen_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function horor()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["horor"] = $this->Web_model->Kreasihoror($offset,$limit);
			$tot_hal = $this->Web_model->Total_Kreasihoror("tbl_kreasi");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/horor/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_horor',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function horordetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail('tbl_kreasi','id_kreasi',$id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/horor_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function pantun()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["pantun"] = $this->Web_model->Kreasipantun($offset,$limit);
			$tot_hal = $this->Web_model->Total_Kreasipantun("tbl_kreasi");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/pantun/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_pantun',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function pantundetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail('tbl_kreasi','id_kreasi',$id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/pantun_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}

	function komunitas()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
			$page=$this->uri->segment(3);
      		$limit=5;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["komunitas"] = $this->Web_model->komunitas($offset,$limit);
			$tot_hal = $this->Web_model->Total_Komunitas("tbl_komunitas");
			//$status_app['status'] = $this->Admin_model->Status_App("tbl_berita");
			$config['base_url'] = base_url() . '/index.php/web/pantun/';
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
			
		//$data["soal_polling"] = $this->Web_model->Tampil_Polling();
		//$soal_poll = $data["soal_polling"];
		//foreach($soal_poll->result() as $soal)
			//{
				//$id_soal=$soal->id_soal_poll;
			//}
		//$data["jawaban_polling"] = $this->Web_model->Tampil_Jwb_Poll($id_soal);
		//$data["cuplikan_galeri"] = $this->Web_model->Tampil_Galeri();
		$data["berita_home"] = $this->Web_model->Berita_Home();
		//$data["berita_index"] = $this->Web_model->Berita_Home();
		$data["judul"] = $this->Web_model->Berita_judul();
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/index_komunitas',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}
	function komunitasdetail()
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data=array();
		$data["menu"] = $this->Web_model->Menu_Atas();
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		$data["detail_berita"] = $this->Web_model->Detail('tbl_komunitas','id_komunitas',$id);
		setcookie("pengunjung", "sudah berkunjung", time() + 900 * 24);
		if (!isset($_COOKIE["pengunjung"])) {
			$this->Web_model->Update_Pengunjungberita($id);
		}
		$this->load->view('globalnews/bagianatas');
			
		$this->load->view('globalnews/komunitas_detail',$data);
		//$this->load->view('globalnews/bagiankiri');
		//$this->load->view('globalnews/bagiankanan',$data);
		$this->load->view('globalnews/Footer',$data);
	}	
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
