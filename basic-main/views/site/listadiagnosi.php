<?php

$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Lista delle diagnosi</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>NOME</b></td>
    <td><b>DESCRIZIONE</b></td>
    <td><b>TERAPIA</b></td>
    </tr>

    <tr>
    <?php
    $sql = "SELECT * FROM diagnosi";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['nome']; 
        echo "<td>$cella</td>";
        $cella = $row['descrizione']; 
        echo "<td>$cella</td>";
        $cella = $row['terapia']; 
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>
    </body>
</html>