<?php
include('Models/connexionBDD.php');

session_start();

$login=$_POST["username"];
$mdp=md5($_POST["password"]);

//echo "connexion de ".$_POST['username'];

	 	//Connexion à la base et séléction de la BDD
	try {
		    $dbh = new PDO('mysql:host='.$server.';dbname='.$base.'', ''.$user.'', ''.$pwd.'');
			$result=$dbh->query('SELECT * from jm_user WHERE login="'.$login.'" AND password="'.$mdp.'"');
			//$result=$dbh->query('SELECT * from jm_user WHERE login="'.$login.'"');
			$result->setFetchMode(PDO::FETCH_OBJ);
			if($ligne = $result->fetch())
			{
				//On charge la variable session avec les données de la base de données
				$prenom = $ligne->prenom;
				$nom = $ligne->nom;
				$mail = $ligne->mail;
				$id_droit = $ligne->id_droit;
				$id_user = $ligne->id_user;
				$photo = $ligne->photo;
				$ip_client = $_SERVER['REMOTE_ADDR'];

				$_SESSION['id_user'] = $id_user;
				$_SESSION['login'] = $login;
				$_SESSION['prenom'] = $prenom;
				$_SESSION['nom'] = $nom;
				$_SESSION['mail'] = $mail;
				$_SESSION['photo'] = $photo;
				$_SESSION['id_droit'] = $id_droit;
				$_SESSION['ip_client'] = $ip_client;
								
				//On créé une entrée dans la table session avec id_user et ip
				$chargerSession=$dbh->prepare("INSERT INTO jm_session (id_user,ip) VALUES('". $id_user ."','". $ip_client ."')");
				$chargerSession->execute();
				echo json_encode(['reponse' => 'ok']);
				//header("Location: web/index.php");
			}
			else
			{
				session_destroy();
				echo json_encode(['reponse' => 'mauvais login ou mauvais mot de passe -- !']);
			}
			$dbh = null;
		} 
	catch (PDOException $e) 
		{
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    header('Location: index.php');
		    die();
		}
?>