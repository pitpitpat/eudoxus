<?php
include $_SERVER['DOCUMENT_ROOT'].'/eudoxus/php/model/dbh.php';

class Student {

	// Connection instance
	private $connection;

	// table name
	private $table_name = "students";

	// table columns
	public $id;
	public $sku;
	public $barcode;
	public $name;
	public $price;
	public $unit;
	public $quantity;
	public $minquantity;
	public $createdAt; 
	public $updatedAt;
	public $family_id;
	public $location_id;

	public function __construct($connection){
		$this->connection = $connection;
	}


	public function create(){
	}

	public function readAll(){
		$query = "SELECT * FROM " . $this->table_name;

		$stmt = $this->connection->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	public function read($id){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		return $stmt;
	}

	public function update(){}

	public function delete(){}
}