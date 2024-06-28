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
        <h6 class="m-0 font-weight-bold text-white">Peminjaman</h6>
        <div>
          <a href="?page=peminjaman-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>
      </div>
      <div class="card-body">
        <!-- Table Peminjaman -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Keperluan</th>
                <th>Status Pinjam</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../../connection.php';
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM peminjaman');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['nama_peminjam']; ?></td>
                  <td><?= $data['tanggal_pinjam']; ?></td>
                  <td><?= $data['keperluan']; ?></td>
                  <td>
                    <?php if ($data['status_pinjam'] == 'dipinjam') : ?>
                      <span class="badge badge-warning">Dipinjam</span>
                    <?php elseif ($data['status_pinjam'] == 'dikembalikan') : ?>
                      <span class="badge badge-success">Dikembalikan</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="?page=peminjaman-edit&id=<?= $data['id_peminjaman']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="?page=peminjaman-delete&id=<?= $data['id_peminjaman']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
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
