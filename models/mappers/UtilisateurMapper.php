<?php

class UtilisateurMapper{

	function transform($array){
		return new Utilisateur($array['codeUtilisateur'],$array['nomUtilisateur'],$array['prenomUtilisateur'],$array['mailUtilisateur'],$array['motdepasseUtilisateur'],$array['numeroTelUtilisateur']);
	}
}