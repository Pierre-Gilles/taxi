<?php
	
class ReservationRepository
{

    protected $db;

    final public function __construct($db)
    {
        $this->db = $db;
    }

    public function createReservation($datetimeCreation, $IDChauffeur, $IDUtilisateur, $IDLieu, $IDLieu_a_destination_de, $IDVoiture, $IDReservation, $datetimeReservation, $course_IDcourse)
    {
        return new reservation($datetimeCreation, $IDChauffeur, $IDUtilisateur, $IDLieu, $IDLieu_a_destination_de, $IDVoiture, $IDReservation, $datetimeReservation, $course_IDcourse);
    }

	public function saveReservation(Reservation $reservation){
		$sql = "INSERT INTO Reservation(codeReservation, datetimeReservation, SYSDATE(),codeChauffeur, codeUtilisateur, codeLieu, codeLieu_a_destination_de, codeVoiture, courses_codecourse) ";
		$sql .= " VALUES(:name,:surname,:mail,:password,:phone) ";
		$statement = $this->db->prepare($sql);
		$statement->bindValue("codeReservation", $reservation->getIDreservation());
		$statement->bindValue("datetimeReservation", $reservation->getDatetimeReservation());
		$statement->bindValue("codeChauffeur", $reservation->getIDChauffeur());
		$statement->bindValue("codeUtilisateur", $reservation->getIDUtilisateur());
		$statement->bindValue("codeLieu", $reservation->getIDLieu());
		$statement->bindValue("codeLieu_a_destination_de", $reservation->getIDLieuADestinationDe());
		$statement->bindValue("codeVoiture", $reservation->getIDVoiture());
		$statement->bindValue("course_codecourse", $reservation->getCourseIDcourse());
		$statement->execute();
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
