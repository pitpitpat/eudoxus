<?php
	class Dbh {

		private $server_name;
		private $username;
		private $password;
		private $db_name;
		private $char_set;

		protected function connect() {
			$this->server_name = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->db_name = "sdi1500011";
			$this->char_set = "utf8";

			try {
				$dsn = "mysql:host=".$this->server_name.";dbname=".$this->db_name.";charset=".$this->char_set;
				$pdo = new PDO($dsn, $this->username, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
			} catch (PDOException $e) {
				echo "Connection failed: ".$e->getMessage();
			}
		}

	}
?>