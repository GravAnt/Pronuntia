<?php
$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");

$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
include('modello.php');

if (isset($_POST['prenota'])){  
    $data = $_POST['data'];

    $sql = "SELECT * FROM caregiver WHERE username='$GLOB_USR'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $utente = $row['idutente']; 
    }
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
        echo "<a href='index.php?r=site%2Fchatcaregiver'>Clicca qui</a> per avvisare il logopedista mandandogli un messaggio
        oppure <a href='index.php?r=site%2Fprenotaseduta'>clicca qui</a> per ritornare alla pagina precedente.";
    }
}
