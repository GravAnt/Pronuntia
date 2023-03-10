<?php

if (isset($_POST['associaTe'])){ 
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

$host        = "host=localhost";
$port        = "port=5432";
$dbname      = "dbname=yii2basic";
$credentials = "user=postgres password=admin";
$connect= pg_connect("$host $port $dbname $credentials");

$utenteid = $_POST['utenteid']; 
include('modello.php');

//controllo se l'utente esiste

//a una certa diagnosi corrisponde una certa terapia
$sql = "SELECT * FROM utente WHERE username = '$utenteid' AND logopedista = '$GLOB_USR'";
$result = pg_query($sql);
while($row = pg_fetch_array($result))
{
    $diagnosi = $row['diagnosi']; 
}

$sql = "SELECT * FROM diagnosi WHERE nome = '$diagnosi'";
$result = pg_query($sql);
while($row = pg_fetch_array($result))
{
    $terapia = $row['terapia']; 
}

$my_Update_Statement = $my_Db_Connection->prepare("UPDATE utente SET terapia = '$terapia' 
WHERE username = '$utenteid' AND logopedista = '$GLOB_USR'");

if ($my_Update_Statement->execute()) {
    echo "<p>Terapia associata con successo.</p>";
} 

$sql = "SELECT * FROM terapia WHERE codice = '$terapia'";
$result = pg_query($sql);
while($row = pg_fetch_array($result))
{
    $esercizi = $row['esercizi']; 
}

$numEsercizi = substr_count($esercizi, ',') + 1;
$my_Update_Statement = $my_Db_Connection->prepare("UPDATE utente SET punteggio = $numEsercizi 
WHERE username = '$utenteid' AND logopedista = '$GLOB_USR'");
if ($my_Update_Statement->execute()) {
    echo "<p>Punteggio associato con successo.</p>";
} 
}