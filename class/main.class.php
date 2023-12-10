<?php

class Main extends Dbh{

	private $pdo;

	/**
	*
	* Constructor
	*
	* @param string DB_HOST
	* @param string DB_USER
	* @param string DB_PASS
	* @param string DB_NAME
	*
	*/

	public function __construct(){
		parent::__construct();
		$this->pdo = $this->get_connection();
	}

	// Get Data

	public function get_data($table, $ntable, $value, $item, $sec_value){
		if($ntable == null && $value == null and $item == null && $sec_value == null){

			$sql = "SELECT * FROM $table";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		} elseif($ntable != null && $table != null and $item == null && $sec_value == null){

			$sql = "SELECT * FROM $table WHERE $ntable = :value";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(array(":value" => $value));
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		} elseif($ntable != null && $value != null and $item != null && $sec_value != null) {

			$sql = "SELECT * FROM $tabla WHERE $ntable = :value AND $item = :sec_value";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute(array(":value" => $value, ":sec_value" => $sec_value));
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $result;
	}

}

?>