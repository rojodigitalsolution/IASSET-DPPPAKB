<?php
include "../../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM peminjaman WHERE id_peminjaman=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=peminjaman-show'>";
