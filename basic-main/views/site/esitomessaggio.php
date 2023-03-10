<?php

if (isset($_POST['continua'])){ 
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
include('modello.php');

    $data = date("Y-m-d");
    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO messaggio (mittente, destinatario, data, testo)
    VALUES (:username, :destinatario, :data, :testo)");
    $my_Insert_Statement->bindParam(':username', $GLOB_USR);
    if($GLOB_TIPO == 'caregiver')
    {
        $host = "localhost";
        $port = "5432";
        $dbname = "yii2basic";
        $user = "postgres";
        $password = "admin"; 
        $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
        $dbconn = pg_connect($connection_string);
        $idutente = 'none';

        $sql = "SELECT * FROM caregiver WHERE username='$GLOB_USR'";
        $result = pg_query($sql);
        while($row = pg_fetch_array($result))
        {
            $idutente = $row['idutente'];
        }
        $sql = "SELECT * FROM utente WHERE username='$idutente'";
        $result = pg_query($sql);
        while($row = pg_fetch_array($result))
        {
            $logopedista = $row['logopedista'];
        }
        $my_Insert_Statement->bindParam(':destinatario', $logopedista);
    }
    else
    {
        $my_Insert_Statement->bindParam(':destinatario', $_POST['destinatario']);
    }
    $my_Insert_Statement->bindParam(':data', $data);
    $my_Insert_Statement->bindParam(':testo', $_POST['testo']);

    if ($my_Insert_Statement->execute()) {
        echo "Messaggio inviato con successo";
    } 
}