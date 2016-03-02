<?php
class Web_model extends Model
	{
		function Web_model()
		{
			parent::Model();
		}
		function Side_Ekspresi()
		{
			$q=$this->db->query("select * from tbl_kreasi order by counter DESC limit 1 ");
			return $q;
		}		
		function Side_Ekspresifour()
		{
			$q=$this->db->query("select * from tbl_kreasi order by counter DESC limit 6 ");
			return $q;
		}
		function Side_Pengumuman()
		{
			$q=$this->db->query("select * from tbl_pengumuman order by id_pengumuman DESC limit ");
			return $q;
		}
		function Kawasan_news()
		{
			$q=$this->db->query("select * from tbl_berita order by counter DESC limit 1");
			return $q;
		}
		function Side_komunitas()
		{
			$q=$this->db->query("select * from tbl_komunitas order by id_komunitas DESC limit 1");
			return $q;
		}
		function Side_Agenda()
		{
			$q=$this->db->query("select * from tbl_agenda order by id_agenda DESC limit 5");
			return $q;
		}
		function Detail_Agenda($id_agenda)
		{
			$q=$this->db->query("select * from tbl_agenda where id_agenda='$id_agenda'");
			return $q;
		}
		function Detail_Pengumuman($id_pengumuman)
		{
			$q=$this->db->query("select * from tbl_pengumuman where id_pengumuman='$id_pengumuman'");
			return $q;
		}
		function Tampil_Polling()
		{
			$q=$this->db->query("select * from tbl_soalpolling where status='Y'");
			return $q;
		}
		function Tampil_Jwb_Poll($id_soal)
		{
			$q=$this->db->query("select * from tbl_jawabanpoll where id_soal_poll='$id_soal'");
			return $q;
		}
		function Berita_Home()
		{
			$q=$this->db->query("select * from tbl_berita where status_app='02'");
			return $q;
		}
		function Berita_judul()
		{
			$q=$this->db->query("select isi from tbl_berita where status_app='02'");
			return $q;
		}
		function Kepegawaian($limit,$ofset,$status)
		{
			$q=$this->db->query("select * from tbl_kepegawaian where status='$status' order by id_kepegawaian ASC limit $ofset,$limit");
			return $q;
		}
		function Total_Kepegawaian($status)
		{
			$q=$this->db->query("select * from tbl_kepegawaian where status='$status' order by id_kepegawaian ASC");
			return $q;
		}
		function Semua_Berita($limit,$ofset)
		{
			$q=$this->db->query("select * from tbl_berita where status_app='02' order by id_berita DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Berita()
		{
			$q=$this->db->query("select * from tbl_berita order by id_berita DESC");
			return $q;
		}
		function Semua_Pengumuman($limit,$ofset)
		{
			$q=$this->db->query("select * from tbl_pengumuman order by id_pengumuman DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Pengumuman()
		{
			$q=$this->db->query("select * from tbl_pengumuman order by id_pengumuman DESC");
			return $q;
		}
		function Semua_Agenda($limit,$ofset)
		{
			$q=$this->db->query("select * from tbl_agenda order by id_agenda DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Agenda()
		{
			$q=$this->db->query("select * from tbl_agenda order by id_agenda DESC");
			return $q;
		}
		function Menu_Atas()
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='0' and level='0'");
			return $q;
		}
		function Sub_Menu_Atas($id_parent,$level)
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='$id_parent' and level='$level'");
			return $q;
		}
		function Menu_Bawah()
		{
			$q=$this->db->query("SELECT * from tbl_menu where id_parent='0' and level=10");
			return $q;
		}
		function Data_Statis($id)
		{
			$q=$this->db->query("select * from tbl_data left join tbl_menu on tbl_data.data_id=tbl_menu.id where data_id='$id'");
			return $q;
		}
		function Update_Pengunjung()
		{
			$query_update=$this->db->query("update tbl_berita set counter=counter+1 where id_berita='counter'");
			return $query_update;
		}
		function Update_Pengunjungberita($berita)
		{
			$query_update=$this->db->query("update tbl_berita set counter=counter+1 where id_berita='".$berita."'");
			return $query_update;
		}
		function Counter_Pengunjung()
		{
			$q=$this->db->query("select * from tbl_data where data_id='counter'");
			return $q;
		}
		function Detail_Berita($id)
		{
			$q=$this->db->query("select * from tbl_berita where id_berita='$id'");
			return $q;
		}
		function Update_Polling($id_poll)
		{
			$query_update=$this->db->query("update tbl_jawabanpoll set counter=counter+1 where id_jawaban_poll='$id_poll'");
			return $query_update;
		}
		function Kelas()
		{
			$q=$this->db->query("select * from tbl_kelas order by id_kelas ASC");
			return $q;
		}
		function Nama_Siswa($kls)
		{
			$q=$this->db->query("select * from tbl_siswa left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas='$kls' order by tbl_siswa.id_siswa 
			ASC");
			return $q;
		}
		function Album_Galeri($limit,$ofset)
		{
			$q=$this->db->query("select * from tbl_album_galeri order by id_album DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Album()
		{
			$q=$this->db->query("select * from tbl_album_galeri order by id_album DESC");
			return $q;
		}
		function Total_Galeri($id)
		{
			$q=$this->db->query("select * from tbl_galeri where id_album='$id'");
			return $q;
		}
		function Detail_Galeri($id_album,$offset,$limit)
		{
			$q=$this->db->query("select * from tbl_galeri left join tbl_album_galeri on tbl_galeri.id_album=tbl_album_galeri.id_album where tbl_galeri.id_album='$id_album' limit 
			$offset,$limit");
			return $q;
		}
		function Tampil_Galeri()
		{
			$q=$this->db->query("select * from tbl_galeri left join tbl_album_galeri on tbl_galeri.id_album=tbl_album_galeri.id_album order by id_foto DESC limit 8");
			return $q;
		}
		function Total_Download()
		{
			$q=$this->db->query("select * from tbl_download");
			return $q;
		}
		function Semua_Download($limit,$offset)
		{
			$q=$this->db->query("select * from tbl_download left join tbl_kepegawaian on tbl_download.author=tbl_kepegawaian.username order by id_download DESC limit $offset,$limit");
			return $q;
		}
		function Berita_Acak($id_berita)
		{
			$query_berita=$this->db->query("SELECT * from tbl_berita where id_berita!='$id_berita' order by RAND() LIMIT 5");
			return $query_berita;
		}
		function Insert_Pesan($datainsert) 
		{
			$this->db->insert('tbl_pesan',$datainsert);
		}
		function Data_Login($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from tbl_kepegawaian where username='$user_bersih' and password=md5('$pass_bersih')");
			return $query;
		}
		function Berita($offset,$limit)
		{
			$q=$this->db->query("select id_berita, judul_berita, isi, gambar, tanggal, waktu, author, counter, status_app,wilayah as kawasan  from tbl_berita inner  join tbl_wilayah on tbl_berita.kawasan   = tbl_wilayah.id_wialayah where status_app='02' order by id_berita DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Artikel($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		function Kreasipuisi($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='1' and status_app='01' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasipuisi($tabel)
		{
			$q=$this->db->query("select * from $tabel where status_app='01'");
			return $q;
		}
		function Detail($table,$where,$id)
		{
			$q=$this->db->query("select * from $table where $where='$id'");
			return $q;
		}
		function Kreasicerpen($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='2' and status_app='01' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasicerpen($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='2' and status_app='01'");
			return $q;
		}
		function Kreasihoror($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='3' and status_app='01' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasihoror($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='3' and status_app='01'");
			return $q;
		}
		function Kreasipantun($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='4' and status_app='01' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasipantun($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='4' and status_app='01'");
			return $q;
		}
		function komunitas($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_komunitas  order by id_komunitas DESC LIMIT $offset,$limit");
			return $q;	
		}
		function Total_Komunitas($tabel)
		{
			$q=$this->db->query("select * from $tabel ");
			return $q;
		}
	}
?>
