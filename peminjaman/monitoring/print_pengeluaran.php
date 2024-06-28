<html>

<head>
  <title> LAPORAN PENGELUARAN UANG DINAS</title>
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
        <td> <img src="../../img/kalsel.png" width="120px"> </td>
        <td class="tengah">
          <h2>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h2>
          <h2>DINAS PEMERDAYAAN PEREMPUAN,PERLINDUNGAN ANAK DAN KELUARGA BERENCANA</h2>
          <b>Jalan Dharma Praja Kawasan Perkantoran Pemerintahan Provinsi Kalimantan Selatan,Telepon (0511)6749310,Banjarbaru</b>/
        </td>
      </tr>
    </table>
  </div>
  <h2>LAPORAN SEMUA PENGELUARAN UANG DINAS</h2>
  <table class="custom-table">
    <thead>
      <th class="text-center">No</th>
      <th>Penanggung Jawab</th>
      <th>Keperluan</th>
      <!-- <th>Anggaran</th> -->
      <th>Tanggal Keluar Anggaran</th>
      <th>Biaya</th>
      <th>Rincian</th>
    </thead>
    <tbody>
      <?php
      include '../../connection.php';
      $no = 1;
      $query = mysqli_query($con, 'SELECT * FROM biaya_kegiatan');
      $total = 0;
      while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= $data['nama_pegawai']; ?></td>
          <td><?= $data['jenis_kegiatan']; ?></td>
          <!-- <td><?= $data['anggaran']; ?></td> -->
          <td><?= $data['tanggal_keluar']; ?></td>
          <td>Rp<?= number_format($data['biaya']); ?></td>
          <td><?= $data['rincian']; ?></td>
          <!-- Kolom untuk menampilkan foto -->

        </tr>

      <?php
        $total += $data['biaya'];
      } ?>
      <tr>
        <b>
          <td colspan="4">Jumlah Pengeluaran</td>
          <td colspan="2">Rp<?= number_format($total) ?></td>
        </b>
      </tr>
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>

</html>