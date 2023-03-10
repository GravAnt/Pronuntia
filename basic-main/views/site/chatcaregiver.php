<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <h1>
        <p style="text-align:center">Messaggi ricevuti</p>
    </h1>

    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>MESSAGGIO</b></td>
    <td><b>DATA</b></td>
    </tr>

    <tr>
    <?php
    include('modello.php');
    $sql = "SELECT * FROM messaggio WHERE destinatario='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['testo'];
        echo "<td>$cella</td>";
        $cella = $row['data'];
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>

    <br>
    <h1>
        <p style="text-align:center">Messaggi inviati</p>
    </h1>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>MESSAGGIO</b></td>
    <td><b>DATA</b></td>
    </tr>

    <tr>
    <?php

    $sql = "SELECT * FROM messaggio WHERE mittente='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $cella = $row['testo'];
        echo "<td>$cella</td>";
        $cella = $row['data'];
        echo "<td>$cella</td>";
        echo "</tr>";
    }
    ?>
    </tr>

    </table>


    <form action="index.php?r=site%2Fesitomessaggio" id="confirmationForm" class="form" method="POST">
	<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
    <h1>
        <p style="text-align:center">Invia un messaggio</p>
    </h1>
    <p class="">
    <textarea form="confirmationForm" rows="4" cols="50" name="testo" form="usrform" placeholder="Scrivi qui il messaggio"></textarea>
    </p>
    <p class="">
	    	<input class="" type="submit" name="continua" value="Continua" />
	</p>
    </div>
    </form>
    
