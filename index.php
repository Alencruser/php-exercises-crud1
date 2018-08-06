<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div class="container" id="clients">
		<h2>Liste des clients :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach ($pdo->query('SELECT * FROM clients') as $v) {
				echo $v["firstName"]." ".$v["lastName"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="show">
		<h2>Types de Show disponibles :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			foreach ($pdo->query('SELECT * FROM showTypes') as $v) {
				echo $v["type"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="20">
		<h2>Liste des 20 premiers clients :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach($pdo->query('SELECT * FROM clients LIMIT 20') as $v) {
				echo $v["firstName"]." ".$v["lastName"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="fidele">
		<h2>Clients fidèles :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach($pdo->query('SELECT * FROM clients WHERE card=1') as $v) {
				echo $v["firstName"]." ".$v["lastName"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="mclients">
		<h2>Clients dont le nom commence par un M :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach($pdo->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName') as $v) {
				echo "Nom : ".$v["lastName"]." Prenom : ".$v["firstName"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="complet">
		<h2>Spectacle artiste date :</h2>
		<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach($pdo->query("SELECT title,performer,date,startTime FROM shows ORDER BY title") as $v) {
				$t=explode("-",$v["date"]);
				echo $v["title"]." par ".$v["performer"].", le ".$t[2]."-".$t[1]."-".$t[0]." à ".$v["startTime"]."<br>";
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
	<div class="container" id="clics">
		<h2>Clients bien formattés :</h2>
			<?php 
		try {
			$pdo=new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
			foreach($pdo->query("SELECT * FROM clients") as $v) {
				echo "Nom : ".$v["lastName"]."  Prénom : ".$v["firstName"]."  Date de Naissance : ".$v["birthDate"];
				if($v["card"]==1){
					echo "  Carte de fidélité : Oui  Numéro de carte : ".$v["cardNumber"]."<br>";
				}else {
					echo "  Carte de fidélité : Non<br>";
				}
			}
			$pdo=null;
		} catch(PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br>";
			die;
		}
		?>
	</div>
</body>
</html>