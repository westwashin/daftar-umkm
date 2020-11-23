<div class="container">
	
<div class="row">
	<div class="col-md-12">
    <?php if (isset($_GET["beasiswa"])) { ?>
	
	  <div class="panel panel-info" style="border-color: #ffc107;">
	      <div class="panel-heading" style="background-image: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);"><h3 class="text-center" style="color: white;" ><?php $query = $connection->query("SELECT * FROM beasiswa WHERE kd_beasiswa=$_GET[beasiswa]"); echo $query->fetch_assoc()["nama"]; ?></h2></h3></div>
        <div class="card shadow mb-4">
                       <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">UMKM yang Belum Diverifikasi</h6>
                       </div>
                    <div class="card-body">
	      	<table class="table table-bordered table-striped display nowrap datatableid" style="width:100%">
                  <thead>
                      <tr>
                            <th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<?php //$query = $connection->query("SELECT nama FROM kriteria WHERE kd_beasiswa=$_GET[beasiswa]"); while($row = $query->fetch_assoc()): ?>
								<!-- <th><?//=$row["nama"]?></th> -->
							<?php //endwhile ?>
							<th></th>
							<th>Files</th>
							<th>Aksi</th>

                          
                         

                          
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; ?>
                       <?php if ($query = $connection->query("SELECT * FROM nilai WHERE status='2' AND kd_beasiswa=$_GET[beasiswa] GROUP BY nim")):?>
                    
                          <?php while($row = $query->fetch_assoc()): ?>
                          <tr>
                              
                              <td><?=$no++?></td>
                              <td><?=$row['nim']?></td>
                              <td><?=$row['pemilik']?></td>
                              <td><?=$row['nama_umkm']?></td>
                              <?php echo '<td><a href="'.$row['file'].'">'.$row['nama_file'].'</a></td>';?>
                              <td>
 
                                      <a href="terima.php?action=terima&key=<?=$row['nama_umkm']?>&M=<?=$row['nim']?>&nm=<?=$row['kd_beasiswa']?>" class="btn btn-success btn-xs" style="color: black;">Verifikasi</a>
                                      <a href="update.php?action=update&key=<?=$row['nim']?>&masuk=<?=$row['kd_beasiswa']?>" class="btn btn-danger btn-xs">Tolak</a>

                              </td>
                              
                              
                          </tr>
                          <?php endwhile ?>
                      <?php endif ?>
                  </tbody>
              </table>

	      </div>
	  </div>

     <div class="card shadow mb-4">
                       <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">UMKM yang telah Diterima</h6>
                       </div>
                    <div class="card-body">
          <table class="table table-bordered table-striped display nowrap datatableid" style="width:100%">
                  <thead>
                      <tr>
                            <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <?php //$query = $connection->query("SELECT nama FROM kriteria WHERE kd_beasiswa=$_GET[beasiswa]"); while($row = $query->fetch_assoc()): ?>
                <!-- <th><?//=$row["nama"]?></th> -->
              <?php //endwhile ?>
              <th></th>
              <th>Files</th>
              <th>Aksi</th>

                          
                         

                          
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; ?>
                       <?php if ($query = $connection->query("SELECT * FROM nilai WHERE status='3' AND kd_beasiswa=$_GET[beasiswa] GROUP BY nim")):?>
                    
                          <?php while($row = $query->fetch_assoc()): ?>
                          <tr>
                              
                              <td><?=$no++?></td>
                              <td><?=$row['nim']?></td>
                              <td><?=$row['pemilik']?></td>
                              <td><?=$row['nama_umkm']?></td>
                              <?php echo '<td><a href="'.$row['file'].'">'.$row['nama_file'].'</a></td>';?>
                              <td>
 
                                      <a class="btn btn-success btn-xs" style="color: black;">SUKSES</a>
                                      

                              </td>
                              
                              
                          </tr>
                          <?php endwhile ?>
                      <?php endif ?>
                  </tbody>
              </table>

        </div>
    </div>
     <?php } ?>
	</div>
</div>
</div>
