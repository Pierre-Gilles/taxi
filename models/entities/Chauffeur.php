<?php


class Chauffeur {
	protected $IDChauffeur;
	protected $nomChauffeur;
	protected $prenomChauffeur;
	protected $mailChauffeur;
	protected $motdepasseChauffeur;
	protected $numeroTelChauffeur;
	protected $estPatron;

	function __construct($IDChauffeur, $nomChauffeur, $prenomChauffeur, $mailChauffeur, $motdepasseChauffeur,$numeroTelChauffeur, $estPatron) {
        $this->IDChauffeur = $IDChauffeur;
        $this->nomChauffeur = $nomChauffeur;
        $this->prenomChauffeur = $prenomChauffeur;
        $this->mailChauffeur = $mailChauffeur;
        $this->motdepasseChauffeur = $motdepasseChauffeur;
        $this->numeroTelChauffeur = $numeroTelChauffeur;
        $this->estPatron = $estPatron;
    }
}

