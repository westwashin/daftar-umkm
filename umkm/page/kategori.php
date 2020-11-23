<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM beasiswa WHERE kd_beasiswa='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$validasi = false; $err = false;
	if ($update) {
		$sql = "UPDATE beasiswa SET nama='$_POST[nama]' WHERE kd_beasiswa='$_GET[key]'";
	} else {
		$sql = "INSERT INTO beasiswa VALUES (NULL, '$_POST[nama]')";
		$validasi = true;
	}

	if ($validasi) {
		$q = $connection->query("SELECT kd_beasiswa FROM beasiswa WHERE nama LIKE '%$_POST[nama]%'");
		if ($q->num_rows) {
			echo alert("Kategori sudah ada!", "?page=kategori");
			$err = true;
		}
	}

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=kategori");
  } else {
		echo alert("Gagal!", "?page=kategori");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM beasiswa WHERE kd_beasiswa='$_GET[key]'");
	echo alert("Berhasil!", "?page=kategori");
}
?>

<div class="container">
<div class="row">
	<div class="col-md-4">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>" style="border-color: #ffc107;">
	        <div class="panel-heading" style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;"><?= ($update) ? "EDIT" : "INSERT" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	                <div class="form-group">
	                    <label for="nama">Nama</label>
	                    <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
	                </div>
	                <button type="submit" class="btn btn-<?= ($update) ? "success" : "info" ?> btn-block">Simpan</button>
	                <?php if ($update): ?>
										<a href="?page=kategori" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div>
	<div class="col-md-8">
	    <div class="panel panel-info" style="border-color: #ffc107;">
	        <div class="panel-heading" style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;">List Kategori</h3></div>
	        <div class="panel-body">
	            <div class="table-responsive-sm">
	          <table id="datatableid" class="table table-bordered table-striped display nowrap datatableid" style="width:100%">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>Nama Kategori</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM beasiswa")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
	                            <td><?=$no++?></td>
	                            <td><?=$row['nama']?></td>
	                            <td>
	                                <div class="btn-group">
	                                    <a href="?page=kategori&action=update&key=<?=$row['kd_beasiswa']?>" class="btn btn-success btn-xs">Edit</a>
	                                    <a href="?page=kategori&action=delete&key=<?=$row['kd_beasiswa']?>" class="btn btn-danger btn-xs">Hapus</a>
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

