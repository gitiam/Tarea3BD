<!DOCTYPE html> 
<?php
session_start();
?>
<html> 
<head> 
    <title>Editar Equipo</title> 
</head> 
  
<body> 
    <h1>Editar Equipo</h1> 
    <?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=tarea3 user=postgres password=12345")
    or die('No se ha podido conectar: ' . pg_last_error());
$id_1 = $_GET["id"];
$result=pg_query("SELECT * FROM equipo where id_equipo='".$id_1."'");
$row=pg_fetch_row($result, 0, PGSQL_NUM);
?>		<form method ='post' action='/checkeditequipo.php'> 
            <pre> 
                Nombre: <input type='text' name='Nombre'  value="<?= htmlspecialchars($row[3]) ?>" ?>
                Bandera: <input type='text' name='Bandera' value="<?= htmlspecialchars($row[2]) ?>" ?>
                Entrenador: <input type='text' name='Entrenador' value="<?= htmlspecialchars($row[1]) ?>" ?>
                <input type="hidden" name="variable4" value=<?php echo $id_1 ?> />              
            </pre> 
            <br><input type='submit' value='Ingresar'></br> 
        </form>
<?php
// Cerrando la conexión
pg_close($dbconn);
?> 
</body> 
</html>