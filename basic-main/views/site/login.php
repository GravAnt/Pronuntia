<form action="index.php?r=site%2Fesitologin" class="form" method="POST">
	<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Entra</h1>	
        <p><label for="tipo_account">Accedi come:</label>

        <select name="tipo_account" id="tipo_account">
        <option value="logopedista">Logopedista</option>
        <option value="caregiver">Caregiver</option>
        <option value="utente">Utente</option>
        </select>
        </p>

		<p class="">
            <input type="text" name="username" value="" placeholder="Inserisci username" autocomplete="off" required />
        </p>

        <p class="">
            <input type="password" name="password" value="" placeholder="Inserisci password" autocomplete="off" required />
        </p>

	    <p class="">
	    	<input class="" type="submit" name="loginBtn" value="Accedi" />
	    </p>

