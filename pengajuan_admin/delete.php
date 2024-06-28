<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM pengajuan_aset WHERE id_pengajuan=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=pengajuan-show'>";