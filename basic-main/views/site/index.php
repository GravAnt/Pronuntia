<?php
/** @var yii\web\View $this */

$this->title = 'Pronuntia';
include('modello.php');
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    $_SESSION['username'] = 'none'; 
    $_SESSION['tipo_account'] = 'none'; 
}
if($GLOB_TIPO == 'none')
{
echo '
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Benvenuto su Pronuntia</h1>

        <p><a class="btn btn-lg btn-success" href="index.php?r=site%2Fregistrazione">Registrati</a></p>
        <p><a class="btn btn-lg btn-success" href="index.php?r=site%2Flogin">Accedi &raquo;</a></p>
    </div>



    </div>

</div>
';
}
if($GLOB_TIPO == 'logopedista')
{
echo '
<div class="site-index">
<p>
<h2 style="text-align:center">Menù logopedista</h2>
</p>
<table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
<tr>
<td><h3><a href="index.php?r=site%2Fassociautente">Associa un nuovo utente </a></h3></td>        
<td><h3><a href="index.php?r=site%2Flistapazienti">Visualizza i tuoi utenti</a></h3></td> </tr>
<tr>
<td><h3><a href="index.php?r=site%2Fassociadiagnosi">Associa una diagnosi a un utente</a></h3></td> 
<td><h3><a href="index.php?r=site%2Fassociaterapia">Assegna una terapia a un utente</a></h3></td> </tr>
<tr>
<td><h3><a href="index.php?r=site%2Flistadiagnosi">Vai alla lista delle diagnosi</a></h3></td> 
<td><h3><a href="index.php?r=site%2Flistaterapie">Vai alla lista delle terapie</a></h3></td> </tr>
<tr>
<td><h3><a href="index.php?r=site%2Flistaesercizi">Vai alla lista degli esercizi</a></h3></td> 
<td><h3><a href="index.php?r=site%2Fcambiastatoseduta">Vai alla lista delle sedute</a></h3></td> </tr>
</table>

</div>';
}
if($GLOB_TIPO == 'caregiver')
{
    echo '
    <div class="site-index">
    <p>
    <h2 style="text-align:center">Menù caregiver</h2>
    </p>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><h3><a href="index.php?r=site%2Fassociautente">Associa un utente</a></h3></td>        
    <td><h3><a href="index.php?r=site%2Flistapazienti">Visualizza informazioni utente</a></h3></td> </tr>
    <tr>
    <td><h3><a href="index.php?r=site%2Flistaterapie">Visualizza la terapia utente</a></h3></td> 
    <td><h3><a href="index.php?r=site%2Fprenotaseduta">Prenota una nuova seduta</a></h3></td> </tr>

    </table>
    
    </div>';
}
if($GLOB_TIPO == 'utente')
{
    echo '
    <div class="site-index">
    <p>
    <h2 style="text-align:center">Menù utente</h2>
    </p>
    <table border="5%" cellpadding="20" cellspacing="50" style="margin-left:auto; margin-right:auto">
    <tr>
    <td><h3><a href="index.php?r=site%2Feseguiterapia">Esegui terapia</a></h3></td>        
    <td><h3><a href="index.php?r=site%2Fclassificautenti">Classifica</a></h3></td> </tr>
    <tr>

    </table>
    
    </div>';
}

