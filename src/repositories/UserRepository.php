<?php 

	include './database/connection.php';

	class UserRepository {
		public function create(){
			$sql = "--sql
				INSERT INTO user VALUES (
				22, 
				'leandrosantino@gmail.com',
				'alpha45c',
				'leandro'
				)
			";

			$db = new Database();

			$db->exec($sql);
			echo "teste";

		}
	}
