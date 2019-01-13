<?php
class Book {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "books";
    //associated table names
    private $secretary_declaration_books_table_name = "SecretaryDeclarationsBooks";
    private $student_declaration_books_table_name = "StudentDeclarationsBooks";
    private $course_table_name = "Courses";

	// table columns
	public $id;
	public $course_id;
	public $name;
	public $code;
	public $author;
	public $pages;

	public function __construct($connection){
		$this->connection = $connection;
	}


	public function create() {
        $query = "INSERT INTO " . $this->table_name . 
        " (course_id, name, code, author, pages) " . 
        " VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->course_id,
            $this->name,
            $this->code,
            $this->author,
            $this->pages]);

        return $this->connection->lastInsertId();
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET " .
        "course_id=?, name=?, code=?, author=?, pages=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->course_id,
            $this->name,
            $this->code,
            $this->author,
            $this->pages,
            $this->id]);
    }

    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }

    public function getAll(){
		$query = "SELECT * FROM " . $this->table_name;

		$stmt = $this->connection->prepare($query);
		$stmt->execute();

		$data = [
			"books" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

		return $data;
	}

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = $stmt->fetch(PDO::FETCH_OBJ);

		return $data;
    }
    
    public function getByStudentDeclarationId($declarationId) {
        $query = "SELECT * FROM " . $this->table_name . 
        " WHERE id in (SELECT book_id FROM " . $this->student_declaration_books_table_name . " WHERE declaration_id=?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$declarationId]);

        $data = [
			"books" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getBySecretaryDeclarationId($declarationId) {
        $query = "SELECT * FROM " . $this->table_name . 
                 " WHERE id in (SELECT book_id FROM " . $this->secretary_declaration_books_table_name . " WHERE declaration_id=?)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$declarationId]);

        $data = [
			"books" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getByCourseId() {
        $query = "SELECT * FROM " . $this->table_name . 
                 " WHERE course_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->course_id]);

        $data = [
			"books" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getByCode() {
        $query = "SELECT * FROM " . $this->table_name . 
                 " WHERE code = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->code]);

        $data = [
			"books" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

}
?>