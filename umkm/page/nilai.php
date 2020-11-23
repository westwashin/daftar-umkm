<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM nilai JOIN penilaian USING(kd_kriteria) WHERE kd_nilai='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["save"])) {
	$validasi = false; $err = false;
	if ($update) {
		$sql = "UPDATE nilai SET kd_kriteria='$_POST[kd_kriteria]', nim='$_POST[nim]', nilai='$_POST[nilai]' WHERE kd_nilai='$_GET[key]'";
	} else {
		$query = "INSERT INTO nilai VALUES ";
		foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
			$query .= "(NULL, '$_POST[kd_beasiswa]', '$kd_kriteria', '$_POST[nim]', '$nilai'),";
		}
		$sql = rtrim($query, ',');
		$validasi = true;
	}

	if ($validasi) {
		foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
			$q = $connection->query("SELECT kd_nilai FROM nilai WHERE kd_beasiswa=$_POST[kd_beasiswa] AND kd_kriteria=$kd_kriteria AND nim=$_POST[nim] AND nilai LIKE '%$nilai%'");
			if ($q->num_rows) {
				echo alert("Nilai untuk ".$_POST["nim"]." sudah ada!", "?page=nilai");
				$err = true;
			}
		}
	}

  if (!$err AND $connection->query($sql)) {
		echo alert("Berhasil!", "?page=nilai");
	} else {
		echo alert("Gagal!", "?page=nilai");
	}
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM nilai WHERE kd_nilai='$_GET[key]'");
	echo alert("Berhasil!", "?page=nilai");
}
?>
<div class="container">
<div class="row">
	<div class="col-md-4">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>" style="border-color: #ffc107;">
	        <div class="panel-heading"style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;"><?= ($update) ? "EDIT" : "INSERT" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
									<div class="form-group">
										<label for="nim">Mahasiswa</label>
										<?php if ($_POST): ?>
											<input type="text" name="nim" value="<?=$_POST["nim"]?>" class="form-control" readonly="on">
										<?php else: ?>
											<select class="form-control" name="nim">
												<option>---</option>
												<?php $sql = $connection->query("SELECT * FROM mahasiswa"); while ($data = $sql->fetch_assoc()): ?>
													<option value="<?=$data["nim"]?>" <?= (!$update) ? "" : (($row["nim"] != $data["nim"]) ? "" : 'selected="selected"') ?>><?=$data["nim"]?> | <?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select>
										<?php endif; ?>
									</div>
									<div class="form-group">
	                  <label for="kd_beasiswa">Beasiswa</label>
										<?php if ($_POST): ?>
											<?php $q = $connection->query("SELECT nama FROM beasiswa WHERE kd_beasiswa=$_POST[kd_beasiswa]"); ?>
											<input type="text"value="<?=$q->fetch_assoc()["nama"]?>" class="form-control" readonly="on">
											<input type="hidden" name="kd_beasiswa" value="<?=$_POST["kd_beasiswa"]?>">
										<?php else: ?>
											<select class="form-control" name="kd_beasiswa" id="beasiswa">
												<option>---</option>
												<?php $sql = $connection->query("SELECT * FROM beasiswa"); while ($data = $sql->fetch_assoc()): ?>
													<option value="<?=$data["kd_beasiswa"]?>"<?= (!$update) ? "" : (($row["kd_beasiswa"] != $data["kd_beasiswa"]) ? "" : 'selected="selected"') ?>><?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select>
										<?php endif; ?>
									</div>
									<?php if ($_POST): ?>
										<?php $q = $connection->query("SELECT * FROM kriteria WHERE kd_beasiswa=$_POST[kd_beasiswa]"); while ($r = $q->fetch_assoc()): ?>
				                <div class="form-group">
					                  <label for="nilai"><?=ucfirst($r["nama"])?></label>
														<select class="form-control" name="nilai[<?=$r["kd_kriteria"]?>]" id="nilai">
															<option>---</option>
															<?php $sql = $connection->query("SELECT * FROM penilaian WHERE kd_kriteria=$r[kd_kriteria]"); while ($data = $sql->fetch_assoc()): ?>
																<option value="<?=$data["bobot"]?>" class="<?=$data["kd_kriteria"]?>"<?= (!$update) ? "" : (($row["kd_penilaian"] != $data["kd_penilaian"]) ? "" : ' selected="selected"') ?>><?=$data["keterangan"]?></option>
															<?php endwhile; ?>
														</select>
				                </div>
										<?php endwhile; ?>
										<input type="hidden" name="save" value="true">
									<?php endif; ?>
	                <button type="submit" id="simpan" class="btn btn-<?= ($update) ? "success" : "primary" ?> btn-block"><?=($_POST) ? "Simpan" : "Tampilkan"?></button>
	                <?php if ($update): ?>
										<a href="?page=nilai" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div>
	<div class="col-md-8">
	    <div class="panel panel-info" style="border-color: #ffc107;">
	        <div class="panel-heading"style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;">LIST NILAI ALTERNATIF</h3></div>
	        <div class="panel-body">
	           <div class="table-responsive-sm">
	          <table id="datatableid" class="table table-bordered table-striped display nowrap" style="width:100%">
	                <thead>
	                    <tr>
	                        <th>No</th>
							<th>NIM</th>
							<th>Nama</th>
	                        <th>Kategori</th>
	                        <th>Kriteria</th>
	                        <th>Nilai</th>
	                        <th>EDIT/DELETE</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT a.kd_nilai, c.nama AS nama_beasiswa, b.nama AS nama_kriteria, d.nim, d.nama AS nama_mahasiswa, a.nilai FROM nilai a JOIN kriteria b ON a.kd_kriteria=b.kd_kriteria JOIN beasiswa c ON a.kd_beasiswa=c.kd_beasiswa JOIN mahasiswa d ON d.nim=a.nim" )): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
	                            <td><?=$no++?></td>
								<td><?=$row['nim']?></td>
								<td><?=$row['nama_mahasiswa']?></td>
	                            <td><?=$row['nama_beasiswa']?></td>
	                            <td><?=$row['nama_kriteria']?></td>
	                            <td><?=$row['nilai']?></td>
	                            <td>
	                                <div class="btn-group">
	                                    <a href="?page=nilai&action=update&key=<?=$row['kd_nilai']?>" class="btn btn-success btn-xs">Edit</a>
	                                    <a href="?page=nilai&action=delete&key=<?=$row['kd_nilai']?>" class="btn btn-danger btn-xs">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
	                        <?php endwhile ?>
	                    <?php endif ?>
	                </tbody>
	            </table>
	        </div>
	        </div>
	    </div>
	</div>
</div>
</div>
