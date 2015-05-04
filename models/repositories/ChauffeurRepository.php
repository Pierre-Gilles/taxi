<?php
	
class ChauffeurRepository{

	protected $db;
	protected $chauffeurMapper;

	final public function __construct(ChauffeurMapper $chauffeurMapper,  $db) {
       	$this->db = $db;
		$this->chauffeurMapper = $chauffeurMapper;
    }

	public function createChauffeur($nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur){
		$motdepasseUtilisateur = password_hash($motdepasseUtilisateur, PASSWORD_DEFAULT);
		return new Chauffeur($nomUtilisateur, $prenomUtilisateur,$mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur);
	}

	public function saveChauffeur(Chauffeur $chauffeur){
		$sql = "INSERT INTO Chauffeur(nomChauffeur, prénomChauffeur, mailChauffeur, motdepasseChauffeur,numeroTelChauffeur) ";
		$sql .= " VALUES(:name,:surname,:mail,:password,:phone) ";
		$statement = $this->db->prepare($sql);
		$statement->bindValue("name", $chauffeur->getNomChauffeur());
		$statement->bindValue("surname", $chauffeur->getPrenomChauffeur());
		$statement->bindValue("mail", $chauffeur->getMailChauffeur());
		$statement->bindValue("password", $chauffeur->getMotdepasseChauffeur());
		$statement->bindValue("phone", $chauffeur->getNumeroTelChauffeur());
		$statement->execute();
	}

	public function login($mail,$password){
		$sql = "SELECT * FROM Chauffeur WHERE mailChauffeur = ?";
		$chauffeur = $this->db->fetchAssoc($sql, array($mail));
		if(password_verify($password, $chauffeur['motdepasseChauffeur'])){
			$chauffeur = $this->chauffeurMapper->transform($chauffeur);
			return $chauffeur;
		}else{
			return null;
		}
	}

	public function getAllChauffeurs(){
		$statement = $this->db->prepare("SELECT * FROM chauffeur");
		$statement->execute();
		$chauffeurs = $statement->fetchAll();
		/*$chauffeurMapper = new ChauffeurMapper();
		for($i = 0; $i < count($chauffeurs); $i++){
			$chauffeurs[$i] = $chauffeurMapper->transform($chauffeurs[$i]);
		}*/
		return $chauffeurs;
	}

	//Afficher les chauffeurs disponible à un horaire précis ( par exemple ici, disponible à cette date '2014-11-19 10:00:00' ) 
	public function disponibiliteChauffeurs(){
		$statement = $this->db->prepare("SELECT codeChauffeur, prénomChauffeur, nomChauffeur
											FROM Chauffeur NATURAL JOIN Disponibilité
											WHERE débutDisponibilité < '2014-11-19 10:00:00' 
											AND finDisponibilité >  '2014-11-19 10:00:00'
										");
		$statement->execute();
		$disponibilite = $statement->fetchAll();
		$chauffeurMapper = new DisponibiliteMapper();
		for($i = 0; $i < count($disponibilite); $i++){
			$disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
		}
		return $disponibilite;
	}

	//Afficher toutes les réservations attribuées à un chauffeur à la date d’aujourd’hui (exemple ici avec le chauffeur n°1)
	public function reservationsChauffeursToday(){
		$statement = $this->db->prepare("SELECT codeReservation, datetimeReservation, nomUtilisateur, mailUtilisateur, numTelUtilisateur
											FROM Réservation NATURAL JOIN Utilisateur, Réservation NATURAL JOIN Chauffeur
											GROUP BY codeRéservation
											WHERE codeChauffeur = 1
											AND DATE(datetimeReservation) = DATE(SYSDATE())
										");
		$statement->execute();
		$disponibilite = $statement->fetchAll();
		$chauffeurMapper = new ReservationMapper();
		for($i = 0; $i < count($disponibilite); $i++){
			$disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
		}
		return $disponibilite;
	}


	//Afficher toutes les réservations attribuées à un chauffeur à une date donnée. 
	public function reservationsChauffeursDate($date){
		$statement = $this->db->prepare("SELECT codeReservation, datetimeReservation, nomUtilisateur, mailUtilisateur, numTelUtilisateur
											FROM Réservation NATURAL JOIN Utilisateur, Réservation NATURAL JOIN Chauffeur
											GROUP BY codeRéservation
											WHERE codeChauffeur = 1
											AND DATE(datetimeReservation) = ?
										");
		$statement->bindValue(1, $date, "datetime");
		$statement->execute();
		$disponibilite = $statement->fetchAll();
		$chauffeurMapper = new ReservationMapper();
		for($i = 0; $i < count($disponibilite); $i++){
			$disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
		}
		return $disponibilite;
	}


}
