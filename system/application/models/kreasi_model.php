<?php
class Kreasi_model extends Model
	{
		function Kreasi_model()
		{
			parent::Model();
		}
		function Kreasipuisi($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='1' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasipuisi($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		function Kreasicerpen($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='2' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasicerpen($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='2'");
			return $q;
		}
		function Kreasihoror($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='3' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasipantun($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='4'");
			return $q;
		}
		function Kreasipantun($offset,$limit)
		{
			$q=$this->db->query("select * from tbl_kreasi where category_kreasi ='4' order by id_kreasi DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Kreasihoror($tabel)
		{
			$q=$this->db->query("select * from $tabel where category_kreasi ='3'");
			return $q;
		}
		function Status_App($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		function getDataGambar() 
		{
			$query=$this->db->query("select * from tbl_gambar");
			return $query;
		}
		function Edit_Content($tabel,$seleksi)
		{
			$query=$this->db->query("select * from $tabel where $seleksi");
			return $query;
		}
		function Update_Content($tabel,$isi,$seleksi)
		{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
		}
		function Delete_Content($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
		}
		function Simpan_Artikel($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
	}
		
?>