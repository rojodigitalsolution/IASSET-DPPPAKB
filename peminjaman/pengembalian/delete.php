<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM surat_tugas WHERE id=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=surat_tugas-show'>";