<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}

$host = "localhost";
$port = "5432";
$dbname = "yii2basic";
$user = "postgres";
$password = "admin"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);


$username = $_POST['username'];
$password = $_POST['password'];
$tipo = $_POST['tipo_account'];
if($tipo == 'logopedista')
{
    $sql ="SELECT * FROM logopedista WHERE username = '$username' AND password = '$password'";
    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        echo "Accesso effettuato";   
        $_SESSION['username'] = $username; 
        $_SESSION['tipo_account'] = $tipo; 
    }else{
        echo "Errore";
    }
}

if($tipo == 'caregiver')
{
    $sql ="SELECT * FROM caregiver WHERE username = '$username' AND password = '$password'";
    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        echo "Accesso effettuato";   
        $_SESSION['username'] = $username; 
        $_SESSION['tipo_account'] = $tipo; 
    }else{
        echo "Errore";
    }
}

if($tipo == 'utente')
{
    $sql ="SELECT * FROM utente WHERE username = '$username' AND password = '$password'";
    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        echo "Accesso effettuato";   
        $_SESSION['username'] = $username; 
        $_SESSION['tipo_account'] = $tipo; 
    }else{
        echo "Errore";
    }
}

?>