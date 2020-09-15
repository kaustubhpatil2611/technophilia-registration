<?php

class Register{
	public $name=null;
	public $mail=null;
	public $college=null;
	public $dept=null;
	public $question=null;
	public $app=null;
	public $ts=null;

	private $table_name = null;
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
		$this->table_name = TABLE;
	}

	public function insertr(){
		$sql="INSERT INTO {$this->table_name} VALUES (:name,:mail,:college,:dept,:question,:app,:ts)";
		$stmt=$this->conn->prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':mail',$this->mail);
		$stmt->bindParam(':college',$this->college);
		$stmt->bindParam(':dept',$this->dept);
		$stmt->bindParam(':question',$this->question);
		$stmt->bindParam(':app',$this->app);
		$stmt->bindParam(':ts',$this->ts);
		$stmt->execute();
		$list=array("Registered Successfully!");
		
		return json_encode($list);

	}

	public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
	}
}


?>