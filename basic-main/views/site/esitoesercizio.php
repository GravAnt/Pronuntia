<?php
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
include("modello.php");

if (isset($_POST['esOK']))
{
    $my_Update_Statement = $my_Db_Connection->prepare("UPDATE utente SET punteggio = punteggio-1
    WHERE username= '$GLOB_USR'");
    $my_Update_Statement->execute();

    echo "<a class='btn btn-success' href='https://www.youtube.com/watch?v=9S5mJRncGvQ' target='_blank'>Vai al video</a>";
}
else
{
    echo "<a class='btn btn-success' href='http://localhost:8080/index.php?r=site%2Feseguiterapia'>Riprova</a> <a class='btn btn-success' href='http://localhost:8080/index.php?r=site%2Findex' target='_blank'>Esci</a>";
}
?>