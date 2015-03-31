<?php


class Reservation {
	protected $IDReservation;
	protected $datetimeReservation;
	protected $datetimeCreation;
    protected $IDChauffeur;
    protected $IDUtilisateur;
    protected $IDLieu;
    protected $IDLieu_a_destination_de;
    protected $IDVoiture;

    function __construct($datetimeCreation, $IDChauffeur, $IDUtilisateur, $IDLieu, $IDLieu_a_destination_de, $IDVoiture, $IDReservation, $datetimeReservation)
    {
        $this->datetimeCreation = $datetimeCreation;
        $this->IDChauffeur = $IDChauffeur;
        $this->IDUtilisateur = $IDUtilisateur;
        $this->IDLieu = $IDLieu;
        $this->IDLieu_a_destination_de = $IDLieu_a_destination_de;
        $this->IDVoiture = $IDVoiture;
        $this->IDReservation = $IDReservation;
        $this->datetimeReservation = $datetimeReservation;
    }


}

