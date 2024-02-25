<?php

session_start();
include 'conexion.php';

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM StarVisory WHERE email = '$email' and contraseña = '$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
	$_SESSION['usuario'] = $email;
	header("location: ../../Deportes.html");
	exit;
}else{
	echo '<script>
	alert("Usuario no existente, verifique los datos");
	window.location = "../../Login.php";
	</script>';

	exit;
}

?>