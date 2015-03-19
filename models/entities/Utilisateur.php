<?php


class Utilisateur {
	protected $codeUtilisateur;
	protected $nomUtilisateur;
	protected $prenomUtilisateur;
	protected $mailUtilisateur;
	protected $motdepasseUtilisateur;
	protected $numeroTelUtilisateur;

	function __construct($codeUtilisateur, $nomUtilisateur, $prenomUtilisateur, $mailUtilisateur, $motdepasseUtilisateur,$numeroTelUtilisateur) {
        $this->codeUtilisateur = $codeUtilisateur;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->prenomUtilisateur = $prenomUtilisateur;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->motdepasseUtilisateur = $motdepasseUtilisateur;
        $this->numeroTelUtilisateur = $numeroTelUtilisateur;
    }
}