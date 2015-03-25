<?php
	
class ChauffeurRepository{

	protected $db;

	final public function __construct( $db) {
       	$this->db = $db;
    }

	public function getAllChauffeurs(){
		$statement = $this->db->prepare('SELECT * FROM chauffeur');
		$statement->execute();
		$chauffeurs = $statement->fetchAll();
		/*$chauffeurMapper = new ChauffeurMapper();
		for($i = 0; $i < count($chauffeurs); $i++){
			$chauffeurs[$i] = $chauffeurMapper->transform($chauffeurs[$i]);
		}*/
		return $chauffeurs;
	}

}
