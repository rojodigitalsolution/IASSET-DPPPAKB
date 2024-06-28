<?php
include "../../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM aset WHERE id_aset=$id");

echo "<meta http-equiv='refresh' content='0; url=?page=monitoring_aset-show'>";
