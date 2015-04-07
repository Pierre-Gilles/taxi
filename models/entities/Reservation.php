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

    /**
     * @return mixed
     */
    public function getIDReservation()
    {
        return $this->IDReservation;
    }

    /**
     * @param mixed $IDReservation
     */
    public function setIDReservation($IDReservation)
    {
        $this->IDReservation = $IDReservation;
    }

    /**
     * @return mixed
     */
    public function getDatetimeReservation()
    {
        return $this->datetimeReservation;
    }

    /**
     * @param mixed $datetimeReservation
     */
    public function setDatetimeReservation($datetimeReservation)
    {
        $this->datetimeReservation = $datetimeReservation;
    }

    /**
     * @return mixed
     */
    public function getDatetimeCreation()
    {
        return $this->datetimeCreation;
    }

    /**
     * @param mixed $datetimeCreation
     */
    public function setDatetimeCreation($datetimeCreation)
    {
        $this->datetimeCreation = $datetimeCreation;
    }

    /**
     * @return mixed
     */
    public function getIDChauffeur()
    {
        return $this->IDChauffeur;
    }

    /**
     * @param mixed $IDChauffeur
     */
    public function setIDChauffeur($IDChauffeur)
    {
        $this->IDChauffeur = $IDChauffeur;
    }

    /**
     * @return mixed
     */
    public function getIDUtilisateur()
    {
        return $this->IDUtilisateur;
    }

    /**
     * @param mixed $IDUtilisateur
     */
    public function setIDUtilisateur($IDUtilisateur)
    {
        $this->IDUtilisateur = $IDUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getIDLieu()
    {
        return $this->IDLieu;
    }

    /**
     * @param mixed $IDLieu
     */
    public function setIDLieu($IDLieu)
    {
        $this->IDLieu = $IDLieu;
    }

    /**
     * @return mixed
     */
    public function getIDLieuADestinationDe()
    {
        return $this->IDLieu_a_destination_de;
    }

    /**
     * @param mixed $IDLieu_a_destination_de
     */
    public function setIDLieuADestinationDe($IDLieu_a_destination_de)
    {
        $this->IDLieu_a_destination_de = $IDLieu_a_destination_de;
    }

    /**
     * @return mixed
     */
    public function getIDVoiture()
    {
        return $this->IDVoiture;
    }

    /**
     * @param mixed $IDVoiture
     */
    public function setIDVoiture($IDVoiture)
    {
        $this->IDVoiture = $IDVoiture;
    }



}

