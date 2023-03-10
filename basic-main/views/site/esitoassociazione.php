<?php

if (isset($_POST['associaUt'])){ 
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
include('modello.php');
$graffa1 = "{";
$graffa2 = "}";

// get all of the form data 
$utenteid = $_POST['utenteid'];

if($GLOB_TIPO == 'logopedista')
{
$my_Update_Statement = $my_Db_Connection->prepare("UPDATE utente SET logopedista = '$GLOB_USR'
WHERE username = '$utenteid'");
$my_Update_Statement->execute();

$utenteid .= $graffa2;
$utenteid = $graffa1.$utenteid;

$my_Update_Statement = $my_Db_Connection->prepare("UPDATE logopedista SET idutente = idutente || '{$utenteid}'
WHERE username = '$GLOB_USR'");

if ($my_Update_Statement->execute()) {
   echo "Account utente associato con successo"; 
 } else {
  echo "Errore: l'username utente non è valido";
}
}

else
{
  $my_Update_Statement = $my_Db_Connection->prepare("UPDATE caregiver SET idutente = $utenteid
  WHERE username = :account");
  $my_Update_Statement->bindParam(':account', $GLOB_USR);
  
  if ($my_Update_Statement->execute()) {
     echo "Account utente associato con successo"; 
   } else {
    echo "Errore: l'username utente non è valido";
  }
}
}
?>
