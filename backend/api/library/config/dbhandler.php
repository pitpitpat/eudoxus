<?php
class DBHandler {

	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "sdi1500011";
	private $char_set = "utf8";

	protected $connection;

	protected function getConnection() {
		$this->connection = null;

		$dsn = "mysql:host=".$this->host.";dbname=".$this->database.";charset=".$this->char_set;
		try {
			$this->connection = new PDO($dsn, $this->username, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception) {
			echo "Connection failed: ".$exception->getMessage();
		}

		return $this->connection; 
	}
}
?>