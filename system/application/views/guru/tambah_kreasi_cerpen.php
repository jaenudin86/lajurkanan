<div id="kiri"><h2>Module Tambah Cerpen</h2>
<div id="isi">
<h1>Tambah Cerpen</h1><br />
<?php echo form_open_multipart('guru/simpan_kreasi_cerpen');?>
<table width="610" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small"><tr>
<td width="150">Judul</td><td>:</td><td><input type="text" name="judul" class="textfield" size="100"/></td></tr>
<tr><td>Isi</td><td>:</td><td><textarea name="content"></textarea></td></tr>
<tr><td></td><td></td><td><input type="file" name="userfile" size="40"/></td>	</tr>
<tr><td></td><td></td><td><input type="submit"  value="Simpan Data" class="input"/></td>	</tr>
</table>
            