<?php
	
class UtilisateurRepository{

	protected $db;

	final public function __construct($db) {
       	$this->db = $db;
    }

	public function createUser($IDUtilisateur, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur){
		$motdepasseUtilisateur = password_hash($motdepasseUtilisateur, PASSWORD_DEFAULT);

	}

	private function validateUser($IDUtilisateur, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur){

	}

	//Afficher tous les utilisateurs ayant effectué une réservation 
	public function getUtilisateursReservation(){
		$statement = $this->db->prepare("SELECT codeUtilisateur,prénomUtilisateur, nomUtilisateur
										 FROM Utilisateur
										 WHERE codeUtilisateur IN ( SELECT DISTINCT codeUtilisateur FROM Réservation )");
		$statement->execute();
		$utilisateurs = $statement->fetchAll();
		$utilisateursMapper = new UtilisateurMapper();
		for($i = 0; $i < count($utilisateurs); $i++){
			$utilisateurs[$i] = $utilisateurs->transform($utilisateurs[$i]);
		}
		return $utilisateurs;
	}
	

}
