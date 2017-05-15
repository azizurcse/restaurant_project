<?php
session_start();


session_destroy();

echo "<script>window.open('admin_login.php?logged_out=You Have Logged out, come back soon','_self')</script>";


?>