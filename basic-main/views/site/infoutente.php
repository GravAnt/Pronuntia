<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");

include('modello.php');

if ($GLOB_TIPO == 'logopedista'){  
    $idutente = $_POST['utenteid'];

    $sql = "SELECT * FROM utente WHERE username='$idutente'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $punteggio = $row['punteggio']; 
    }
    echo "All'utente $idutente mancano $punteggio esercizi";
    $sql = "SELECT * FROM utente WHERE username='$utente'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $logopedista = $row['logopedista']; 
    }

    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO seduta (prenotante, logopedista, data)
     VALUES ('$GLOB_USR', '$logopedista', '$data')");
    if($my_Insert_Statement->execute())
    {
        header("Location: index.php?r=site%2Fprenotaseduta");
        exit();
    }
}
