<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class Department extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM departments";

			$result = $this->connect()->query($query);

			$departments = $result->fetchAll();

			return $departments;
		}

		public function getById($id) {
			$query = "SELECT * FROM departments WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$department = $statement->fetch();

			return $department;
		}

	}
?>