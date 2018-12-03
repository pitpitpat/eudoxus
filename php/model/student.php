<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class Student extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM students";

			$result = $this->connect()->query($query);

			$students = $result->fetchAll();

			return $students;
		}

		public function getById($id) {
			$query = "SELECT * FROM students WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$student = $statement->fetch();

			return $student;
		}

	}
?>