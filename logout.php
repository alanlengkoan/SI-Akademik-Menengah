<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Aplikasi ini'); window.location = 'index.php'</script>";
?>
