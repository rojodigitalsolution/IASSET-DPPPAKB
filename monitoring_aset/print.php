<html>

<head>
  <title> LAPORAN DATA MONITORING ASET</title>
  <style type="text/css">
    body {
      font-family: arial;

    }

    .rangkasurat {
      width: 980px;
      margin: 0 auto;
      background-color: #fff;
      border-bottom: 5px solid black;
      /* height: 500px; */
      /* padding: 20px; */
    }

    table {
    border-bottom: 5px solid #000; /* Tidak ada spasi di antara # dan kode warna, dan titik koma ditambahkan di akhir */
    padding: 2px; /* Titik koma ditambahkan di akhir */
    }


    .tengah {
      text-align: center;
      /* line-height: 5px; */
    }

    h2 {
      text-align: center;
      padding: 5px;
    }

    .nama {
      text-transform: uppercase;
    }

    .custom-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .custom-table th,
    .custom-table td {
      border: 1px solid black;
      text-align: left;
      padding: 8px;
    }

    .custom-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div class="rangkasurat">
    <table width="100%">
      <tr>
        <td> <img src="../img/kalsel.png" width="120px"> </td>
        <td class="tengah">
          <h2>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h2>
          <h2>DINAS PEMERDAYAAN PEREMPUAN PERLINDUNGAN ANAK DAN KELUARGA BERENCANA</h2>
          <b>Jalan Dharma Praja Kawasan Perkantoran Pemerintahan Provinsi Kalimantan Selatan,Telepon (0511)6749310,Banjarbaru</b>/
        </td>
      </tr>
    </table>
  </div>
  <h2>LAPORAN DATA MONITORING ASET</h2>
  <table class="custom-table">
    <thead>
      <th class="text-center">No</th>
      <th>Kode Asett</th>
      <th>Nama Barang</th>
      <th>Merk</th>
      <th>Jenis Barang</th>
      <th>Lokasi</th>
      <th>Kategori</th>
      <th>Gambar</th>
      <th>Barqode</th>
      <th>Jumlah</th>
    </thead>
    <tbody>
      <?php
      $no = 1;
      include '../connection.php';
      $query = mysqli_query($con, 'SELECT * FROM aset');
      while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= $data['kode_aset']; ?></td>
          <td><?= $data['nama_barang']; ?></td>
          <td><?= $data['merk']; ?></td>
          <td><?= $data['jenis_barang']; ?></td>
          <td><?= $data['lokasi']; ?></td>
          <td><?= $data['kategori']; ?></td>
          <td>
            <?php if (!empty($data['gambar'])) : ?>
              <img src="<?= $data['gambar'] ?>" alt="Foto Rincian" style="max-width: 100px; max-height: 100px;">
            <?php else : ?>
              <p>Tidak ada foto</p>
            <?php endif; ?>
          </td>
          <td>
            <?php if (!empty($data['barcode'])) : ?>
              <img src="<?= $data['barcode'] ?>" alt="Foto Rincian" style="max-width: 100px; max-height: 100px;">
            <?php else : ?>
              <p>Tidak ada foto</p>
            <?php endif; ?>
          </td>
          <td><?= $data['jumlah']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>

</html>