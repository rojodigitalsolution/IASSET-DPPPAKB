<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

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
        <h6 class="m-0 font-weight-bold text-white">Data Aset</h6>
        <div>
          <a href="?page=monitoring_aset-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>
      </div>
      <div class="card-body">
        <!-- Table Aset -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>Barcode</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../../connection.php';
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM aset');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td>
                    <?php if (!empty($data['barcode'])) : ?>
                      <img src="../monitoring_aset/<?= $data['barcode'] ?>" alt="Foto Rincian" style="max-width: 100px; max-height: 100px;">
                    <?php else : ?>
                      <p>Tidak ada foto</p>
                    <?php endif; ?>
                  </td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['merk']; ?></td>
                  <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="?page=monitoring_aset-edit&id=<?= $data['id_aset']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="?page=monitoring_aset-delete&id=<?= $data['id_aset']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $data['id_aset']; ?>"><i class="fas fa-info-circle"></i></button>
                  </td>
                </tr>

                <!-- Modal Detail -->
                <!-- Modal Detail -->
                  <div class="modal fade" id="detailModal<?= $data['id_aset']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $data['id_aset']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="detailModalLabel<?= $data['id_aset']; ?>">Detail Aset</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <img src="../monitoring_aset/<?= $data['gambar'] ?>" alt="gambar" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                              <h4><?= $data['nama_barang']; ?></h5>
                              <p><strong>Merk:</strong> <?= $data['merk']; ?></p>
                              <p><strong>Jenis Barang:</strong> <?= $data['jenis_barang']; ?></p>
                              <p><strong>Lokasi:</strong> <?= $data['lokasi']; ?></p>
                              <p><strong>Kategori:</strong> <?= $data['kategori']; ?></p>
                              <p><strong>Jumlah Barang:</strong> <?= $data['jumlah']; ?></p>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-3 text-center">
                              <button class="btn btn-primary" onclick="generateQRCode(<?= $data['id_aset']; ?>)">Generate QR Code</button>
                              <div id="qrcode-<?= $data['id_aset']; ?>" class="mt-3"></div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

              <?php } ?>
            </tbody>
            <script>
                function generateQRCode(id) {
                  // Hapus QR code yang sudah ada (jika ada)
                  document.getElementById('qrcode-' + id).innerHTML = '';

                  // Ambil data detail aset dari elemen-elemen yang ada
                  var namaBarang = document.querySelector('#detailModal' + id + ' h4').innerText;
                  var merk = document.querySelector('#detailModal' + id + ' p:nth-child(2)').innerText.split(': ')[1];
                  var jenisBarang = document.querySelector('#detailModal' + id + ' p:nth-child(3)').innerText.split(': ')[1];
                  var lokasi = document.querySelector('#detailModal' + id + ' p:nth-child(4)').innerText.split(': ')[1];
                  var kategori = document.querySelector('#detailModal' + id + ' p:nth-child(5)').innerText.split(': ')[1];
                  var jumlah = document.querySelector('#detailModal' + id + ' p:nth-child(6)').innerText.split(': ')[1];

                  var detailAset = `Nama Barang: ${namaBarang}\nMerk: ${merk}\nJenis Barang: ${jenisBarang}\nLokasi: ${lokasi}\nKategori: ${kategori}\nJumlah Barang: ${jumlah}`;

                  // Buat QR code
                  new QRCode(document.getElementById('qrcode-' + id), {
                    text: detailAset,
                    width: 128,
                    height: 128
                  });
                }
              </script>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
