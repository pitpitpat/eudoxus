<?php
class SecretaryDeclaration {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "secretaryDeclaration";
    //associated table names
    
	// table columns
	public $id;
    public $timestamp;
    public $secretary_id;
    public $code;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (timestamp, secretary_id, code) " . 
        " VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->timestamp,
            $this->secretary_id,
            $this->code]);

        return $this->connection->lastInsertId;
    }
    
    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "timestamp=?, secretary_id=?, code=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->timestamp,
            $this->secretary_id,
            $this->code,
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
			"declarations" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [
			"declaration" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>