<div id="kiri"><h2>Module Berita</h2>
<div id="isi">
<br>
<a href="<?php echo base_url(); ?>index.php/guru/tambahberita"><div class="pagingpage">+ Tambah Cerpen</div></a>
<table width="750" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul Cerpen</strong></td><td><strong>Tanggal</strong></td><td><strong>Jam</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
$no=$page+1;
if(count($berita->result())>0){
foreach($berita->result_array() as $s)  
{
       
			if(($no%2)==0){
				$warna="#C8E862";
			} else{
				$warna="#D6F3FF";
			}
			
			
        echo "<tr bgcolor='".$warna."'><td align='center'>".$no."</td><td>".$s['judul_berita']."</td><td>".$s['tanggal']."</td><td>".$s['waktu']."</td><td>
        <a href='".base_url()."index.php/guru/editberita/".$s['id_berita']."' title='Edit Berita'><img src='".base_url()."system/application/views/guru/images/edit-icon.gif' border='0'></a></td>
        <td><a href='".base_url()."index.php/guru/hapusberita/".$s['id_berita']."' onClick=\"return confirm('Anda yakin ingin menghapus tutorial ini?')\" title='Hapus Pengumuman'><img src='".base_url()."system/application/views/guru/images/hapus-icon.gif' border='0'></a></td>
        </td></tr>";
        $no++;
        
}
}
else{
echo "<tr><td colspan='5'>Anda belum pernah menuliskan pengumuman</td></tr>";
}
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</table><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

</div>
</div>





