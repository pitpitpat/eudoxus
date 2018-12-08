<?php
class Department {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "departments";
    //associated table names
    
	// table columns
	public $id;
	public $name;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (name) " . 
        " VALUES (?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->name]);

        return $this->connection->lastInsertId;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET " .
        "name=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name,
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
			"departments" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [
			"department" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>