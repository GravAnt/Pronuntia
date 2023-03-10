<?php

if (isset($_POST['associaDi'])){ 
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

// get all of the form data 

$utenteid = $_POST['utenteid']; 
$diagnosi = $_POST['diagnosi']; 
include('modello.php');

//controllo se la diagnosi esiste nell'elenco e se l'utente esiste

$my_Update_Statement = $my_Db_Connection->prepare("UPDATE utente SET diagnosi = '$diagnosi' 
WHERE username = '$utenteid' AND logopedista = '$GLOB_USR'");

if ($my_Update_Statement->execute()) {
    echo "Diagnosi associata con successo";
} 
}