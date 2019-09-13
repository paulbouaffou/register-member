<?php

	require 'database.php';

	$sql = 'SELECT * FROM membres';
	$statement = $connection->prepare($sql);
	$statement->execute();

	$membres = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php require 'header.php'; ?>

<?php require 'nav.php'; ?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Liste des membres</h2>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Adresse E-mail</th>
					<th>Opérations</th>
				</tr>
				<?php foreach($membres as $personne): ?>
				<tr>
					<td><?php echo $personne->id; ?></td>
					<td><?php echo $personne->nom; ?></td>
					<td><?php echo $personne->prenom; ?></td>
					<td><?php echo $personne->email; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $personne->id; ?>" class="btn btn-info">Modifier</a>
						<a onclick = "return confirm('Voulez-vous supprimer ce membre ?')" href="delete.php?id=<?php echo $personne->id; ?>" class="btn btn-danger">Supprimer</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>

