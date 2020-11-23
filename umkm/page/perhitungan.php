<div class="container">
	<?php
          if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
            $connection->query("UPDATE nilai SET status='LOLOS' WHERE nim='$_GET[key]'");
            echo alert("Berhasil!", "perhitungan.php");
          }
          ?>
<div class="row">
	<div class="col-md-12">
	<?php if (isset($_GET["kategori"])) {
		$nm  = "$_GET[kategori]";
		$sqlKriteria = "";
		$namaKriteria = [];
		$queryKriteria = $connection->query("SELECT a.kd_kriteria, a.nama FROM kriteria a JOIN model b USING(kd_kriteria) WHERE b.kd_beasiswa=$_GET[kategori]");
		while ($kr = $queryKriteria->fetch_assoc()) {
			$sqlKriteria .= "SUM(
				IF(
					c.kd_kriteria=".$kr["kd_kriteria"].",
					IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization/nilai.nilai), 0
				)
			) AS ".strtolower(str_replace(" ", "_", $kr["nama"])).",";
			$namaKriteria[] = strtolower(str_replace(" ", "_", $kr["nama"]));
		}
		$sql = "SELECT
			(SELECT nama FROM mahasiswa WHERE nim=mhs.nim) AS nama,
			(SELECT nim FROM mahasiswa WHERE nim=mhs.nim) AS nim,
			(SELECT tahun_mengajukan FROM mahasiswa WHERE nim=mhs.nim) AS tahun,
			$sqlKriteria
			SUM(
				IF(
						c.sifat = 'max',
						nilai.nilai / c.normalization,
						c.normalization / nilai.nilai
				) * c.bobot
			) AS rangking
		FROM
			nilai
			JOIN mahasiswa mhs USING(nim)
			JOIN (
				SELECT
						nilai.kd_kriteria AS kd_kriteria,
						kriteria.sifat AS sifat,
						(
							SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND kd_beasiswa=beasiswa.kd_beasiswa
						) AS bobot,
						ROUND(
							IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)), 1
						) AS normalization
					FROM nilai
					JOIN kriteria USING(kd_kriteria)
					JOIN beasiswa ON kriteria.kd_beasiswa=beasiswa.kd_beasiswa
					WHERE beasiswa.kd_beasiswa=$_GET[kategori]
				GROUP BY nilai.kd_kriteria
			) c USING(kd_kriteria)
		WHERE kd_beasiswa=$_GET[kategori]
		GROUP BY nilai.nim
		ORDER BY rangking DESC"; ?>
	  <div class="panel panel-info" style="border-color: #ffc107;">
	      <div class="panel-heading" style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;" ><?php $query = $connection->query("SELECT * FROM beasiswa WHERE kd_beasiswa=$_GET[kategori]"); echo $query->fetch_assoc()["nama"]; ?></h2></h3></div>
	      <div class="panel-body">
	      	

	      	
	          <table id="datatablein" class="table table-bordered table-striped display nowrap" style="width:100%">
	              <thead>
	                  <tr>
	                  		<th>Rank</th>
							<th>NIM</th>
							<th>Nama</th>
							<?php //$query = $connection->query("SELECT nama FROM kriteria WHERE kd_beasiswa=$_GET[beasiswa]"); while($row = $query->fetch_assoc()): ?>
								<!-- <th><?//=$row["nama"]?></th> -->
							<?php //endwhile ?>
							<th>Files</th>
							<th>Nilai</th>
							
	                  </tr>
	              </thead>
	              <tbody>
	              	<?php $no = 1; ?>
					<?php $query = $connection->query($sql); while($row = $query->fetch_assoc()): ?>
					<?php
					$rangking = number_format((float) $row["rangking"], 8, '.', '');
					$q = $connection->query("SELECT nim FROM hasil WHERE nim='$row[nim]' AND kd_beasiswa='$_GET[kategori]' AND tahun='$row[tahun]'");
					if (!$q->num_rows) {
					$connection->query("INSERT INTO hasil VALUES(NULL, '$_GET[kategori]', '$row[nim]', '".$rangking."', '$row[tahun]')");
					}
					?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$row["nim"]?></td>
						<td><?=$row["nama"]?></td>
						<?php for($i=0; $i<count($namaKriteria); $i++): ?>
						<!-- <th><?//=number_format((float) $row[$namaKriteria[$i]], 8, '.', '');?></th> -->
						<?php endfor ?>
						<td><?=$rangking?></td>
						<td><a href='verifikasi.php?action=pilih&key=<?=$row['nim']?>&nm=$_GET[kategori]' class="btn btn-success btn-xs">PILIH</a></td>
					</tr>
					<?php endwhile;?>
	              </tbody>
	          </table>
	      </div>
	  </div>
	<?php } else { ?>
		<h1>Beasiswa belum dipilih...</h1>
	<?php } ?>
	</div>
</div>
</div>
