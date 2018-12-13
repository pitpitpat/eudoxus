<?php
class SecretaryDeclarationsBooks {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "secretaryDeclarationsBooks";
    //associated table names
    
	// table columns
	public $id;
    public $book_id;
    public $declaration_id;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (book_id, declaration_id) " . 
        " VALUES (?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->book_id,
            $this->declaration_id]);

        return $this->connection->lastInsertId;
    }
    
    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "book_id=?, declaration_id=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->book_id,
            $this->declaration_id,
            $this->id]);

    }

    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }

   public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"secretaryDeclarationsBooks" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [
			"secretaryDeclarationsBooks" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>