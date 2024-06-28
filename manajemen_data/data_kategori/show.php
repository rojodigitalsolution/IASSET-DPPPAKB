<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Card Column -->
    <div class="col-lg-12 mb-4">

      <!-- Card -->
      <div class="card shadow mb-4">

        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
          <h6 class="m-0 font-weight-bold text-white">Kategori</h6>
          <a href="?page=kategori-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>

        <!-- Card Body -->
        <div class="card-body">

          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-bordered table-hover display" id="viewUser">
              <thead class="bg-primary text-white">
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama Kategori</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../connection.php';
                $no = 1;
                $query = mysqli_query($con, 'SELECT * FROM kategori');
                while ($data = mysqli_fetch_array($query)) { ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td ><?= $data['nama_kategori']; ?></td>
                    <td class="text-center">
                      <a class="btn btn-sm btn-primary" href="?page=kategori-edit&id=<?= $data['id_kategori']; ?>"><i class="fas fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href="?page=kategori-delete&id=<?= $data['id_kategori']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini?')"><i class="fas fa-trash"></i></a>
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
</div>
