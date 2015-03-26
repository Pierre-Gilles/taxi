<?php


class Disponibilite {
	protected $IDDisponibilite;
	protected $dateDisponibilite;
	protected $heuredebutDisponibilite;
	protected $heurefinDisponibilite;

	function __construct($IDDisponibilite, $dateDisponibilite, $heuredebutDisponibilite, $heurefinDisponibilite) {
        $this->IDDisponibilite = $IDDisponibilite;
        $this->dateDisponibilite = $dateDisponibilite;
        $this->heuredebutDisponibilite = $immatriculationVoiture;
        $this->heurefinDisponibilite = $heurefinDisponibilite;
    }

    /**
     * @return mixed
     */
    public function getIDDisponibilite()
    {
        return $this->IDDisponibilite;
    }

    /**
     * @param mixed $IDDisponibilite
     */
    public function setIDDisponibilite($IDDisponibilite)
    {
        $this->IDDisponibilite = $IDDisponibilite;
    }

    /**
     * @return mixed
     */
    public function getDateDisponibilite()
    {
        return $this->dateDisponibilite;
    }

    /**
     * @param mixed $dateDisponibilite
     */
    public function setDateDisponibilite($dateDisponibilite)
    {
        $this->dateDisponibilite = $dateDisponibilite;
    }

    /**
     * @return mixed
     */
    public function getHeuredebutDisponibilite()
    {
        return $this->heuredebutDisponibilite;
    }

    /**
     * @param mixed $heuredebutDisponibilite
     */
    public function setHeuredebutDisponibilite($heuredebutDisponibilite)
    {
        $this->heuredebutDisponibilite = $heuredebutDisponibilite;
    }

    /**
     * @return mixed
     */
    public function getHeurefinDisponibilite()
    {
        return $this->heurefinDisponibilite;
    }

    /**
     * @param mixed $heurefinDisponibilite
     */
    public function setHeurefinDisponibilite($heurefinDisponibilite)
    {
        $this->heurefinDisponibilite = $heurefinDisponibilite;
    }


}

