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
    }
    
    public function update(){}

    public function delete(){}

   public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"declarations" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"declaration" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>