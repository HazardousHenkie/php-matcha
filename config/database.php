<?php

	class Database {
		
		private $connection;

		function __construct()
		{
			$this->connect_db();
		}

		public function connect_db() 
		{
			//should use mysqli or pdo
			$this->connection = mysqli_connect('localhost', 'root', '', 'matchaphp');
			if(mysqli_connect_error()) {
				die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function get_data($sql) {
			$res = mysqli_query($this->connection, $sql);

			return $res;
		}

		public function run_query($sql) 
		{
			$res = mysqli_query($this->connection, $sql);

			if ($res) {
				return true;
			} else {
				return false;
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->connection, $var);
			return $return;
		}

	}
?>
