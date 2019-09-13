<?php

	require 'database.php';

	$message = '';

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];

		$sql = 'INSERT INTO membres(nom, prenom, email) VALUES(:nom, :prenom, :email)';
		$statement = $connection->prepare($sql);
		$array = [':nom' => $nom, ':prenom' => $prenom, ':email' => $email];

		if ($statement->execute($array)) {
			
			$message = 'Données enregistrées avec succès !';
		}
	}

?>


<?php require 'header.php'; ?>

<?php require 'nav.php'; ?>

<div class="container">	
	<div class="card mt-5">
		<div class="card-header">
			<h2>Enregistrer un membre</h2>
		</div>
		<div class="card-body">
			<?php if(!empty($message)): ?>

				<div class="alert alert-success">
					<?php echo $message; ?>
				</div>

			<?php endif; ?>
			<form method="post" action="">
				<div class="form-group">
					<label for="nom">Nom: </label>
					<input type="text" name="nom" id="nom" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="prenom">Prénom: </label>
					<input type="text" name="prenom" id="prenom" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="email">Adresse E-mail: </label>
					<input type="email" name="email" id="email" class="form-control" required="required">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Enregistrer le membre</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>