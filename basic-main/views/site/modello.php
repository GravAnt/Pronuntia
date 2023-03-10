<?php
if (isset($_SESSION['username']) and isset($_SESSION['tipo_account']))
{
    $GLOB_USR = $_SESSION['username'];
    $GLOB_TIPO = $_SESSION['tipo_account'];
}
else 
{
    $GLOB_USR = 'none';
    $GLOB_TIPO = 'none';
}
?>