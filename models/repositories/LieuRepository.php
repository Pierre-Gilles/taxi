<?php
	
class LieuRepository{
	
	protected $db;

	final public function __construct($db) {
       	$this->db = $db;
    }

	public function saveLieu(Lieu $lieu){
		$sql = "INSERT INTO Lieu(adresseLieu, villeLieu, codePostalLieu) ";
		$sql .= " VALUES(:adresse,:ville,:CP) ";
		$statement = $this->db->prepare($sql);
		$statement->bindValue("adresse", $lieu->getAdresseLieu());
		$statement->bindValue("ville", $lieu->getVilleLieu());
		$statement->bindValue("CP", $lieu->getCodePostalLieu());
		$statement->execute();
		// return the ID of the inserted Lieu
		return $this->db->lastInsertId();
	}
}
