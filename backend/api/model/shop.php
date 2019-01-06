<?php
class Shop {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "shops";
    //associated table names
    private $books_shops_table_name = "BooksShops";

	// table columns
	public $id;
	public $name;
	public $address;
    public $hours;
    public $email;
    public $phone;

	public function __construct($connection){
		$this->connection = $connection;
	}


	public function create() {
        $query = "INSERT INTO " . $this->table_name . 
        " (name, address, hours, email, phone) " . 
        " VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name,
            $this->address,
            $this->hours,
            $this->email,
            $this->phone]);

        return $this->connection->lastInsertId();
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET " .
        "name=?, address=?, hours=?, email=?, phone=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name,
            $this->address,
            $this->hours,
            $this->email,
            $this->phone,
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
			"shops" => $stmt->fetchAll(PDO::FETCH_CLASS),
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
    
    public function getByBookId($book_id) {
        $query = "SELECT * FROM " . $this->table_name . 
        " WHERE id in (SELECT shop_id FROM " . $this->books_shops_table_name . " WHERE book_id=?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$book_id]);

        $data = [
			"shops" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

}
?>