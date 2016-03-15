<!--variables-->
<?php
$pageTitle = "Contact";
$activeNav = 4;
?>
<?php 
	/*$connection= new PDO('mysql:host=localhost:3307; dbname=contactformulier;','root','usbw');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
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
			$ontvangers = '$formdata["email"]'.', ';
			$ontvangers .= '$formdata["onderwerp"]'.'@example.com';
			$headers = 'From: info@hetfluitendeketeltje.com' . "\r\n" .
				    'Reply-To: info@hetfluitendeketeltje.com' . "\r\n" .
				    'X-Mailer: PHP/' . phpversion();
			mail($ontvangers , $formdata['onderwerp'], $formdata['bericht'], $headers);

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
	<h2>Contactformulier</h2>

	<!-- Errors -->
	<?php 
		if(count($errors)){
	?>
	<h3>Foutmelding:</h3>
	<ul>
		<?php foreach ($errors as $error) {?>
			<li><?php print $error; ?></li>
		<?php } ?>
	</ul>
	<?php } ?>

<div id="contactContainer">
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

</div>
<!--site footer-->
<?php include_once "shared/Footer.php" ?>


