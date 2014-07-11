<!DOCTYPE html> 
<?php
session_start();
?>
<html> 
<head> 
    <title>Colaboradores</title> 
</head> 
  
<body> 
    <h1>Colaboradores Seleccionados</h1> 
<?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('No se ha podido conectar: ' . pg_last_error());
//$id_C = $_GET["id_coordinador"];
$id_c='1';
$sql = 'SELECT "Alumno".id_alumno,"Alumno".nombre,"Alumno".correo,"Alumno".talla FROM "Alumno","Postulante","Postulacion","Coordinador" WHERE "Alumno".id_alumno = "Postulante".id_alumno AND "Postulante".id_postulante = "Postulacion".id_postulante AND "Postulacion".id_coordinador = 1';
$result = pg_query($sql);

// $result=pg_query('SELECT "id_postulante" FROM "Postulaciones" WHERE "id_coordinador"=\''.$id_c.'\'');
// $row=pg_fetch_row($resultx);
// $result0=pg_query('SELECT "id_alumno" FROM "Postulante" WHERE "id_postulante"=\''.$row["id_postulante"].'\'');
// $row1=pg_fetch_array($result0);
// $result1=pg_query('SELECT "id_alumno","nombre" FROM "Alumno" WHERE "id_alumno"=\''.$row["id_alumno"].'\'');
// $row2=pg_fetch_array($result1);
//echo "<select name='select1'>";
?>
<table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Talla</th>
            </tr>
        </thead>
        <tbody>
<?php
$contador=0;
while($row=pg_fetch_row($result,$contador,PGSQL_NUM)){
?>
<tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            </tr>
	
<?php
$contador = $contador+1;
}
// Cerrando la conexión
pg_close($dbconn);
?> 

<a href = "menucoordinador.php"><input type="submit" value="Salir"></a> 
</body> 
</html>