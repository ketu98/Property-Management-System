<?php
//session_destroy();
unset($_SESSION['email']);
echo "<script>window.location='login.php'</script>";

?>
