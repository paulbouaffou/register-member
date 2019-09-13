
<?php
	
	try {

		$connection = new PDO('mysql:host=localhost;dbname=club_wikipedia_uvci', 'root', '');
		
	} catch (PDOException $e) {
		
		die('Erreur :'.$e->getMessage());
	}

?>