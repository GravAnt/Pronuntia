<?php

$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");
?>

<html>
    <body>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><b>DATA</b></td>
    <td><b>STATO</b></td>
    </tr>

    <tr>
    <h1><p style="text-align:center">Lista sedute</p></h1>
    <?php
    include('modello.php');
    $sql = "SELECT * FROM seduta WHERE prenotante='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        echo "<tr>";
        $data = $row['data']; 
        echo "<td>$data</td>";
        $stato = $row['stato']; 
        echo "<td>$stato</td>";
        echo "</tr>";
    }
    ?>
    </tr>
    </table>
    <form action="/index.php?r=site%2Fesitoseduta" class="form" method="POST">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
        <h1><p style="text-align:center">Prenota una seduta</p></h1>
		<p class="">
            <input type="text" name="data" value="" placeholder="anno-mese-giorno" autocomplete="off" required />
            <p class="">
	    	<input class="" type="submit" name="prenota" value="Prenota" />
	        </p>
        </p>
    </form>
   
    
    </body>
</html>