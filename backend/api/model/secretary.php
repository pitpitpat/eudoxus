<?php
class Secretary {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "secretaries";
    //associated table names
    
	// table columns
	public $id;
    public $department_id;
    public $name;
    public $surname;
    public $username;
    public $password;

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
			"secretaries" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"secretary" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>