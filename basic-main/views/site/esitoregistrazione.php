<?php

if (isset($_POST['registerBtn'])){ 
$servername = "localhost";
$database = "yii2basic"; 
$username = "postgres";
$password = "admin";
$sql = "pgsql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

// get all of the form data 

    $nome = $_POST['nome']; 
    $cognome = $_POST['cognome']; 
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo_account = $_POST['tipo_account'];

    if($tipo_account == 'utente')
    {
      $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO utente (nome, cognome, username, email, password)
       VALUES (:nome, :cognome, :username, :email, :password)");
      $my_Insert_Statement->bindParam(':nome', $nome);
      $my_Insert_Statement->bindParam(':cognome', $cognome);
      $my_Insert_Statement->bindParam(':username', $username);
      $my_Insert_Statement->bindParam(':email', $email);
      $my_Insert_Statement->bindParam(':password', $password);

     if ($my_Insert_Statement->execute()) {
        echo "Account utente creato con successo";
      } else {
        echo "Errore nella creazione dell'account: l'username è già utiizzato";
      }
    }

    if($tipo_account == 'caregiver')
    {
      $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO caregiver (nome, cognome, username, email, password)
       VALUES (:nome, :cognome, :username, :email, :password, :idutente)");
      $my_Insert_Statement->bindParam(':nome', $nome);
      $my_Insert_Statement->bindParam(':cognome', $cognome);
      $my_Insert_Statement->bindParam(':username', $username);
      $my_Insert_Statement->bindParam(':email', $email);
      $my_Insert_Statement->bindParam(':password', $password);
      
      if ($my_Insert_Statement->execute()) {
        echo "Account caregiver creato con successo";
      } else {
        echo "Errore nella creazione dell'account: l'username è già utiizzato";
      }
    }

    if($tipo_account == 'logopedista')
    {
      $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO logopedista (nome, cognome, username, email, password)
       VALUES (:nome, :cognome, :username, :email, :password)");
      $my_Insert_Statement->bindParam(':nome', $nome);
      $my_Insert_Statement->bindParam(':cognome', $cognome);
      $my_Insert_Statement->bindParam(':username', $username);
      $my_Insert_Statement->bindParam(':email', $email);
      $my_Insert_Statement->bindParam(':password', $password);
      
      if ($my_Insert_Statement->execute()) {
        echo "Account logopedista creato con successo";

      } else {
        echo "Errore nella creazione dell'account: l'username è già utiizzato";
      }
    }
}
?>

<a class="btn btn-outline-secondary" href="index.php?r=site%2Flogin">Entra &raquo;</a>
