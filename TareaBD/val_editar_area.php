<?php

    $id_a = $_SESSION['id_edit_area'];
    echo $id_a;
    $TCG = $_POST["TCG"];
    $TT = $_POST["TT"];
    $TD = $_POST["TD"];
    $TC = $_POST["TC"];
    $TRV = $_POST["TRV"];
    $TA = $_POST["TA"];
    $TAU = $_POST["TAU"];
    $IH = $_POST["IH"];
    $query = "UPDATE area_jim SET TipoCoordGeneral = '$TCG',TipoTunel = '$TT',TipoDinamicas = '$TD',TipoConcursos = '$TC',TipoRegistroVisual = '$TRV',TipoAlimentacion = '$TA',TipoAudio = '$TAU',id_horario = '$IH' WHERE id_area = '$id_a';";
 
    $conn_string='host=localhost port=5432 dbname=TareaBD user=postgres password=123';
    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $result = pg_query($query);
    
    if(!$result)
    {
        echo $id_a;
        echo "<script>alert('Error.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=areas.php'>";
    }
    else
    {
        echo "<script>alert('Acutalizacion exitosa.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=areas.php'>";
    }
    pg_close();
?>