<?php
	//Connectie DB
	include_once 'database/shared/OpenDbConnection.php';

	if(isset($_SESSION['login'])){
		header('location: BackOffice.php');
	}

	$formdata=[
		'gebruikersnaam'=>'',
		'wachtwoord'=>''
	];
	$errors=[];

	if($_POST){
		$formdata=array_merge($formdata, $_POST);

		//Validatie
		if(empty($formdata['gebruikersnaam'])){
			$errors['gebruikersnaam']='Gebruikersnaam moet ingevuld worden!';
		} elseif (strlen($formdata['gebruikersnaam'])<6) {
			$errors['gebruikersnaam']='Gebruikersnaam moet minstens 6 tekens bevatten!';
		} elseif (strlen($formdata['gebruikersnaam'])>20) {
			$errors['gebruikersnaam']='Gebruikersnaam mag niet meer dan 20 tekens bevatten!';
		}

		if(empty($formdata['wachtwoord'])){
			$errors['wachtwoord']='Wachtwoord moet ingevuld worden!';
		} elseif (strlen($formdata['wachtwoord'])<8){
			$errors['wachtwoord']='Wachtwoord moet minstens 8 tekens bevatten!';
		} elseif (strlen($formdata['wachtwoord'])>40){
			$errors['wachtwoord']='Wachtwoord mag niet meer dan 40 tekens bevatten!';
		}

		//Indien errors leeg zijn logingegevens checken ten opzichte van DB
		if(empty($errors)){
			$statement=$conn->prepare('SELECT * FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam;');
			$statement->execute([
					'gebruikersnaam'=>$formdata['gebruikersnaam']
				]);
			$gebruiker=$statement->fetch();

			if($gebruiker){
				if($gebruiker['wachtwoord']==$formdata['wachtwoord']){
					$_SESSION['login']=true;
					header('location: BackOffice.php');
				}
			}
			$errors['login']='Uw logingegevens zijn fout!';
		}
	}
	//Site header
	$pageTitle="Login";
	$activeNav=0;
	include_once 'shared/Header.php';
?>	
	<div id="contentContainer">
		<!-- Foutmeldingen -->
		<?php 
			if(count($errors)){
		?>
			<h3>Foutmeldingen gevonden!</h3>
			<ul>
				<?php foreach($errors as $error) {?>
				<li>
					<?php print $error; ?>
				</li>
					<?php } ?>
			</ul>
		<?php } ?>
		
		<form method="post">
			<p>Gebruikersnaam: <input type="text" name="gebruikersnaam" value="<?php print $formdata['gebruikersnaam']; ?>"></p>
			<p>Wachtwoord: <input type="password" name="wachtwoord"></p>
			<input type="submit" value="Login" name="submit">
		</form>
	</div>
<?php
	include_once 'shared/Footer.php';
?>