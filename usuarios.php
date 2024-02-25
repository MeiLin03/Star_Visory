<?php
require_once 'MVC/modelo/conexion.php';
session_start();

if(!isset($_SESSION['usuario'])){
  echo '<script> alert("Favor de iniciar sesión primero"); 
  window.location = "Login.php";
  </script>';
  session_destroy();
  die();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="MVC/vista/img2/logo.png"> 
  <title>Star Visory</title>
  <link rel="stylesheet" type="text/css" href="MVC/vista/userestilo.css">
</head>
<body>
<nav class="menu"> 
	
	<ul id="menu-desplegable">
		<li><a href="index.html">Inicio</a></li>
		<li><a href="Deportes.html">Visorías</a></li>
		<li><a href="quienessomos.html">Acerca De</a></li>
		<li><a href="usuarios.php">Usuarios</a></li>
		<li><a href="Login.php">Inicio Sesión</a></li>
	</ul>
</nav>


  <h1>Usuarios Registrados</h1>
      <a href="Registro.php">Regresar</a>

  <?php
  // Consultar los datos de la tabla de usuarios
  $sql = "SELECT * FROM StarVisory";
  $resultado = mysqli_query($conexion, $sql);

  // Crear una tabla HTML para mostrar los datos
  echo "<table>";
  echo "<tr><th>Usuario</th><th>Contraseña</th><th>Email</th><th></th><th></th></tr>";

  // Mostrar los datos en la tabla HTML
  while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["usuario"] . "</td>";
    echo "<td>" . $fila["contraseña"] . "</td>";
    echo "<td>" . $fila["email"] . "</td>";
    echo '<td><a href="MVC/controlador/update.php?id='.$fila['id'].'">Editar</a></td>';
    echo '<td><a href="MVC/controlador/delete.php?id='.$fila['id'].'">Eliminar</a></td>';
    echo "</tr>";
  }
  echo "</table>";

  // Liberar la memoria del resultado
  mysqli_free_result($resultado);

  // Cerrar la conexión
  mysqli_close($conexion);
  ?>

  <a href="MVC/modelo/cerrar_sesion.php">Cerrar Sesión</a>

</body>
</html>
