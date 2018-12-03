<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class SecretaryDeclaration extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM SecretaryDeclaration";

			$result = $this->connect()->query($query);

			$secretaryDeclarations = $result->fetchAll();

			return $secretaryDeclarations;
		}

		public function getById($id) {
			$query = "SELECT * FROM SecretaryDeclaration WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$secretaryDeclaration = $statement->fetch();

			return $secretaryDeclaration;
		}

	}
?>