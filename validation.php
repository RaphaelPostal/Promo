<?php 	

	if (isset($_POST)){
		

		if(empty($_POST['prenom'])){
			
			$erreurs['prenom']='Prénom requis';
		}

		if(empty($_POST['nom'])){
			
			$erreurs['nom']='Nom requis';
		}


		if(!empty($_POST['email_'])){
			$erreurs['spam']='Erreur, tentative de spam détectée';
		}


		if(empty($_POST['email'])){
			
			$erreurs['email']='Email requis';



		}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			 
			$erreurs['email']='L\'email est invalide';
		}


		

		

		if(isset($erreurs)){
			echo json_encode($erreurs);

		}else{
			require('../config.inc.php');
			$bdd = new PDO('mysql:host=localhost;dbname=mmi19d09; charset=utf8', USER, PASS);
			$verif = 'SELECT * FROM subscribers WHERE email="'.$_POST['email'].'"';
			$exe = $bdd->query($verif);
			$nombre = $exe->rowCount();
			if($nombre==0){
				$req = 'INSERT INTO subscribers VALUES(NULL, "'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['email'].'")';
			
			$bdd->query($req);

			$destinataire=$_POST['email'];
			$subject='Confirmation d\'inscription à notre newsletter';
			$headers='From: iro.games.troyes@gmail.com';
			$message= $_POST['prenom'].', merci de vous être inscrit à notre newsletter.';
			mail($destinataire, $subject, $message, $headers);
			echo json_encode(true);
		}else{
			$erreurs['already']='deja';
			echo json_encode($erreurs);
		}
			
			

		}

		

		
	}

	
 ?>
