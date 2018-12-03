<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class Course extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM courses";

			$result = $this->connect()->query($query);

			$courses = $result->fetchAll();

			return $courses;
		}

		public function getById($id) {
			$query = "SELECT * FROM courses WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$course = $statement->fetch();

			return $course;
        }
        
        public function getByDepartmentId($departmentId) {
            $query = "SELECT c.* FROM courses c, DepartmentsCourses dc WHERE dc.departmentId=:departmentId";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':departmentId', $departmentId);
			$statement->execute();

			$courses = $statement->fetchAll();

			return $courses;
        }

	}
?>