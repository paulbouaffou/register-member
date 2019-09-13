<?php

	require 'database.php';

	$id = $_GET['id'];

	$sql = 'SELECT * FROM membres WHERE id = :id';
	$statement = $connection->prepare($sql);
	$array = [':id' => $id];
	$statement->execute($array);

	$membres = $statement->fetch(PDO::FETCH_OBJ);

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];

		$sql = 'UPDATE membres SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id';
		$statement = $connection->prepare($sql);
		$array = [':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':id' => $id];

		if ($statement->execute($array)) {

			header('Location: index.php');
		}
	}

?>

<?php require 'header.php'; ?>

<div class="container">	
	<div class="card mt-5">
		<div class="card-header">
			<h2>Modifier un membre</h2>
		</div>
		<div class="card-body">
			<form method="post" action="">
				<div class="form-group">
					<label for="nom">Nom: </label>
					<input type="text" name="nom" id="nom" value="<?php echo $membres->nom; ?>" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="prenom">Prénom: </label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $membres->prenom; ?>" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label for="email">Adresse E-mail: </label>
					<input type="email" name="email" id="email" value="<?php echo $membres->email; ?>" class="form-control" required="required">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Enregistrer la modification</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>
