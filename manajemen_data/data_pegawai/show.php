<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content -->
<div class="row">
  <div class="col">
    <!-- Card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
        <h6 class="m-0 font-weight-bold text-white">Pegawai</h6>
        <div>
          <a href="?page=pegawai-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
          <!-- <a href="../manajemen_data/data_pegawai/print.php" class="btn btn-sm btn-light" target="_blank"><i class="fas fa-print text-primary"></i> Cetak Data</a> -->
          <!-- <a href="/laporan/tes.php" class="btn btn-sm btn-light" target="_blank"><i class="fas fa-print text-warning"></i> Cetak window.print</a> -->
        </div>
      </div>
      <div class="card-body">
        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Detail Jabatan</th>
                <th>Bidang</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../connection.php';
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM pegawai');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $data['nip']; ?></td>
                  <td><?= $data['nama']; ?></td>
                  <td><?= $data['jabatan']; ?></td>
                  <td><?= $data['golongan']; ?></td>
                  <td><?= $data['detail_jabatan']; ?></td>
                  <td><?= $data['bidang']; ?></td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="?page=pegawai-edit&id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="?page=pegawai-delete&id=<?= $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>