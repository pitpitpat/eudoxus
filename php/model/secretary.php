<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class Secretary extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM secretaries";

			$result = $this->connect()->query($query);

			$secretaries = $result->fetchAll();

			return $secretaries;
		}

		public function getById($id) {
			$query = "SELECT * FROM secretaries WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$secretary = $statement->fetch();

			return $secretary;
		}

	}
?>