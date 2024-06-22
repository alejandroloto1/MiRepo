<?php
session_start();
session_unset();
session_destroy();

// Redirigimos al formulario de inicio de sesión
header("Location: index.html");
exit();
?>
