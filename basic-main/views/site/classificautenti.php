<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Classifica utenti</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>UTENTE</b></td>
    <td><b>PUNTI</b></td>
    </tr>

    <tr>
    <?php
    include('modello.php');
    $sql = "SELECT * FROM utente";
    $result = pg_query($sql);
    $punteggi = array();
    while($row = pg_fetch_array($result))
    {
        $punteggio = 10 - $row['punteggio'];
        array_push($punteggi, $punteggio);
    }
    rsort($punteggi);

    $punteggioutente = 0;
    $sql = "SELECT * FROM utente WHERE username='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $punteggioutente = 10 - $row['punteggio'];
    }

    $arrlength = count($punteggi);
    for($x = 0; $x < $arrlength; $x++) {
        echo "<tr>";
        if($punteggi[$x] == $punteggioutente)
        {
            echo "<td><b>$GLOB_USR</b></td>";
            $punteggioutente = 100;
        }
        else
        {
            echo "<td>Utente $x</td>";
        }
        echo "<td>$punteggi[$x]";
        echo "</tr>";
    }
    echo "<tr><td>Utente $x</td> <td>0</td></tr>"; //per non far arrivare l'utente ultimo

    ?>
    </tr>

    </table>