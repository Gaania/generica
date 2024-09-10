<?php
session_start();
unset($_SESSION['id']);
session_destroy();
echo'<script> alert("La sesión se ha cerrado");window.location="index.php";</script>';
exit;
