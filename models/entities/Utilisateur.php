<?php


class Utilisateur {
	protected $IDUtilisateur;
	protected $nomUtilisateur;
	protected $prenomUtilisateur;
	protected $mailUtilisateur;
	protected $motdepasseUtilisateur;
	protected $numeroTelUtilisateur;

	function __construct($nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur,$IDUtilisateur = null) {
        $this->IDUtilisateur = $IDUtilisateur;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->motdepasseUtilisateur = $motdepasseUtilisateur;
        $this->numeroTelUtilisateur = $numeroTelUtilisateur;
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
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * @param mixed $prenomUtilisateur
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    /**
     * @param mixed $mailUtilisateur
     */
    public function setMailUtilisateur($mailUtilisateur)
    {
        $this->mailUtilisateur = $mailUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMotdepasseUtilisateur()
    {
        return $this->motdepasseUtilisateur;
    }

    /**
     * @param mixed $motdepasseUtilisateur
     */
    public function setMotdepasseUtilisateur($motdepasseUtilisateur)
    {
        $this->motdepasseUtilisateur = $motdepasseUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getNumeroTelUtilisateur()
    {
        return $this->numeroTelUtilisateur;
    }

    /**
     * @param mixed $numeroTelUtilisateur
     */
    public function setNumeroTelUtilisateur($numeroTelUtilisateur)
    {
        $this->numeroTelUtilisateur = $numeroTelUtilisateur;
    }


}

