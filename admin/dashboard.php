<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Cards -->
<div class="row">

  <!-- Manajemen Data -->
  <div class="col-xl-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Monitoring Peminjaman
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                include '../connection.php';
                $count = "SELECT * from peminjaman";

                if ($result = mysqli_query($con, $count)) {
                  $rowcount = mysqli_num_rows($result);
                  echo $rowcount;
                }
              ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-folder-open fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Manajemen Kinerja -->
  <div class="col-xl-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Monitoring Aset
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php
              include '../connection.php';
              $count = "SELECT * from aset";

              if ($result = mysqli_query($con, $count)) {
                $rowcount = mysqli_num_rows($result);
                echo $rowcount;
              }
              ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-briefcase fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- USER -->
  <div class="col-xl-4 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              USER
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              include '../connection.php';
              $count = "SELECT * from user";

              if ($result = mysqli_query($con, $count)) {
                $rowcount = mysqli_num_rows($result);
                echo $rowcount;
              }
              ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-address-book fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Profile Tempat Praktek Kerja Lapangan -->
<!-- <div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-danger">
        <h6 class="m-0 font-weight-bold text-white">Profile Tempat Praktek Kerja Lapangan</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <img src="../img/dpppakb.jpeg" alt="" width="100%">
          </div>
          <div class="col-md-6">
            <img src="https://disdaldukkbpmppa.banjarbarukota.go.id/wp-content/uploads/2022/10/WhatsApp-Image-2022-10-09-at-11.30.44-1024x832.jpeg" alt="" width="100%">
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- Informasi Tambahan -->
<!-- <div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-danger">
        <h6 class="m-0 font-weight-bold text-white">Selamat Datang dan Kebijakan privasi</h6>
      </div>
      <div class="card-body text-black">
        <div class="row">
          <div class="col-md-6">
            <h2>Aplikasi PKL</h2>
            <ul>
              <li>Aplikasi laporan kerja ini dirancang dari saran dan permintaan dari pihak Dinas DPPPAKB untuk membantu pengukuran kinerja seseorang maupun instansi atau organisasi dalam melaksanakan tugas sesuai tupoksi. Yang mana itu dapat diukur dengan standar yang telah terukur selama beberapa periode tertentu. Jadi, laporan kinerja adalah rangkuman kerja, baik perorangan maupun instansi. Yang mana, itu nantinya bisa menjadi perbandingan antara hasil yang sesungguhnya dan hasil rencana anggaran yang telah ada sebelumnya. Review hasil kerja kita juga menjadi bentuk akuntabilitas pelaksanaan suatu tugas. Hal terpenting yang perlu dalam penyusunan laporan ini adalah pengukuran terhadap cara berkerja, evaluasi, serta pengungkapan yang memadai.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h2>Thanks to Special For</h2>
            <ul>
              <li>Allah SWT</li>
              <li>Nabi Muhammad SAW</li>
              <li>Kedua Orang Tua</li>
              <li>Admin LTE Template</li>
              <li>Codeigniter</li>
              <li>XAMPP</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
