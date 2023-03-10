<form action="index.php?r=site%2Fesitoterapia" class="form" method="POST">
	<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Associa una terapia a un utente</h1>	

		<p class="">
            <p><b>Inserisci l'username dell'utente a cui associare una terapia</b></p>
			<input type="text" name="utenteid" value="" placeholder="Inserisci username" autocomplete="off" required />
        </p>

	    <p class="">
	    	<input class="" type="submit" name="associaTe" value="Associa" />
	    </p>

    </div>
	</form>