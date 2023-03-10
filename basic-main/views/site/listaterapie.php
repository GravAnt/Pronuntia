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
<?php
    if($GLOB_TIPO == 'logopedista')
    {
        echo '<p style="text-align:center">Lista delle terapie</p>';
    }
    else
    {
        echo "<p style='text-align:center'>Terapia dell'Utente</p>";
    }
?>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>ID TERAPIA</b></td>
    <?php
    if($GLOB_TIPO == 'logopedista')
    {
        echo '<td><b><a href="index.php?r=site%2Flistaesercizi">ESERCIZI</a></b></td>';
    }
    else
    {
        echo '<td><b>ESERCIZI</b></td>';
    }
?>
    </tr>

    <tr>
    <?php
    if($GLOB_TIPO == 'caregiver')
    {
        $sql = "SELECT * FROM caregiver WHERE username = '$GLOB_USR'";
        $result = pg_query($sql);
        while($row = pg_fetch_array($result))
        {
            $idutente = $row['idutente']; 
            $sql = "SELECT * FROM utente WHERE username = '$idutente'";
            $result = pg_query($sql);
            while($row = pg_fetch_array($result))
            {
                $terapia = $row['terapia']; 
                $sql = "SELECT * FROM terapia WHERE codice = '$terapia'";
                $result = pg_query($sql);
                while($row = pg_fetch_array($result))
                {
                    echo "<tr>";
                    $cella = $row['codice']; 
                    echo "<td>$cella</td>";
                    $cella = $row['esercizi']; 
                    echo "<td>$cella</td>";
                    echo "</tr>";
                }
            }
        }

    }
    else
    {
        $sql = "SELECT * FROM terapia";
        $result = pg_query($sql);
        while($row = pg_fetch_array($result))
        {
            echo "<tr>";
            $cella = $row['codice']; 
            echo "<td>$cella</td>";
            $cella = $row['esercizi']; 
            echo "<td>$cella</td>";
            echo "</tr>";
        }
    }
    ?>
    </tr>

    </table>
    </body>
</html>