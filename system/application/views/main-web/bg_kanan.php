<div id="content-kanan">

<div id="bg-judul">JAJAK PENDAPAT</div>
<div id="isi-side">
<form method="post" action="<?php echo base_url(); ?>index.php/web/hasilpolling">
<?php
foreach($soal_polling->result_array() as $soal)
	{
		echo "<input type='hidden' name='id_soal' value='".$soal['id_soal_poll']."'>";
		echo "<h4><b>".$soal['soal_poll']."</b></h4>";
	}
?>

<?php
foreach($jawaban_polling->result_array() as $jawaban)
	{
		echo "<span><input type='radio' name='polling' value='".$jawaban['id_jawaban_poll']."' class='radio-class'> ".$jawaban['jawaban']."</span><br>";
	}
?>
<br /><span style="padding-left:25px;"><input type="submit" value="Pilih" class="poll" /></span>
<a href="<?php echo base_url(); ?>index.php/web/lihathasil"><span class="poll">Lihat Hasil Polling</span></a></span><br />
</form>
</div>
<div id="bg-bawah-judul"></div> 

<div id="bg-judul">PENGUMUMAN TERBARU</div>
<div id="isi-side">
<ul>
<?php
foreach($umum->result_array() as $u)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailpengumuman/".$u['id_pengumuman']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$u['judul_pengumuman']."</a></li>";
}
?>
</ul><br />
<div class="submitButton">Lihat Semua Pengumuman</div>
</div>
<div id="bg-bawah-judul"></div> 

<div id="bg-judul">AGENDA SEKOLAH TERBARU</div>
<div id="isi-side">
<ul>
<?php
foreach($agenda->result_array() as $agenda)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailagenda/".$agenda['id_agenda']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$agenda['tema_agenda']."</a></li>";
}
?>
</ul><br />
<div class="submitButton">Lihat Semua Agenda</div>
</div>
<div id="bg-bawah-judul"></div> 

<div id="bg-judul">STATISTIK PENGUNJUNG</div>
<div id="isi-side">
<ul>
<li class="li-class">
<?php
	foreach($counter_pengunjung->result_array() as $c)
	{
		echo "Dikunjungi oleh : <b>".$c['content']."</b> user";
	}
?>
</li>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
<li class="li-class">IP address :  <b><?php echo $ip; ?></b></li>
<li class="li-class">OS : <b><?php echo $os; ?></b></li>
<li class="li-class">Browser : <b><?php echo $browser; ?></b></li>
</ul>
</div>
<div id="bg-bawah-judul"></div> 

</div>

</div>
