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
include('listasedute.php');

if (isset($_POST['modSed'])){  
    $prenotante = $_POST['prenotante']; 
    $data = $_POST['data'];
    $sql = "SELECT * FROM seduta WHERE logopedista='$GLOB_USR' AND prenotante = '$prenotante' AND data ='$data'";
    $result = pg_query($sql);
    while($row = pg_fetch_array($result))
    {
        $stato = $row['stato']; 
    }
        
    if($stato == 'non confermata')
    {
        $stato = 'confermata';
    }
    else
    {
        $stato = 'non confermata';
    }

    $my_Update_Statement = $my_Db_Connection->prepare("UPDATE seduta SET stato = '$stato'
    WHERE prenotante = '$prenotante' AND data = '$data' AND logopedista='$GLOB_USR'");
    if($my_Update_Statement->execute())
    {
        echo "<a href='index.php?r=site%2Fchatlogopedista'>Clicca qui</a> per avvisare il caregiver mandandogli un messaggio
        oppure <a href='index.php?r=site%2Flistasedute'>clicca qui</a> per visualizzare le modifiche.";
    }
}
