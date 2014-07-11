<?php 
// Conexión a la base de datos 
session_start();
$TCC = $_POST["TCC"];
$TTunel = $_POST["TTunel"];
$TDin = $_POST["TDin"];
$TConc = $_POST["TConc"];
$TRV = $_POST["TRV"];
$TAlim = $_POST["TAlim"];
$TAudio = $_POST["TAudio"];
$IdH = $_POST["IdH"];
$S = '"area_jim"';
$TCC1 = '"TipoCoordGeneral"';
$TTunel1 = '"TipoTunel"';
$TDin1 = '"TipoDinamicas"';
$TConc1 = '"TipoConcursos"';
$TRV1 = '"TipoRegistroVisual"';
$TAlim1 = '"TipoAlimentacion"';
$TAudio1 = '"TipoAudio"';
$IdH1 = '"id_horario"';
       
$conn_string='host=localhost port=5432 dbname=TareaBD user=postgres password=123';
$dbconn=pg_connect($conn_string) or die('Connection failed');
$query ="INSERT INTO  $S($TCC1,$TTunel1,$TDin1,$TConc1,$TRV1,$TAlim1,$TAudio1) VALUES ('$TCC','$TTunel','$TDin','$TConc','$TRV','$TAlim','$TAudio');";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$row_count= pg_num_rows($result);
pg_free_result($result);
pg_close($dbconn);
echo "<script>alert('Ingreso exitoso.')</script>";
echo "<meta http-equiv='refresh' content='0;url=areas.php'>";

    
?>
<html>
<head>
<title>insertar area</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
</body>
</html>