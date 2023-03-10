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
        <p style="text-align:center">Lista degli utenti</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>NOME</b></td>
    <td><b>COGNOME</b></td>
    <td><b>USERNAME</b></td>
    <?php
    if($GLOB_TIPO == 'logopedista')
    {
        echo '    <td><b><a href="index.php?r=site%2Flistadiagnosi">DIAGNOSI</a></b></td>
        <td><b><a href="index.php?r=site%2Flistaterapie">TERAPIA</a></b></td>';
    }
    else
    {
        echo '  <td><b>DIAGNOSI</b></td>
        <td><b>TERAPIA</b></td>';
    }
?>
    <td><b>ESERCIZI MANCANTI</b></td>
    </tr>

    <tr>
    <?php
    include('modello.php');
    if($GLOB_TIPO == 'logopedista')
    {
        $sql = "SELECT * FROM utente WHERE logopedista='$GLOB_USR'";
    }
    else
    {
        $sql = "SELECT * FROM caregiver WHERE username='$GLOB_USR'";
        $result = pg_query($sql);
        while($row = pg_fetch_array($result))
        {
            $idutente = $row['idutente']; 
            $sql = "SELECT * FROM utente WHERE username='$idutente'";
        }
    }
    
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
        $cella = $row['diagnosi']; 
        echo "<td>$cella</td>";
        $cella = $row['terapia']; 
        echo "<td>$cella</td>";
        $cella = $row['punteggio']; 
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>
    </body>
</html>