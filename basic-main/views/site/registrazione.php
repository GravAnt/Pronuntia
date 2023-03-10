<form action="index.php?r=site%2Fesitoregistrazione" class="form" method="POST">
	<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Crea un nuovo account</h1>	

	    <div class="">
	    <?php
	    	// check to see if the user successfully created an account
		    if (isset($success) && $success == true){
			    echo '<p color="green">Il tuo account è stato creato. <a href="./login.php">Clicca qui</a> per accedere<p>';
		    }
		    // check to see if the error message is set, if so display it
		    else if (isset($error_msg))
			    echo '<p color="red">'.$error_msg.'</p>';
		
	    ?>
	    </div>

        <p><label for="tipo_account">Registrati come:</label>

        <select name="tipo_account" id="tipo_account">
        <option value="logopedista">Logopedista</option>
        <option value="caregiver">Caregiver</option>
        <option value="utente">Utente</option>
        </select>
        </p>

		<p class="">
            <input type="text" name="nome" value="" placeholder="Inserisci nome" autocomplete="off" required />
        </p>

        <p class="">
            <input type="text" name="cognome" value="" placeholder="Inserisci cognome" autocomplete="off" required />
        </p>

        <p class="">
            <input type="text" name="username" value="" placeholder="Inserisci username" autocomplete="off" required />
        </p>

        <p class="">
            <input type="text" name="email" value="" placeholder="Inserisci email" autocomplete="off" required />
        </p>

        <p class="">
            <input type="password" name="password" value="" placeholder="Inserisci password" autocomplete="off" required />
        </p>

        <p class="">
            <input type="password" name="conferma_password" value="" placeholder="Conferma password" autocomplete="off" required />
        </p>

	    <p class="">
	    	<input class="" type="submit" name="registerBtn" value="Crea" />
	    </p>

	    <p class="center"><br />
		Hai già un account? <a href="index.php?r=site%2Flogin">Accedi</a>
	    </p>
    </div>
	</form>
