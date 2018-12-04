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

    public function create($department){
        $query = "INSERT INTO " . $this->table_name . 
        " (name) " . 
        " VALUES (?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$department->name]);

        return $this->connection->lastInsertId;
    }
    
    public function update($department) {
        $query = "UPDATE " . $this->table_name . " SET " .
        "name=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$department->name,
            $department->id]);
    }

    public function delete(){}

   public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"departments" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"department" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>