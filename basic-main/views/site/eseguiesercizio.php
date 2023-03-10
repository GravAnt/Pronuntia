<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Esegui l'esercizio</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>DESCRIZIONE</b></td>
    <td><b>TESTO</b></td>
    </tr>

    <tr>
    <?php
    include('modello.php');
    $esercizio = $_POST['esercizio']; 
    $sql = "SELECT * FROM esercizio WHERE esercizio='$esercizio'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
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
    <p></p>
    <form action="index.php?r=site%2Fesitoesercizio" method="POST">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <input type="submit" name="esOK" value="Svolto correttamente" />
    <input type="submit" name="esNO" value="Non svolto correttamente/non svolto" />
    </form>

</html>