<?php
	
class ReservationRepository
{

    protected $db;

    final public function __construct($db)
    {
        $this->db = $db;
    }

    public function createReservation($codeReservation, $datetimeReservation, $codeChauffeur, $codeUtilisateur, $codeLieu, $codeLieu_a_destination_de, $codeVoiture, $courses_codecourse){
        
    }

    public function createReservation(
        $reservation->getIDre    INSERT INTO `Voiture` (`codeVoiture`, `marqueVoiture`, `modèleVoiture`, `imageVoiture`) VALUES;
	}



	public function infosReservation(){
		$statement = $this->db->prepare("SELECT codeCourse, codeReservation, datetimeReservation as Heure, nomChauffeur, pénomChauffeur, marqueVoiture, modèleVoiture, nomUtilisateur, prénomUtilisateur, mailUtilisateur, numeroTelUtilisateur, AdresseLieu as Adresse_Prise_en Charge, villeLieu as Ville_Prise_en Charge, codePostalLieu CP_Prise_en Charge, 
											FROM Réservation NATURAL JOIN Chauffeur, Réservation NATURAL JOIN Voiture, Réservation NATURAL JOIN Utilisateur, Réservation NATURAL JOIN Lieu
											GROUP BY codeCourse, codeReservation ;
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
