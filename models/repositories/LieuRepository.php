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

		$lieu->setIDLieu($this->db->lastInsertId());
		// return the lieu with the ID
		return $lieu;
	}

	public function getLieuClient(Utilisateur $user){
		$sql = "SELECT DISTINCT Lieu.codeLieu, adresseLieu, villeLieu, codePostalLieu  FROM Lieu  ";
		$sql .= " LEFT JOIN Réservation ON ( (Réservation.codeLieu_a_destination_de = Lieu.codeLieu) OR (Réservation.codeLieu = Lieu.codeLieu) )  ";
		$sql .= " WHERE codeUtilisateur = :id";
		$statement = $this->db->prepare($sql);
		$statement->bindValue("id", $user->getIDUtilisateur());
		$statement->execute();
		$lieux = $statement->fetchAll();

		$lieuMapper = new lieuMapper();
		for($i = 0; $i < count($lieux); $i++){
			$lieux[$i] = $lieuMapper->transform($lieux[$i]);
		}
		return $lieux;
	}
}
