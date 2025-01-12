<?php
session_start();

// Verificar si la sesión está iniciada
if (isset($_SESSION["id"]) && isset($_SESSION["usuario"]) && isset($_SESSION["email"])) {
    $mensaje = "<p>Usuario: " . $_SESSION["usuario"] . "</p>";
    $mensaje .= "<p>Email: " . $_SESSION["email"] . "</p>";

    // Verificar si el rol está presente en la sesión y no está vacío
    if (isset($_SESSION["Rol_Fk"]) && $_SESSION["Rol_Fk"] !== "") {
        $mensaje .= "<p>Rol: " . $_SESSION["Rol_Fk"] . "</p>";
    } else {
        $mensaje .= "<p>Rol: común</p>";
    }
} else {
    $mensaje = "<p>No se han cargado datos de sesión.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualización de Datos de Sesión</title>
</head>

<body>
    <div id="mensaje-container">
        <!-- El mensaje se mostrará aquí -->
        <?php echo $mensaje; ?>
    </div>
</body>

</html>
