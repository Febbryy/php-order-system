<?php

session_start();

session_unset();

session_destroy();

echo "<script>
        alert('Terima Kasih Telah Berbelanja dari kami!'); 
        window.location = '../index.php'; 
      </script>";
exit();
?>