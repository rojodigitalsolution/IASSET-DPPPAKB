<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../index.php");
  exit;
}

// Optional: Additional checks can be added based on the user level
// if ($_SESSION['level'] != 'administrator' && $_SESSION['level'] != 'petugas' && $_SESSION['level'] != 'pimpinan') {
//   header("location:../index.php");
//   exit;
// }
?>
