<?php
    $id_a = (int)$_GET["pre1"];
    $query = "Delete from area_jim where id_area = '$id_a'";
    $conn_string='host=localhost port=5432 dbname=TareaBD user=postgres password=123';
    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $result = pg_query($query);
    if(!$result)
    {
        echo "<script>alert('Error.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=areas.php'>";
    }
    else
    {
        echo "<script>alert('Borrado exitoso.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=areas.php'>";
    }
    pg_close();
?>