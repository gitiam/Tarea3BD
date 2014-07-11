<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />

	<title>Untitled 5</title>
</head>

<body>
<h1>Formulario</h1>
        <form method="post" action="ValidarRegistro.php">
            <p>Nombre: <input type="text" name="Nombre"></p>
            <p>RUT: <input type="text" name="RUT"></p>
            <p>ROL: <input type="text" name="ROL"></p>
            <p>Contraseña: <input type="password" name="Contrasena"></p>
            <p>Repetir contraseña: <input type="password" name="Contrasena2"></p>
            <p>Carrera: <input type="text" name="Carrera"></p>
            <p>Correo: <input type="text" name="Correo"></p>
            <p>Telefono: <input type="text" name="Telefono"></p>
            <p>Area: <input type="text" name="Area"></p>
            <p>Preferencia: <input type="text" name="Preferencia"></p>
            <input type="submit" value="Registrar">
        </form>
        <form action="Login.php">
            <input type="submit" value="Cancelar">
        </form>


</body>
</html>