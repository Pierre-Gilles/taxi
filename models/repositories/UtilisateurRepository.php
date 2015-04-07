<?php
	
class UtilisateurRepository{

	protected $db;

	final public function __construct($db) {
       	$this->db = $db;
    }

	public function createUser($nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur){
		$motdepasseUtilisateur = password_hash($motdepasseUtilisateur, PASSWORD_DEFAULT);
		return new Utilisateur($nomUtilisateur, $prenomUtilisateur,$mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur);
	}

	public function saveUser(Utilisateur $user){
		$sql = "INSERT INTO Utilisateur(nomUtilisateur, prénomUtilisateur, mailUtilisateur, motdepasseUtilisateur,numeroTelUtilisateur) ";
		$sql .= " VALUES(:name,:surname,:mail,:password,:phone) ";
		$statement = $this->db->prepare($sql);
		$statement->bindValue("name", $user->getNomUtilisateur());
		$statement->bindValue("surname", $user->getPrenomUtilisateur());
		$statement->bindValue("mail", $user->getMailUtilisateur());
		$statement->bindValue("password", $user->getMotdepasseUtilisateur());
		$statement->bindValue("phone", $user->getNumeroTelUtilisateur());
		$statement->execute();
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
