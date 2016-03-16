<!--variables-->
<?php
$pageTitle = "Contact";
$activeNav = 4;
?>
<?php
@include_once "database/shared/OpenDbConnection.php";

$formdata=[
	'naam'=>'',
	'email'=>'',
	'onderwerp'=>'',
	'bericht'=>''
];
$errors=[];

if($_POST){
	$formdata=array_merge($formdata, $_POST);

	// Validatie
	if(empty($formdata['naam'])){
		$errors['naam']='Naam moet ingevuld zijn!';
	} elseif (strlen($formdata['naam'])>50) {
		$errors['naam']='Naam mag niet meer dan 40 tekens bevatten!';
	} elseif (is_numeric($formdata['naam'])) {
		$errors['naam']='Naam mag geen getallen bevatten!';
	}

	if(empty($formdata['email'])){
		$errors['email']='Email moet ingevuld zijn!';
	} elseif (strlen($formdata['email'])>50){
		$errors['email']='Email mag niet meer dan 40 tekens bevatten!';
	} elseif (strpos($formdata['email'],'@')===false) {
		$errors['email']="Email moet een '@' bevatten!";
	} elseif (strpos(strstr($formdata['email'],'@'), '.')===false) {
		$errors['email']="Na het '@' teken moet er nog een domein komen!";
	}

	if(empty($formdata['bericht'])){
		$errors['bericht']='Bericht moet ingevuld zijn!';
	}

	//Query indien error array leeg is
	if(empty($errors)){
		$statement=$conn->prepare('INSERT INTO berichten(naam, email, onderwerp, bericht) VALUES (:naam, :email, :onderwerp, :bericht);');
		$statement->execute([
			'naam'=>$formdata['naam'],
			'email'=>$formdata['email'],
			'onderwerp'=>$formdata['onderwerp'],
			'bericht'=>$formdata['bericht']
		]);
		//mail
		$ontvanger = '$formdata["onderwerp"]'.'@example.com';
		$headers = 'From: info@hetfluitendeketeltje.com' . "\r\n" .
			'Reply-To: info@hetfluitendeketeltje.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($ontvanger , $formdata['onderwerp'], $formdata['bericht'], $headers);

		$onderwerp ='Bevestigingsbericht';
		$bericht= 'Bedankt voor het verzenden van uw bericht. We zullen je zo snel mogelijk terug contacteren.';
		mail($formdata['email'], $onderwerp, $bericht, $headers);

		//Relocate
		header('location: Thanks.php');
	}
}
?>
<!--site header-->
<?php include_once "shared/Header.php" ?>

<!--site content-->
<div id="contentContainerContact">
	<div id="contactContainer">
		<h2><i class="fa fa-paper-plane-o"></i> Contactformulier</h2>

		<!-- Errors -->
		<?php
		if(count($errors)){
			?>
			<ul>
				<?php foreach ($errors as $error) {?>
					<li><?php print '<i class="fa fa-exclamation-triangle"></i> '.$error; ?></li>
				<?php } ?>
			</ul>
		<?php } ?>
		<form method="post">
			<p>
				<label for="naam">Naam: </label>
				<input type="text" id="naam" name="naam" placeholder="Gelieve uw naam hier in te vullen..."
					   value="<?php print $formdata['naam']; ?>">
			</p>
			<p>
				<label for="e-mail">E-mailadres: </label>
				<input type="text" id="e-mail" name="email" placeholder="Gelieve uw e-mailadres hier in te vullen..."
					   value="<?php print $formdata['email']; ?>">
			</p>
			<p>
				<label>Onderwerp: </label>
				<select name="onderwerp">
					<option value="algemeen">Algemeen</option>
					<option value="klachten">Klachten</option>
					<option value="suggesties">Suggesties</option>
					<option value="problemen">Reservatie problemen</option>
				</select>
			</p>
			<p>
				<label for="bericht">Bericht: </label>
				<textarea name="bericht" id="bericht" cols="30" rows="10"
						  placeholder="Gelieve uw bericht hier in te vullen..."
						  value="<?php print $formdata['bericht']; ?>"></textarea>
			</p>
			<input type="submit" value="Formulier verzenden" name="submit">
		</form>
	</div>
	<div id="openingsurenContainer">
		<h2><i class="fa fa-clock-o"></i> Openingsuren</h2>
		<p><label>Maandag:</label>10u tot 23u</p>
		<p><label>Dinsdag:</label>sluitingsdag</p>
		<p><label>Woensdag tot Zondag:</label>10u tot 23u</p>
	</div>
	<div id="contactgegevensContainer">
		<h2><i class="fa fa-list-alt"></i> Contactgegevens</h2>
		<p>
			<i class="fa fa-phone fa-lg"></i> <a href="tel:+3212345678">012 34 56 78</a>
		</p>
		<p><i class="fa fa-home fa-lg"></i> Schachtplein 1, 3550 Heusden-Zolder</p>
		<p>
			<i class="fa fa-envelope-o fa-lg"></i> <a href="mailto:info@hetfluitendeketeltje.com">info@hetfluitendeketeltje.com</a>
		</p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5017.424139384803!2d5.326299881746958!3d51.039938451800076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c12594cd67edff%3A0xd9f38b6882734614!2sSchachtplein%2C+3550+Heusden-Zolder!5e0!3m2!1snl!2sbe!4v1458034200378"></iframe>
	</div>
</div>
<!--site footer-->
<?php include_once "shared/Footer.php" ?>


