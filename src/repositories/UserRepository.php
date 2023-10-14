<?php 

	include '../database/connection.php';

	class UserRepository {

		private PDO $db;

		function __construct(){
			$this->db = Database::connect();
		}

		public function create($data){

			$sql = "--sql
				INSERT INTO user VALUES (
					{$data->id},
					'{$data->email}',
					'{$data->password}',
					'{$data->username}'
				)
			";


			$query = $this->db->prepare($sql);
			$query->execute();
			
			if(!$query){
				return json_encode(["error" => "insert failure"]);
			}

			return json_encode(["data" => $data]);

		}

		public function getAll(){
			$sql = "--sql
				SELECT * FROM user
			";
			
			$query = $this->db->prepare($sql);
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);

			return json_encode(["data" => $data]);
		}
	}
