<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM lokasi WHERE id_lokasi=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=lokasi-show'>";