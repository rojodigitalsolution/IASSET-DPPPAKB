<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM barang WHERE id_barang=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=barang-show'>";