<thml>
<body>
<h1>Esegui il logout</h1>
    <form action="index.php?r=site%2Fesitologout" class="form" method="POST">
    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <input class="" type="submit" name="logout" value="Continua" />
    <input class="" type="submit" name="no" value="Annulla" />
</form>
</body>
</html>

