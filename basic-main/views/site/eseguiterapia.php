<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Esercizi da eseguire</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>LISTA ESERCIZI DELLA TERAPIA</b></td>
    </tr>

    <tr>
    <?php
    include('modello.php');
    $sql = "SELECT * FROM utente WHERE username='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $terapia = $row['terapia']; 
    }

    $sql = "SELECT * FROM terapia WHERE codice='$terapia'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['esercizi']; 
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>

    <form action="/index.php?r=site%2Feseguiesercizio" class="form" method="POST">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
        <h1><p style="text-align:center">Inserisci il nome dell'esercizio da eseguire</p></h1>
		<p class="">
            <input type="text" name="esercizio" value="" placeholder="Esercizio" autocomplete="off" required />
            <p class="">
	    	<input class="" type="submit" name="continua" value="Continua" />
	        </p>
        </p>
    </form>
    </body>
</html>

