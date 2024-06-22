<?php
session_start(); // Inicia o reanuda la sesión
session_unset(); // Limpiar todas las variables de sesión. Elimina los valores almacenados en la sesión actual sin destruir la sesión en sí.
session_destroy(); // Destruir la sesión

// Redirigimos al formulario de inicio de sesión
header("Location: index.html");
exit();
?>
