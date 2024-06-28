<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM kategori WHERE id_kategori=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=kategori-show'>";