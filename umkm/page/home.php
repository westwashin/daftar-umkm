
<div class="container-fluid">

          
          <!-- Content Row -->
          

          <div class="row">

            <?php
$query = $connection->query("SELECT COUNT(*) AS jumlah FROM nilai WHERE kd_beasiswa = '6' GROUP BY nim");
$row = mysqli_fetch_array($query);

$query1 = $connection->query("SELECT COUNT(*) AS jumlah FROM pengguna WHERE status = 'mahasiswa'");
$row2 = mysqli_fetch_array($query1);
?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Dokumen</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$row['jumlah']?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-folder fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Akun Terverifikasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row2['jumlah']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            

            <!-- Pie Chart -->
            
          </div>

          <!-- Content Row -->
          

        </div>






    

    


