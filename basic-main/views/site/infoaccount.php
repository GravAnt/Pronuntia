<?php

$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
include('modello.php');
?>

<html>
    <h1>
        <p style="text-align:center">Informazioni account</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>NOME</b></td>
    <td><b>COGNOME</b></td>
    <td><b>USERNAME</b></td>
    <td><b>EMAIL</b></td>
    <td><b>TIPO ACCOUNT</b></td>
    </tr>

    <tr>
    
    <?php
    $sql = "SELECT * FROM logopedista WHERE username = '$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['nome']; 
        echo "<td>$cella</td>";
        $cella = $row['cognome']; 
        echo "<td>$cella</td>";
        $cella = $row['username']; 
        echo "<td>$cella</td>";
        $cella = $row['email']; 
        echo "<td>$cella</td>";
        echo "<td>$GLOB_TIPO</td>";
        echo "</tr>";
    }
    $sql = "SELECT * FROM caregiver WHERE username = '$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['nome']; 
        echo "<td>$cella</td>";
        $cella = $row['cognome']; 
        echo "<td>$cella</td>";
        $cella = $row['username']; 
        echo "<td>$cella</td>";
        $cella = $row['email']; 
        echo "<td>$cella</td>";
        echo "<td>$GLOB_TIPO</td>";
        echo "</tr>";
    }
    $sql = "SELECT * FROM utente WHERE username = '$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['nome']; 
        echo "<td>$cella</td>";
        $cella = $row['cognome']; 
        echo "<td>$cella</td>";
        $cella = $row['username']; 
        echo "<td>$cella</td>";
        $cella = $row['email']; 
        echo "<td>$cella</td>";
        echo "<td>$GLOB_TIPO</td>";
        echo "</tr>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>
    </body>
</html>
