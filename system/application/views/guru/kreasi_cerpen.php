<div id="kiri"><h2>Module cerpen</h2>
<div id="isi">
<br>
<a href="<?php echo base_url(); ?>index.php/guru/tambah_kreasi_cerpen"><div class="pagingpage">+ Tambah Cerpen</div></a>
<table width="750" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul Cerpen</strong></td><td><strong>Tanggal</strong></td><td><strong>Jam</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
$no=$page+1;
if(count($cerpen->result())>0){
foreach($cerpen->result_array() as $s)
{
       
			if(($no%2)==0){
				$warna="#C8E862";
			} else{
				$warna="#D6F3FF";
			}
			
			
        echo "<tr bgcolor='".$warna."'><td align='center'>".$no."</td><td>".$s['judul_kreasi']."</td><td>".$s['tanggal_kreasi']."</td><td>".$s['waktu_kreasi']."</td><td>
        <a href='".base_url()."index.php/guru/edit_kreasi_cerpen/".$s['id_kreasi']."' title='Edit Berita'><img src='".base_url()."system/application/views/guru/images/edit-icon.gif' border='0'></a></td>
        <td><a href='".base_url()."index.php/guru/hapusberita/".$s['id_kreasi']."' onClick=\"return confirm('Anda yakin ingin menghapus tutorial ini?')\" title='Hapus Pengumuman'><img src='".base_url()."system/application/views/guru/images/hapus-icon.gif' border='0'></a></td>
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
