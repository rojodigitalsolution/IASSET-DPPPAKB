<?php
include "../../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM kerusakan_aset WHERE id_perbaikan=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=perbaikan-show'>";
