<?php


class Utilisateur {
	protected $IDUtilisateur;
	protected $nomUtilisateur;
	protected $prenomUtilisateur;
	protected $mailUtilisateur;
	protected $motdepasseUtilisateur;
	protected $numeroTelUtilisateur;

	function __construct($IDUtilisateur, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur) {
        $this->IDUtilisateur = $IDUtilisateur;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->motdepasseUtilisateur = $motdepasseUtilisateur;
        $this->numeroTelUtilisateur = $numeroTelUtilisateur;
    }
}

