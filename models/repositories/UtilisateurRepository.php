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
}
