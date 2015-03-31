<?php
	
class ChauffeurRepository{

	protected $db;

	final public function __construct( $db) {
       	$this->db = $db;
    }

	public function getAllChauffeurs(){
		$statement = $this->db->prepare("SELECT * FROM chauffeur");
		$statement->execute();
		$chauffeurs = $statement->fetchAll();
		$chauffeurMapper = new ChauffeurMapper();
		for($i = 0; $i < count($chauffeurs); $i++){
			$chauffeurs[$i] = $chauffeurMapper->transform($chauffeurs[$i]);
		}
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
	public function datereservationsChauffeurs(){
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
	public function datereservationsChauffeurs($date){
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
