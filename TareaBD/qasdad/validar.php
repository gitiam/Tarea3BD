<?php
session_start();
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());

$rut = $_POST['rut']; 
$pass = $_POST['pass'];
if($rut != "" && $pass != "")
    {
        $sql = 'SELECT "id_alumno","nombre","contrasena" FROM "Alumno" WHERE "rut"=\''.$rut.'\'';
        $result = pg_query($sql);
        if($row = pg_fetch_array($result)){
            if($row["contrasena"] == $pass)
            {
                $_SESSION["id_alumno"] = $row["id_alumno"];
                //VEO SI ES COORDINADOR
                $sql3 = 'SELECT "id_coordinador","id_area" FROM "Coordinador" WHERE "id_alumno"=\''.$row["id_alumno"].'\'';
                $result3 = pg_query($sql3);
                if($row3 = pg_fetch_array($result3)){
                    $_SESSION["id_area"] = $row3["id_area"];
                    $_SESSION["id_coordinador"] = $row3["id_coordinador"];
                    header("Location:menucoordinador.php");
                    //ES COORDINADOR
                }
                else{
                        
                    $sql1 = 'SELECT "id_postulante" FROM "Postulante" WHERE "id_alumno"=\''.$row["id_alumno"].'\'';
                    $result1 = pg_query($sql1);
                    $row1 = pg_fetch_array($result1);
                    echo $row1[0];
                    $sql2 = 'SELECT "id_coordinador" FROM "Postulacion" WHERE "id_postulante"=\''.$row1["id_postulante"].'\'';
                    $result2 = pg_query($sql2);
                    $row2 = pg_fetch_array($result2);
                    if($row2[0] >0)
                    {   
                        $_SESSION["area"] = $row2[0];
                        echo "Estas seleccionado en un area.  ";
                        echo '<a href="menucolaborador.php">Ver Perfil.</a></p>'; //A SIDO SELECCIONADO
                    }
                    else{
                        echo "Aun no as sido seleccionado. ";
                        echo '<a href="index.php">Inicio.</a></p>'; //no ha sido seleccionado
                        }
                    
                    pg_free_result($result1);
                    pg_free_result($result2);
                    }
                    pg_free_result($result3);
            }
            else{
                echo 'Password Incorrecta';
            }
        }
        else{
            echo 'No existe asdadadsadsassdasdaa PHP CONCHATUMADREel usuario';
        }
        pg_free_result($result);
    }
else{
    echo 'Llene los campos  de la mierda requeridos';
}


pg_close($dbconn);
?>
