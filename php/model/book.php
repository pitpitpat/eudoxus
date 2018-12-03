<?php
	include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

	class Book extends Dbh {

		public function getAll() {
			$query = "SELECT * FROM books";

			$result = $this->connect()->query($query);

			$books = $result->fetchAll();

			return $books;
		}

		public function getById($id) {
			$query = "SELECT * FROM books WHERE id=:id";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':id', $id);
			$statement->execute();

			$book = $statement->fetch();

			return $book;
        }
        
        public function getByStudentDeclarationId($declarationId) {
            $query = "SELECT b.* FROM books b, StudentDeclarationsBooks sd WHERE sd.declaration_id=:declarationId";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':declarationId', $declarationId);
			$statement->execute();

			$books = $statement->fetchAll();

			return $books;
        }

        public function getBySecretaryDeclarationId($declarationId) {
            $query = "SELECT b.* FROM books b, SecretaryDeclarationsBooks sd WHERE sd.declaration_id=:declarationId";

			$statement = $this->connect()->prepare($query);
			$statement->bindParam(':declarationId', $declarationId);
			$statement->execute();

			$books = $statement->fetchAll();

			return $books;
        }

	}
?>