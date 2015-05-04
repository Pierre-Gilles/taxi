<?php


class Chauffeur {
	protected $IDChauffeur;
	protected $nomChauffeur;
	protected $prenomChauffeur;
	protected $mailChauffeur;
	protected $motdepasseChauffeur;
	protected $estPatron;
	protected $numeroTelChauffeur;

	function __construct($nomChauffeur, $prenomChauffeur, $mailChauffeur, $motdepasseChauffeur,$numeroTelChauffeur,$IDChauffeur = null) {
        $this->IDChauffeur = $IDChauffeur;
        $this->nomChauffeur = $nomChauffeur;
        $this->prenomChauffeur = $prenomChauffeur;
        $this->mailChauffeur = $mailChauffeur;
        $this->motdepasseChauffeur = $motdepasseChauffeur;
        $this->numeroTelChauffeur = $numeroTelChauffeur;
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
    public function getNomChauffeur()
    {
        return $this->nomChauffeur;
    }

    /**
     * @param mixed $nomChauffeur
     */
    public function setNomChauffeur($nomChauffeur)
    {
        $this->nomChauffeur = $nomChauffeur;
    }

    /**
     * @return mixed
     */
    public function getPrenomChauffeur()
    {
        return $this->prenomChauffeur;
    }

    /**
     * @param mixed $prenomChauffeur
     */
    public function setPrenomChauffeur($prenomChauffeur)
    {
        $this->prenomChauffeur = $prenomChauffeur;
    }

    /**
     * @return mixed
     */
    public function getMailChauffeur()
    {
        return $this->mailChauffeur;
    }

    /**
     * @param mixed $mailChauffeur
     */
    public function setMailChauffeur($mailChauffeur)
    {
        $this->mailChauffeur = $mailChauffeur;
    }

    /**
     * @return mixed
     */
    public function getMotdepasseChauffeur()
    {
        return $this->motdepasseChauffeur;
    }

    /**
     * @param mixed $motdepasseChauffeur
     */
    public function setMotdepasseChauffeur($motdepasseChauffeur)
    {
        $this->motdepasseChauffeur = $motdepasseChauffeur;
    }

    /**
     * @return mixed
     */
    public function getEstPatron()
    {
        return $this->estPatron;
    }

    /**
     * @param mixed $estPatron
     */
    public function setEstPatron($estPatron)
    {
        $this->estPatron = $estPatron;
    }

    /**
     * @return mixed
     */
    public function getNumeroTelChauffeur()
    {
        return $this->numeroTelChauffeur;
    }

    /**
     * @param mixed $numeroTelChauffeur
     */
    public function setNumeroTelChauffeur($numeroTelChauffeur)
    {
        $this->numeroTelChauffeur = $numeroTelChauffeur;
    }


    
}

