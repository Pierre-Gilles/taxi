<?php
	
class ReservationRepository
{

    protected $db;

    final public function __construct($db)
    {
        $this->db = $db;
    }

    public static function randomToken($length = 10)
    {
        if (function_exists('openssl_random_pseudo_bytes'))
        {
            $bytes = openssl_random_pseudo_bytes($length * 2);

            if ($bytes === false)
            {
                // throw exception that unable to create random token
            }

            return strtolower(substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length));
        }

        return ;
    }

    public function createReservation($datetimeReservation, Utilisateur $utilisateur, Lieu $Lieu, Lieu $Lieu_a_destination_de)
    {
        $slug = $this->randomToken();
        return new reservation($datetimeReservation, $utilisateur->getIDUtilisateur(), $Lieu->getIDLieu(), $Lieu_a_destination_de->getIDLieu(), $slug);
    }

    public function saveReservation(Reservation $reservation){
        $sql = "INSERT INTO Réservation(datetimeReservation, datetimeCréation, codeChauffeur, codeUtilisateur, codeLieu, codeLieu_a_destination_de, codeVoiture, Course_codecourse, slug) ";
        $sql .= " VALUES (:datetimeReservation, SYSDATE(), :codeChauffeur , :codeUtilisateur, :codeLieu, :codeLieuDest, :codeVoiture, :codecourse, :slug);";
        $statement = $this->db->prepare($sql);
        $statement->bindValue("datetimeReservation", $reservation->getDatetimeReservation(), "datetime");
        $statement->bindValue("codeChauffeur", $reservation->getIDChauffeur());
        $statement->bindValue("codeUtilisateur", $reservation->getIDUtilisateur());
        $statement->bindValue("codeLieu", $reservation->getIDLieu());
        $statement->bindValue("codeLieuDest", $reservation->getIDLieuADestinationDe());
        $statement->bindValue("codeVoiture", $reservation->getIDVoiture());
        $statement->bindValue("codecourse", $reservation->getCourseIDcourse());
        $statement->bindValue("slug", $reservation->getSlug());
        $statement->execute();

        $reservation->setIDReservation($this->db->lastInsertId());
        // return the ID of the inserted Lieu
        return $reservation;
    }


    /**
     * @return mixed
     */

    public function infosReservation(){
		$statement = $this->db->prepare("SELECT codeCourse, codeReservation, datetimeReservation , nomChauffeur, pénomChauffeur, marqueVoiture, modèleVoiture, nomUtilisateur, prénomUtilisateur, mailUtilisateur, numeroTelUtilisateur, AdresseLieu as Adresse_Prise_en Charge, villeLieu as Ville_Prise_en Charge, codePostalLieu CP_Prise_en Charge
                                          FROM Réservation NATURAL JOIN Chauffeur, Réservation NATURAL JOIN Voiture, Réservation NATURAL JOIN Utilisateur, Réservation NATURAL JOIN Lieu
                                          GROUP BY codeCourse, codeReservation ;
										");
        $statement->execute();
		$reservation = $statement->fetchAll();
		$chauffeurMapper = new ReservationMapper();
		for($i = 0; $i < count($reservation); $i++){
			$reservation[$i] = $chauffeurMapper->transform($reservation[$i]);
		}
		return $reservation;
	}

    public function getAllReservationChauffeur(Chauffeur $chauffeur){
        $statement = $this->db->prepare("SELECT codeReservation, datetimeReservation, datetimeCréation,
                                            nomUtilisateur, prénomUtilisateur, slug,
                                            La.AdresseLieu AS Adresse, La.VilleLieu AS Ville, La.codePostalLieu AS codePostal,
                                            Lb.AdresseLieu AS AdresseDest, Lb.VilleLieu AS VilleDest, Lb.codePostalLieu AS codePostalDest
											FROM Réservation R NATURAL JOIN Utilisateur
											LEFT JOIN Lieu La ON La.codeLieu = R.codeLieu
											LEFT JOIN Lieu Lb ON Lb.codeLieu = R.codeLieu_a_destination_de
											WHERE codeChauffeur = ?
											GROUP BY codeReservation;
										");
        $statement->bindValue(1, $chauffeur->getIDChauffeur(), "integer");
        $statement->execute();
        $reservations = $statement->fetchAll();
        /*$chauffeurMapper = new ReservationMapper();
        for($i = 0; $i < count($disponibilite); $i++){
            $disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
        }*/
        return $reservations;
    }

    public function getAllReservation(Utilisateur $user){
        $statement = $this->db->prepare("SELECT codeReservation, datetimeReservation, datetimeCréation,
                                            nomUtilisateur, prénomUtilisateur, slug,
                                            La.AdresseLieu AS Adresse, La.VilleLieu AS Ville, La.codePostalLieu AS codePostal,
                                            Lb.AdresseLieu AS AdresseDest, Lb.VilleLieu AS VilleDest, Lb.codePostalLieu AS codePostalDest
											FROM Réservation R NATURAL JOIN Utilisateur
											LEFT JOIN Lieu La ON La.codeLieu = R.codeLieu
											LEFT JOIN Lieu Lb ON Lb.codeLieu = R.codeLieu_a_destination_de
											WHERE codeUtilisateur = ?
											GROUP BY codeReservation;
										");
        $statement->bindValue(1, $user->getIDUtilisateur(), "integer");
        $statement->execute();
        $reservations = $statement->fetchAll();
        /*$chauffeurMapper = new ReservationMapper();
        for($i = 0; $i < count($disponibilite); $i++){
            $disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
        }*/
        return $reservations;
    }

    public function newReservation($user){
        $statement = $this->db->prepare("
                                        INSERT INTO Reservation VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->bindValue(1, $user->getIDUtilisateur(), "integer");
        $statement->execute();
        $disponibilite = $statement->fetchAll();
        /*$chauffeurMapper = new ReservationMapper();
        for($i = 0; $i < count($disponibilite); $i++){
            $disponibilite[$i] = $chauffeurMapper->transform($disponibilite[$i]);
        }*/
        return $disponibilite;
    }

}
