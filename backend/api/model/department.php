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
    }
    
    public function update(){}

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