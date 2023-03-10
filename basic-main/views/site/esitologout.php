<?php
include('modello.php');
if (isset($_POST['logout']))
{
    $_SESSION['username'] = 'none'; 
    $_SESSION['tipo_account'] = 'none'; 
    header("Location: http://localhost:8080/index.php?r=site%2Findex");
    exit();
}

if (isset($_POST['no']))
{
    header("Location: http://localhost:8080/index.php?r=site%2Findex");
    exit();
}
