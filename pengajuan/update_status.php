<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_pengajuan = $_POST['id_pengajuan'];
  $status = $_POST['status'];

  $query = "UPDATE pengajuan_aset SET status = '$status' WHERE id_pengajuan = '$id_pengajuan'";
  
  if (mysqli_query($con, $query)) {
    echo "<script>alert('Status pengajuan berhasil diupdate.'); window.location.href = '?page=pengajuan-show';</script>";
  } else {
    echo "Error: " . mysqli_error($con);
  }
}
?>
