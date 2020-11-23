<!DOCTYPE html>
<html>
<head>
	<title>Cara Membuat Visitor Counter (Menghitung Jumlah Pengunjung) Menggunakan PHP MySQL</title>
	<style type="text/css">
		.container{margin: auto; width: 550px;}
		h3{text-align: center}
		td{text-align: center;}
		p{font-weight: bold; color: red}
		.table1{margin-bottom: 10px;}
	</style>
</head>
<body>
<?php
 session_start();
 include "fungsi.php"; 
?>
<div class="container">
	<header>
		<h3>Cara Membuat Visitor Counter (Menghitung Jumlah Pengunjung) Menggunakan PHP MySQL</h3>
	</header>
	<article>
// untuk mengetahui pengunjung pada saat ini
<table border="1" cellspacing="0" class="table1">
	<tr>
		<th>Browser</th>
		<th>Ip</th>
		<th>Jml Pegunjung Hari ini</th>
		<th>Jml Pengunjung Kemaren</th>
		<th>Total pengunjung</th>
	</tr>
 
	<tr>
		<td>
			<?php 
			 switch($browser){
			 case "Firefox" : echo "".$browser.""; 
			 	break;
			 case "Chrome/Opera" : echo "".$browser.""; 
			 	break;
			 case "IE" : echo "".$browser.""; 
			 	break;
			 } ?>
		</td>
		<td>
			<?php echo "".$_SERVER['REMOTE_ADDR']."";?>
		</td>
		<td>
			 <p><?php echo "".$hari_ini['hari_ini'].""; ?></p>
		</td>
		<td>
			<p><?php echo "".$kemarin['kemarin'].""; ?></p>
		</td>
		<td>
			<p><?php echo "".$sql['total']."";?></p>
		</td>
	</tr>
</table>
 
//untuk menampilkan data dari database
<table border ="1" class="table2" cellspacing="0">
	<tr>
		<th>No</th>
		<th>id</th>
		<th>tanggal</th>
		<th>Browser</th>
		<th>Jml Pegunjung</th>
		
	</tr>
 
	<?php $no=0; ?>
	<?php $sql="SELECT * FROM counterdb";
		  $sqli=mysqli_query($connection,$sql);
 
		  $total = mysqli_fetch_array(mysqli_query($connection,'SELECT sum(counter) as jumlah FROM counterdb'));
	 ?>
	 <?php while ($tampil=mysqli_fetch_array($sqli)) {  ?>
	 <?php $no++;?>
	<tr>
		<td>
			<?php echo "$no"; ?>
		</td>
		<td>
			<?php echo "$tampil[id]";?>
		</td>
		<td>
			<?php echo "$tampil[tanggal]";?>
		</td>
		<td>
			<?php echo "$tampil[browser]";?>
		</td>
		<td>
			<?php echo "$tampil[counter]";?>
		</td>
		<?php }?>
	</tr>
	<td colspan="4"> Total</td>
	<td>
			<p><?php echo "".$total['jumlah']."";?></p>
		</td>
</table>
	</article>
</div>
</body>
</html>