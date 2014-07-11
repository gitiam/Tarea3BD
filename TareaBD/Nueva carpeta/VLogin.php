<?php
session_start();
$Rut = $_POST["Rut"];
$Contrasena = $_POST["Contrasena"];
$conn_string='host=localhost port=5432 dbname=TareaBD user=postgres password=123';
$dbconn=pg_connect($conn_string) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
echo pg_connect($conn_string) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
if($Rut != "" && $Contrasena != "")
    {
        echo 'asaaaa';
        //$result = pg_query('SELECT "rut","contrasena" FROM "TareaBD"."postulacion" WHERE "rut"=\''.$Rut.'\'');
        $result = pg_query('SELECT "rut","contrasena" FROM "postulacion" WHERE "rut"=\'18024228-7\';');
        echo 'hola';
        echo $result;
        if($row = pg_fetch_array($result)){
            if($row["contrasena"] == $Contrasena){
                $_SESSION["k_Rut"] = $row['rut'];
                echo 'Has sido logueado correctamente :'.$_SESSION['k_Rut'].' <p>';
                echo '<a href="Postulaciones.php">Postulaciones.</a></p>';
            }
            
            else
            {
                echo 'Password incorrecto';
            }
        }
        else
        { 
            echo 'Usuario no existente en la base de datos';
            echo $Rut;
        }
        pg_free_result($result);
    }
    else
    {
        echo 'Debe especificar un Rut y Contraseña';
    }
    pg_close();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />

	<title>Untitled 8</title>
</head>

<body>



</body>
</html>