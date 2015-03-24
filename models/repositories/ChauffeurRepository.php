<?php
	
class ChauffeurRepository{


	public function getAllChauffeurs(){
		$statement = $conn->prepare('SELECT * FROM chauffeur');
		$statement->execute();
		$chauffeurs = $statement->fetchAll();
		$chauffeurMapper = new ChauffeurMapper();
		
	}

}
