<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    $peminjaman = mysqli_fetch_assoc($query);

    if (!$peminjaman) {
        echo "<script>alert('Data tidak ditemukan.'); window.location.href = '?page=peminjaman-show';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location.href = '?page=peminjaman-show';</script>";
    exit;
}

$query = mysqli_query($con, "SELECT * FROM barang");
$barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $nama_barang = mysqli_real_escape_string($con, $_POST['barang']);
    $tanggal_pinjam = mysqli_real_escape_string($con, $_POST['tanggal_pinjam']);
    $status_pinjam = mysqli_real_escape_string($con, $_POST['status_pinjam']);
    $nama_peminjam = mysqli_real_escape_string($con, $_POST['nama_peminjam']);
    $keperluan = mysqli_real_escape_string($con, $_POST['keperluan']);

    $query = mysqli_query($con, "UPDATE peminjaman SET nama_barang='$nama_barang', nama_peminjam='$nama_peminjam', tanggal_pinjam='$tanggal_pinjam', keperluan='$keperluan', status_pinjam='$status_pinjam' WHERE id_peminjaman='$id'");

    if ($query) {
        echo "<script>alert('Data peminjaman berhasil diperbarui.'); window.location.href = '?page=peminjaman-show';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data peminjaman.');</script>";
    }
}
?>

<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Edit Peminjaman</h6>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row mb-3">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <select name="barang" id="barang" class="form-control" required>
                                <?php foreach ($barang as $p) : ?>
                                    <option value="<?= $p["nama_barang"] ?>" <?= ($peminjaman['nama_barang'] == $p["nama_barang"]) ? 'selected' : '' ?>><?= $p["nama_barang"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $peminjaman['nama_peminjam'] ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $peminjaman['keperluan'] ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status_pinjam" class="col-sm-2 col-form-label">Status Pinjam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status_pinjam" name="status_pinjam" value="<?= $peminjaman['status_pinjam'] ?>" readonly>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col offset-sm-2">
                            <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i> Simpan</button>
                            <a href="?page=peminjaman-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
