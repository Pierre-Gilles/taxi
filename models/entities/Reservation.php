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
    protected $course_IDcourse;
    protected $slug;

    function __construct( $datetimeReservation, $IDUtilisateur, $IDLieu, $IDLieu_a_destination_de, $slug, $datetimeCreation = null, $IDChauffeur = null,$IDVoiture = null, $course_IDcourse = null,$IDReservation = null)
    {
        $this->IDReservation = $IDReservation;
        $this->datetimeReservation = $datetimeReservation;
        $this->datetimeCreation = $datetimeCreation;
        $this->IDChauffeur = $IDChauffeur;
        $this->IDUtilisateur = $IDUtilisateur;
        $this->IDLieu = $IDLieu;
        $this->IDLieu_a_destination_de = $IDLieu_a_destination_de;
        $this->IDVoiture = $IDVoiture;
        $this->course_IDcourse = $course_IDcourse;
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * @return mixed
     */
    public function getCourseIDcourse()
    {
        return $this->course_IDcourse;
    }

    /**
     * @param mixed $course_IDcourse
     */
    public function setCourseIDcourse($course_IDcourse)
    {
        $this->course_IDcourse = $course_IDcourse;
    }

    /**
     * @param mixed $IDVoiture
     */
    public function setIDVoiture($IDVoiture)
    {
        $this->IDVoiture = $IDVoiture;
    }



}

