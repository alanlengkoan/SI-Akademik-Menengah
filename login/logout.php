<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Aplikasi Si Sedia'); window.location = 'index.php'</script>";
?>
