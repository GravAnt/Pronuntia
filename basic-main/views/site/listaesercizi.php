<?php

$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Lista degli esercizi</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>ID ESERCIZIO</b></td>
    <td><b>DESCRIZIONE</b></td>
    <td><b>TESTO</b></td>
    </tr>

    <tr>
    <?php
    $sql = "SELECT * FROM esercizio";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['esercizio']; 
        echo "<td>$cella</td>";
        $cella = $row['descrizione']; 
        echo "<td>$cella</td>";
        $cella = $row['testostoria']; 
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>
    </body>
</html>