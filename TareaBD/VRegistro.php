<?php 
// Conexión a la base de datos 
session_start();
$Nombre = $_POST["Nombre"];
$Rut = $_POST["RUT"];
$Rol = $_POST["ROL"];
$Contrasena = $_POST["Contrasena"];
$Contrasena2 = $_POST["Contrasena2"];
$Carrera = $_POST["Carrera"];
$Correo = $_POST["Correo"];
$Telefono = $_POST["Telefono"];
$Area = $_POST["Area"];
$Preferencia = $_POST["Preferencia"];
$Nombree = '"Nombre"';
$Roll = '"Rol_Usm"';
$Rutt = '"Rut"';
$Carreraa = '"Carrera"';
$Correoo = '"Correo"';
$Telefonoo = '"Telefono"';
$Contrasenaa = '"Contrasena"';
$Preferenciaa = '"Preferencia"';
$Id_Area = '"id_area"';
$Schema = '"TareaBD"."Postulacion"';
if (strcmp($Contrasena, $Contrasena2) == 0)
    {
        
        $conn_string='host=localhost port=5432 dbname=TareaBD user=postgres password=123';
        $dbconn=pg_connect($conn_string) or die('Connection failed');
        $query ="INSERT INTO $Schema ($Nombree, $Roll, $Rutt, $Carreraa, $Correoo, $Telefonoo, $Contrasenaa, $Preferenciaa, $Id_Area) VALUES ('$Nombre', '$Rol', '$Rut', '$Carrera', '$Correo', '$Telefono', '$Contrasena', '$Preferencia', '$Area');";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        $row_count= pg_num_rows($result);
        pg_free_result($result);
        pg_close($dbconn);
        echo "<script>alert('Registro exitoso.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
    else
    {
        echo "<script>alert('Las Contraseñas no coinciden')</script>";
        echo "<meta http-equiv='refresh' content='0;url=registro.php'>";
    }
?>
<html>
<head>
<title>insertar registros</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
</body>
</html>