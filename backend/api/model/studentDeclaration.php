<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class StudentDeclaration extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM StudentDeclaration";

			$result = $this->connect()->query($query);

			$studentDeclarations = $result->fetchAll();

			return $studentDeclarations;
		}

		public function getById($id) {
			$query = "SELECT * FROM StudentDeclaration WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$studentDeclaration = $statement->fetch();

			return $studentDeclaration;
		}

	}
?>