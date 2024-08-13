<?php
  session_start();
     if(session_destroy()){
      unset($_SESSION['uid']);
      unset($_SESSION['email']);
      echo "<script type='text/javascript'>window.location.href = 'login.php'; </script>";
}
?>