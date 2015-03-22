<?php


class Chauffeur {
	protected $IDChauffeur;
	protected $nomChauffeur;
	protected $prenomChauffeur;
	protected $mailChauffeur;
	protected $motdepasseChauffeur;
	protected $estPatron;
	protected $numeroTelChauffeur;

	function __construct($IDChauffeur, $nomChauffeur, $prenomChauffeur, $mailChauffeur, $motdepasseChauffeur, $estPatron,$numeroTelChauffeur) {
        $this->IDChauffeur = $IDChauffeur;
        $this->nomChauffeur = $nomChauffeur;
        $this->prenomChauffeur = $prenomChauffeur;
        $this->mailChauffeur = $mailChauffeur;
        $this->motdepasseChauffeur = $motdepasseChauffeur;
        $this->estPatron = $estPatron;
        $this->numeroTelChauffeur = $numeroTelChauffeur;
    }
}

